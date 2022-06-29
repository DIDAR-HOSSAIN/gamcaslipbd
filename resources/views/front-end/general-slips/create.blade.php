
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Add General Slip</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {!! Form::open(['url' => 'publicgeneralslips' ,'method' => 'POST','enctype=multipart/form-data']) !!}

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                                {{--    <div class="form-label">--}}

                                <div class="form-group">
                                    {{ Form::label('city', "City/ সিটি নির্বাচন করুন")}}
                                    {{Form::select('city_name', $cities , old('city_name') ? old('city_name') : (!empty($publicgeneralslip) ? $publicgeneralslip->city_name : null),
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
                                    {{ Form::label('Visa Type',"Visa Type/ ভিসার ধরন",['class' => 'control-label']) }}
                                    {{Form::select('visa_type', $visatype , old('visa_type') ? old('visa_type') : (!empty($generalslip) ? $generalslip->visa_type : null),
                                   ['class' => 'form-control','id' => 'visa_type', 'placeholder' => 'Select Visa Type', 'required']
                                   )}}
                                </div> <!-- end form-group -->

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    {{Form::label('mob_no', "Mobile No/ মোবাইল নম্বর", ['class' => 'control-label'])}}
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

                                {{--                        <div class="form-group">--}}
                                {{--                            {{ Form::label('gender:',"Gender/লিঙ্গ নির্বাচন করুন",['class' => 'control-label']) }}--}}
                                {{--                            {{Form::radio('gender', 'Male',false)}}--}}
                                {{--                            {{ Form::label('Male') }}--}}
                                {{--                            {{Form::radio('gender', 'Female',false)}}--}}
                                {{--                            {{ Form::label('Female') }}--}}
                                {{--                        </div> <!-- end form-group -->--}}

                                {{--                        <div class="form-group">--}}
                                {{--                            {{ Form::label('Marital Status:',"Marital Status/বৈবাহিক অবস্থা ",['class' => 'control-label']) }}--}}
                                {{--                            {{Form::radio('marital_status', 'Married',false)}}--}}
                                {{--                            {{ Form::label('Married') }}--}}
                                {{--                            {{Form::radio('marital_status', 'Single',false)}}--}}
                                {{--                            {{ Form::label('Single') }}--}}
                                {{--                        </div> <!-- end form-group -->--}}


                <div class="col-md-12">
                    <div class="card">



                    </div> <!-- end row -->
                </div>
            </div> <!-- end row -->

        {{Form::submit('Submit', ['class'=>"btn btn-success "])}}
        {!! Form::close() !!} <!-- end form-group -->

        </div><!-- end body -->
    </div> <!-- card -->
</div> <!-- end col-md-12 -->





            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
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



