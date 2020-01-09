<?php

namespace App\Http\Controllers;

use App\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Avatar::all();
        return view('avatar.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Avatar::find($id);
        // return view('avatar.create',compact('data'));
        return view('avatar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'logo'=>'required',
        ]);


        $data = new Avatar();

        // if ($request->hasFile('logo'))
        // {
        //     $imageName = $request->logo->store('public');
        // }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/clogo/', $filename);
            $data->logo = $filename;
        } 
        // else {
        //     return $request;
        //     $data->logo = '';
        // }
        

        $data->name = $request->name;
        // $data->logo = $imageName;
        $data->save();
        return redirect('avatars')->with('successfully created or uploaded image');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Avatar::findOrFail($id);
        return view('avatar.edit',compact('data'));
        // dd($id)

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            // 'logo'=>'required',
        ]);
        $data = Avatar::find($id);
        // if ($request->hasFile('logo'))
        // {
        //     $imageName = $request->logo->store('public');
        // }
        // $imageName = $request->file('logo')->store('public/upload');


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/clogo/', $filename);
            $data->logo = $filename;
        } 
        // else {
        //     // return $request;
        //     $data->logo = '';
        // }


        $data->name = $request->name;
        // $data->logo = $imageName;
        $data->save();
        return redirect('/avatars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
