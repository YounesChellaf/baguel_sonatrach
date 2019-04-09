<?php

namespace App\Http\Controllers;

use App\Bloc;
use Illuminate\Http\Request;

class BlocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bloc.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $number = $request->input('number');
        $type = $request->input('type');
        $floor_number = $request->input('floor_number');

        Bloc::create([
            'name' =>$name,
            'number' =>$number,
            'type' =>$type,
            'floors_number' =>$floor_number,
        ]);

        return redirect()->back();
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
        //
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
        $name = $request->input('name');
        $number = $request->input('number');
        $type = $request->input('type');
        $floor_number = $request->input('floor_number');
        $active = $request->input('active');

        $bloc = Bloc::find($id);

        $bloc->name = $name;
        $bloc->number = $number;
        $bloc->type = $type;
        $bloc->floors_number = $floor_number;
        $bloc->active = $active;

        $bloc->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bloc::destroy($id);
        return redirect()->back();
    }
}