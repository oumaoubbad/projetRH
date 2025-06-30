<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;


use App\Models\User;

class FactureController extends Controller
{
    public function index()
    {
        //
        return View("facture.index")->with(['factures' => Facture::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("facture.create");


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $this->validate($request, [
        //     "user_id" =>"required",
        //     "voiture_id" =>"required",
        //     "date_debut" =>"image|mimes:png,jpg,jpeg|max:2048",
        //     "date_fin" =>"required|boolean",
        //     "direction" =>"required|numeric",
        //     "region" =>"required|numeric",
        //     "description" =>"required",
        // ]);
        Facture::create([
            'user_id' => auth()->user()->id,
              
            'date'=> $request->date,    
            'prix'=> $request->prix,    
            'objet'=> $request->objet,    
            'description'=> $request->description,    
               
               

        ]);
      
     
        return redirect()->route('factures.index')
                        ->with('success','facture created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        //
        return view('facture.show',compact('facture'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
  
        return view('facture.edit', compact('facture'));
       
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        //
        $input = $request->all();
          
        $facture->update($input);
    
        return redirect()->route('factures.index')
                        ->with('success','réservation mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
        $facture->delete();
     
        return redirect()->route('factures.index')
                        ->with('success','facture deleted successfully');
    }
}
