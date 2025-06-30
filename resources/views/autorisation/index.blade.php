@extends('layouts.master')

@section('content')
<div class="row p-4 pt-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-gradient-secondary d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">
          <i class="fa fa-list fa-2x me-2"></i> <strong>Liste des Autorisations</strong>
        </h3>
        @if(!auth()->user()->role)
        <a class="btn btn-primary" href="{{ route('autorisation.create') }}">
          <i class="fa fa-plus me-1"></i> Ajouter Autorisation
        </a>
        @endif
      </div>

      <div class="card-body table-responsive p-0">
        <table id="myTable" class="table table-bordered table-striped mb-0">
          <thead class="bg-light">
            <tr>
              <th>#</th>
              @if(auth()->user()->role) <th>Utilisateur</th> @endif
              <th>Date début</th>
              <th>Date fin</th>
              <th>Raison</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php $list = auth()->user()->role ? $autorisations : auth()->user()->autorisations; @endphp
            @foreach ($list as $key => $autorisation)
            <tr>
              <td>{{ $key + 1 }}</td>
              @if(auth()->user()->role)
              <td>{{ $autorisation->user->name ?? 'Utilisateur supprimé' }}</td>
              @endif
              <td>{{ $autorisation->date_debut }}</td>
              <td>{{ $autorisation->date_fin }}</td>
              <td>{{ $autorisation->raison }}</td>
              <td>
                @switch($autorisation->status)
                  @case(0)
                    <span class="badge bg-warning">En attente</span>
                    @break
                  @case(1)
                    <span class="badge bg-success">Accepté</span>
                    @break
                  @case(2)
                    <span class="badge bg-danger">Refusé</span>
                    @break
                  @default
                    <span class="badge bg-secondary">Inconnu</span>
                @endswitch
              </td>
              <td class="d-flex gap-2">
                <a class="btn btn-sm btn-secondary" href="{{ route('autorisations.show', $autorisation->id) }}">
                  <i class="fas fa-eye"></i>
                </a>

                @if(!auth()->user()->role)
                <a class="btn btn-sm btn-primary" href="{{ route('autorisations.edit', $autorisation->id) }}">
                  <i class="fas fa-edit"></i>
                </a>
                @endif

                @if(auth()->user()->role)
                  @if($autorisation->status == 0)
                    <form action="{{ route('autorisation.approve', $autorisation->id) }}" method="POST" onsubmit="return confirm('Accepter cette autorisation ?')">
                      @csrf
                      <button class="btn btn-sm btn-success" name="approve" value="1">
                        <i class="fas fa-check"></i>
                      </button>
                    </form>
                    <form action="{{ route('autorisation.approve', $autorisation->id) }}" method="POST" onsubmit="return confirm('Refuser cette autorisation ?')">
                      @csrf
                      <button class="btn btn-sm btn-danger" name="approve" value="2">
                        <i class="fas fa-times"></i>
                      </button>
                    </form>
                  @elseif($autorisation->status == 1)
                    <form action="{{ route('autorisation.approve', $autorisation->id) }}" method="POST" onsubmit="return confirm('Refuser cette autorisation ?')">
                      @csrf
                      <button class="btn btn-sm btn-danger" name="approve" value="2">
                        <i class="fas fa-times"></i>
                      </button>
                    </form>
                  @elseif($autorisation->status == 2)
                    <form action="{{ route('autorisation.approve', $autorisation->id) }}" method="POST" onsubmit="return confirm('Accepter cette autorisation ?')">
                      @csrf
                      <button class="btn btn-sm btn-success" name="approve" value="1">
                        <i class="fas fa-check"></i>
                      </button>
                    </form>
                  @endif
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
