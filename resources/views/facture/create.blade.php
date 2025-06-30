@extends('layouts.master')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <!-- Optionnel : Ajouter un titre ou une navigation -->
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0"><i class="fas fa-plus-circle me-2"></i> Ajouter une facture</h3>
          </div>

          <form action="{{ route('factures.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <!-- Date -->
              <div class="form-group">
                <label for="date"><strong>Date :</strong></label>
                <input type="date" name="date" id="date"
                  class="form-control"
                  value="{{ old('date') ?? now()->format('Y-m-d') }}"
                  min="2000-01-01" max="2100-12-31">
              </div>

              <!-- Prix -->
              <div class="form-group">
                <label for="prix"><strong>Prix :</strong></label>
                <input type="number" name="prix" id="prix" class="form-control" placeholder="Prix en MAD" step="0.01" min="0" value="{{ old('prix') }}">
              </div>

              <!-- Objet -->
              <div class="form-group">
                <label for="objet"><strong>Objet :</strong></label>
                <input type="text" name="objet" id="objet" class="form-control" placeholder="Objet de la facture" value="{{ old('objet') }}">
                @error('objet')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Description -->
              <div class="form-group">
                <label for="description"><strong>Description :</strong></label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Détails supplémentaires...">{{ old('description') }}</textarea>
              </div>
            </div>

            <!-- Boutons -->
            <div class="card-footer d-flex justify-content-between">
              <a href="{{ route('factures.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
              </a>
              <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Enregistrer
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  // Tu peux activer des composants JS ici si besoin
</script>
@endsection
