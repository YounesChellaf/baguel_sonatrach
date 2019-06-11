<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OfficesImport;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('office.index');
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
        $number = $request->input('number');
        $bloc_id = $request->input('bloc_id');

        Office::create([
            'number' =>$number,
            'bloc_id' =>$bloc_id,
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
        $number = $request->input('number');
        $bloc_id = $request->input('bloc_id');
        $active = $request->input('active');

        $office = Office::find($id);

        $office->number = $number;
        $office->bloc_id = $bloc_id;
        $office->active = $active;

        $office->save();

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
        Office::destroy($id);
        return redirect()->back();
    }
    public function import(Request $request){
        if($request->post()){
            if($request->file('OfficesFileInput')){
                Excel::import(new OfficesImport, $request->file('OfficesFileInput'));
                return back();
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function affectEmployee(Request $request, $id){
        $office = Office::find($id);
        $office->employee_id = $request->employee_id;
        $office->reserved = true;
        $office->save();
        return redirect()->route('office.index');
    }
}
