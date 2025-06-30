@extends('layouts.master')

@section('content')
<div class="row p-4 pt-5">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-header bg-primary d-flex align-items-center">
        <h3 class="card-title flex-grow-1 text-white">
          <i class="fa fa-calendar-check fa-2x me-2"></i> <strong>Mes présences</strong>
        </h3>
      </div>

      <div class="card-body table-responsive p-0">
        @if(Session::has('success'))
          <div class="alert alert-success m-3">
            {{ Session::get('success') }}
          </div>
        @endif

        <table class="table table-hover table-striped table-bordered mb-0">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Statut</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($shows as $key => $show)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $show->created_at->format('d/m/Y H:i') }}</td>
                <td>
                  @if($show->status === 'présent')
                    <span class="badge bg-success">Présent</span>
                  @elseif($show->status === 'absent')
                    <span class="badge bg-danger">Absent</span>
                  @else
                    <span class="badge bg-secondary">{{ ucfirst($show->status) }}</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="text-center text-muted">Aucune présence enregistrée.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
