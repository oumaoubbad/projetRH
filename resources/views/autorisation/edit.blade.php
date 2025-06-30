@extends('layouts.master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col text-center">
        <h4 class="m-0">Modifier une Autorisation</h4>
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
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i><strong>Formulaire de modification</strong></h5>
          </div>

          <form action="{{ route('autorisations.update', $autorisation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="date_debut" class="form-label fw-bold">Date de début</label>
                  <input type="date" name="date_debut" id="date_debut" class="form-control"
                         value="{{ $autorisation->date_debut }}" required>
                </div>
                <div class="col-md-6">
                  <label for="date_fin" class="form-label fw-bold">Date de fin</label>
                  <input type="date" name="date_fin" id="date_fin" class="form-control"
                         value="{{ $autorisation->date_fin }}" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="raison" class="form-label fw-bold">Raison</label>
                <select name="raison" id="raison" class="form-select" required>
                  <option disabled>Choisissez une raison</option>
                  <option value="maternité" {{ $autorisation->raison === 'maternité' ? 'selected' : '' }}>Maternité</option>
                  <option value="mariage" {{ $autorisation->raison === 'mariage' ? 'selected' : '' }}>Mariage</option>
                  <option value="paternité" {{ $autorisation->raison === 'paternité' ? 'selected' : '' }}>Paternité</option>
                  <option value="décès" {{ $autorisation->raison === 'décès' ? 'selected' : '' }}>Décès</option>
                  <option value="maladie" {{ $autorisation->raison === 'maladie' ? 'selected' : '' }}>Maladie</option>
                  <option value="autre" {{ $autorisation->raison === 'autre' ? 'selected' : '' }}>Autre</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Ajouter des détails...">{{ $autorisation->description }}</textarea>
                @error('description')
                <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="card-footer d-flex justify-content-end gap-2">
              <button class="btn btn-success" type="submit">
                <i class="fas fa-check-circle me-1"></i> Mettre à jour
              </button>
              <a class="btn btn-secondary" href="{{ route('autorisations.index') }}">
                <i class="fas fa-arrow-left me-1"></i> Retour
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
  // Date logic or other JS if needed
</script>
@endsection
