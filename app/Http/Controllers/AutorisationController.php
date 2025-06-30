<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorisation;


use App\Models\User;


class AutorisationController extends Controller
{
    //
    public function index()
    {
        //
        return View("autorisation.index")->with(['autorisations' => Autorisation::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("autorisation.create");


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
        Autorisation::create([
            'user_id' => auth()->user()->id,
              
            'date_debut'=> $request->date_debut,    
            'date_fin'=> $request->date_fin,    
            'raison'=> $request->raison,    
            'status'=> $request->status,    
            'description'=> $request->description,    

        ]);
      
     
        return redirect()->route('autorisations.index')
                        ->with('success','congé created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Autorisation $autorisation)
    {
        //
        return view('autorisation.show',compact('autorisation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Autorisation $autorisation)
    {
  
        return view('autorisation.edit', compact('autorisation'));
       
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autorisation $autorisation)
    {
        //
        $input = $request->all();
          
        $autorisation->update($input);
    
        return redirect()->route('autorisations.index')
                        ->with('success','réservation mise à jour avec succès');
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

    public function approve(Request $request,$id)
    {

      
        $autorisation = Autorisation::find($id);

       if($autorisation){
           $autorisation->status = $request -> approve;
           $autorisation->save();
           return redirect()->back();
       }
    }
}
