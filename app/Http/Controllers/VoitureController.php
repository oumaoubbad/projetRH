<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Tcarburant;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      

            return view('voitures.index')->with([
                'voitures'=> Voiture::all(),
                'voituresStatus'=> Voiture::whereStatus(1)->get(),
                'voituresEtat'=> Voiture::whereEtat(1)->get()
            ]);
    }

    public function changeStatus($id){
        $getStatus=Voiture::select('status')->where('id',$id)->first();
        if($getStatus->status==1){
            $status=0;
        }else{
            $status=1;
        }
        Voiture::where('id',$id)->update(['status'=>$status]);
        return redirect()->back();
    }

    public function changeEtat($id){
        $getEtat=Voiture::select('etat')->where('id',$id)->first();
        if($getEtat->etat==1){
            $etat=0;
        }else{
            $etat=1;
        }
        Voiture::where('id',$id)->update(['etat'=>$etat]);
        return redirect()->back();
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("voitures.create")
        -> with(["marques"=> Marque::all()])
        -> with(["modeles"=> Modele::all()])
        -> with(["tcarburants"=> Tcarburant::all()]);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            "matricule" =>"required",
            "ncg" =>"required",
            "kilo" =>"required",
            "image" =>"image|mimes:png,jpg,jpeg|max:2048",
            "status" =>"required|boolean",
            "etat" =>"required|boolean",
            "marque_id" =>"required|numeric",
            "modele_id" =>"required|numeric",
            "tcarburant_id" =>"required",
        ]);
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Voiture::create($input);
      return redirect()->route('voitures.index')
                        ->with('success','voiture créée avec succès.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function show(Voiture $voiture)
    {
        //
        
        return view('voitures.show',compact('voiture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function edit(Voiture $voiture)
    {
        //
         $marques = Marque::all();
         $modeles = Modele::all();
         $tcarburants = Tcarburant::all();
        return view('voitures.edit', compact('voiture', 'marques', 'tcarburants' , 'modeles' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voiture $voiture)
    {
        $request->validate([
            "matricule" =>"required",
            "ncg" =>"required",
            "image" =>"image|mimes:png,jpg,jpeg|max:2048",
            "status" =>"required|boolean",
            "etat" =>"required|boolean",
            "marque_id" =>"required|numeric",
            "modele_id" =>"required|numeric",
            "tcarburant_id" =>"required",    
        ]);
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $voiture->update($input);
    
        return redirect()->route('voitures.index')
                        ->with('success','voiture mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voiture $voiture)
    {
        //
        $voiture->delete();

        return redirect()->route('voitures.index')->with('message', 'voiture Deleted Successfully');
    }
   
}
