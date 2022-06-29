@extends('dashboard.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <a href="{{route('messages.create')}}" class="btn btn-info">Gamca Slip Entry</a>
                | <a href="{{route('messages.index')}}" class="btn btn-info">All Passengers</a>

                <hr>

                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing8">
                        <thead>
                        <tr>
                            <th> Field Name </th>
                            <th> Data </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th> City </th>
                            <td> {{$message->subject}} </td>
                        </tr>

                        <tr>
                            <th> Mobile Number </th>
                            <td> {{$message->mob_no}} </td>
                        </tr>
                        <tr>
                            <th> Message </th>
                            <td> {{$message->message}}

                        </tr>

                        <tr>
                            <th> Actions </th>
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
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection

