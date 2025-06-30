@extends("layouts.master")
     
@section('content')
<div class="container">
    <div class="row my-5 ">
        <div class="col-md-8 mx-auto">
        <div class="card">
                    <div class="card-header bg-secondary">
                    <h4> {{ __(' Modifier attestation') }}</h4>
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
    
    <form action="{{ route('atts.update',$att->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')



        <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-university"></i></div>
              </div>
              <select name="type" id="type"   class="form-control">
                <option value="demmande attestation"  {{($att->raison ==='demmande attestation') ? 'selected' : ''}} >demmande attestation</option>
                <option value="demmande fiche bancaire"  {{($att->raison ==='demmande fiche bancaire') ? 'selected' : ''}}>demmande fiche bancaire</option>
                </select>
            </div>
          </div>
                              <div class="form-group">
                                  <button class="btn btn-primary">
                                      Modifier
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('atts.index') }}"> retour</a>
          
                              </div>
                              </form>
                            </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection