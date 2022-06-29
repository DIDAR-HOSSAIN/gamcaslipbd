<?php

namespace App\Http\Controllers;

use App\Choiceslip;
use App\Center;
use App\City;
use App\Country;
use App\VisaType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;
class PublicchoiceslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        $cities = City::orderBy('city_name')->pluck('city_name', 'city_name');
        $centers = [];
        $countries = Country::orderBy('id')->pluck('traveling_country', 'traveling_country');
        $visatype = VisaType::orderBy('id')->pluck('visa_type', 'visa_type');
        return view('front-end.choice-slips.create', compact('formType', 'cities', 'centers','countries','visatype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'city_name' => 'required',
            'center_name' => 'required',
            'traveling_country' => 'required',
            'visa_type' => 'required',
            'mob_no' => 'required',
//            'gender' => 'required',
//            'marital_status' => 'required',
            'passport_image' => 'required',
        ]);


        try{
            $data = $request->all();
            if ($request->hasFile('passport_image')){
                $passport_image = $request->file('passport_image');
                $file_name =time(). ('_') .$passport_image->getClientOriginalName();
                $image_resize = Image::make($passport_image->getRealPath());
                $image_resize->resize(200,200);
                $image_resize->save('dashboard/images/passports/choice-passports/'.$file_name);
                $data ['passport_image'] = $file_name;
                Choiceslip::create($data);
                return redirect()->route('index')->with('message', "ধন্যবাদ আপনার স্লিপ এন্ট্রি হয়েছে/ Choice Slip Inserted has been Successfully");

            }else{
                $data = $request->all();
                $data ['passport_image'] = "Picture Did't Add";
                Choiceslip::create($data);
                return redirect()->route('index')->with('message', "ধন্যবাদ আপনার স্লিপ এন্ট্রি হয়েছে/ Choice Slip Inserted has been Successfully");

            }

        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCenter(Request $request){
//        dd($request->all());
        $centers = Center::where("city_name",$request->city_name)->pluck("center_name","center_name");

//        dd($centers);
        return view('front-end.choice-slips.center',compact('centers'));
    }


}
