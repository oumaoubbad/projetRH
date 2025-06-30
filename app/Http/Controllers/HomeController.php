<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Reservation;
use App\Models\Conge;

use App\Models\Employee;

use Redirect,Response;
Use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $year = ['2022','2023','2023','2024','2025'];

        $employee = [];
        foreach ($year as $key => $value) {
            $employee[] = Employee::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }

$record =  Reservation::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
->where('created_at', '>', Carbon::today()->subDay(6))
->groupBy('day_name','day')
->orderBy('day')
->get();

 $data = [];

 foreach($record as $row) {
    $data['label'][] = $row->day_name;
    $data['data'][] = (int) $row->count;
  }

$data['chart_data'] = json_encode($data);
     


$record1 =  Conge::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
->where('created_at', '>', Carbon::today()->subDay(6))
->groupBy('day_name','day')
->orderBy('day')
->get();

 $data1 = [];

 foreach($record1 as $row) {
    $data1['label1'][] = $row->day_name;
    $data1['data1'][] = (int) $row->count;
  }

$data1['chart_data1'] = json_encode($data1);
     

    return view('home', $data ,$data1)->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('employee',json_encode($employee,JSON_NUMERIC_CHECK));
    }



}
