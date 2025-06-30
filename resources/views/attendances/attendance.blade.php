@extends('layouts.master')
@section('content')
@if(auth()->user()->role)  
<div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-secondary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des présences</h3>
              
              </div>
              <div class="card-body table-responsive p-0 table-striped">
                          
                            <div style="height:500px;">
                    <table class="table table-head-fixed ">
              <thead>        <tr>
                                <th>Id</th>
                                <th>Date </th>
                                <th>Satus</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendance as $at)
                            <tr>
                                <td>{{$at->name}}</td>
                                <td>{{date('d-m-Y',strtotime($at->created_at))}}</td>
                                <td>{{$at->status}}</td>
                                <form method="post" action="{{route('attendance.update',$at->id)}}">
                @csrf
                
                            </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
       
    </div>
    @endif
    <!-- [ Hover-table ] start-->
    
    <!-- [ Hover-table ] end -->
    
    @endsection