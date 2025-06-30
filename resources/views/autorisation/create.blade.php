@extends('layouts.master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col text-center">
        <h4 class="m-0">Ajouter une Autorisation</h4>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i><strong>Formulaire d'autorisation</strong></h5>
          </div>

          <form action="{{ route('autorisations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="date_debut" class="form-label fw-bold">Date de début</label>
                  <input type="date" name="date_debut" id="date_debut" class="form-control"
                    value="{{ old('date_debut', '2022-07-06') }}" min="2000-01-01" max="2100-12-31" required>
                </div>

                <div class="col-md-6">
                  <label for="date_fin" class="form-label fw-bold">Date de fin</label>
                  <input type="date" name="date_fin" id="date_fin" class="form-control"
                    value="{{ old('date_fin', '2022-07-06') }}" min="2000-01-01" max="2100-12-31" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="raison" class="form-label fw-bold">Raison</label>
                <select name="raison" id="raison" class="form-select" required>
                  <option disabled selected>Choisissez une raison</option>
                  <option value="maternité">Maternité</option>
                  <option value="mariage">Mariage</option>
                  <option value="paternité">Paternité</option>
                  <option value="décès">Décès</option>
                  <option value="maladie">Maladie</option>
                  <option value="autre">Autre</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control"
                  placeholder="Ajouter des détails ici...">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="card-footer d-flex justify-content-end gap-2">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-check-circle"></i> Enregistrer
              </button>
              <a href="{{ route('autorisations.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
              </a>
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
  // Auto-limitation des dates max pour éviter les erreurs côté utilisateur
  document.addEventListener('DOMContentLoaded', function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date_debut').setAttribute('max', today);
    document.getElementById('date_fin').setAttribute('max', today);
  });
</script>
@endsection
