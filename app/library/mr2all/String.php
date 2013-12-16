<?php

use Carbon\Carbon;

class String {

	/**
	 * generate clear URL 
	 * @param  string $str
	 * @return string
	 */
	public static function slug($str)
	{
		// Make sure string is in UTF-8 and strip invalid UTF-8 characters
		$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

		// Replace non-alphanumeric characters with our delimiter
		$str = preg_replace('/[^\p{L}\p{Nd}]+/u','-', $str);

		// Remove duplicate delimiters
		$str = preg_replace('/(' . preg_quote('-', '/') . '){2,}/', '$1', $str);

		// Remove delimiter from ends
		$str = trim($str,'-');

		return $str;
	}


	public static function resize_image($file, $w, $h, $crop=FALSE) {
	    list($width, $height) = getimagesize($file);
	    $r = $width / $height;
	    if ($crop) {
	        if ($width > $height) {
	            $width = ceil($width-($width*($r-$w/$h)));
	        } else {
	            $height = ceil($height-($height*($r-$w/$h)));
	        }
	        $newwidth = $w;
	        $newheight = $h;
	    } else {
	        if ($w/$h > $r) {
	            $newwidth = $h*$r;
	            $newheight = $h;
	        } else {
	            $newheight = $w/$r;
	            $newwidth = $w;
	        }
	    }
	    $src = imagecreatefromjpeg($file);
	    $dst = imagecreatetruecolor($newwidth, $newheight);
	    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	    return $dst;
	}

	public static function date(Carbon $date)
    {
    	$date->setToStringFormat('j F Y');

        if($date->diffInDays(Carbon::now()) < 29) {
            return $date->diffForHumans();
        } else {
            return $date->__toString();
        }
    }

}