<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
	public function index()
	{
		$items = Item::all();
		return view('list',compact('items'));
	}

	public function create(request $request)
	{
		$item = new Item;
		$item->item = $request->text;     
		$item->save();
		return 'DOne';
	}

	public function delete(Request $request)
	{
		// return Item::where('id',$request->id)->delete();
// OR
		Item::where('id',$request->id)->delete();
		return $request->all();
	}
}
