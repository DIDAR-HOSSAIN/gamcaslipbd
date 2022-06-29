@extends('dashboard.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <a href="{{route('generalslips.create')}}" class="btn btn-info">Gamca Slip Entry</a>
                | <a href="{{route('generalslips.index')}}" class="btn btn-info">General Slip List</a>

                <hr>

<div class="table-responsive">
    <table class="table table-hover table-custom spacing8">
<h4 class="text align-center">Gamca General Slip Details</h4>
        <tbody>
        <tr>
            <th> City </th>
            <td> {{$generalslip->city_name}} </td>
        </tr>
        <tr>
            <th> Traveling country </th>
            <td> {{$generalslip->traveling_country}} </td>
        </tr>
        <tr>
            <th> Visa Type </th>
            <td>
                {{$generalslip->visa_type}}
            </td>
        </tr>
{{--                                <tr>--}}
{{--                                    <th> Gender </th>--}}
{{--                                    <td>--}}
{{--                                        @if($choice->gender == 1)--}}
{{--                                            {{'Male'}}--}}
{{--                                        @elseif($choice->gender == 2)--}}
{{--                                            {{'Female'}}--}}
{{--                                        @else--}}
{{--                                            {{'Others'}}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
        <tr>
            <th> Mobile Number </th>
            <td> {{$generalslip->mob_no}} </td>
        </tr>
        <tr>
            <th> Passport Image </th>
{{--            <td> {{$gamcas->passport_image}}--}}
            <td><img src="{{URL::to('dashboard/images/passports/gen-passports/'.$generalslip->passport_image)}}" width="100px" height="100px"></td>

        </tr>
        <tr>
            <th> Actions </th>
            <td>
                @can('genslip-show')
                <a href="{{route('generalslips.show', $generalslip->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                @endcan

                @can('genslip-edit')
                <a href="{{route('generalslips.edit', $generalslip->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                @endcan

                @can('genslip-delete')
                {!! Form::open(array('url' => "generalslips/$generalslip->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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

