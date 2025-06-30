




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
                               <strong>  Ajouter réservation </strong>
                            </h3>
                        </div>
                       
                        <form action="{{ route('reservations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group" id="multiple-date">
                              <strong>Date début:</strong>
                            

<input type="date" name="date_debut" id="date2"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
</div>

<div class="col-md-6">
<div class="form-group" id="multiple-date">
<strong>Date fin:</strong>                          
<input type="date" name="date_fin" id="date2"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
                      
</div>
</div>
                            
                   

                            <div class="form-group">
                                    <label for="">Région</label>
                                    <input type="text" name="region"  class="form-control">
                                    @error('region')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Destination</label>
                                    <input type="text" name="direction" value="{{ old('direction') }}" class="form-control">
                                    @error('direction')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea id="w3review" name="description" rows="5" cols="46"></textarea>
                                    @error('direction')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Ajouter</button>
                                <a class="btn btn-secondary" href="{{ route('reservations.index') }}"> Annuler</a>
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