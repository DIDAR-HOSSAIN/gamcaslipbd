
@extends('front-end.layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('Lib/css/style.css')}}">

    {{--start left panel--}}
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

    <div class="col-md-12 row no-gutters background">
        <div class="col-md-8 row no-gutters">
            <div class="leftside col-md-6">
                <a href="{{route('publicgeneralslips.create')}}" target="_blank">
                    <button class="button"><i class="fa fa-table fa-2x" >&nbsp; Gamca General Slip সাধারণ স্লিপ</i></button>
                </a>
                <br>
                <a href="{{route('publicchoiceslips.create')}}" target="_blank">
                    <button class="button"><i class="fa fa-address-book fa-2x" >&nbsp; Gamca Choice Slip পছন্দের স্লিপ</i></button>
                </a>


                <br> <br/>
                <label class="alert-label text-center"><i class="fad fa-sensor-alert fa-1x"></i>সতর্কতা</label>
                <br/>
                <div class="caution text-center">
                    আমাদের মেডিকেল স্লিপ ফি ব্যতিত অতিরিক্ত টাকা কেউ দাবী করলে তা প্রদান থেকে বিরত থাকুন।

                </div>


            </div>


            <div class="middleside col-md-6">
                <br/>
                <img src="{{asset('Images/payment_system.jpg')}}" style="width: 350px;height: 350px" alt="...">



            </div>
        </div>
        {{--            end left panel--}}

        {{--    right side start--}}

        <div class="col-md-4 no-gutters">
            <div class="rightside">
                <br>

                <div class="form-group">
                    <form action="/searches" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="searches" placeholder="মোবাইল নম্বর দিয়ে স্লিপ ডাউনলোড করুন " name="searches" class=" search">
                            <span class="input-prepend">
                    <button type="submit" class="btn btn-primary" ><i class="fa fa-search fa-1x" >Search</i></button>
                </span>
                        </div>
                    </form>
                </div>


                <label class="address-label text-center"><i class="fa fa-address-card fa-1x"></i>ঠিকানা</label>
                <br/>
                <div class="address">
                    গার্ডেন সিটি কমপ্লেক্স, 62 এম. এম. আলি রোড, লালখান বাজার, চট্টগ্রাম।
                    হট লাইনঃ  01309009030 (সকাল 9 টা থেকে রাত 9 টা)  <br>
                    ই-মেইলঃ
                </div>


            </div>
        </div>
        {{--end right side--}}
    </div>

{{--start for popup window publicgeneralslip and public choice slip--}}

<script>
    $('#exampleModal').modal('show')

</script>
{{--end for popup window publicgeneralslip and public choice slip--}}

@endsection
