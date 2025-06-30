<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staine;


use App\Models\User;


class StaineController extends Controller
{
    //
    public function index()
    {
        //
        return View("staine.index")->with(['staines' => Staine::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("staine.create");


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
        Staine::create([
            'user_id' => auth()->user()->id,
              
            'titre'=> $request->titre,    
            'time_in'=> $request->time_in,    
            'time_out'=> $request->time_out,    
               

        ]);
      
     
        return redirect()->route('staines.index')
                        ->with('success','congé created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staine $staine)
    {
        //
        return view('staine.show',compact('staine'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staine $staine)
    {
  
        return view('staine.edit', compact('staine'));
       
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staine $staine)
    {
        //
        $input = $request->all();
          
        $staine->update($input);
    
        return redirect()->route('staines.index')
                        ->with('success','réservation mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staine $staine)
    {
        //
        $staine->delete();
     
        return redirect()->route('staines.index')
                        ->with('success','staine deleted successfully');
    }

    
}
