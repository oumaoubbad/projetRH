<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $fonctions = Fonction::all();
        if ($request->has('search')) {
            $fonctions = Fonction::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('fonctions.index', compact('fonctions'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fonctions.create');
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
        $request->validate([
            'name' => 'required',
        ]);
  
        $input = $request->all();
    
        Fonction::create($input);
     
        return redirect()->route('fonctions.index')
                        ->with('success','fonction créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function show(Fonction $fonction)
    {
        //
        return view('fonctions.show',compact('fonction'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function edit(Fonction $fonction)
    {
        //
        return view('fonctions.edit',compact('fonction'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonction $fonction)
    {
        //
        $request->validate([
            'name' => 'required',
            
        ]);
  
        $input = $request->all();
          
        $fonction->update($input);
    
        return redirect()->route('fonctions.index')
                        ->with('success','fonction mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fonction $fonction)
    {
        //
        $fonction->delete();
     
        return redirect()->route('fonctions.index')
                        ->with('success','fonction deleted successfully');
    }
}
