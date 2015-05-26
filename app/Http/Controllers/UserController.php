<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\User;
use Input;
//use Request;
use Illuminate\Support\Facades\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return view('users.index')->with('users',$users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return view('users.show')->with('user',$user);
	}

	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function getprofile()
	{
		// //$user = User::find($id);
		// if (Request::ajax)
		// 	{
		// 		$data = Input::all();
		// 		print_r($data); die();
		// 	}
		if (Request::ajax())
		{
		$data = Input::all();//Input::get('id')
		$user = User::find($data['id']);
		$json = json_encode($user);
		print_r($json); die();
		}
	}

}
