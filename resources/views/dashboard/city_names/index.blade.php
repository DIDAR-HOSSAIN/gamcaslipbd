@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> MyPOS </a></li>
                        <li class="breadcrumb-item"><a href="{{route('cities.index')}}"> Jobs </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                @role('writter|admin')
                <a href="{{route('cities.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add City </a>
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
                    <th> Name </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $key=>$city)
                    <tr>
                        <td> {{$cities->firstItem()+$key}} </td>
                        <td> {{$city->city_name}} </td>
                        <td>
                            <a href="{{route('cities.edit', $city->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                            @role('admin')
                            {!! Form::open(array('url' => "cities/$city->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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
            {{$cities->links()}}
        </div>
    </div> <!-- end col-12 -->
@endsection
