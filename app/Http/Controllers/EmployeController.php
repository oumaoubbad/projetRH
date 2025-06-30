<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Fonction;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employes = Employee::latest()->paginate(5);
    
        return view('employes.index',compact('employes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("employes.create")
        -> with(["fonctions"=> Fonction::all()]);
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
        $this->validate($request, [
            "nom" =>"required",
            "prenom" =>"required",
            "email" =>"required",
            "adr" =>"required",
            "tel" =>"required",
            "CIN" =>"required",
            "fonction_id" =>"required",
            "num_permis" =>"required",
            
        ]);
        //store data
        $input = $request->all();
    
        Employee::create($input);
     
        return redirect()->route('employes.index')
                        ->with('success','employe créée avec succès..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employe)
    {
        //
        return view('employes.show',compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employe)
    {
        //
       
        $fonctions = Fonction::all();
        return view('employes.edit', compact('employe', 'fonctions'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employe)
    {
        //
        $request->validate([
            "nom" =>"required",
            "prenom" =>"required",
            "email" =>"required",
            "adr" =>"required",
            "tel" =>"required",
            "CIN" =>"required",
            "fonction_id" =>"required|numeric",
            "num_permis" =>"required",
            
        ]);
  
        $input = $request->all();
  
          
        $employe->update($input);
    
        return redirect()->route('employes.index')
                        ->with('success','employe mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employe)
    {
        //
        $employe->delete();

        return redirect()->route('employes.index')->with('message', 'employe supprimé avec succès');
    
    }
}
