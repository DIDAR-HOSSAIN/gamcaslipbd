<link rel="stylesheet" href="{{asset('front-end/Lib/css/style.css')}}">
@extends('dashboard.layouts.master')
@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Choices </a></li>
                        <li class="breadcrumb-item"><a href="{{route('generalslips.index')}}"> Choices List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('generalslips.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> Choices List </a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Add Choices  </strong> </h2>
            </div>
{{--            <div class="body">--}}
                {{--                @if($errors->any())--}}
                {{--                    @foreach($errors->all() as $error)--}}
                {{--                        <div class="alert alert-danger"> {{$error}} </div>--}}
                {{--                    @endforeach--}}
                {{--                @endif--}}
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


{{--<div class="form-group">--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        @if($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                @foreach($errors->all() as $error)--}}
{{--                                    {{$error}}--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        @if(session('message'))--}}
{{--                            <div class="alert alert-success"> {{session('message')}}  </div>--}}
{{--                        @endif--}}
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




{{--    @if($formType == 'edit')--}}
{{--        <div class="form-group d-flex flex-column">--}}
{{--            <img src='{{asset("dashboard/images/passports/$generalslip->passport_image")}}' alt="" width="100px" height="100px">--}}
{{--        </div> <!-- end form-group -->--}}
{{--    @endif--}}
{{--</div>--}}

{{--{{ Form::label('City',"City",['class' => 'col-md-2 control-label']) }}--}}
{{--{{ Form::select('city_name', $city_names) }}--}}
{{--{{Form::select('city_name', $city_names , ["class" => "col-md-3 control-label",])}}--}}

{{--{{ Form::label('Country Traveling To',"Country Traveling To",['class' => 'col-md-2 control-label']) }}--}}
{{--{{Form::select('traveling_country',['Oman' => 'Oman', 'Bahrain' => 'Bahrain', 'Qatar'=> 'Qatar','Saudi Arabia' => 'Saudi Arabia',--}}
{{--'Kuwait' => 'Kuwait', 'UAE'=> 'UAE','Yemen'=>'Yemen','Libiya'=>'Libiya'], $genslips->traveling_country, ["class" => "col-md-3 control-label",])}}--}}


{{--{{Form::label('mob_no', "Type Your Mobile No/ মোবাইল নম্বর", ['class' => '"col-md-2 control-label'])}}--}}
{{--{{Form::text('mob_no',--}}
{{--    old('mob_no') ? old('mob_no') : (!empty($mob_no) ? $mob_no->mob_no : $genslips->mob_no),--}}
{{--    ["class" => "col-md-3 control-label","id" => "mob_no"]--}}
{{--)}}--}}

{{--{{ Form::label('visa_type',"Visa Type",['class' => 'col-md-2 control-label']) }}--}}
{{--{{Form::select('visa_type', ['Work Visa' => 'Work Visa', 'Family Visa' => 'Family Visa'], $genslips->visa_type, ["class" => "col-md-3 control-label",])}}--}}


{{--{{ Form::label('Upload Your Passport Picture',"Upload Your Passport Picture",['class' => 'col-md-2 control-label']) }}--}}
{{--{{ Form::file('passport_image', [$genslips->passport_image], ["class" => "form-group",]) }}--}}
{{-- <br>--}}
{{-- Old picture:<p><img src="{{URL::to('dashboard/images/passports/'.$genslips->passport_image)}}" width="100px" height="100px"></p>--}}


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
