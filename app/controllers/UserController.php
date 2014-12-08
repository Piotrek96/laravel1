<?php

class UserController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::with(['details', 'group'])->get();
		// dd($users->toArray());
		return View::make('index')->with('users',$users);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	private function vaildateUser()
	{
		$rules=['username'=>[
					'required',
					'unique:users,username',
					'Min:10',
					'Max:30'],
				'email'=>[
				'email']
					];
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails())
		{
			return [
        	'success' => false,
        	'errors' => $validator->getMessageBag()->toArray()
		    ];

		}
		return ['success' =>true];
	}
	public function avaibility()
	{	
		$vaildate=$this->vaildateUser(Input::all());
		if(!$vaildate['success'])
		{
   			 return Response::json($vaildate); 
		}
		return Response::json($vaildate);
	}

	public function store()
	{
		$vaildate=$this->vaildateUser(Input::all());
		if($vaildate['success'])
		{	
			$user = new User;
			$user->username= Input::get('username');
			$user->password= Hash::make(Input::get('password'));
			$user->save();
			$userdetails = new User_details;
			$userdetails->email=Input::get('email');
			$user->details()->save($userdetails);
			return Response::json(['Konto zostalo założone']); 
		}
		return Response::json($vaildate);
	}

	public function addGroup($id)
	{
		$user= User::find($id);
		$user->group()->detach();
		$user->group()->attach(Input::get('groups'));
		return "próbujemy kapitanie";
	}

	public function groupForm($id)
	{
		$group =  Group::with('user')->get();
		return View::make('add_group')->with(['groups' => $group,'id'=>$id]);
	}

	/**
	 * returns form, useful for ajax
	 * @param  string $action
	 * @return view
	 */
	public function form($action){
		return View::make($action.'_form');
	}

	/**
	 * login background
	 * @return bloean
	 */
	public function login()
	{
		if (Auth::attempt(array('username' => Input::get('username'), 'password' =>Input::get('password')), true))
		{
			return Redirect::to('');
		}
		return "bład";
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//$2y$10$/7RY0SxZaWlykUi1e.N42.sO1rXcspLM8dQw.7TqJHnPAhwVwH8tq
		//$2y$10$EUy/o4STu.05B8FeuIqr7O.jLSO/0owHyF32BTu5x/OvkrVXuyynG
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}