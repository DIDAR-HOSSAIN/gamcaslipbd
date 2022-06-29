@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> MyPOS </a></li>
                        <li class="breadcrumb-item"><a href="{{route('jobs.index')}}"> Jobs </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                @role('writter|admin')
                <a href="{{route('jobs.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> New Job</a>
                @endrole
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection
@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Jobs List  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Title </th>
                    <th> Status </th>
                    <th> Vacancy </th>
                    <th> Salary </th>
                    <th> Published </th>
                    <th> Deadline </th>
                    <th> Location </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $key=>$job)
                    <tr>
                        <td> {{$jobs->firstItem()+$key}} </td>
                        <td> {{$job->title}} </td>
                        <td> {{$job->status}} </td>
                        <td> {{$job->vacancy}} </td>
                        <td> {{$job->salary}} </td>
                        <td> {{$job->published}} </td>
                        <td> {{$job->deadline}} </td>
                        <td> {{$job->location}} </td>
                        <td>
                            <a href="{{route('jobs.show', $job->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                            <a href="{{route('jobs.edit', $job->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                            @role('admin')
                            {!! Form::open(array('url' => "jobs/$job->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                            {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm'])}}
                            {!! Form::close() !!}
                            @endrole
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-right">
            {{$jobs->links()}}
        </div>
    </div> <!-- end col-12 -->
@endsection