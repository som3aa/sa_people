<?php

class AdminCategoriesController extends AdminController {


    /**
     * Category Model
     * @var Category
     */
    protected $category;

    /**
     * Inject the models.
     * @param category $category
     */
    public function __construct(category $category)
    {
        parent::__construct();
        $this->category = $category;
    }

    /**
     * Show a list of all the categories.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/categories/title.category_management');

        // Grab all the categories
        $categories = $this->category->all();

        // Show the page
        return View::make('admin/categories/index', compact('categories', 'title'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // Title
        $title = Lang::get('admin/categories/title.create_a_new_category');

        // Show the page
        return View::make('admin/categories/create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'name'   => 'required',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the category data
            $this->category->name            = Input::get('name');
            $this->category->slug             = String::slug(Input::get('name'));

            // Was the category created?
            if($this->category->save())
            {
                // Redirect to the new category page
                return Redirect::to('admin/categories')->with('success', Lang::get('admin/categories/messages.create.success'));
            }

            // Redirect to the category create page
            return Redirect::to('admin/categories/create')->with('error', Lang::get('admin/categories/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/categories/create')->withInput()->withErrors($validator);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($category)
	{
        // Title
        $title = Lang::get('admin/categories/title.category_update');

        // Show the page
        return View::make('admin/categories/edit', compact('category', 'title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($category)
	{

        // Declare the rules for the form validation
        $rules = array(
            'name'   => 'required',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the category data
            $category->name            = Input::get('name');
            $category->slug             = String::slug(Input::get('name'));

            // Was the category updated?
            if($category->save())
            {
                // Redirect to the new category page
                return Redirect::to('admin/categories')->with('success', Lang::get('admin/categories/messages.update.success'));
            }

            // Redirect to the blogs category management page
            return Redirect::to('admin/categories/' . $category->id . '/edit')->with('error', Lang::get('admin/categories/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/categories/' . $category->id . '/edit')->withInput()->withErrors($validator);
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param $category
     * @return Response
     */
    public function getDelete($category)
    {
        // Title
        $title = Lang::get('admin/categories/title.category_delete');

        // Show the page
        return View::make('admin/categories/delete', compact('category', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category
     * @return Response
     */
    public function postDelete($category)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $category->id;
            $category->delete();

            // Was the category deleted?
            $category = Category::find($id);
            if(empty($category))
            {
                // Redirect to the categories management page
                return Redirect::to('admin/categories')->with('success', Lang::get('admin/categories/messages.delete.success'));
            }
        }
        // There was a problem deleting the category
        return Redirect::to('admin/categories')->with('error', Lang::get('admin/categories/messages.delete.error'));
    }

}