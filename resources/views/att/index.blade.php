@extends("layouts.master")

  @section('content')
  @if(auth()->user()->role)
  <div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-secondary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> <strong> Liste des Attestations</strong></h3>
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

                        <th>Type</th>
                        <th>Demmandé à</th>
                        <th>Status</th>


                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($atts as $key => $att)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>{{App\Models\User::findOrFail($att->user_id)->name}}</th>

                  <th>{{ $att->type }}</th>
                  <th>{{ $att->created_at }}</th>

                  <th>

                                                            @if(Auth::user()->role)
                                                            {{$att->status}}
                                                            @if($att->status==0)
                                                                <form id="approve-leave-{{$att->id}}" action="{{route('att.approve',$att->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="approveLeave({{$att->id}})"   class="btn btn-danger text-white" name="approve" value="1"> Accepter<i class="fa fa-check" aria-hidden="true"></i></button>--}}
                                                                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir accepter la réservation?')"  class="btn btn-danger text-white" name="approve" value="1"><i class="fa fa-check" aria-hidden="true"> Accepter</i></button>
                                                                </form>
                                                                <form id="reject-leave-{{$att->id}}" action="{{route('att.approve',$att->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$att->id}})" class="btn btn-secondary text-white"  name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>--}}
                                                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir refuser la réservation')"  class="btn btn-secondary text-white " name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>
                                                                </form>
                                                            @elseif($att->status==1)

                                                                <form action="{{route('att.approve',$att->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-secondary  text-white" onclick="return confirm('Êtes-vous sûr de vouloir refuser la réservation?')"  type="submit" name="approve" value="2"><i class="fa fa-times" aria-hidden="true"> Refuser</i></button>
                                                                </form>
                                                            @else
                                                                <form action="{{route('att.approve',$att->id)}}" method="POST">
                                                                    @csrf
                                                                    <button   class="btn btn-primary text-white" onclick="return confirm('Êtes-vous sûr de vouloir accepter la réservation?')" type="submit" name="approve" value="1"><i class="fa fa-check" aria-hidden="true"> Accepter</i></button>
                                                                </form>
                                                            @endif

                                                                {{--<a href="{{route('att.approve',$att->id)}}" class="btn btn-sm btn-info">en attente</a>--}}
                                                                {{--<a href="{{route('att.pending',$att->id)}}"   class="btn btn-secondary text-white ">Accepter<i class="fa fa-check" aria-hidden="true"></i></a>--}}
                                                                {{--<a href="{{route('att.reject',$att->id)}}"  class="btn btn-sm text-white"><i class="fa fa-times" aria-hidden="true">Refuser</i></a>--}}
                                                                @else
                                                                @if($att->status==0)
                                                                    <span class="badge badge-pill badge-warning">en attente</span>
                                                                @elseif($att->status==1)
                                                                    <span class="badge badge-pill badge-success">accepté</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-primary">refusé</span>
                                                                @endif
                                                            @endif

                  </th>

                  <th>

                  <form action="" method="POST">
                    <a class="btn btn-primary"  href="{{ route('atts.show',$att->id) }}"> <i class="fas fa-eye"></i> </a>


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
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des attestations</h3>
</div> <div class="text-right mx-5 my-2 font-weight-bold ">

            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <form action="{{ route('atts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-row align-items-center  p-2">
    <div class="col-sm-5 my-1">


                <select name="type" id="type"  class="form-control">
                  <option value="demmande attestation">demmande attestation</option>
                  <option value="demmande fiche bancaire">demmande fiche bancaire</option>

              </select>
    </div>


    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary"> <i class="fas fa-plus "></i> ajouter</button>
    </div>

</div>
</form>

            </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" >

                <div style="height:350px;">
                    <table class="table table-head-fixed">
                    <thead>
                    <tr>
                        <th>Id</th>

                        <th>Type</th>
                        <th>Status</th>

                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach (auth()->user()->atts as $key => $att)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>

                  <th>{{ $att->type }}</th>
                  <th>

                  @if(Auth::user()->role)
                  {{$att->status}}
                  @if($att->status==0)
                      <form id="approve-leave-{{$att->id}}" action="{{route('att.approve',$att->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="approveLeave({{$att->id}})" class="btn btn-sm btn-info" name="approve" value="1">Accepté</button>--}}
                          <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-info" name="approve" value="1">Accepté</button>
                      </form>
                      <form id="reject-leave-{{$att->id}}" action="{{route('att.approve',$att->id)}}" method="POST">
                          @csrf
                          {{--<button type="button" onclick="rejectLeave({{$att->id}})" class="btn btn-sm btn-primary" name="approve" value="2">Refusé</button>--}}
                          <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-primary" name="approve" value="2">Refusé</button>
                      </form>
                  @elseif($att->status==1)

                      <form action="{{route('att.approve',$att->id)}}" method="POST">
                          @csrf
                          <button class="btn btn-sm btn-primary" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Refusé</button>
                      </form>
                  @else
                      <form action="{{route('att.approve',$att->id)}}" method="POST">
                          @csrf
                          <button class="btn btn-sm btn-info" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Accepté</button>
                      </form>
                  @endif

                      {{--<a href="{{route('att.approve',$att->id)}}" class="btn btn-dark btn-white">en attente</a>--}}
                      {{--<a href="{{route('att.pending',$att->id)}}"   class="btn btn-primary text-white ">Accepter<i class="fa fa-check" aria-hidden="true"></i></a>--}}
                      {{--<a href="{{route('att.reject',$att->id)}}"  class="btn btn-secondary text-white"><i class="fa fa-times" aria-hidden="true">Refuser</i></a>--}}
                    @else
                      @if($att->status==0)
                          <h5><span class="badge badge-pill badge-danger">en attente</span></h5>
                      @elseif($att->status==1)
                         <h5> <span   class="badge badge-pill badge-primary ">accepté</span></h5>
                      @else
                         <h5> <span   class="badge badge-pill badge-dark ">refusé</span></h5>
                      @endif
                  @endif

</th>
                  <th>

                  <form   method="POST" action="{{ route('atts.destroy', $att->id) }}">


     <a class="btn btn-secondary" href="{{ route('atts.edit', $att->id) }}"> <i class="fas fa-edit "></i> </a>

     @csrf
     @method('DELETE')

     <button onclick="return myFunction();" type="submit" onclick="deleteCar()" class="btn btn-primary"> <i class="fas fa-trash"></i> </button>

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
