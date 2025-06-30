@extends('layouts.master')     
@section('content')

    <div class="row my-5 ">
    <div class="col-md-6 mx-auto">
        <div class="card card-secondary">
                    <div class="card-header ">
                        <h4 class="text-center ">  Modifier Tâche </h4>
                 
</div>
            <div class="card-body ">
                        <div class="col-md-9 mx-auto">
                                


                                @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('staines.update',$staine->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        


                              <div class="form-group">
                              <strong>titre:</strong>
                <input type="text"  value="{{ $staine->titre }}" name="titre" class="form-control" placeholder="titre">
                              </div>

                              <div class="form-group">
                        <label for="edit_time_in" class="col-sm-3 control-label">Temps début :</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="time" class="form-control timepicker"  name="time_in" value="{{$staine->time_in}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_time_out" class="col-sm-3 control-label">Temps fin : </label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="time" class="form-control timepicker"  name="time_out" value="{{$staine->time_out}}">
                            </div>
                        </div>
                    </div>




          
                              
                              <div class="form-group">
                                  <button class="btn btn-primary">
                                      Modifier
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('staines.index') }}"> Annuler</a>
          
</div>

                              </form>
                            </div>
</div>     
                    
            </div>
        </div>
    
</div>
@endsection