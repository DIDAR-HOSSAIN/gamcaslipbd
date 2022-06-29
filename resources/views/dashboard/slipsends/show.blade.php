@extends('dashboard.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <a href="{{route('slipsends.create')}}" class="btn btn-info">Slip Upload</a>
                | <a href="{{route('slipsends.index')}}" class="btn btn-info">Slip List</a>

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
                            <th> Mobile Number </th>
                            <td> {{$slipsend->mob_no}} </td>
                        </tr>
                        <tr>
                            <th> Slip Download </th>
                            <td> {{$slipsend->message}}

                        </tr>

                        <tr>
                            <th> Actions </th>
                            <td>
                                @can('slipsend-show')
                                    <a href="{{route('slipsends.show', $slipsend->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                                @endcan

                                @can('message-edit')
                                    <a href="{{route('slipsends.edit', $slipsend->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                                @endcan

                                @can('message-delete')
                                    {!! Form::open(array('url' => "slipsends/$slipsend->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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

