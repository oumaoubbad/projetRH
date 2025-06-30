@extends("layouts.master")
     
@section('content')
<div class="container">
    <div class="row my-5 ">
        <div class="col-md-8 mx-auto">
        <div class="card">
                    <div class="card-header bg-secondary">
                    <h4> {{ __(' Modifier fonction') }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="col-md-10 mx-auto">
                               


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
    
    <form action="{{ route('fonctions.update',$fonction->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')



                              <div class="form-group">
                              <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $fonction->name }}" class="form-control" placeholder="Name">

                              </div>
                              
                              <div class="form-group">
                                  <button class="btn btn-primary">
                                      Modifier
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('fonctions.index') }}"> Back</a>
          
                              </div>
                              </form>
                            </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection