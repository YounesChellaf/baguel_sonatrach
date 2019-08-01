<?php

namespace App\Http\Controllers;

use App\Imports\BlocsImport;
use App\Models\Bloc;
use Maatwebsite\Excel\Facades\Excel;
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
        if ($request->post()){
            $bloc = Bloc::new($request);
            return redirect()->back();
        }
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
        $name = $request->name;
        $number = $request->number;
        $type = $request->type;
        $active = $request->active;
        $classe = $request->classe;

        $bloc = Bloc::find($id);

        $bloc->name = $name;
        $bloc->number = $number;
        $bloc->type = $type;
        $bloc->active = $active;
        $bloc->classe = $classe;

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

    public function import(Request $request){
        if($request->post()){
            if($request->file('BlocsFileInput')){
                Excel::import(new BlocsImport, $request->file('BlocsFileInput'));
                return back();
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
