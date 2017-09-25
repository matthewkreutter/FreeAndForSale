<?php

namespace App\Http\Controllers;

use DB;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class ItemsController extends Controller
{
    public function index()
    {
    	$items = Item::all();
    	return view('items', compact('items'));
    }
    public function show(Item $item)
    {
    	return view('showitem', compact('item'));
    }
    public function edit(Item $item)
    {
    	return view('edititem', compact('item'));
    }
    public function update(Request $request, Item $item)
    {
		//return $request;
	    //return $request->file('image');
	    
		$file = $request->file('image');
		$destinationPath = 'img/'; // upload path
		$extension = $file->getClientOriginalExtension(); 
		$fileName = rand(11111,99999).'.'.$extension; // renaming image
		$file->move($destinationPath, $fileName); 
		
		$item->update([
			'price' => $request->price,
			'name' => $request->name,
			'category' => $request->category,
			'description' => $request->description,
			'image' => $fileName
		]);
    	return redirect('/items/'.$item->id);
    }
    public function add()
    {
    	return view('additem');
    }
    public function store(Request $request)
    {
    	if (Auth::check())
		{
			//return strval($request->category);
			//return $request;
		    //return $request->file('image');
			$file = $request->file('image');
			$destinationPath = 'img/'; // upload path
			$extension = $file->getClientOriginalExtension(); 
			$fileName = rand(11111,99999).'.'.$extension; // renaming image
			$file->move($destinationPath, $fileName); 
			
			$user_id = Auth::user()->id;
			$currentuser = User::find($user_id);
			$currentuser->items()->create([
				'user_id' => $user_id,
				'price' => $request->price,
				'name' => $request->name,
				'category' => strval($request->category),
				'description' => $request->description,
				'image' => $fileName
			]);
		}
		return redirect('/items');
    }
    public function remove(Item $item)
    {
    	return view('deleteitem', compact('item'));
    }
    public function delete(Item $item)
    {
    	$item->delete();
    	return redirect('/items');
    }
}
