@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Choices </a></li>
                        <li class="breadcrumb-item"><a href="{{route('choiceslips.index')}}"> Choices List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('choiceslips.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> Choices List </a>
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
            <div class="body">

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

                @if($formType == 'edit')
                    @can('choice-edit')
                    {!! Form::open(array('url' => "choiceslips/$choiceslip->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}
                    @endcan
                @else
                    {!! Form::open(array('url' => "choiceslips",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">


    <div class="form-group">
        {{ Form::label("city_name", 'City')}}
        {{Form::select('city_name', $cities , old('city_name') ? old('city_name') : (!empty($choiceslip) ? $choiceslip->city_name : null),
                ['class' => 'form-control','id' => 'city_name', 'placeholder' => 'Select City', 'required']
        )}}
    </div> <!-- end form-group -->


    @include('dashboard/choice-slips/center')

<div class="form-group">
    {{ Form::label("traveling_country", 'Traveling Country')}}
    {{Form::select('traveling_country', $countries, old('traveling_country') ? old('traveling_country') : (!empty($choiceslip) ? $choiceslip->traveling_country : null),
            ['class' => 'form-control','id' => 'traveling_country', 'placeholder' => 'Enter Traveling Country Here', 'required']
    )}}
</div> <!-- end form-group -->


    <div class="form-group">
        {{ Form::label("visa_type", 'Visa Type')}}
        {{Form::select('visa_type',$visatype, old('visa_type') ? old('visa_type') : (!empty($choiceslip) ? $choiceslip->visa_type : null),
                ['class' => 'form-control','id' => 'visa_type', 'placeholder' => 'Select Visa Type', 'required']
        )}}
    </div> <!-- end form-group -->
</div>

    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label("gender", 'Gender')}}
            {{Form::select('gender', ['1' => 'Male', '2' => 'Female', '3' => 'Others'], old('gender') ? old('gender') : (!empty($choiceslip) ? $choiceslip->gender : null),
                    ['class' => 'form-control','id' => 'visa_type', 'placeholder' => 'Select Gender', 'required']
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label("marital_status", 'Marital Status')}}
            {{Form::select('marital_status', ['1' => 'Married', '2' => 'Unmarried'], old('marital_status') ? old('marital_status') : (!empty($choiceslip) ? $choiceslip->marital_status : null),
                    ['class' => 'form-control','id' => 'marital_status', 'placeholder' => 'Select Gender', 'required']
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label("mob_no", 'Mobile Number')}}
            {{Form::text('mob_no', old('mob_no') ? old('mob_no') : (!empty($choiceslip) ? $choiceslip->mob_no : null),
                    ['class' => 'form-control','id' => 'mob_no', 'placeholder' => 'Enter Mobile Name Here', 'required']
            )}}
        </div> <!-- end form-group -->

        <div class="form-group d-flex flex-column">
            {{ Form::label("passport_image", 'Passport Image')}}
            {{Form::file('passport_image', null,
                    ['class' => 'form-control','id' => 'passport_image', 'placeholder' => 'Enter Choices Name Here', 'required']
            )}}
        </div> <!-- end form-group -->

        @if($formType == 'edit')
        <div class="form-group d-flex flex-column">
            <img src='{{asset("dashboard/images/passports/choice-passports/$choiceslip->passport_image")}}' alt="" width="100px" height="100px">
        </div> <!-- end form-group -->
        @endif
    </div>

    </div> <!-- end row -->
    </div>
    </div> <!-- end row -->

    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
    {!! Form::close() !!}

    </div><!-- end body -->
    </div> <!-- card -->
    </div> <!-- end col-md-12 -->
    @endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            // var slipType = $("#slip_type").val();
            //
            // if(slipType == 2){
            //     $("#center_div").css("display", "block");
            // }
            //
            // $("#slip_type").on('change', function(){
            //     var slipType = this.value;
            //     if(slipType == 1){
            //         $("#center_div").css("display", "none");
            //     }else{
            //         $("#center_div").css("display", "block");
            //     }
            // });

            $("#city_name").on('change', function () {
                var city_name = this.value;
                $.ajax({
                    'type' : 'get',
                    'url' : '{{url('centre_name')}}',
                    'data' : {city_name : city_name},
                    'data-type' : 'html',
                    success : function (response) {
                        $("#center_id").html(response);
                        console.log(response);
                    }
                });
            });

        });//document ready
    </script>
@endsection
