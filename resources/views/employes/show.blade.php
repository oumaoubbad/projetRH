@extends('layouts.master')

@section('content')
<div class="row my-6 ">
        <div class="col-md-10 mx-auto">
            <div class="card  border-info my-3">
                        <div class="col-md-10 mx-auto">
                               
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 ">
                        <h2>employes</h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-6 my-2 font-weight-bold ">
            
                         <a class="btn btn-info" href="{{ route('employes.index') }}"> retour</a>
                         <a class="btn btn-secondary" href="{{ route('employes.edit', $employe->id) }}"> modifier</i> </a>

        
                         </div>
                    </div>
            </div>
           
     

    <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-6">

                <strong>Nom:</strong>

                {{$employe->nom  }}

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group fs-6">

                <strong>Prenom:</strong>

                {{ $employe->prenom }}

            </div>

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

    <strong>Email:</strong>

    {{ $employe->email }}

</div>

</div>


       
        <div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

    <strong>Adresse:</strong>

    {{ $employe->adr }} 

</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

    <strong>telephone:</strong>

    {{ $employe->tel }}

</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

    <strong>Fonction:</strong>

    {{ $employe->fonction->fonc}}
</div>

</div>
<div class="col-xs-6 col-sm-6 col-md-6">

<div class="form-group fs-6">

    <strong>Numero de permis :</strong>

    {{ $employe->num_permis}}

</div>

</div>


</div>

    </div>

    </div>

</div>

  
</div>

    </div>
@endsection