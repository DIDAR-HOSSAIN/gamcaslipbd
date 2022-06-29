@extends('front-end.layouts.master')

@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Slip List  </strong> </h6> </div>

        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">
                <thead>
                <tr>
                    <th> SN </th>
                    <th> Mobile Number </th>
                    <th> Slip </th>
                </tr>
                </thead>
                <tbody>
                @foreach($slipsends as $key=>$slipsend)
                    <tr>
                        <td> {{$slipsends->firstItem()+$key}} </td>
                        <td> {{$slipsend->mob_no}} </td>
                        <td>
                            @if($slipsend->gamca_slip)
                                <a href="{{asset('dashboard/images/slips/'.$slipsend->gamca_slip)}}" class="btn btn-outline-warning btn-lg">
                                    Download Slip
                                </a>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-right">
            {{$slipsends->links()}}
        </div>
    </div> <!-- end col-12 -->
@endsection
