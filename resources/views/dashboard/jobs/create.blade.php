@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Jobs Portal </a></li>
                        <li class="breadcrumb-item"><a href="{{route('jobs.index')}}"> Jobs List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('jobs.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> Jobs List </a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Create Job  </strong> </h2>
            </div>
            <div class="body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger"> {{$error}} </div>
                    @endforeach
                @endif

                @if($formType == 'edit')
                    {!! Form::open(array('url' => "jobs/$job->id",'method' => 'PUT')) !!}
                @else
                    {!! Form::open(array('url' => "jobs",'method' => 'POST')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label("title", 'Job Title')}}
                            {{Form::text('title', old('title') ? old('title') : (!empty($job) ? $job->title : null),
                                    ['class' => 'form-control','id' => 'title', 'placeholder' => 'Enter Job Title Here']
                            )}}
                        </div> <!-- end form-group -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label("status", 'Job status')}}
                            {{Form::select('status', ['partTime'=>'Part-Time', 'fullTime'=>'Full Time'], old('status') ? old('status') : (!empty($job) ? $job->status : null),
                                    ['class' => 'form-control','id' => 'status', 'placeholder' => 'Select Job status']
                            )}}
                        </div> <!-- end form-group -->
                        <div class="form-group col-md-6">
                            {{ Form::label("location", 'Job location')}}
                            {{Form::text('location', old('location') ? old('location') : (!empty($job) ? $job->location : null),
                                    ['class' => 'form-control','id' => 'location', 'placeholder' => 'Enter Job location Here']
                            )}}
                        </div> <!-- end form-group -->
                        <div class="form-group col-md-6">
                            {{ Form::label("vacancy", 'Vacancy')}}
                            {{Form::number('vacancy', old('vacancy') ? old('vacancy') : (!empty($job) ? $job->vacancy : null),
                                    ['class' => 'form-control','id' => 'vacancy', 'placeholder' => 'Enter Vacancy Here', 'min'=>'0', 'max'=>'100']
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group col-md-6">
                            {{ Form::label("salary", 'Salary')}}
                            {{Form::text('salary', old('salary') ? old('salary') : (!empty($job) ? $job->salary : null),
                                    ['class' => 'form-control','id' => 'salary', 'placeholder' => 'Enter salary Here']
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group col-md-6">
                            {{ Form::label("published", 'Published')}}
                            {{Form::date('published', old('published') ? old('published') : (!empty($job) ? $job->published : null),
                                    ['class' => 'form-control','id' => 'published', 'placeholder' => 'Enter published Here']
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group col-md-6">
                            {{ Form::label("deadline", 'Deadline')}}
                            {{Form::date('deadline', old('deadline') ? old('deadline') : (!empty($job) ? $job->deadline : null),
                                    ['class' => 'form-control','id' => 'deadline', 'placeholder' => 'Enter deadline Here']
                            )}}
                        </div> <!-- end form-group -->
                    </div>
                        <div class="form-group">
                            {{ Form::label("description", 'Salary')}}
                            {{Form::textarea('description', old('description') ? old('description') : (!empty($job) ? $job->description : null),
                                    ['class' => 'form-control description','id' => 'description', 'placeholder' => 'Enter description Here']
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

@section('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea.description',
        });
    </script>


    <script>
        $(document).ready(function(){

        });
    </script>

@endsection