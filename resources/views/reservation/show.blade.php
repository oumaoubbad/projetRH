@extends('layouts.master')

@section('content')
<div class="row my-6 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                               
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 ">
                        <h2>reservations</h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-6 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('reservations.index') }}"> retour</a>
                         <a class="btn btn-secondary" href="{{ route('reservations.edit', $reservation->id) }}"> modifier</i> </a>

        
                         </div>
                    </div>
            </div>
           
     

    <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-5">

                <strong>utilisateur:</strong>

                {{App\Models\User::findOrFail($reservation->user_id)->name}}

            </div>

        </div>

 
       
        <div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>Date debut:</strong>

    {{ $reservation->date_debut }} 

</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>Date fin:</strong>

    {{ $reservation->date_fin }}

</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>destination:</strong>

    {{ $reservation->direction }}
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>region :</strong>

    {{ $reservation->region}}

</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-5">

    <strong>description :</strong>

    {{ $reservation->description}}

</div>

</div>
<div class="col-md-4 mb-3">

         
</div>


</div>

    </div>

    </div>

</div>

  
</div>

    </div>
@endsection