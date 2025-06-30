@extends("layouts.master")

@section("content")
@if(auth()->user()->role)
<div class="container">

  <div class="row my-5 justify-content-center">

    <div class="col-md-2">
      <div class="small-box bg-primary text-white">
        <div class="inner">
          <h2>{{ \App\Models\Employee::count() }}</h2>
          <p>Employés</p>
        </div>
        <div class="icon">
          <i class="fas fa-car"></i>
        </div>
        <a href="{{ url('employees') }}" class="small-box-footer text-white">
          Plus d'info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-md-2">
      <div class="small-box bg-danger text-white">
        <div class="inner">
          <h2>{{ \App\Models\Conge::count() }}</h2>
          <p>Congés</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <a href="{{ url('employes') }}" class="small-box-footer text-white">
          Plus d'info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-md-2">
      <div class="small-box bg-secondary text-white">
        <div class="inner">
          <h2>{{ \App\Models\Autorisation::count() }}</h2>
          <p>Autorisations</p>
        </div>
        <div class="icon">
          <i class="fa fa-handshake" aria-hidden="true"></i>
        </div>
        <a href="{{ url('affectations') }}" class="small-box-footer text-white">
          Plus d'info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-md-2">
      <div class="small-box bg-primary text-white">
        <div class="inner">
          <h2>{{ \App\Models\User::count() }}</h2>
          <p>Utilisateurs</p>
        </div>
        <div class="icon">
          <i class="fa fa-users" aria-hidden="true"></i>
        </div>
        <a href="{{ url('user') }}" class="small-box-footer text-white">
          Plus d'info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-md-2">
      <div class="small-box bg-danger text-white">
        <div class="inner">
          <h2>{{ \App\Models\Reservation::count() }}</h2>
          <p>Réservations</p>
        </div>
        <div class="icon">
          <i class="fa fa-calendar-check" aria-hidden="true"></i>
        </div>
        <a href="{{ url('reservation') }}" class="small-box-footer text-white">
          Plus d'info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-md-2">
      <div class="small-box bg-secondary text-dark">
        <div class="inner">
          <h2>{{ \App\Models\Att::count() }}</h2>
          <p>Événements</p>
        </div>
        <div class="icon">
          <i class="fa fa-calendar" aria-hidden="true"></i>
        </div>
        <a href="{{ url('/calendar/index') }}" class="small-box-footer text-dark">
          Plus d'info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

  </div>

  <div class="row py-5 justify-content-center" style="max-width: 90rem; height: 400px;">
    <div class="col-md-5">
      <div class="chart-container">
        <canvas id="pie-chart"></canvas>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
          <canvas id="canvas" height="280" width="600"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

@else
<div class="container d-flex justify-content-center mt-2">
  <div class="card w-75">
    <div class="card-body">
      <h1 class="bg-primary text-center text-white py-2 mb-4 rounded">
        <i class="fas fa-info-circle"></i> Your <small>Info</small>
      </h1>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td rowspan="2" class="align-middle">
              <img src="/images/img.webp" width="150" height="150" class="rounded-circle" alt="Profile Picture">
            </td>
            <th>Name</th>
            <td>{{ Auth::user()->id }}</td>
            <th>Name</th>
            <td>{{ Auth::user()->name }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>{{ Auth::user()->email }}</td>
            <th>Joining Date</th>
            <td>{{ Auth::user()->created_at->format('d-m-Y') }}</td>
          </tr>
          <tr>
            <td colspan="5" class="text-center">
              <form method="post" action="{{ route('attendance.store') }}">
                @csrf
                <input type="hidden" name="student_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-primary mr-2" name="status" value="present">Mark Attendance</button>
                <a href="{{ url('myattendance') }}" class="btn btn-dark">View Attendance</a>
              </form>
            </td>
          </tr>
        </tbody>
      </table>

      @if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @if($message = Session::get('found'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

    </div>
  </div>
</div>
@endif
@endsection

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
$(function(){
  var cData = JSON.parse(`{!! $chart_data !!}`);
  var ctx = $("#pie-chart");

  var data = {
    labels: cData.label,
    datasets: [{
      label: "Users Count",
      data: cData.data,
      backgroundColor: [
        "#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57","#1D7A46","#CDA776",
      ],
      borderColor: [
        "#CDA776","#989898","#CB252B","#E39371","#1D7A46","#F4A460","#CDA776",
      ],
      borderWidth: 1
    }]
  };

  var options = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: "Les réservations de la semaine dernière",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    }
  };

  new Chart(ctx, {
    type: "pie",
    data: data,
    options: options
  });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
  var year = {!! $year !!};
  var employee = {!! $employee !!};

  window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: year,
        datasets: [{
          label: 'Employés',
          backgroundColor: "Turquoise",
          data: employee
        }]
      },
      options: {
        elements: {
          rectangle: {
            borderWidth: 2,
            borderColor: '#c1c1c1',
            borderSkipped: 'bottom'
          }
        },
        responsive: true,
        title: {
          display: true,
          text: 'Embauches annuelles'
        }
      }
    });
  };
</script>
@endsection
