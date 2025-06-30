@extends('layouts.master')        

@section('content')
@if(auth()->user()->role) 

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-secondary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des vacances</h3>
                <div class="text-right mx-5 my-2 font-weight-bold ">
            
            <a class="btn btn-primary" href="{{ route('holidays.create') }}"><i class="fa fa-user-plus" aria-hidden="true"> ajouter vacance</i></a>

            </div>
              </div>
                        <div class="card-body table-responsive p-0 table-striped">
                            @if ($holidays->count())
                            <div style="height:500px;">
                    <table class="table table-head-fixed ">
              <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titre</th>
                                        <th>Mois</th>
                                        <th> Date début</th>
                                        <th>Date fin</th>
                                        <th class="none">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($holidays as $index => $holiday)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $holiday->name }}</td>
                                        <td>{{ $holiday->start_date->format('F') }}</td>
                                        <td>{{ $holiday->start_date->format('d')}}</td>
                                        @if($holiday->end_date) 
                                        <td>{{ $holiday->end_date->format('d') }}</td>
                                        @else
                                        <td>Single Day</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('holidays.edit', $holiday->id) }}" class="btn btn-flat btn-primary"> <i class="fas fa-edit"></i></a>
                                            <button 
                                            class="btn btn-flat btn-danger"
                                            data-toggle="modal"
                                            data-target="#deleteModalCenter{{ $index+1 }}"
                                            >
                                            <i class="fas fa-trash"></i>
                                            </button>
                                          
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @for ($i = 1; $i < $holidays->count()+1; $i++)
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModalCenter{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle1{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h5 style="text-align: center !important">Are you sure want to delete?</h5>
                                                </div>
                                               
                                                <div class="card-footer text-center">
                                                    <small>This action is irreversable</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                            @endfor
                            @else
                            <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                                <h4>No records available</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @else
    <!-- Content Header (Page header) -->
    <div class="content-header">
        
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-secondary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des vacances</h3>
              
              </div>
                        <div class="card-body table-responsive p-0 table-striped">
                            @if ($holidays->count())
                            <div style="height:500px;">
                    <table class="table table-head-fixed ">
              <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titre</th>
                                        <th>Mois</th>
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($holidays as $index => $holiday)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $holiday->name }}</td>
                                        <td>{{ $holiday->start_date->format('F') }}</td>
                                        <td>{{ $holiday->start_date->format('d')}}</td>
                                        @if($holiday->end_date) 
                                        <td>{{ $holiday->end_date->format('d') }}</td>
                                        @else
                                        <td>Single Day</td>
                                        @endif
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @for ($i = 1; $i < $holidays->count()+1; $i++)
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModalCenter{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle1{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h5 style="text-align: center !important">Are you sure want to delete?</h5>
                                                </div>
                                                <div class="card-body text-center d-flex" style="justify-content: center">
                                                    
                                                    <button type="button" class="btn flat btn-secondary" data-dismiss="modal">No</button>
                                                    
                                                    <form 
                                                    action="{{ route('holidays.delete', $holidays->get($i-1)->id) }}"
                                                    method="POST"
                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn flat btn-primary ml-1">Yes</button>
                                                    </form>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small>This action is irreversable</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                            @endfor
                            @else
                            <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                                <h4>No records available</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endif
@endsection

@section('js')

<script>
$(document).ready(function(){
    $('#dataTable').DataTable({
        responsive:true,
        autoWidth: false,
    });
});
</script>
@endsection