@extends("layouts.master")

@section('content')
@if(auth()->user()->role)
<div class="row p-4 pt-5">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-header bg-secondary d-flex align-items-center justify-content-between">
        <h3 class="card-title mb-0">
          <i class="fa fa-list fa-2x me-2"></i>
          <strong>Liste des Congés</strong>
        </h3>
        {{-- Espace pour d'autres boutons ou filtres --}}
      </div>
      <div class="card-body table-responsive" style="max-height: 500px; overflow-y: auto;">
        <table id="myTable" class="table table-striped table-hover table-bordered align-middle">
          <thead class="table-dark sticky-top">
            <tr>
              <th>Id</th>
              <th>Utilisateur</th>
              <th>Date début</th>
              <th>Date fin</th>
              <th>Raison</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($conges as $key => $conge)
            <tr>
              <th scope="row">{{ $key + 1 }}</th>
              <td>{{ App\Models\User::findOrFail($conge->user_id)->name }}</td>
              <td>{{ $conge->date_debut }}</td>
              <td>{{ $conge->date_fin }}</td>
              <td>{{ $conge->raison }}</td>
              <td>
                @if(Auth::user()->role)
                  @if($conge->status == 0)
                    <form action="{{ route('conge.approve', $conge->id) }}" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" name="approve" value="1" class="btn btn-sm btn-success me-1" onclick="return confirm('Êtes-vous sûr de vouloir accepter la demande ?')">
                        <i class="fa fa-check"></i> Accepter
                      </button>
                    </form>
                    <form action="{{ route('conge.approve', $conge->id) }}" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" name="approve" value="2" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir refuser la demande ?')">
                        <i class="fa fa-times"></i> Refuser
                      </button>
                    </form>
                  @elseif($conge->status == 1)
                    <span class="badge bg-success">Accepté</span>
                    <form action="{{ route('conge.approve', $conge->id) }}" method="POST" class="d-inline ms-2">
                      @csrf
                      <button type="submit" name="approve" value="2" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir refuser la demande ?')">
                        Refuser
                      </button>
                    </form>
                  @else
                    <span class="badge bg-danger">Refusé</span>
                    <form action="{{ route('conge.approve', $conge->id) }}" method="POST" class="d-inline ms-2">
                      @csrf
                      <button type="submit" name="approve" value="1" class="btn btn-sm btn-outline-success" onclick="return confirm('Êtes-vous sûr de vouloir accepter la demande ?')">
                        Accepter
                      </button>
                    </form>
                  @endif
                @else
                  @if($conge->status == 0)
                    <span class="badge bg-warning text-dark">En attente</span>
                  @elseif($conge->status == 1)
                    <span class="badge bg-success">Accepté</span>
                  @else
                    <span class="badge bg-danger">Refusé</span>
                  @endif
                @endif
              </td>
              <td class="text-nowrap">
                <a href="{{ route('conges.show', $conge->id) }}" class="btn btn-sm btn-primary me-1" title="Voir">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-sm btn-warning me-1" title="Modifier">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('conges.destroy', $conge->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmez-vous la suppression ?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                    <i class="fas fa-trash-alt"></i>
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

@else

<div class="row p-4 pt-5">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-header bg-secondary d-flex align-items-center justify-content-between">
        <h3 class="card-title mb-0">
          <i class="fa fa-list fa-2x me-2"></i>
          <strong>Liste des congés</strong>
        </h3>
        <a class="btn btn-primary" href="{{ route('conge.create') }}">
          <i class="fa fa-plus"></i> Ajouter congé
        </a>
      </div>
      <div class="card-body table-responsive" style="max-height: 500px; overflow-y: auto;">
        <table id="myTable" class="table table-striped table-hover table-bordered align-middle">
          <thead class="table-dark sticky-top">
            <tr>
              <th>Id</th>
              <th>Date début</th>
              <th>Date fin</th>
              <th>Raison</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach (auth()->user()->conges as $key => $conge)
            <tr>
              <th scope="row">{{ $key + 1 }}</th>
              <td>{{ $conge->date_debut }}</td>
              <td>{{ $conge->date_fin }}</td>
              <td>{{ $conge->raison }}</td>
              <td>
                @if($conge->status == 0)
                  <span class="badge bg-warning text-dark">En attente</span>
                @elseif($conge->status == 1)
                  <span class="badge bg-success">Accepté</span>
                @else
                  <span class="badge bg-danger">Refusé</span>
                @endif
              </td>
              <td class="text-nowrap">
                <a href="{{ route('conges.show', $conge->id) }}" class="btn btn-sm btn-secondary me-1" title="Voir">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-sm btn-primary me-1" title="Modifier">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('conges.destroy', $conge->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmez-vous la suppression ?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                    <i class="fas fa-trash-alt"></i>
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

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" />
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
  $(document).ready(function () {
    $('#myTable').DataTable({
      dom: 'Bfrtip',
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
      order: [[0, 'asc']],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.12.0/i18n/French.json'
      }
    });
  });
</script>
@endsection
