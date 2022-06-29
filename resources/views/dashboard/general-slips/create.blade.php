{{--<link rel="stylesheet" href="{{asset('front-end/Lib/css/style.css')}}">--}}

@extends('dashboard.layouts.master')
@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> General Gamca Slip </a></li>
                        <li class="breadcrumb-item"><a href="{{route('generalslips.index')}}"> General List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('generalslips.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> General List </a>
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


     {!! Form::open(['url' => 'generalslips' ,'method' => 'POST','enctype=multipart/form-data']) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

{{--    <div class="form-label">--}}

     <div class="form-group">
    {{ Form::label('city', "City/কোন সিটিতে মেডিকেল করতে চান")}}
    {{Form::select('city_name', $cities , old('city_name') ? old('city_name') : (!empty($generalslip) ? $generalslip->city_name : null),
            ['class' => 'form-control','id' => 'city_name', 'placeholder' => 'Select City', 'required']
    )}}
     </div> <!-- end form-group -->

     <div class="form-group">
    {{ Form::label("traveling_country",'Country Traveling To/ কোন দেশে যেতে চান',['class' => 'control-label']) }}
    {{Form::select('traveling_country', $countries , old('traveling_country') ? old('traveling_country') : (!empty($generalslip) ? $generalslip->traveling_country : null),
            ['class' => 'form-control','id' => 'traveling_country', 'placeholder' => 'Select Country', 'required']
    )}}
     </div> <!-- end form-group -->

     <div class="form-group">
     {{ Form::label('Visa Type',"Visa Type/ভিসার ধরন",['class' => 'control-label']) }}
     {{Form::select('visa_type', $visatype , old('visa_type') ? old('visa_type') : (!empty($generalslip) ? $generalslip->visa_type : null),
    ['class' => 'form-control','id' => 'visa_type', 'placeholder' => 'Select Visa Type', 'required']
    )}}
     </div> <!-- end form-group -->

    </div>

    <div class="col-md-6">
        <div class="form-group">
            {{Form::label('mob_no', "Type Your Mobile No/ মোবাইল নম্বর", ['class' => 'control-label'])}}
            {{Form::text('mob_no', old('mob_no') ? old('mob_no') : (!empty($generalslip) ? $generalslip->$generalslip : null),
            ['class' => 'form-control','id' => 'mob_no','placeholder' => 'Type Your Mobile No......','required']
            )}}
        </div> <!-- end form-group -->

     <div class="form-group">
     {{ Form::label('passport_image',"Passport Picture/ পাসপোর্টের ছবি আপলোড করুন ", ["class" => "control-label"]) }}
    <img src="{{asset('Images/sample_passport_img.jpg')}}" class="float-md-right imgleft" alt="...">
    {{Form::file('passport_image', null,
    ['class' => 'form-control','id' => 'passport_image', 'placeholder' => 'Enter Choices Name Here', 'required']
    )}}
     </div> <!-- end form-group -->

    <div class="form-group">
    {{ Form::label('gender:',"Gender/লিঙ্গ নির্বাচন করুন",['class' => 'control-label']) }}
    {{Form::radio('gender', 'Male',false)}}
    {{ Form::label('Male') }}
    {{Form::radio('gender', 'Female',false)}}
    {{ Form::label('Female') }}
    </div> <!-- end form-group -->

    <div class="form-group">
    {{ Form::label('Marital Status:',"Marital Status/বৈবাহিক অবস্থা ",['class' => 'control-label']) }}
    {{Form::radio('marital_status', 'Married',false)}}
    {{ Form::label('Married') }}
    {{Form::radio('marital_status', 'Single',false)}}
    {{ Form::label('Single') }}
    </div> <!-- end form-group -->

                    </div> <!-- end row -->
                </div>
            </div> <!-- end row -->

        {{Form::submit('Create', ['class'=>"btn btn-success"])}}
        {!! Form::close() !!} <!-- end form-group -->

        </div><!-- end body -->
    </div> <!-- card -->
   </div> <!-- end col-md-12 -->
        {{--            end left panel--}}


@endsection
