<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('service.index', compact('services'));

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

    // // Pour insert des nouveaux services
    // public function ajouter(){

    //     $services = Service::all();

    //     return view('service.ajouter', compact('services'));

    // }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight = new Service;

        $flight->libelle_serv= $request->libelle_serv;

        $flight->save();

        return redirect()->route('service.index')->with('success', 'Le service '.$request->libelle_serv.' a été ajouter')->paginate(10);
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

    public function serviceNouveau(Request $request, $id)
    {
        $ids = Service::find($id);

        $libelle = $ids->libelle_serv;

        return view('service.nouveau-sevice',compact('id','libelle'));
    }

    public function update(Request $request)
    {   

       
        $id  = $request->id;
        $service = Service::find($id);

        $service->libelle_serv = $request->libelle_serv;

        $service->save();

        return redirect()->route('service.index')->with('success', 'Le service '.$request->libelle_serv.' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
