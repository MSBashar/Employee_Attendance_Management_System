@php
    use Carbon\CarbonInterval;
@endphp

@extends('layouts.master')

@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Attendance Report</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Attendance Report</a></li>


        </ol>
    </div>
@endsection
@section('button')
    {{-- <a href="attendance/assign" class="btn btn-primary btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New</a> --}}
@endsection

@section('content')
@include('includes.flash')


    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-bottom: 0;">
                <div class="card-body">
                    <form class="form-horizontal" method="GET" action="{{ route('admin.report.attendances') }}">
                        <div class="row">
                            <div class="col-md-3">
                                <h4>View Attendance</h4>
                                <p>By Filtering</p>
                            </div>
                            <div class="col-md-9">
                                <div class="row form-group">
                                    <div class="col-md-3 mb-2 mb-2">
                                        <label for="month_year" class="col-sm-12 control-label">Month</label>
                                        <input type="date" class="form-control" id="month_year" name="month_year" value="{{ request()->month_year ?? '' }}">
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label for="first_name" class="col-sm-12 control-label">First Name</label>
                                        <input type="text" class="form-control " id="first_name" name="first_name" value="{{ request()->first_name ?? '' }}">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="last_name" class="col-sm-12 control-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ request()->last_name ?? '' }}">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="email" class="col-sm-12 control-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ request()->email ?? '' }}">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="nid_number" class="col-sm-12 control-label">NID Number</label>
                                        <input type="text" class="form-control" id="nid_number" name="nid_number" value="{{ request()->nid_number ?? '' }}">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="gender" class="col-sm-12 control-label">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option  value="">--Select--</option>
                                            <option value="male" {{ request()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ request()->gender == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="transgender" {{ request()->gender == 'transgender' ? 'selected' : '' }}>Transgender</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="department_id" class="col-sm-12 control-label">Department</label>
                                        <select class="form-control" id="department_id" name="department_id">
                                            <option  value="">--Select--</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}" {{ request()->department_id == $department->id ? 'selected' : '' }}>{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="job_title_id" class="col-sm-12 control-label">Job Title</label>
                                        <select class="form-control" id="job_title_id" name="job_title_id">
                                            <option  value="">--Select--</option>
                                            @foreach ($jobTitles as $jobTitle)
                                            <option value="{{$jobTitle->id}}" {{ request()->job_title_id == $jobTitle->id ? 'selected' : '' }}>{{$jobTitle->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="shift_id" class="col-sm-12 control-label">Shift</label>
                                        <select class="form-control" id="shift_id" name="shift_id">
                                            <option value="" >--Select--</option>
                                            @foreach ($shifts as $shift)
                                            <option value="{{$shift->id}}" {{ request()->shift_id == $shift->id ? 'selected' : '' }}>{{$shift->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="status" class="col-sm-12 control-label">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option  value="">All</option>
                                            <option value="1" {{ request()->status == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="2" {{ request()->status == '2' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>


                                    <div class="col-md-3 mb-2">
                                        <label for="to_date" class="col-sm-12 control-label">&nbsp;</label>
                                        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-search" aria-hidden="true"></i>&nbsp; Search&nbsp;</button>
                                        <a href="{{ route('admin.report.attendances') }}" class="btn btn-primary btn-flat"> Reset </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.report.pdf.convert') }}" class="btn btn-success btn-flat" style="float: right; margin-bottom: 5px;"> Create PDF </a>
                    <div class="table">
                        <div class="table-responsive mb-0">
                            <p style="margin:5px 8px; font-size: 12px; font-weight: 700; letter-spacing: 1.2px"><span style="color:rgb(3, 114, 49)">P = Present</span>, &nbsp; <span style="color:rgb(212, 1, 1)">A = Absent</span>, &nbsp; <span style="color:rgb(212, 1, 1)">L = Late</span>, &nbsp; <span style="color:rgb(209 137 5)">AL = Absent by Late</span>, &nbsp; <span style="color:rgb(73, 26, 246)">Le = Leave</span>, &nbsp; <span style="color:rgb(111, 154, 129)">H = Holiday.</span></p>
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th style="max-width:80px; text-align: center">ID</th>
                                        <th>Name</th>
                                        @for ($i = 1; $i <= $totalDayInMonth; $i++)
                                            <th style="width: 30px; padding: 0; text-align: center; vertical-align: middle">{{$i}}</th>
                                        @endfor
                                        <th style="width: 98px; text-align: center">Calculation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @if (count($users)>0) totalDayInMonth --}}
                                    @foreach ($usersAttendances as $user)
                                            <tr>
                                                @php
                                                    $present=0;
                                                    $abcent=0;
                                                    $late=0;
                                                    $abcentByLate=0;
                                                @endphp
                                                <td style="text-align: center">{{$user->id}}</td>
                                                <td style="white-space: nowrap;">{{$user->first_name.' '.$user->last_name}}</td>

                                                @isset ($user->attendance)
                                                    @foreach ($user->attendance as $att)
                                                        {{-- @for ($i = 1; $i <= $totalDayInMonth; $i++) --}}
                                                            <td style="padding: 0; text-align: center; vertical-align: middle">
                                                                @isset ($att->absent_type)
                                                                    @switch($att->absent_type)

                                                                        @case(0)
                                                                        @php
                                                                            $abcent++;
                                                                        @endphp
                                                                        <span style="color:rgb(212, 1, 1)">{{'A'}}</span>
                                                                            @break
                                                                        @case(1)
                                                                        @php
                                                                            $present++;
                                                                        @endphp
                                                                        <span style="color:rgb(3, 114, 49)">{{'P'}}</span>
                                                                            @break
                                                                        @case(2)
                                                                        @php
                                                                            $late++;
                                                                        @endphp
                                                                        <span style="color:rgb(212, 1, 1)">{{'L'}}</span>
                                                                            @break

                                                                        @default
                                                                        @php
                                                                            $abcent++;
                                                                        @endphp
                                                                        <span style="color:rgb(212, 1, 1)">{{'A'}}</span>

                                                                    @endswitch
                                                                @else
                                                                    @isset ($att->closed)
                                                                        @switch($att->closed)

                                                                            @case(0)
                                                                            @php
                                                                                $abcent++;
                                                                            @endphp
                                                                            <span style="color:rgb(212, 1, 1)">{{'A'}}</span>
                                                                                @break
                                                                            @case(1)
                                                                            <span style="display: block; font-size: 18px; font-weight: 700; padding-bottom: 7px">{{'.'}}</span>
                                                                                @break

                                                                            @default
                                                                            @php
                                                                                $abcent++;
                                                                            @endphp
                                                                            <span style="color:rgb(212, 1, 1)">{{'A'}}</span>

                                                                        @endswitch
                                                                    @else
                                                                    @php
                                                                        $abcent++;
                                                                    @endphp
                                                                        <span style="color:rgb(212, 1, 1)">{{'A'}}</span>
                                                                    @endisset
                                                                @endisset
                                                            </td>
                                                        {{-- @endfor --}}
                                                    @endforeach
                                                @endisset

                                                <td style="font-size:12px;height: 53px; padding: 0 2px 0 6px; text-align: center; vertical-align: middle;">
                                                    @php
                                                        if ($present>0 && $late==0) {
                                                            echo '<span style="color:rgb(3, 114, 49)">'.$present.'(P)</span>';
                                                        }
                                                        if ($present>0 && $late>0) {
                                                            echo '<span style="color:rgb(3, 114, 49)">'.$present.'(P)</span> + <span style="color:rgb(212, 1, 1)">'.$late.'(L)</span> = '.($present + $late);
                                                        }
                                                        if ($abcent>0) {
                                                            echo '<span style="color:rgb(212, 1, 1)"><br>'.$abcent.'(A)</span>';
                                                        }
                                                    @endphp
                                                </td>

                                            </tr>
                                    @endforeach
                                {{-- @endif --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection


@section('script')

@endsection
