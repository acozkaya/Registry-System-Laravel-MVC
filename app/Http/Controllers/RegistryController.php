<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registries=\App\Registry::all();
        return view('index',compact('registries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $registry= new \App\Registry;
        $registry->name=$request->get('name');
        $registry->email=$request->get('email');
        $registry->number=$request->get('number');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $registry->date = strtotime($format);
        $registry->office=$request->get('office');
        $registry->filename=$name;
        $registry->save();

        return redirect('registries')->with('success', 'Information has been added');

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
       $registry = \App\Registry::find($id);
        return view('edit',compact('registry','id'));
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
       $registry= \App\Registry::find($id);
        $registry->name=$request->get('name');
        $registry->email=$request->get('email');
        $registry->number=$request->get('number');
        $registry->office=$request->get('office');
        $registry->save();
        return redirect('registries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registry = \App\Registry::find($id);
        $registry->delete();
        return redirect('registries')->with('success','Information has been  deleted');

    }
}
