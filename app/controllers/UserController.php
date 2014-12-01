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

	public function addGroup()
	{
		$user= User::find(1);
		$user->group()->attach(1);
		return "Dodaje grupe";
	}

	public function form($action)
	{
		return View::make($action.'_form');
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
		//
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