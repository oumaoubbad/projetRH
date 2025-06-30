<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;


use App\Models\User;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return View("reservation.index")->with(['reservations' => Reservation::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("reservation.create");


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
        Reservation::create([
            'user_id' => auth()->user()->id,
              
            'date_debut'=> $request->date_debut,    
            'date_fin'=> $request->date_fin,    
            'direction'=> $request->direction,    
            'region'=> $request->region,    
            'status'=> $request->status, 
            'description'=> $request->description,    

        ]);
        // $voiture->update([
        //     'status' => 1
        // ]);
     
        return redirect()->route('reservations.index')
                        ->with('success','marque created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
        return view('reservation.show',compact('reservation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
  
        return view('reservation.edit', compact('reservation'));
       
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
        $input = $request->all();
          
        $reservation->update($input);
    
        return redirect()->route('reservations.index')
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

      
        $reservation = Reservation::find($id);

       if($reservation){
           $reservation->status = $request -> approve;
           $reservation->save();
           return redirect()->back();
       }
    }
}
