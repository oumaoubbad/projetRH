@extends('layouts.master')

@section('content')
<div class="row my-5">
    <div class="col-md-6 mx-auto">
        <div class="card  shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Ajouter Tâche</h4>
            </div>
            <div class="card-body px-4">
                <div class="col-md-10 mx-auto">

                    {{-- Affichage des erreurs --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Il y a eu des problèmes avec votre saisie.<br><br>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('staines.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="form-group mb-4">
                            <label for="titre" class="font-weight-bold">Nom :</label>
                            <input type="text" id="titre" name="titre" class="form-control" placeholder="Titre" value="{{ old('titre') }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="time_in" class="font-weight-bold">Temps début :</label>
                            <input type="time" id="time_in" name="time_in" class="form-control" value="{{ old('time_in') }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="time_out" class="font-weight-bold">Temps fin :</label>
                            <input type="time" id="time_out" name="time_out" class="form-control" value="{{ old('time_out') }}" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="btn btn-primary px-4">Ajouter</button>
                            <a href="{{ route('staines.index') }}" class="btn btn-secondary px-4">Annuler</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
