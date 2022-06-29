
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Add Choice Slip</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


            @if($formType == 'edit')
                    {!! Form::open(array('url' => "publicchoiceslips/$choiceslip->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}
            @else
                {!! Form::open(array('url' => "publicchoiceslips",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">



            <div class="form-group">
                {{ Form::label("city_name", 'City/সিটি নির্বাচন করুন')}}
                {{Form::select('city_name', $cities , old('city_name') ? old('city_name') : (!empty($choiceslip) ? $choiceslip->city_name : null),
                        ['class' => 'form-control','id' => 'city_name', 'placeholder' => 'Select City', 'required']
                )}}
            </div> <!-- end form-group -->


            @include('front-end/choice-slips/center')

            <div class="form-group">
                {{ Form::label("traveling_country", 'Traveling Country/ কোন দেশে যেতে চান')}}
                {{Form::select('traveling_country', $countries, old('traveling_country') ? old('traveling_country') : (!empty($choiceslip) ? $choiceslip->traveling_country : null),
                        ['class' => 'form-control','id' => 'traveling_country', 'placeholder' => 'Select Country', 'required']
                )}}
            </div> <!-- end form-group -->

        </div>

    {{--end left side--}}


    {{--  start right side--}}

        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label("visa_type", 'Visa Type/ভিসার ধরন')}}
                {{Form::select('visa_type',$visatype, old('visa_type') ? old('visa_type') : (!empty($choiceslip) ? $choiceslip->visa_type : null),
                        ['class' => 'form-control','id' => 'visa_type', 'placeholder' => 'Select Visa Type', 'required']
                )}}
            </div> <!-- end form-group -->

{{--            <div class="form-group">--}}
{{--                {{ Form::label("gender", 'Gender/ লিঙ্গ নির্বাচন করুন')}}--}}
{{--                {{Form::select('gender', ['1' => 'Male', '2' => 'Female', '3' => 'Others'], old('gender') ? old('gender') : (!empty($choiceslip) ? $choiceslip->gender : null),--}}
{{--                        ['class' => 'form-control','id' => 'visa_type', 'placeholder' => 'Select Gender', 'required']--}}
{{--                )}}--}}
{{--            </div> <!-- end form-group -->--}}

{{--            <div class="form-group">--}}
{{--                {{ Form::label("marital_status", 'Marital Status/ বৈবাহিক অবস্থা')}}--}}
{{--                {{Form::select('marital_status', ['1' => 'Married', '2' => 'Unmarried'], old('marital_status') ? old('marital_status') : (!empty($choiceslip) ? $choiceslip->marital_status : null),--}}
{{--                        ['class' => 'form-control','id' => 'marital_status', 'placeholder' => 'Select Gender', 'required']--}}
{{--                )}}--}}
{{--            </div> <!-- end form-group -->--}}

            <div class="form-group">
                {{ Form::label("mob_no", 'Mobile Number/ মোবাইল নম্বর')}}
                {{Form::text('mob_no', old('mob_no') ? old('mob_no') : (!empty($choiceslip) ? $choiceslip->mob_no : null),
                        ['class' => 'form-control','id' => 'mob_no', 'placeholder' => 'Enter Mobile Name Here', 'required']
                )}}
            </div> <!-- end form-group -->

                            <div class="form-group d-flex flex-column">
                                {{ Form::label("passport_image", 'Passport Image/ পাসপোর্টের ছবি আপলোড করুন ')}}
                                <img src="{{asset('Images/sample_passport_img.jpg')}}" class="float-md-right imgleft" alt="...">
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

</div>

@extends('front-end.pages.home')
@section('button')
    <!-- Call to action -->
    <section class="background-grey text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<h3 style="font-weight: 400;">Like What You See? We’re Just Getting Started</h3>-->
                    <!--</div>-->
                    <!--<div class="col-lg-3"><a href="#" class="btn btn-rounded">Purchase POLO</a> </div>-->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">সতর্কতা</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Slip</button>
                    <button type="button" class="btn btn-primary" data-oggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">ঠিকানা</button>

                </div>
            </div>
        </div>
    </section>

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
                    'url' : '{{url('center_name')}}',
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
