<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\VisaType;
use App\Generalslip;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;
class PublicgeneralslipController extends Controller
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

        $cities = City::orderBy('city_name')->pluck('city_name', 'city_name');
        $countries = Country::orderBy('traveling_country')->pluck('traveling_country', 'traveling_country');
        $visatype = VisaType::orderBy('visa_type')->pluck('visa_type', 'visa_type');
        return view('front-end.general-slips.create',compact('cities' , 'countries' , 'visatype'));
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
            'traveling_country' => 'required',
            'visa_type' => 'required',
            'mob_no' => 'required',
            'passport_image' => 'required',
        ]);

        try {
            $genslips = $request->all();
            if ($request->hasFile('passport_image')){
                $passport_image = $request->file('passport_image');
                $file_name =time(). ('_') .$passport_image->getClientOriginalName();
                $image_resize = Image::make($passport_image->getRealPath());
                $image_resize->resize(200,200);
                $image_resize->save('dashboard/images/passports/gen-passports/'.$file_name);
                $genslips ['passport_image'] = $file_name;
                Generalslip::create($genslips);

                return redirect()->route('index')->with('message', "ধন্যবাদ আপনার স্লিপ এন্ট্রি হয়েছে/ Gamca Slip Inserted has been Successfully");

            }else{
                $genslips = $request->all();
                $genslips ['passport_image'] = "Picture Did't Add";
                Generalslip::create($genslips);
                return redirect()->route('index')->with('message', "ধন্যবাদ আপনার স্লিপ এন্ট্রি হয়েছে/ Gamca Slip Inserted has been Successfully");

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
}
