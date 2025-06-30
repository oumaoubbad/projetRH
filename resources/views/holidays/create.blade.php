@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter vacance</h3>
                    </div>
                    <form action="{{ route('holidays.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Type de vacance</label>
                                <select id="type" name="type" class="form-control" onchange="toggleDateFields()">
                                    <option value="single" {{ old('type') == 'single' ? 'selected' : '' }}>Un seul jour</option>
                                    <option value="range" {{ old('type') == 'range' ? 'selected' : '' }}>Plage de dates</option>
                                </select>
                            </div>

                            <div class="form-group" id="single-date">
                                <label>Date</label>
                                <input type="text" name="date" id="date1" class="form-control" value="{{ old('date') }}">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group d-none" id="multiple-date">
                                <label>Date de début et de fin</label>
                                <input type="text" name="date_range" id="date2" class="form-control" value="{{ old('date_range') }}">
                                @error('date_range')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Ajouter</button>
                            <a class="btn btn-secondary" href="{{ route('holidays.index') }}">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#date1').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: { format: 'DD-MM-YYYY' }
        });

        $('#date2').daterangepicker({
            showDropdowns: true,
            locale: { format: 'DD-MM-YYYY' }
        });

        // Initial toggle based on old input (if form reloaded with errors)
        toggleDateFields();
    });

    function toggleDateFields() {
        const type = document.getElementById("type").value;
        const singleDate = document.getElementById("single-date");
        const multipleDate = document.getElementById("multiple-date");

        if (type === "single") {
            singleDate.classList.remove("d-none");
            multipleDate.classList.add("d-none");
        } else {
            singleDate.classList.add("d-none");
            multipleDate.classList.remove("d-none");
        }
    }
</script>
@endsection
