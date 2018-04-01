<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Requests;

class UserController extends Controller {

	public function register(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required'
		]);

		$user = new User([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password'));
		]);

		$user->save();

		return response()->json([
			'message' => 'Success'
		], 201);
	}

}

