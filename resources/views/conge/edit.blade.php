@extends('layouts.master')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col">
        <h4 class="m-0 text-center">Modifier un Congé</h4>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> <strong>Modifier les informations du congé</strong></h5>
          </div>
          <form action="{{ route('conges.update', $conge->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="date_debut" class="form-label fw-bold">Date de début</label>
                  <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ $conge->date_debut }}" min="2000-01-01" max="2100-12-31" required>
                </div>
                <div class="col-md-6">
                  <label for="date_fin" class="form-label fw-bold">Date de fin</label>
                  <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ $conge->date_fin }}" min="2000-01-01" max="2100-12-31" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="raison" class="form-label fw-bold">Raison</label>
                <input type="text" name="raison" id="raison" class="form-control" value="{{ $conge->raison }}" required>
                @error('raison')
                  <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Ajouter des détails...">{{ $conge->description }}</textarea>
                @error('description')
                  <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="card-footer text-end">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Modifier
              </button>
              <a href="{{ route('conges.index') }}" class="btn btn-secondary">
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
  $(document).ready(function () {
    $('#date_debut, #date_fin').attr('max', new Date().toISOString().split("T")[0]);
  });
</script>
@endsection
