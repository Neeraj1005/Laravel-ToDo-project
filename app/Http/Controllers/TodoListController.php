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

	public function update(Request $request)
	{
		$item = Item::find($request->id);
		$item->item = $request->editvalue;
		$item->save();
		return $request->all();
	}	
	public function search(Request $request)
	{
		$term = $request->term;//always catch with a name term in search name not relate (name=searchBox)
		$items = Item::where('item','LIKE','%'.$term.'%')->get();
		if(count($items) == 0) {
			$searchResults[] = "Not Found Item";
		}else{
			foreach ($items as $key => $value) {
				$searchResults[] = $value->item;
			}
		}
		return $searchResults;
	}
}
