@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4 class="mb-0">Ajouter un employé</h4>
                </div>

                <div class="card-body px-5 py-4">

                    {{-- Affichage des erreurs --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h6 class="fw-bold">Veuillez corriger les erreurs suivantes :</h6>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulaire --}}
                    <form action="{{ route('employes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nom</label>
                                <input type="text" name="nom" class="form-control" placeholder="Nom">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Prénom</label>
                                <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Fonction</label>
                                <select name="fonction_id" class="form-select">
                                    <option selected disabled>Choisissez une fonction</option>
                                    @foreach ($fonctions as $fonction)
                                        <option value="{{ $fonction->id }}">{{ $fonction->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Adresse</label>
                                <input type="text" name="adr" class="form-control" placeholder="Adresse">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">CIN</label>
                                <input type="text" name="CIN" class="form-control" placeholder="CIN">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Téléphone</label>
                                <input type="text" name="tel" class="form-control" placeholder="Téléphone">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Numéro de permis</label>
                                <input type="text" name="num_permis" class="form-control" placeholder="Numéro de permis">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('employes.index') }}" class="btn btn-outline-secondary me-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
