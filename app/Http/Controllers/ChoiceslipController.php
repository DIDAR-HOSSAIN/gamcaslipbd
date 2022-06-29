<?php

namespace App\Http\Controllers;
use App\VisaType;
use DB;
use App\Center;
use App\Choiceslip;
use App\City;
use App\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;
class ChoiceslipController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware(['permission:choice-create|choice-edit|choice-list|choice-show|choice-delete'])->except('create','store');
//    }


    public function __construct()
    {
        $this->middleware('permission:choice-list|choice-show', ['only' => ['index','show']]);
        $this->middleware('permission:choice-create', ['only' => ['create','store']]);
        $this->middleware('permission:choice-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:choice-delete', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Choiceslip::pluck('center_name');

        $choiceslips = Choiceslip::with('city', 'center')->paginate(20);
        return view('dashboard.choice-slips.index', compact('choiceslips'));
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
//      $countries = Country::all();
        $visatype = VisaType::orderBy('id')->pluck('visa_type', 'visa_type');
        return view('dashboard.choice-slips.create', compact('formType', 'cities', 'centers','countries','visatype'));
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
        'gender' => 'required',
        'marital_status' => 'required',
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
                return redirect()->route('choiceslips.create')->with('message', "Choice Slip Inserted has been Successfully");

            }else{
                $data = $request->all();
                $data ['passport_image'] = "Picture Did't Add";
                Choiceslip::create($data);
                return redirect()->route('choiceslips.create')->with('message', "Choice Slip Inserted has been Successfully");

            }

        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Choiceslip  $choiceslip
     * @return \Illuminate\Http\Response
     */
    public function show(Choiceslip $choiceslip)
    {
        return view('dashboard.choice-slips.show', compact('choiceslip'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Choiceslip  $choiceslip
     * @return \Illuminate\Http\Response
     */
    public function edit(Choiceslip $choiceslip)
    {
        $formType = 'edit';
        $cities = City::orderBy('city_name')->pluck('city_name', 'city_name');
        $centers = Center::orderBy('center_name')->pluck('center_name', 'center_name');
//        $centers = [];
        $countries = Country::orderBy('id')->pluck('traveling_country', 'traveling_country');
        $visatype = VisaType::orderBy('id')->pluck('visa_type', 'visa_type');
        return view('dashboard.choice-slips.create', compact('formType', 'choiceslip', 'cities', 'centers','countries','visatype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Choiceslip  $choiceslip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Choiceslip $choiceslip)
    {

        $this->validate($request, [
            'city_name' => 'required',
            'center_name' => 'required',
            'traveling_country' => 'required',
            'visa_type' => 'required',
            'mob_no' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
        ]);


        try{
            $data = $request->all();
            if ($request->hasFile('passport_image')) {
                $passport_image = $request->file('passport_image');
                $file_name = time() . ('_') . $passport_image->getClientOriginalName();
                $image_resize = Image::make($passport_image->getRealPath());
                $image_resize->resize(200, 200);
                unlink(public_path("dashboard/images/passports/choice-passports/$choiceslip->passport_image"));
                $image_resize->save('dashboard/images/passports/choice-passports/' . $file_name);
                $data ['passport_image'] = $file_name;
            }
            $choiceslip->update($data);
            return redirect()->route('choiceslips.index')->with('message', "Data has been updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Choiceslip  $choiceslip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Choiceslip $choiceslip)
    {
        try{
            if(!empty($choiceslip->passport_image) && file_exists(public_path("dashboard/images/passports/choice-passports/$choiceslip->passport_image"))){
                unlink(public_path("dashboard/images/passports/choice-passports/$choiceslip->passport_image"));
            };
            $choiceslip->delete();
            return redirect()->route('choiceslips.index')->with('message', 'Data has been deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function getCentre(Request $request){
//        dd($request->all());
        $centers = Center::where("city_name",$request->city_name)->pluck("center_name","center_name");

//        dd($centers);
        return view('dashboard.choice-slips.center',compact('centers'));
    }



    public function search(Request $request)
    {
        $search = $request->get('search');
        $choiceslips = DB::table ('choiceslips')->orderBy('id','desc')->where('mob_no','like','%'.$search.'%')->paginate(15);

        return view('dashboard.choice-slips.index',['choiceslips' =>$choiceslips]);
    }
}
