@extends("layouts.master")

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
@endsection

@section('content')
@if(auth()->user()->role)
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center rounded-top">
            <h4 class="mb-0">
                <i class="fa fa-list me-2"></i>Liste des Utilisateurs
            </h4>
            <a class="btn btn-primary text-dark fw-bold" href="{{ route('user.create') }}">
                <i class="fa fa-user-plus me-1"></i> Ajouter un utilisateur
            </a>
        </div>

        <div class="card-body px-4 py-3">
            <div class="table-responsive">
                <table id="usersTable" class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom & Prénom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role)
                                    <span class="badge bg-primary">Admin</span>
                                @else
                                    <span class="badge bg-danger">User</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="d-inline">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-secondary btn-sm me-1">
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
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
            },
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            responsive: true
        });
    });

    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
    }
</script>
@endsection
