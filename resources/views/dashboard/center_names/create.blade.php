@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Centers </a></li>
                        <li class="breadcrumb-item"><a href="{{route('centers.index')}}"> Centers List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('centers.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> Centers List </a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Add Centers  </strong> </h2>
            </div>
            <div class="body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger"> {{$error}} </div>
                    @endforeach
                @endif

                @if($formType == 'edit')
                    {!! Form::open(array('url' => "centers/$center->id",'method' => 'PUT')) !!}
                @else
                    {!! Form::open(array('url' => "centers",'method' => 'POST')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label("city_id", 'City')}}
                            {{Form::select('city_Name', $cities , old('city_Name') ? old('city_Name') : (!empty($center) ? $center->city_Name : null),
                                    ['class' => 'form-control','id' => 'city_Name', 'placeholder' => 'Select City', 'required']
                            )}}
                        </div> <!-- end form-group -->
                        <div class="form-group">
                            {{ Form::label("center name", 'Centers Name')}}
                            {{Form::text('center_name', old('center_name') ? old('center_name') : (!empty($center) ? $center->center_name : null),
                                    ['class' => 'form-control','id' => 'center_name', 'placeholder' => 'Enter Centers Name Here', 'required']
                            )}}
                        </div> <!-- end form-group -->
                    </div>
                </div> <!-- end row -->

                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                {!! Form::close() !!}

            </div><!-- end body -->
        </div> <!-- card -->
    </div> <!-- end col-md-12 -->
@endsection
