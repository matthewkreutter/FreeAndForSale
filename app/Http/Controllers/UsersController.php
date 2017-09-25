<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;
use Hash;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('users', compact('users'));
    }
    public function show(User $user)
    {
    	return view('showuser', compact('user'));
    }
    public function settings()
    {
    	return view('settings');
    }
    public function changepassword(Request $request)
    {
    	$user = Auth::user();
    	$rules = [
			'new_password' => 'confirmed|min:6'
		];
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails())
		{
			Session::flash('status_message', 'New password and new password confirmation did not match.');
			return redirect('/settings');
		}
		if (Hash::check($request->old_password, $user->password))
		{ 
			$user->fill([
				'password' => Hash::make($request->new_password)
			])->save();

			//$request->session()->flash('success', 'Password changed!');
			Session::flash('status_message', 'Password changed!');
			return redirect('/settings');
		} 
		else 
		{
			Session::flash('status_message', 'Password did not match with your current password.');
			return redirect('/settings');
		}
    }
}
