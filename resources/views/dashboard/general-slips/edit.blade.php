{{--<link rel="stylesheet" href="{{asset('front-end/Lib/css/style.css')}}">--}}
@extends('dashboard.layouts.master')
@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> General Gamca Slip </a></li>
                        <li class="breadcrumb-item"><a href="{{route('generalslips.index')}}"> General Slip List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('generalslips.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> General Slip List </a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Add General Slip  </strong> </h2>
            </div>


                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success"> {{session('message')}}  </div>
                @endif


                            {!! Form::open(['url' => 'generalslips/'.$generalslip->id ,'method' => 'POST','enctype=multipart/form-data']) !!}
                            @method('PUT')
{{--                    </div>--}}
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">

<div class="form-group">
    {{ Form::label("city_name", 'City')}}
    {{Form::select('city_name', $cities , old('city_name') ? old('city_name') : (!empty($generalslip) ? $generalslip->city_name : null),
            ['class' => 'form-control','id' => 'city_name', 'placeholder' => 'Select City', 'required']
    )}}
</div> <!-- end form-group -->

    <div class="form-group">
        {{ Form::label("traveling_country", 'Traveling Country')}}
        {{Form::select('traveling_country', $countries, old('traveling_country') ? old('traveling_country') : (!empty($generalslip) ? $generalslip->traveling_country : null),
                ['class' => 'form-control','id' => 'traveling_country', 'placeholder' => 'Enter Traveling Country Here', 'required']
        )}}
    </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label("visa_type", 'Visa Type')}}
            {{Form::select('visa_type',$visatype, old('visa_type') ? old('visa_type') : (!empty($generalslip) ? $generalslip->visa_type : null),
                    ['class' => 'form-control','id' => 'visa_type', 'placeholder' => 'Select Visa Type', 'required']
            )}}
        </div> <!-- end form-group -->
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label("gender", 'Gender')}}
            {{Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], old('gender') ? old('gender') : (!empty($generalslip) ? $generalslip->gender : null),
                    ['class' => 'form-control','id' => 'gender', 'placeholder' => 'Select Gender', 'required']
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label("marital_status", 'Marital Status')}}
            {{Form::select('marital_status', ['Married' => 'Married', 'Single' => 'Single'], old('marital_status') ? old('marital_status') : (!empty($generalslip) ? $generalslip->marital_status : null),
                    ['class' => 'form-control','id' => 'marital_status', 'placeholder' => 'Select Gender', 'required']
            )}}
        </div> <!-- end form-group -->


    <div class="form-group">
        {{ Form::label("mob_no", 'Mobile Number')}}
        {{Form::text('mob_no', old('mob_no') ? old('mob_no') : (!empty($generalslip) ? $generalslip->mob_no : null),
                ['class' => 'form-control','id' => 'mob_no', 'placeholder' => 'Enter Mobile Name Here', 'required']
        )}}
    </div> <!-- end form-group -->

    <div class="form-group d-flex flex-column">
        {{ Form::label("passport_image", 'Passport Image')}}
        {{Form::file('passport_image', null,
                ['class' => 'form-control','id' => 'passport_image', 'placeholder' => 'Enter Choices Name Here', 'required']
        )}}
    </div> <!-- end form-group -->
        <div class="form-group d-flex flex-column">
            <img src='{{asset("dashboard/images/passports/gen-passports/$generalslip->passport_image")}}' alt="" width="100px" height="100px">
        </div> <!-- end form-group -->

{{--                        {{ Form::label('gender:',"Gender",['class' => 'col-lg-2 control-label']) }}--}}
{{--                        <br>--}}
{{--                        {{Form::radio('gender', 'Male',true)}}--}}
{{--                        {{ Form::label('Male') }}--}}
{{--                        {{Form::radio('gender', 'Female',false)}}--}}
{{--                        {{ Form::label('Female') }}--}}


{{--                        <br>--}}
{{--                        {{ Form::label('status:',"Marital Status",['class' => 'col-lg-2 control-label']) }}--}}
{{--                        <br>--}}
{{--                        {{Form::radio('status', 'Married',true)}}--}}
{{--                        {{ Form::label('Married') }}--}}
{{--                        {{Form::radio('status', 'Single',false)}}--}}
{{--                        {{ Form::label('Single') }}--}}

                </div> <!-- end row -->
            </div>
        </div> <!-- end row -->
                        {{Form::submit('Create', ['class'=>"btn btn-success"])}}
                         {!! Form::close() !!}
                </div><!-- end body -->
            </div> <!-- card -->
        </div> <!-- end col-md-12 -->

@endsection
