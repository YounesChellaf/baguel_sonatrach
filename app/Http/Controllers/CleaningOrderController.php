<?php

namespace App\Http\Controllers;

use App\Models\CleaningOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CleaningOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cleaning_order.index');
    }

    public function Details($id){
        $order = CleaningOrder::find($id);
        return view('cleaning_order.details_view')->with('order',$order);
    }


    public  function  affectEmployee(Request $request,$id){
        $order = CleaningOrder::find($id);

        $nb = $request->nb;
        for ($i=0;$i<$nb;$i++){
            $order->employee()->attach($request->input('employee_id')[$i]);
        }
        $order->status = 'in progress';
        $order->save();
        return redirect()->route('cleaning_order.index');
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
            CleaningOrder::new($request);
            return redirect()->route('cleaning_order.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CleaningOrder::destroy($id);
        return redirect()->route('cleaning_order.index');
    }

    public function aprouve($id){
        $order = CleaningOrder::find($id);
        $order->status = 'approved';
        $order->save();
        return redirect()->back();

    }
    public  function  reject($id){
        $order = CleaningOrder::find($id);
        $order->status = 'rejected';
        $order->save();
        return redirect()->back();
    }

    public function done($id){
        $order = CleaningOrder::find($id);
        $order->done_date = Carbon::now();
        $order->status = 'done';
        $order->save();
        return redirect()->route('cleaning_order.index');
    }
}
