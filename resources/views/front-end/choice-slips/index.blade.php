@extends('dashboard.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Passenger List </a></li>
                        <li class="breadcrumb-item"><a href="{{route('choiceslips.create')}}"> Choices </a></li>
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
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Choices List  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">
                <thead>
                <tr>
                    <th> # </th>
                    <th> City </th>
                    <th> Center </th>
                    <th> Traveling country </th>
                    <th> Visa Type </th>
                    <th> Mobile Number </th>
                    <th> Passport Image </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                @foreach($choiceslips as $key=>$choiceslip)
                    <tr>
                        <td> {{$choiceslips->firstItem()+$key}} </td>
                        <td> {{$choiceslip->city_name}} </td>
                        <td>
                            @if(!empty($choiceslip->center_name))
                                {{$choiceslip->center_name}}
                            @else
                                General Slip
                            @endif
                        </td>
                        <td> {{$choiceslip->traveling_country}} </td>
                        <td>
                            @if($choiceslip->visa_type == 1)
                                {{'Work Visa'}}
                            @else
                                {{'Family Visa'}}
                            @endif
                        </td>
                        <td> {{$choiceslip->mob_no}} </td>
                        <td>
                            <img src="{{asset('dashboard/images/passports/choice-passports/'.$choiceslip->passport_image)}}" alt="" width="80px" height="80px">
                        </td>
                        <td>
                @can('choice-show')
                <a href="{{route('choiceslips.show', $choiceslip->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                @endcan

                @can('choice-edit')
                    <a href="{{route('choiceslips.edit', $choiceslip->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                @endcan
          {{--   @role('admin')--}}
                    @can('choice-delete')
                        {!! Form::open(array('url' => "choiceslips/$choiceslip->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                        {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm'])}}
                        {!! Form::close() !!}
                    @endcan
{{--            @endrole--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-right">
            {{$choiceslips->links()}}
        </div>
    </div> <!-- end col-12 -->
@endsection
