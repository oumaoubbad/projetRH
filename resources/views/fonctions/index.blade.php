@extends('layouts.master')

@section('content')
@if(auth()->user()->role)
<div class="container-fluid px-4 pt-4">
    <div class="card shadow rounded-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center rounded-top">
            <h4 class="mb-0">
                <i class="fa fa-list me-2"></i>Liste des Fonctions
            </h4>
        </div>

        <div class="card-body">

            {{-- Formulaire d'ajout --}}
            <form action="{{ route('fonctions.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Nom de la fonction" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-1"></i> Ajouter
                        </button>
                    </div>
                </div>
            </form>

            {{-- Table des fonctions --}}
            <div class="table-responsive" style="max-height: 500px;">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-dark sticky-top">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fonction</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fonctions as $key => $fonction)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $fonction->name }}</td>
                            <td class="text-center">
                                <form action="{{ route('fonctions.destroy', $fonction->id) }}" method="POST" class="d-inline">
                                    <a class="btn btn-outline-primary btn-sm me-1" href="{{ route('fonctions.edit', $fonction->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirmDelete();" type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endif
@endsection

@section('js')
<script>
function confirmDelete() {
    return confirm("Êtes-vous sûr de vouloir supprimer cette fonction ?");
}
</script>
@endsection
