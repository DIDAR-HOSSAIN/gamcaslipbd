
@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-12" >
        <div class="table table-hover table-striped">

            <div class="col-md-8">
                <form action="/searchmsg" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="search" placeholder="Search By Mobile No" name="search" class="form-control ">

                        <span class="input-prepend">
                    <button type="submit" class=" btn btn-primary">Search</button>

                    <a href="{{route('generalslips.create')}}" class="btn btn-info">Create Gamca Slip</a>
                            <br>
                    <a href="{{route('slipsends.index')}}" class="btn btn-info">All Slip</a>
                </span>
                    </div>
                </form>
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

            @if(session('Delete_message'))
                <div class="alert alert-danger"> {{session('Delete_message')}}  </div>
            @endif

<div class="table-responsive">
    <table class="table table-hover table-custom spacing8">
        <thead>
        <tr>
            <th> S/N </th>
            <th> Subject </th>
            <th> Mobile Number </th>
            <th> Message</th>
            <th> Actions </th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $key=>$message)
            <tr>
                <td> {{$messages->firstItem()+$key}} </td>
                <td> {{$message->subject}} </td>
                <td> {{$message->mob_no}} </td>
                <td> {{$message->message}} </td>

                <td>
                    @can('message-show')
                    <a href="{{route('messages.show', $message->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                    @endcan

                        @can('message-edit')
                            <a href="{{route('messages.edit', $message->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                        @endcan

                        @can('message-delete')
                        {!! Form::open(array('url' => "messages/$message->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                    {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm'])}}
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
        </div>
        {{$messages->links()}}
    </div>
    </div>
@endsection
