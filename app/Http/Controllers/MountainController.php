<?php

namespace App\Http\Controllers;

use App\Models\Mountain;
use Illuminate\Http\Request;

class MountainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mountains=Mountain::all();
        return view('mountains.index',compact('mountains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mountains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mountain=new Mountain();

        $mountain->name=$request->input('name');
        $mountain->description=$request->input('description');

        $mountain->save();

        return redirect()->route('mountains.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mountain=Mountain::find($id);

        return view('mountains.show',compact('mountain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mountain=Mountain::find($id);

        return view('mountains.edit',compact('mountain'));
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
        $mountain=Mountain::find($id);

        $mountain->name=$request->input('name');
        $mountain->description=$request->input('description');

        $mountain->save();

        return redirect()->route('mountains.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mountain=Mountain::find($id);

        $mountain->delete();

        return redirect()->route('mountains.index');
    }
}
