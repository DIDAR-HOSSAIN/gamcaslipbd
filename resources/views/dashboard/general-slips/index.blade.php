
{{--@extends('layouts.layout')--}}
@extends('dashboard.layouts.master')

@section('content')
{{--    <body style="background-color:#5499C7">--}}
    <div class="col-md-12" >
        <table class="table table-hover table-striped">

            <div class="col-md-8">
                <form action="/searchgen" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="search" placeholder="Search By Mobile No" name="search" class="form-control ">

                        <span class="input-prepend">
                    <button type="submit" class=" btn btn-primary">Search</button>

                    <a href="{{route('generalslips.create')}}" class="btn btn-info">Add Gamca General Slip</a>

                    <a href="{{route('slipsends.index')}}" class="btn btn-info"> Upload List</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>City</th>
                <th>Traveling Country </th>
                <th>Visa Type </th>
                <th>Mob NO </th>
                <th>Passport Image </th>
                <th>Entry Date </th>
{{--                <th>Gender </th>--}}
{{--                <th>Matrial Status </th>--}}
                <th>Actions </th>

            </tr>
            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($genslips as $key=> $genslip)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$genslips->firstitem()+$key}}</td>
                    <td> {{$genslip->city_name}} </td>
                    <td> {{$genslip->traveling_country}} </td>
                    <td> {{$genslip->visa_type}} </td>
                    <td> {{$genslip->mob_no}} </td>
                    <td><img src="{{URL::to('dashboard/images/passports/gen-passports/'.$genslip->passport_image) }}" style="height: 100px; width: 100px;"></td>
                     <td> {{$genslip->created_at}} </td>
{{--                    <td> {{$general-slips->gender}} </td>--}}
{{--                    <td> {{$general-slips->status}} </td>--}}

                    <td>

                        @can('genslip-edit')
                        <a href="{{URL::to('generalslips/'.$genslip->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                            @can('genslip-show')
                            |<a href="{{URL::to('generalslips/'.$genslip->id)}}" class="btn btn-sm btn btn-success">Show</a>
                            @endcan

                            @can('genslip-delete')
                        <form action="{{URL::to('generalslips/'.$genslip->id)}}" method="post" class="float-left">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Gamca Slip?')" type="submit" >Delete</button>
                        </form>
                            @endcan

                    </td>
                </tr>
            @endforeach
        </table>
        {{$genslips->links()}}
    </div>

@endsection


