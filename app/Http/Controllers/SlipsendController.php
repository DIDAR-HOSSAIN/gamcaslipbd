<?php

namespace App\Http\Controllers;

use App\Slipsend;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use DB;
//use Intervention\Image\Image;
use Image;
class SlipsendController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:slipsend-list|message-show', ['only' => ['index','show']]);
        $this->middleware('permission:slipsend-create', ['only' => ['create','store']]);
        $this->middleware('permission:slipsend-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:slipsend-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slipsends = Slipsend::orderBy('id','desc')->paginate(15);
        return view('dashboard.slipsends.index', compact('slipsends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('dashboard.slipsends.create', compact('formType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $slipsends = $request->all();
            if ($request->hasFile('gamca_slip')){
                $pictureName = time().('_').$request->gamca_slip->getClientoriginalName();
                $request->gamca_slip->move('dashboard/images/slips',$pictureName);

                $slipsends ['gamca_slip'] = $pictureName;
                Slipsend::create($slipsends);
                return redirect()->route('slipsends.create')->with('message', "Gamca Slip Added Successfully");
            }else{
                $slipsends = $request->all();
                $slipsends ['gamca_slip'] = "";
                Slipsend::create($slipsends);
                return redirect()->route('slipsends.create')->with('message', "Gamca Slip Added Successfully");
            }
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slipsend  $slipsend
     * @return \Illuminate\Http\Response
     */
    public function show(Slipsend $slipsend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slipsend  $slipsend
     * @return \Illuminate\Http\Response
     */
    public function edit(Slipsend $slipsend)
    {
        $formType = 'edit';
        return view('dashboard.slipsends.create', compact('formType', 'slipsend'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slipsend  $slipsend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slipsend $slipsend)
    {
        try {
            $slipsends = $request->all();
            if ($request->hasFile('gamca_slip')){
                $pictureName = time().('_').$request->gamca_slip->getClientoriginalName();
                if(!empty($slipsend->gamca_slip) && file_exists(public_path("dashboard/images/slips/$slipsend->gamca_slip"))){
                    unlink(public_path("dashboard/images/slips/$slipsend->gamca_slip"));
                };
                $request->gamca_slip->move('dashboard/images/slips/',$pictureName);
                $slipsends['gamca_slip'] = $pictureName;
            }
            $slipsend->update($slipsends);
            return redirect()->route('slipsends.index')->with('message', "Gamca Slip Updated has been Successfully");
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slipsend  $slipsend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slipsend $slipsend)
    {
        try{
            if(!empty($slipsend->gamca_slip) && file_exists(public_path("dashboard/images/slips/$slipsend->gamca_slip"))){
                unlink(public_path("dashboard/images/slips/$slipsend->gamca_slip"));
            };
            $slipsend->delete();
            return redirect()->route('slipsends.index')->with('message', 'Data has been deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $slipsends = DB::table ('slipsends')->orderBy('id','desc')->where('mob_no','like','%'.$search.'%')->paginate(15);

        return view('dashboard.slipsends.index',['slipsends' =>$slipsends]);
    }


//for frontend
    public function searches(Request $request)
    {
        $searches = $request->get('searches');
        $slipsends = DB::table ('slipsends')->orderBy('id','desc')->where('mob_no','like','%'.$searches.'%')->paginate(15);

        return view('front-end.slipsends.index',['slipsends' =>$slipsends]);
    }


}
