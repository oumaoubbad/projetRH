@extends("layouts.master")

@section('content')
<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-gradient-secondary d-flex justify-content-between align-items-center">
                <h3 class="card-title text-white mb-0">
                    <i class="fa fa-file-invoice-dollar fa-2x me-2"></i> <strong>Liste des Factures</strong>
                </h3>
                @if(!auth()->user()->role)
                    <a class="btn btn-primary" href="{{ route('facture.create') }}">
                        <i class="fa fa-plus me-1"></i> Ajouter facture
                    </a>
                @endif
            </div>

            <div class="card-body table-responsive p-0">
                <table id="factureTable" class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            @if(auth()->user()->role)
                                <th>Utilisateur</th>
                            @endif
                            <th>Date</th>
                            <th>Prix</th>
                            <th>Objet</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(auth()->user()->role)
                            @foreach ($factures as $key => $facture)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ App\Models\User::findOrFail($facture->user_id)->name }}</td>
                                    <td>{{ $facture->date }}</td>
                                    <td>{{ $facture->prix }} MAD</td>
                                    <td>{{ $facture->objet }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info me-1" href="{{ route('factures.show',$facture->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach (auth()->user()->factures as $key => $facture)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $facture->date }}</td>
                                    <td>{{ $facture->prix }} MAD</td>
                                    <td>{{ $facture->objet }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-warning me-1" href="{{ route('factures.edit', $facture->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('factures.destroy', $facture->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirmDelete();" type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {
        $('#factureTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.12.0/i18n/fr_fr.json"
            }
        });
    });

    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cette facture ?");
    }
</script>
@endsection
