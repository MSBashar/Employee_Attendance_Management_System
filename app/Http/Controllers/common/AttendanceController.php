<?php

namespace App\Http\Controllers\common;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Employee;
use App\Models\JobTitle;
use Barryvdh\DomPDF\Facade\Pdf;
use Nette\Utils\DateTime;
use App\Models\Attendance;
use App\Models\Department;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
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

                $q->with(['attendance'=>function($q) use ($request, $fDate, $tDate) {

                    $q->whereDate('created_at', '>=', $fDate)->whereDate('created_at', '<=', $tDate);

                } ]);

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

                $q->with(['attendance'=>function($q) {

                    $q->whereDate('created_at', '=', Carbon::today()->toDateString());

                } ]);

            } ])->get();
        }

        return view('admin.attendance', compact('users', 'departments', 'jobTitles', 'shifts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $time1 = Carbon::createFromFormat('Y-m-d H:i:s', '2023-04-01 00:00:00');
        // $time2 = Carbon::createFromFormat('Y-m-d H:i:s', '2023-04-02 23:59:59');
        // $duration1 = $time1->diffInSeconds($time2);
        // $duration2 = $time1->diff($time2)->format('%d %H:%I:%S');

        // return 'time1: '.$time1.' -- time2: '.$time2.' -- duration1: '.$duration1.' -- duration2: '.$duration2;


        $user_id = Auth::user()->id;

        $employee = Employee::where('user_id', $user_id)->first();
        $attendance = Attendance::where('employee_id', $employee->id)->whereDate('created_at', '=', Carbon::today()->toDateString())->first();

        return view('user.check', compact('employee', 'attendance'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $nowDateTime = date("Y-m-d H:i:s");
        $msg = null;

        if (Auth::user()->employee->shift->id=='1') {
            $startTime = Auth::user()->employee->start_time;
            $endTime = Auth::user()->employee->end_time;
        } else {
            $startTime = Auth::user()->employee->shift->start_time;
            $endTime = Auth::user()->employee->shift->end_time;
        }
        // // $diffInMinutes = $startTime->diffInMinutes($nowDateTime); $diffInMinutes = $startTime->diffInMinutes($nowDateTime); $diffInHours = $startTime->diffInHours($nowDateTime); $diffInDays = $startTime->diffInDays($nowDateTime);
        // $duration = $startTime->diff($nowDateTime)->format('%H:%I:%S');
        $late_count = $startTime->diffInSeconds($nowDateTime);

        $checkInOut = Attendance::with('employee')->where('employee_id', Auth::user()->employee->id)->whereDate('created_at', '=', Carbon::today()->toDateString())->first();

        if (isset($checkInOut)) {
            $hours_worked = $checkInOut->check_in_time->diffInSeconds($nowDateTime);
        }

        $overtime = $endTime->diffInSeconds($nowDateTime);

// return CarbonInterval::seconds($checkInOut->late_count)->cascade()->forHumans() .' -- -- -- '.$duration;



        if (!isset($checkInOut)) {
            $checkIn = Attendance::create([
                'employee_id' => Auth::user()->employee->id,
                'check_in_time' => $nowDateTime,
                'late_count' => $late_count,
            ]);
            $msg = 'Your check In Successful!';
        }
        else {
            $checkInOut->update([
                'check_out_time' => $nowDateTime,
                'hours_worked' => $hours_worked,
                'overtime_count' => $overtime,
            ]);
            $msg = 'Your check Out Successful!';
        }

        return redirect()->route('user.check')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }




    /**
     * Reports -------------------------------------------------------------------------------
     */

    public function reportIndex(Request $request)
    {
        $departments = Department::where('status', 1)->orderBy('id', 'asc')->get(['id', 'name']);
        $jobTitles = JobTitle::where('status', 1)->orderBy('id', 'asc')->get(['id', 'name']);
        $shifts = Shift::where('status', 1)->orderBy('name', 'asc')->get(['id', 'name']);

        $sDate = date("Y-m-d");
        if (isset($request->month_year)) {
            $sDate = $request->month_year;
        }

        $month=(int)date("m", strtotime($sDate));
        $year=(int)date("Y", strtotime($sDate));
        $totalDayInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);

        $fDate = $year.'-'.$month.'-'.'1';
        $tDate = $year.'-'.$month.'-'.$totalDayInMonth;

        if ($request->all()) {

            $users = User::with(['employee'=>function($q) use ($request) {

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

            })->where('id', '!=', 1)->get();

        } else {
            $users = User::with(['employee'])->where('id', '!=', 1)->get();
        }

        $usersAttendances=[];

        foreach ($users as $user) {

            $singleUserAttendances=[];
            $userData = $user->toArray();

            if (isset($user->employee)) {

                for ($i=1; $i <= $totalDayInMonth ; $i++) {

                    $attendanceData=[];

                    $createdAt = date("Y-m-d", strtotime($year.'-'.$month.'-'.$i));

                    $attendanceData = Attendance::where('employee_id', $user->employee->id)->
                                                  whereDate('created_at', '=', $createdAt)->first();

                    $closedDayYesNo = Attendance::whereDate('created_at', '=', $createdAt)->first();

                    if (isset($closedDayYesNo)) {
                        $closed = 0;
                    } else {
                        $closed = 1;
                    }

                    if (isset($attendanceData)) {
                        $attendanceData = $attendanceData->toArray();

                        $singleUserAttendances = array_merge($singleUserAttendances, array($createdAt=>$attendanceData));
                    } else {
                        $singleUserAttendances = array_merge($singleUserAttendances, array($createdAt=>['closed'=>$closed]));
                    }

                }

            }


            $userDataAttendances = array_merge($userData, array('attendance'=>$singleUserAttendances));
            array_push($usersAttendances, $userDataAttendances);

        };

        $usersAttendances = json_decode(json_encode($usersAttendances));

        // return $usersAttendances;
        // return $usersAttendances->last_name;
        // return $usersAttendances->employee->gender;
        // return date("Y-m-d",strtotime($usersAttendances->attendance{0}->check_in_time));
        // return count($usersAttendances->attendance);
        // foreach($usersAttendances->attendance as $attendance) {
        //     $checkInTimeStr = date("Y-m-d",strtotime($attendance->check_in_time));
        // }

        return view('admin.report.attendance', compact('month', 'year', 'totalDayInMonth', 'usersAttendances', 'departments', 'jobTitles', 'shifts'));

    }

    public function pdfGeneration() {

        $users = User::get();

        $pdf_view = Pdf::loadView('pdf.attendance', compact('users'));

        return $pdf_view->stream('myPDF.pdf');
    }
}
