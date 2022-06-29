@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> City </a></li>
                        <li class="breadcrumb-item"><a href="{{route('cities.index')}}"> City List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('cities.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> City List </a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Add City  </strong> </h2>
            </div>
            <div class="body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger"> {{$error}} </div>
                    @endforeach
                @endif

                @if($formType == 'edit')
                    {!! Form::open(array('url' => "cities/$city->id",'method' => 'PUT')) !!}
                @else
                    {!! Form::open(array('url' => "cities",'method' => 'POST')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label("city_name", 'City Name')}}
                            {{Form::text('city_name', old('city_name') ? old('city_name') : (!empty($city) ? $city->city_name : null),
                                    ['class' => 'form-control','id' => 'city_name', 'placeholder' => 'Enter City Name Here']
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
