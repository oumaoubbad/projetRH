
@extends('layouts.master')        

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Modifier Congé
                            </h3>
                        </div>
                       
                        <form action="{{ route('factures.update',$facture->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')                        
                            <div class="card-body">
                            <div class="form-group" id="multiple-date">
                              <strong>Date :</strong>
                            

<input type="date" name="date" id="date2"
value="{{ $facture->date }}"
       min="2000-01-01" max="2100-12-31">
</div>

<div class="form-group">
                                    <label for="">Prix</label>
                                    <input type="text" name="prix"  value="{{ $facture->prix }}"  class="form-control">
                                    @error('prix')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>      

                            <div class="form-group">
                                    <label for="">Objet</label>
                                    <input type="text" name="objet"  value="{{ $facture->objet }}"  class="form-control">
                                    @error('objet')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                             
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea id="w3review" name="description" rows="5" cols="65">{{ $facture->description }}</textarea>
                                    @error('direction')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('factures.index') }}"> back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('js')

<script>
    $(document).ready(function() {
        $('#date1').daterangepicker({
            "showDropdowns": true,
            "singleDatePicker": true,
            "locale": {
                "format": "DD-MM-YYYY",
            }
        });
        $('#date2').daterangepicker({
            "showDropdowns": true,
            "locale": {
                "format": "DD-MM-YYYY",
            }
        });

    });

    function showInput() {
        $('#single-date').toggleClass('hide-input');
        $('#multiple-date').toggleClass('hide-input');
    }
</script>
@endsection