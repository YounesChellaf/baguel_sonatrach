<?php

namespace App\Http\Controllers;

use App\Models\VisitorSupport;
use Illuminate\Http\Request;

class VisitorSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function detailsView($id){
        $support = VisitorSupport::find($id);
        return view('supported.visitor_support_details')->with('support',$support);
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
            $visitor_support = VisitorSupport::new($request);
            return redirect()->route('admin.support.show', 'visitor');
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
        //
    }

    public function affect(Request $request,$id){
        $visitor_support =VisitorSupport::find($id);
        $visitor_support->employee_id = $request->employee_id;
        $visitor_support->save();
        return redirect()->route('admin.visitor.support.details',$visitor_support->id);
    }

    public function aprouve($id){
        $support = VisitorSupport::find($id);
        $support->status = 'approved';
        $support->save();
        return redirect()->back();

    }
    public  function  reject($id){
        $support = VisitorSupport::find($id);
        $support->status = 'rejected';
        $support->save();
        return redirect()->back();
    }
}
