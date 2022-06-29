<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class JobController extends Controller
{
    use HasRoles;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:job-create', ['only' => ['create','store']]);
        $this->middleware('permission:job-index|job-show', ['only' => ['index','show']]);
        $this->middleware('permission:job-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:job-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $jobs = Job::orderBy('deadline')->paginate(10);
        return view('dashboard.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::create(['name'=>'job-edit']);
//        $permission = Permission::findById(1);
        $role = Role::create(['name'=>'author']);
//        auth()->user()->assignRole($role);
//        $role->givePermissionTo($permission);

//        dd();
        $formType = 'create';

        return view('dashboard.jobs.create', compact('formType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $jobData = $request->all();
            Job::create($jobData);
            return redirect()->route('jobs.index')->with('success', "Data has been inserted successfully");
        }catch(QueryException $e) {
            return redirect()->route('jobs.create')->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
