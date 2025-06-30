<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conge;


use App\Models\User;


class CongeController extends Controller
{
    //
    public function index()
    {
        //
        return View("conge.index")->with(['conges' => Conge::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("conge.create");


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
        Conge::create([
            'user_id' => auth()->user()->id,
              
            'date_debut'=> $request->date_debut,    
            'date_fin'=> $request->date_fin,    
            'raison'=> $request->raison,    
            'status'=> $request->status,    
            'description'=> $request->description,    

        ]);
      
     
        return redirect()->route('conges.index')
                        ->with('success','congé created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Conge $conge)
    {
        //
        return view('conge.show',compact('conge'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Conge $conge)
    {
  
        return view('conge.edit', compact('conge'));
       
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conge $conge)
    {
        //
        $input = $request->all();
          
        $conge->update($input);
    
        return redirect()->route('conges.index')
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

      
        $conge = Conge::find($id);

       if($conge){
           $conge->status = $request -> approve;
           $conge->save();
           return redirect()->back();
       }
    }
}
