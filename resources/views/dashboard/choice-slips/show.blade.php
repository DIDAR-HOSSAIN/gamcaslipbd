@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Choice List </a></li>
                        <li class="breadcrumb-item"><a href="{{route('choiceslips.index')}}"> Choice List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                @role('writter|admin')
                <a href="{{route('choiceslips.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Choice </a>
                @endrole
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection
@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Choice Slip Details  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">
{{--                <thead>--}}
{{--                    <tr>--}}
{{--                        <th> Field Name </th>--}}
{{--                        <th> Data </th>--}}
{{--                    </tr>--}}
{{--                </thead>--}}

                <tbody>
                    <tr>
                        <th> City </th>
                        <td> {{$choiceslip->city_name}} </td>
                    </tr>

                    <tr>
                        <th> Center </th>
                        <td>
                            @if(!empty($choiceslip->center_name))
                                {{$choiceslip->center_name}}
                            @else
                                General Slip
                            @endif
                        </td>

                    </tr>

                    <tr>
                        <th> Traveling country </th>
                        <td> {{$choiceslip->traveling_country}} </td>
                    </tr>

                    <tr>
                        <th> Visa Type </th>
                        <td>
                            @if($choiceslip->visa_type == 1)
                                {{'Work Visa'}}
                            @else
                                {{'Family Visa'}}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th> Gender </th>
                        <td>
                            @if($choiceslip->gender == 1)
                                {{'Male'}}
                            @elseif($choiceslip->gender == 2)
                                {{'Female'}}
                            @else
                                {{'Others'}}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th> Mobile Number </th>
                        <td> {{$choiceslip->mob_no}} </td>
                    </tr>

                    <tr>
                        <th> Passport Image </th>
                        <td><img src="{{asset('dashboard/images/passports/choice-passports/'.$choiceslip->passport_image)}}" alt="" width="100px" height="100px">
                        </td>
                    </tr>

                    <tr>
                        <th> Actions </th>

                        <td>
                            @can('choice-show')
                            <a href="{{route('choiceslips.show', $choiceslip->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                            @endcan

                            @can('choice-edit')
                            <a href="{{route('choiceslips.edit', $choiceslip->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                            @endcan

{{--                            @role('admin')--}}
                            @can('choice-delete')
                            {!! Form::open(array('url' => "choiceslips/$choiceslip->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                            {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm'])}}
                            {!! Form::close() !!}
                                @endcan

{{--                            @endrole--}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- end col-12 -->
@endsection



