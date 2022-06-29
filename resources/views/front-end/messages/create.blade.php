
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Message Portal</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                        <body>

                        <div class="wrapper">
                            <div class="inner">

                                <p>বিদেশের মেডিকেল স্লিপ সংক্রান্ত যে কোন বিষয়ে আমাদের সাথে যোগাযোগ করুন, দ্রুত মেডিকেল স্লিপ প্রদানে আমরা আপনার বিশ্বস্ত সহযোগেী  .</p>

                                @if($formType == 'edit')
{{--                                    {!! Form::open(array('url' => "messages/$message->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}--}}
                                @else
                                    {!! Form::open(array('url' => "publicmsgs",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                                @endif

                                <div class="form-group">
                                    {{ Form::label("subject", 'Subject')}}
                                    {{Form::text('subject', old('subject') ? old('subject') : (!empty($message) ? $message->subject : null),
                                    ['class' => 'form-control','id' => 'subject', 'placeholder' => 'Message Subject', 'required']
                                    )}}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label("mob_no", 'Mobile Number')}}
                                    {{Form::number('mob_no', old('mob_no') ? old('mob_no') : (!empty($message) ? $message->mob_no : null),
                                    ['class' => 'form-control','id' => 'mob_no', 'placeholder' => 'Enter Your Mobile No', 'required']
                                    )}}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label("message", 'Your Message')}}
                                    {{Form::textarea('message', old('message') ? old('message') : (!empty($message) ? $message->message : null),
                                    ['class' => 'form-control','id' => 'message', 'placeholder' => 'Type Your Message here.....', 'required']
                                    )}}
                                </div> <!-- end form-group -->

                                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                                {!! Form::close() !!}

                            </div>
                        </div>






</body>
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



