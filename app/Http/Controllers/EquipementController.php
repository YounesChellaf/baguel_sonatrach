<?php

namespace App\Http\Controllers;

use App\Imports\EquipementsImport;
use App\Models\Equipement;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('equipement.index');
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
        Equipement::create([
            'type' => $request->input('type'),
            'marque' => $request->input('marque'),
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
        $equipement = Equipement::find($id);
        $equipement->type = $request->input('type');
        $equipement->marque = $request->input('marque');
        $equipement->save();
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
        Equipement::destroy($id);
        return redirect()->back();
    }

    public function import(Request $request){
        if($request->post()){
            if($request->file('EquipementsFileInput')){
                Excel::import(new EquipementsImport, $request->file('EquipementsFileInput'));
                return back();
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
