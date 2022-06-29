<?php

namespace App\Http\Controllers;
use DB;
use App\City;
use App\Country;
use App\Generalslip;
use App\VisaType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;
class GeneralslipController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:genslip-list|genslip-show', ['only' => ['index','show']]);
        $this->middleware('permission:genslip-create', ['only' => ['create','store']]);
        $this->middleware('permission:genslip-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:genslip-delete', ['only' => ['destroy']]);
    }


//    public function __construct()
//    {
//    $this->middleware(['auth', 'clearance'])->except('create', 'store');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genslips = Generalslip::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.general-slips.index',compact('genslips'));
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
        return view('dashboard.general-slips.create',compact('cities' , 'countries' , 'visatype'));
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

                return redirect()->route('generalslips.create')->with('message', "Gamca Slip Inserted has been Successfully");

            }else{
                $genslips = $request->all();
                $genslips ['passport_image'] = "Picture Did't Add";
                Generalslip::create($genslips);
                return redirect()->route('generalslips.create')->with('message', "Gamca Slip Inserted has been Successfully");

            }

        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Generalslip  $generalslip
     * @return \Illuminate\Http\Response
     */
    public function show(Generalslip $generalslip)
    {
//        $genslips = Generalslip::findorfail($generalslip);
        return view('dashboard.general-slips.show',compact('generalslip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Generalslip  $generalslip
     * @return \Illuminate\Http\Response
     */
    public function edit(Generalslip $generalslip)
    {
        $cities = City::orderBy('city_name')->pluck('city_name', 'city_name');
        $countries = Country::orderBy('traveling_country')->pluck('traveling_country', 'traveling_country');
        $cities = City::orderBy('city_name')->pluck('city_name', 'city_name');
        $visatype = VisaType::orderBy('visa_type')->pluck('visa_type', 'visa_type');
//        $genslips = Generalslip::findorfail($generalslip)->First();
        return view('dashboard.general-slips.edit', compact('generalslip','cities','countries','visatype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Generalslip  $generalslip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generalslip $generalslip)
    {
        $this->validate($request, [
            'city_name' => 'required',
            'traveling_country' => 'required',
            'visa_type' => 'required',
            'mob_no' => 'required',
        ]);

        try {
            $data = $request->all();
            if ($request->hasFile('passport_image')) {
                $passport_image = $request->file('passport_image');
                $file_name = time() . ('_') . $passport_image->getClientOriginalName();
                $image_resize = Image::make($passport_image->getRealPath());
                $image_resize->resize(200, 200);
                unlink(public_path("dashboard/images/passports/gen-passports/$generalslip->passport_image"));
                $image_resize->save('dashboard/images/passports/gen-passports/' . $file_name);
                $data ['passport_image'] = $file_name;
            }
            $generalslip->update($data);
            return redirect()->route('generalslips.index')->with('message', "Data has been updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Generalslip  $generalslip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generalslip $generalslip)
    {
        try{
            if(!empty($generalslip->passport_image) && file_exists(public_path("dashboard/images/passports/gen-passports/$generalslip->passport_image"))){
                unlink(public_path("dashboard/images/passports/gen-passports/$generalslip->passport_image"));
            };
            $generalslip->delete();
            return redirect()->route('generalslips.index')->with('message', 'Data has been deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    //search start
    public function search(Request $request)
    {
        $search = $request->get('search');
        $genslips = DB::table('generalslips')->orderBy('id','desc')->where('mob_no','like','%'.$search.'%')->paginate(15);
        return view('dashboard.general-slips.index',['genslips' =>$genslips]);

    }


}
