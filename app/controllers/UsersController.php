<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the users
		$users = User::all();

		// load the view and pass the users
		return View::make('users.index')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
        // read more on validation at http://laravel.com/docs/validation
                $rules = array(
                        'name' => 'required',
                        'email' => 'required|email',
                        'telephone' => 'required'
                );
                $validator = Validator::make(Input::all(), $rules);

                // process the login
                if ($validator->fails()) {
                        return Redirect::to('users/create')
                                ->withErrors($validator)
                                ->withInput(Input::except('password'));
                } else {
                        // store
                        $user = new User;
                        $user->name = Input::get('name');
                        $user->email = Input::get('email');
                        $user->telephone = Input::get('telephone');
                        $user->save();

                        // redirect
                        Session::flash('message', 'Successfully created user!');
                        return Redirect::to('users');
                }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the user
                $user = User::find($id);

                // show the view and pass the user to it
                return View::make('users.show')
                        ->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			//'telephone' => 'required|numeric'
			'telephone' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('users/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = user::find($id);
			$user->name       = Input::get('name');
			$user->email      = Input::get('email');
			$user->telephone = Input::get('telephone');
			$user->save();

			// redirect
			Session::flash('message', 'Successfully updated user!');
			return Redirect::to('users');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
                // read more on validation at http://laravel.com/docs/validation
                $rules = array(
                        'name' => 'required',
                        'email' => 'required|email',
                        'telephone' => 'required'
                );
                $validator = Validator::make(Input::all(), $rules);

                // process the login
                if ($validator->fails()) {
                        return Redirect::to('users/' . $id . '/edit')
                                ->withErrors($validator)
                                ->withInput(Input::except('password'));
                } else {
                        // store
                        $user = user::find($id);
                        $user->name = Input::get('name');
                        $user->email = Input::get('email');
                        $user->telephone = Input::get('telephone');
                        $user->save();

                        // redirect
                        Session::flash('message', 'Successfully updated user!');
                        return Redirect::to('users');
                }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the user!');
        return Redirect::to('users');
	}

}