<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Demandeur;
use App\Models\StagiaireRefus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AffecterServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $services = Service::all();
        
        $stage    = Demandeur::find($id);
       
        return view('affecter.index',compact('services','stage'));
         
    }

    public function indexStagiaireRefuserAccpter($id){

        
        $services = Service::all();
        
        $stage    = StagiaireRefus::find($id);
       
        return view('affecter.index-stagiaire-refuse-accepter',compact('services','stage'));

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
        $stage = Demandeur::find($id);

        $stage->delete();
        return redirect()->route('demande.index');
    }
}
