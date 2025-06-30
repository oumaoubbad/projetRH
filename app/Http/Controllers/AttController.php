<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Att;


use App\Models\User;

class AttController extends Controller
{
    public function index()
    {
        //
        return View("att.index")->with(['atts' => Att::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("att.create");


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
        Att::create([
            'user_id' => auth()->user()->id,    
            'type'=> $request->type,    
            'status'=> $request->status,    
            
        ]);
      
     
        return redirect()->route('atts.index')
                        ->with('success','congé created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Att $att)
    {
        //
        return view('att.show',compact('att'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Att $att)
    {
  
        return view('att.edit', compact('att'));
       
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Att $att)
    {
        //
        $input = $request->all();
          
        $att->update($input);
    
        return redirect()->route('atts.index')
                        ->with('success','réservation mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Att $att)
    {
        //
        $att->delete();
     
        return redirect()->route('atts.index')
                        ->with('success','att deleted successfully');
    }

    public function approve(Request $request,$id)
    {

      
        $att = Att::find($id);

       if($att){
           $att->status = $request -> approve;
           $att->save();
           return redirect()->back();
       }
    }
    
}
