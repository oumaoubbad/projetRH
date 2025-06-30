@extends('layouts.master')     
@section('content')

    <div class="row my-5 ">
    <div class="col-md-6 mx-auto">
        <div class="card card-secondary">
                    <div class="card-header ">
                        <h4 class="text-center ">  Modifier employee </h4>
                 
</div>
            <div class="card-body ">
                        <div class="col-md-9 mx-auto">
                                


                                @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('employes.update',$employe->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        


                              <div class="form-group">
                              <strong>Nom:</strong>
                <input type="text"  value="{{ $employe->nom }}" name="nom" class="form-control" placeholder="nom">
                              </div>

<div class="form-group">
                              <strong>prénom:</strong>
                <input type="text"  value="{{ $employe->prenom }}" name="prenom" class="form-control" placeholder="prénom">
                              </div>


<div class="form-group">
<strong>Fonction:</strong>

<select name="fonction_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($fonctions as $fonction)
                                            <option value="{{ $fonction->id }}"
                                                {{ $fonction->id == $employe->fonction_id ? 'selected' : '' }}>
                                                {{ $fonction->name }}</option>
                                        @endforeach
                </select>
</div>


                                <div class="form-group">
                                <strong>adresse:</strong>
                <input type="text"  value="{{ $employe->adr }}" name="adr" class="form-control" placeholder="adresse">
                              </div>
                                <div class="form-group">
                                <strong>Email:</strong>
                <input type="text"  value="{{ $employe->email }}" name="email" class="form-control" placeholder="adresse">
                              </div>
                  

<div class="form-group">
<strong>CIN:</strong>
                <input type="text"  value="{{ $employe->CIN }}" name="CIN" class="form-control" placeholder="CIN">
                              </div>


<div class="form-group">
<strong>Tel:</strong>
                <input type="text"   value="{{ $employe->tel }}" name="tel" class="form-control" placeholder="tel">
</div>
       
<div class="form-group">
<strong>Numéro de permis:</strong>
<input type="text" name="num_permis"  value="{{ $employe->num_permis }}" class="form-control" placeholder="prénom">
</div>





          
                              
                              <div class="form-group">
                                  <button class="btn btn-primary">
                                      Modifier
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('employes.index') }}"> Annuler</a>
          
</div>

                              </form>
                            </div>
</div>     
                    
            </div>
        </div>
    
</div>
@endsection