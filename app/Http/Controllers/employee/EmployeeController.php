<?php

namespace App\Http\Controllers\Employee;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departments = Department::where('status', 1)->orderBy('id', 'asc')->get(['id', 'name']);
        $jobTitles = JobTitle::where('status', 1)->orderBy('id', 'asc')->get(['id', 'name']);
        $shifts = Shift::where('status', 1)->orderBy('name', 'asc')->get(['id', 'name']);

        $fDate = date("Y-m-d");
        if (isset($request->from_date)) {
            $fDate = $request->from_date;
        }
        $tDate = $fDate;
        if (isset($request->to_date)) {
            $tDate = $request->to_date;
        }

        if ($request->all()) {

            $users = User::with(['employee'=>function($q) use ($request, $fDate, $tDate) {

                $q->with('user', 'department', 'jobTitle', 'shift');

                if ($request->nid_number) {
                    $q->where('nid_number', 'LIKE', '%'.$request->nid_number.'%');
                }

                if ($request->gender) {
                    $q->where('gender', $request->gender);
                }

                if ($request->department_id) {
                    $q->where('department_id', $request->department_id);
                }

                if ($request->job_title_id) {
                    $q->where('job_title_id', $request->job_title_id);
                }

                if ($request->shift_id) {
                    $q->where('shift_id', $request->shift_id);
                }

                if ($request->status) {
                    $q->where('status', $request->status);
                }

            } ])->where(function ($q) use($request) {

                if ($request->first_name) {
                    $q->where('first_name', 'LIKE', '%'.$request->first_name.'%');
                }

                if ($request->last_name) {
                    $q->where('last_name', 'LIKE', '%'.$request->last_name.'%');
                }

                if ($request->email) {
                    $q->where('email', 'LIKE', '%'.$request->email.'%');
                }

            })->get();

        } else {
            $users = User::with(['employee'=>function($q) {

                $q->with('user', 'department', 'jobTitle', 'shift');

            } ])->get();
        }

        return view('admin.employee', compact('users', 'departments', 'jobTitles', 'shifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|min:3|max:20',
            'role' => 'required',
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            "email_verified_at" => now(),
            'password' => Hash::make($request->password),
            // 'remember_token' => Str::random(10),
            'role' => $request->role,
            'status' => $request->status,
        ]);
        if ($user) {
            if ($request->nid_number) {
                $request->validate([
                    'nid_number' => 'required|max:30',
                    'blood_group' => 'required|max:10',
                    'hire_date' => 'required',
                    'gender' => 'required||max:30',
                    'date_of_birth' => 'required',
                    'department_id' => 'required',
                    'job_title_id' => 'required',
                ]);
                $employee = Employee::create([
                    'user_id' => $user->id,
                    'department_id' => $request->department_id,
                    'job_title_id' => $request->job_title_id,
                    'shift_id' => $request->shift_id,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    // 'photo' => $request->photo,
                    'date_of_birth' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'nid_number' => $request->nid_number,
                    'blood_group' => $request->blood_group,
                    'hire_date' => $request->hire_date,
                    'leave_date' => $request->leave_date,
                    'note' => $request->note,
                    'status' => $request->status,
                ]);
            } else {
                $employee = Employee::create([
                    'user_id' => $user->id,
                    'department_id' => 1, // $request->department_id,
                    'job_title_id' => 1, // $request->job_title_id,
                    'shift_id' => 1, // $request->shift_id,
                    'gender' => '',
                    'hire_date' => now(),
                    'status' => $request->status,
                ]);
            }
        }

        return redirect()->route('admin.employees')->with('success', 'Employee Created Successfully!');
    }

    /**
     * Display the user account resource.
     */
    public function showAccount()
    {
        $employee = Employee::with('user', 'department', 'jobTitle', 'shift')->where('status', 1)->where('user_id', Auth::user()->id)->firstOrFail();

        return view('user.account', compact('employee'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $user = User::where('id', $employee->user_id)->first();

        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            // 'email' => 'required|max:255|unique:users,email,'.$user->id,
            'role' => 'required',
        ]);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // 'email' => $request->email,
            // "email_verified_at" => now(),
            'role' => $request->role,
            'status' => $request->status,
        ]);
        if (isset($request->password)) {
            $request->validate([
                'password' => 'required|min:3|max:20'
            ]);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $request->validate([
            'nid_number' => 'required|max:30',
            'blood_group' => 'required|max:10',
            'hire_date' => 'required',
            'gender' => 'required||max:30',
            'date_of_birth' => 'required',
            'department_id' => 'required',
            'job_title_id' => 'required',
        ]);
        $employee->update([
            'department_id' => $request->department_id,
            'job_title_id' => $request->job_title_id,
            'shift_id' => $request->shift_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            // 'photo' => $request->photo,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'nid_number' => $request->nid_number,
            'blood_group' => $request->blood_group,
            'hire_date' => $request->hire_date,
            'leave_date' => $request->leave_date,
            'note' => $request->note,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.employees')->with('success', 'Employee Updated Successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAccount(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);
        if (isset($request->password)) {
            $request->validate([
                'password' => 'required|min:3|max:20'
            ]);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $request->validate([
            'nid_number' => 'required|max:30',
            'blood_group' => 'required|max:10',
            'gender' => 'required||max:30',
            'date_of_birth' => 'required',
        ]);
        $employee->update([
            // 'photo' => $request->photo,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'nid_number' => $request->nid_number,
            'blood_group' => $request->blood_group,
        ]);

        return redirect()->route('user.account')->with('success', 'Account & Profile Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('admin.employees')->with('success','Employee Record has been Deleted successfully !');
    }
}
