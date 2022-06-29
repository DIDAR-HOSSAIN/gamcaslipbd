@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Slips </a></li>
                        <li class="breadcrumb-item"><a href="{{route('slipsends.index')}}"> Slips List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('slipsends.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> Slips List </a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection

@section('content')
    <div class="offset-2 col-md-8">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Upload New Slip </strong> </h2>
            </div>
            <div class="body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger"> {{$error}} </div>
                    @endforeach
                @endif

                @if($formType == 'edit')
                    {!! Form::open(array('url' => "slipsends/$slipsend->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}
                @else
                    {!! Form::open(array('url' => "slipsends",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label("mob_no", 'Mobile Number')}}
                            {{Form::text('mob_no', old('mob_no') ? old('mob_no') : (!empty($slipsend) ? $slipsend->mob_no : null),
                                    ['class' => 'form-control','id' => 'mob_no', 'placeholder' => 'Mobile Number Here..', 'required']
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group d-flex flex-column">
                            {{ Form::label("gamca_slip", 'Slip Upload')}}
                            <input name="gamca_slip" type="file" accept="application/pdf" class="form-control" required>
                        </div> <!-- end form-group -->
                    </div>
                </div> <!-- end row -->

                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                {!! Form::close() !!}

            </div><!-- end body -->
        </div> <!-- card -->
    </div> <!-- end col-md-12 -->
@endsection

