@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> MyPOS </a></li>
                        <li class="breadcrumb-item"><a href="{{route('slipsends.index')}}"> Slips </a></li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-6 col-sm-12 text-right">
                @role('writter|admin')
                <a href="{{route('slipsends.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Slip Upload </a>
                @endrole
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->


    <div class="col-md-12" >
        <table class="table table-hover table-striped">

            <div class="col-md-8">
                <form action="/searchslip" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="search" placeholder="Search By Mobile No" name="search" class="form-control ">

                        <span class="input-prepend">
                    <button type="submit" class=" btn btn-primary">Search</button>

                    <a href="{{route('generalslips.create')}}" class="btn btn-info">Create Gamca Slip</a>

                    <a href="{{route('slipsends.index')}}" class="btn btn-info">All Slip</a>
                </span>
                    </div>
                </form>
            </div>

            @endsection

@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Slip List  </strong> </h6> </div>
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
                    <th> Mobile Number </th>
                    <th> Slip </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                @foreach($slipsends as $key=>$slipsend)
                    <tr>
                        <td> {{$slipsends->firstItem()+$key}} </td>
                        <td> {{$slipsend->mob_no}} </td>
                        <td>
                            @if($slipsend->gamca_slip)
                                <a href="{{asset('dashboard/images/slips/'.$slipsend->gamca_slip)}}" class="btn btn-outline-warning btn-lg">
                                    Download Slip
                                </a>
                            @endif
                        </td>
                        <td>
                            @can('slipsend-show')
                                <a href="{{route('slipsends.show', $slipsend->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                            @endcan

                            @can('slipsend-edit')
                            <a href="{{route('slipsends.edit', $slipsend->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                            @endcan
{{--                            @role('admin')--}}
                            @can('slipsend-delete')
                            {!! Form::open(array('url' => "slipsends/$slipsend->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                            {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm'])}}
                            {!! Form::close() !!}
                            @endcan
{{--                            @endrole--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-right">
            {{$slipsends->links()}}
        </div>
    </div> <!-- end col-12 -->
@endsection
