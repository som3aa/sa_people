<?php

class AccountProfileController extends AccountController {

    /**
     * Show a list of all the stories.
     *
     * @return View
     */
    public function getIndex()
    {
        $profile = Auth::user()->profile;
        // Show the page
        return View::make('site/account/profile/index', compact('profile'));
    }

    /**
     * Edits a profile
     *
     */
    public function postEdit($profile)
    {
        // Declare the rules for the form validation
        $rules = array(
            'name'   => 'required',
            'location' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $profile->name = Input::get( 'name' );
            $profile->location = Input::get( 'location' );
            $profile->bio = Input::get( 'bio' );
            $profile->birthday = new DateTime(Input::get('day').'-'.Input::get('month').'-'.Input::get('year'));
            $profile->gender = Input::get( 'gender' );

            // Was the story created?
            if($profile->save())
            {
                // Redirect to the new story page
                return Redirect::to('account/profile')->with('success', Lang::get('admin/stories/messages.create.success'));
            }

            // Redirect to the story create page
            return Redirect::to('account/profile')->with('error', Lang::get('admin/stories/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('account/profile')->withInput()->withErrors($validator);
    }



    /**
     * //
     *
     * @param  int  $id
     * @return Response
     */
    public function getAvatar()
    {
        return View::make('site/account/profile/avatar');
    }

    /**
     * //
     *
     * @param  int  $id
     * @return Response
     */
    public function postAvatar()
    {
        $user = Auth::user();
        $image = Input::file('image');

        $destinationPath = 'uploads/profiles/';
        $extension =$image->getClientOriginalExtension(); //if you need extension of the file
        $filename = $user->username.'.'.$extension;

        $uploadSuccess = $image->move($destinationPath, $filename);

        if($uploadSuccess) {
            $profile = Profile::find($user->profile->id) ;
            $profile->avatar = $destinationPath.$filename;
            $profile->save();

            $dst_r = String::resize_image($profile->avatar,'550','1000');
            $src =  $profile->avatar;
            
            imagejpeg($dst_r, $src,100);

            //clear memory 
            imagedestroy($dst_r);

            return Redirect::action('AccountProfileController@getCrop');
        }

    }

    /**
     * //
     *
     * @param  int  $id
     * @return Response
     */
    public function getCrop()
    {
        $user = Auth::user(); 
        return View::make('site/account/profile/crop', compact('user') );
    }

    /**
     * //
     *
     * @param  int  $id
     * @return Response
     */
    public function postCrop()
    {
        $user = Auth::user();

        $thumb = $user->profile->avatar;

        $targ_w = $targ_h = 200;
        $jpeg_quality = 100;

        $src =  $user->profile->avatar;
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

        imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
        $targ_w,$targ_h,$_POST['w'],$_POST['h']);

        //Attempt to save the new thumbnail 
        if(is_writeable(dirname($thumb))){
            imagejpeg($dst_r, $thumb, $jpeg_quality);
            return Redirect::to('user/profile/'.$user->username);
        }
        else {
            echo 'Unable to save thumbnail, please check file and directory permissions.';
        }
     
        //clear memory 
        imagedestroy($dst_r);
        imagedestroy($img_r);
    }

}