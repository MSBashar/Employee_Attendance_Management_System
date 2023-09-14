<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class jobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobTitles = JobTitle::paginate(10);

        return view('admin.jobTitle', compact('jobTitles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//description
    {
        $request->validate([
            'name' => 'required|max:255|unique:job_titles,name',
        ]);
        $jobTitle = JobTitle::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.jobTitles')->with('success', 'Job Title Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobTitle $jobTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobTitle $jobTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobTitle $jobTitle)
    {
        $request->validate([
            'name' => 'required|max:255|unique:job_titles,name,'.$jobTitle->id,
        ]);
        $jobTitle->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.jobTitles')->with('success', 'Job Title Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobTitle $jobTitle)
    {
        $jobTitle->delete();

        return redirect()->route('admin.jobTitles')->with('success','Job Title Record has been Deleted successfully !');
    }
}
