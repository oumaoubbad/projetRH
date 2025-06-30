
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid"></div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary shadow-sm">
          <div class="card-header bg-primary text-white">
            <h3 class="card-title font-weight-bold">Ajouter congé</h3>
          </div>

          <form action="{{ route('conges.store') }}" method="POST" enctype="multipart/form-data" class="p-3">
            @csrf

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="date_debut"><strong>Date début</strong></label>
                <input
                  type="date"
                  id="date_debut"
                  name="date_debut"
                  class="form-control @error('date_debut') is-invalid @enderror"
                  value="{{ old('date_debut', date('Y-m-d')) }}"
                  min="2000-01-01" max="2100-12-31"
                  required
                >
                @error('date_debut')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="date_fin"><strong>Date fin</strong></label>
                <input
                  type="date"
                  id="date_fin"
                  name="date_fin"
                  class="form-control @error('date_fin') is-invalid @enderror"
                  value="{{ old('date_fin', date('Y-m-d')) }}"
                  min="2000-01-01" max="2100-12-31"
                  required
                >
                @error('date_fin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="raison">Raison</label>
              <input
                type="text"
                id="raison"
                name="raison"
                class="form-control @error('raison') is-invalid @enderror"
                placeholder="Entrez la raison du congé"
                value="{{ old('raison') }}"
                required
              >
              @error('raison')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea
                id="description"
                name="description"
                rows="4"
                class="form-control @error('description') is-invalid @enderror"
                placeholder="Détaillez la description du congé"
              >{{ old('description') }}</textarea>
              @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ route('conges.index') }}" class="btn btn-secondary">Retour</a>
              <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<!-- Si tu utilises un picker spécifique, remets ici ton script JS -->
@endsection
