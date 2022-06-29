@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> MyPOS </a></li>
                        <li class="breadcrumb-item"><a href="{{route('roles.create')}}"> Jobs </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('roles.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> New Job</a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection
@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Jobs List  </strong> </h6> </div>
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-custom">
                <thead class='bg-warning'>
                <tr>
                    <th> Field Name </th>
                    <th> Data </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> Name </td>
                    <td>{{$role->name}}</td>
                </tr>
                <tr>
                    <td> Permission </td>
                    <td>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                            @endforeach
                        @endif
                    </td>
                </tr>
                <tr>
                    <td> Actions </td>
                    <td>
                        <a href="{{route('roles.index')}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-list"></i> </a>
                        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                        {!! Form::open(array('url' => "roles/$role->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                        {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- end col-12 -->
@endsection