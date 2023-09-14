<?php

namespace App\Http\Controllers\Common;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalEmp = 10;
        $ontimeEmp = 7;
        $latetimeEmp = 3;
        $percentageOntime = 70;
        //Dashboard statistics
        // $totalEmp =  count(Employee::all());
        // $AllAttendance = count(Attendance::whereAttendance_date(date("Y-m-d"))->get());
        // $ontimeEmp = count(Attendance::whereAttendance_date(date("Y-m-d"))->whereStatus('1')->get());
        // $latetimeEmp = count(Attendance::whereAttendance_date(date("Y-m-d"))->whereStatus('0')->get());

        // if($AllAttendance > 0){
        //     $percentageOntime = str_split(($ontimeEmp/ $AllAttendance)*100, 4)[0];
        // }else {
        //     $percentageOntime = 0 ;
        // }

        $data = [$totalEmp, $ontimeEmp, $latetimeEmp, $percentageOntime];

        if (auth()->user()->role == 'Admin') {
            return view('admin.index')->with(['data' => $data]);
        } else {
            return view('employee.index');
        }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
