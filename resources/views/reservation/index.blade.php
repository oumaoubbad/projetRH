@extends("layouts.master")

  @section('content')   
  @if(auth()->user()->role)   

  <div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-secondary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> <strong> Liste des Réservations</strong></h3>
                <div class="text-right mx-5 my-2 font-weight-bold ">
            

            </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" >
               
                <div style="height:500px;">
                    <table class="table table-head-fixed">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Utilisateur</th>
                      
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Distination</th>
                        <th>Région</th>
                        <th>Status</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($reservations as $key => $reservation)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{App\Models\User::findOrFail($reservation->user_id)->name}}</th>
                  <th>{{ $reservation->date_debut }}</th>
                  <th>{{ $reservation->date_fin }}</th>
                  <th>{{ $reservation->direction }}</th>
                  <th>{{ $reservation->region }}</th>
                  <th>
                  
                  @if(Auth::user()->role)
                  {{$reservation->status}}
                  @if($reservation->status==0)
                      <form id="approve-leave-{{$reservation->id}}" action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="approveLeave({{$reservation->id}})"   class="btn btn-secondary text-white" name="approve" value="1"> Accepter<i class="fa fa-check" aria-hidden="true"></i></button>--}}
                          <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir accepter la réservation?')"  class="btn btn-secondary text-white" name="approve" value="1"><i class="fa fa-check" aria-hidden="true"> Accepter</i></button>
                      </form>
                      <form id="reject-leave-{{$reservation->id}}" action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="rejectLeave({{$reservation->id}})" class="btn btn-secondary text-white" name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>--}}
                      <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir refuser la réservation')" class="btn btn-danger text-white " name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>
                      </form>
                  @elseif($reservation->status==1)

                      <form action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          <button class="btn btn-danger  text-white" onclick="return confirm('Êtes-vous sûr de vouloir refuser la réservation?')" type="submit" name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>
                      </form>
                  @else
                      <form action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          <button   class="btn btn-secondary text-white" onclick="return confirm('Êtes-vous sûr de vouloir accepter la réservation?')" type="submit" name="approve" value="1"><i class="fa fa-check" aria-hidden="true"> Accepter</i></button>
                      </form>
                  @endif

                      {{--<a href="{{route('reservation.approve',$reservation->id)}}" class="btn btn btn-danger">en attente</a>--}}
                      {{--<a href="{{route('reservation.pending',$reservation->id)}}"   class="btn btn-secondary text-white ">Accepter<i class="fa fa-check" aria-hidden="true"></i></a>--}}
                      {{--<a href="{{route('reservation.reject',$reservation->id)}}" class="btn btn-primary text-white"><i class="fa fa-times" aria-hidden="true">Refuser</i></a>--}}
                      @else
                      @if($reservation->status==0)
                          <span class="badge badge-pill badge-danger">en attente</span>
                      @elseif($reservation->status==1)
                          <span class="badge badge-pill badge-secondary">accepté</span>
                      @else
                          <span class="badge badge-pill badge-primary">refusé</span>
                      @endif
                  @endif
     
</th>
                  <th>
                      
                  <form action="" method="POST">     
                    <a class="btn btn-primary"  href="{{ route('reservations.show',$reservation->id) }}"> <i class="fas fa-eye"></i> </a>
      
     
                    @csrf
                    @method('DELETE')
        

                   </form>
                  </th>
                  
                </tr>
                @endforeach
              </tbody>
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
    </div>
    @else
   


<div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-secondary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> <strong>Liste des Réservations</strong></h3>
                <div class="text-right mx-5 my-2 font-weight-bold ">
            
            <a class="btn btn-primary" href="{{ route('reservation.create') }}"><i class="fa fa-plus" aria-hidden="true"> Ajouter réservation</i></a>

            </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" >
               
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Distination</th>
                        <th>Région</th>
                        <th>Status</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach (auth()->user()->reservations as $key => $reservation)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{ $reservation->date_debut }}</th>
                  <th>{{ $reservation->date_fin }}</th>
                  <th>{{ $reservation->direction }}</th>
                  <th>{{ $reservation->region }}</th>
                  <th>{{ $reservation->description }}</th>
                
                 
                  <th>
                  
                  @if(Auth::user()->role)
                  {{$reservation->status}}
                  @if($reservation->status==0)
                      <form id="approve-leave-{{$reservation->id}}" action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="approveLeave({{$reservation->id}})" class="btn btn btn-info" name="approve" value="1">Accepté</button>--}}
                          <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn btn-info" name="approve" value="1">Accepté</button>
                      </form>
                      <form id="reject-leave-{{$reservation->id}}" action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="rejectLeave({{$reservation->id}})" class="btn btn btn-secondary" name="approve" value="2">Refusé</button>--}}
                          <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn btn-secondary" name="approve" value="2">Refusé</button>
                      </form>
                  @elseif($reservation->status==1)

                      <form action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          <button class="btn btn btn-secondary" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Refusé</button>
                      </form>
                  @else
                      <form action="{{route('reservation.approve',$reservation->id)}}" method="POST">
                          @csrf
                          <button class="btn btn btn-info" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Accepté</button>
                      </form>
                  @endif

                      {{--<a href="{{route('reservation.approve',$reservation->id)}}" class="btn btn btn-dark">en attente</a>--}}
                      {{--<a href="{{route('reservation.pending',$reservation->id)}}" class="btn btn text-primary ">Accepter<i class="fa fa-check" aria-hidden="true"></i></a>--}}
                      {{--<a href="{{route('reservation.reject',$reservation->id)}}"  class="btn btn text-secondary"><i class="fa fa-times" aria-hidden="true">Refuser</i></a>--}}
                    @else
                      @if($reservation->status==0)
                          <h5><span class="badge badge-pill badge-danger">en attente</span></h5>
                      @elseif($reservation->status==1)
                         <h5> <span   class="badge badge-pill  badge-secondary">accepté</span></h5>
                      @else
                         <h5> <span  class="badge badge-pill badge-primary ">refusé</span></h5>
                      @endif
                  @endif
     
</th>
          <th>            
                  <form action="" method="POST">     
                    <a class="btn btn-secondary" href="{{ route('reservations.show',$reservation->id) }}"> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-primary" href="{{ route('reservations.edit', $reservation->id) }}"><i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    
 </button>

                   </form>
                  </th>
                  
                </tr>
                @endforeach
              </tbody>
              
            </table>
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
    </div>
@endif
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css"/>

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
     $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' , 'colvis' 
        ]
    } );
} );
 </script>
@endsection