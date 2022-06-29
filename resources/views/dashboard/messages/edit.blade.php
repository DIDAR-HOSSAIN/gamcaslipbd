@extends('dashboard.layouts.master')
@section('content')

    <link rel="stylesheet" href="{{asset('msg-lib/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('msg-lib/css/style.css')}}">
    {{--	</head>--}}

    <body>

    <div class="wrapper">
        <div class="inner">

            <h3>Contact Us</h3>
            <p>বিদেশের মেডিকেল স্লিপ সংক্রান্ত যে কোন বিষয়ে আমাদের সাথে যোগাযোগ করুন, দ্রুত মেডিকেল স্লিপ প্রদানে আমরা আপনার বিশ্বস্ত সহযোগেী  .</p>

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
                {!! Form::open(array('url' => "messages/$message->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}
            @else
                {!! Form::open(array('url' => "messages",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
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




@endsection

