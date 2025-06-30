@extends('layouts.master')

@section('content')
<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-gradient-secondary d-flex justify-content-between align-items-center">
                <h3 class="card-title text-white mb-0">
                    <i class="fa fa-tasks fa-2x me-2"></i> <strong>Liste des Tâches</strong>
                </h3>
                <a class="btn btn-primary" href="{{ route('staine.create') }}">
                    <i class="fa fa-plus-circle me-1"></i> Ajouter Tâche
                </a>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Temps début</th>
                            <th>Temps fin</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (auth()->user()->staines as $key => $staine)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $staine->titre }}</td>
                                <td>{{ \Carbon\Carbon::parse($staine->time_in)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($staine->time_out)->format('H:i') }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning me-1" href="{{ route('staines.edit', $staine->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('staines.destroy', $staine->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirmDelete();" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Aucune tâche enregistrée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?");
    }
</script>
@endsection
