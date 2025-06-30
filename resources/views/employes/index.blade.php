@extends('layouts.master')

@section('content')
@if(auth()->user()->role)
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center rounded-top px-4 py-3">
            <h4 class="mb-0">
                <i class="fa fa-list me-2"></i>Liste des Employés
            </h4>
            <a class="btn btn-primary text-dark fw-bold" href="{{ route('employes.create') }}">
                <i class="fa fa-user-plus me-1"></i> Ajouter un employé
            </a>
        </div>

        <div class="card-body px-4 py-3">
            <div class="table-responsive" style="max-height: 500px;">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark sticky-top">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>CIN</th>
                            <th>Permis</th>
                            <th>Fonction</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $key => $employe)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $employe->nom }}</td>
                            <td>{{ $employe->prenom }}</td>
                            <td>{{ $employe->email }}</td>
                            <td>{{ $employe->adr }}</td>
                            <td>{{ $employe->tel }}</td>
                            <td>{{ $employe->CIN }}</td>
                            <td>{{ $employe->num_permis }}</td>
                            <td>{{ $employe->fonction->name }}</td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('employes.destroy', $employe->id) }}" class="d-inline">
                                    <a href="{{ route('employes.show', $employe->id) }}" class="btn btn-outline-primary btn-sm me-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-outline-secondary btn-sm me-1">
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
    return confirm("Êtes-vous sûr de vouloir supprimer cet employé ?");
}
</script>
@endsection
