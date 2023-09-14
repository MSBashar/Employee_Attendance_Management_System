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
        <h4 class="page-title text-left">Attendance</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Attendance</a></li>


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
                    <form class="form-horizontal" method="GET" action="{{ route('admin.attendances') }}">
                        <div class="row">
                            <div class="col-md-3">
                                <h4>View Attendance</h4>
                                <p>By Filtering</p>
                            </div>
                            <div class="col-md-9">
                                <div class="row form-group">
                                    <div class="col-md-3 mb-2 mb-2">
                                        <label for="from_date" class="col-sm-12 control-label">From Date</label>
                                        <input type="date" class="form-control" id="from_date" name="from_date" value="{{ request()->from_date ?? '' }}">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="to_date" class="col-sm-12 control-label">To Date</label>
                                        <input type="date" class="form-control" id="to_date" name="to_date" value="{{ request()->to_date ?? '' }}">
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
                                        <a href="{{ route('admin.attendances') }}" class="btn btn-primary btn-flat"> Reset </a>
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

                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th data-priority="1">Date</th>
                                        <th data-priority="2">ID</th>
                                        <th data-priority="3">Name</th>
                                        <th data-priority="4">Department & Job Title</th>
                                        <th data-priority="5">Schedule</th>
                                        <th data-priority="6">Time In</th>
                                        <th data-priority="7">Late Count</th>
                                        <th data-priority="8">Time Out</th>
                                        <th data-priority="9">Overtime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @if (count($users)>0) --}}
                                    @foreach ($users as $user)
                                        @isset ($user->employee)
                                            @isset ($user->employee->attendance)
                                                @foreach ($user->employee->attendance as $att)
                                                    <tr>
                                                        <td>{{ $att->created_at->format('Y-m-d') }}</td>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                                        <td>{!! $user->employee->department->name.nl2br(e('
                                                            ')).$user->employee->jobTitle->name !!}</td>
                                                        <td>
                                                            {{ $user->employee->shift->name }}
                                                            @if ($att->late_count > 900)
                                                            <span class="badge badge-danger badge-pill float-right">Late</span>
                                                            @else
                                                            <span class="badge badge-primary badge-pill float-right">On Time</span>
                                                            @endif
                                                            <br>
                                                            {{$user->employee->shift->id=='1'?' ( '.$user->employee->start_time->format('h:i A').'--'.$user->employee->end_time->format('h:i A').' )':' ( '.$user->employee->shift->start_time->format('h:i A').'--'.$user->employee->shift->end_time->format('h:i A').' )'}}
                                                        </td>
                                                        <td>{{ $att->check_in_time->format('h:i:s A') }} </td>
                                                        {{-- <td>{{ $att->late_count > 900 ? CarbonInterval::seconds($att->late_count)->cascade()->forHumans() : 0 }}</td> --}}
                                                        <td>
                                                            @php
                                                                $seconds=0;$H=0;$i=0;$s=0;
                                                                $seconds = $att->late_count;
                                                                $H = floor($seconds / 3600);
                                                                $i = ($seconds / 60) % 60;
                                                                $s = $seconds % 60;
                                                                // echo sprintf("%02d:%02d:%02d", $H, $i, $s);
                                                                # 02:22:05
                                                            @endphp
                                                            {{ $att->late_count > 900 ? sprintf("%02d:%02d:%02d", $H, $i, $s) : 0 }}<br><span class="text-muted">{{$att->late_count > 900 ? 'h:m:s' : ''}}</span>
                                                        </td>
                                                        <td>{{ $att->check_out_time != null?$att->check_out_time->format('h:i:s A'):'' }}</td>
                                                        {{-- <td>{{ $att->overtime_count > 1800 ? CarbonInterval::seconds($att->overtime_count)->cascade()->forHumans() : 0 }}</td> --}}
                                                        <td>
                                                            @php
                                                                $seconds=0;$H=0;$i=0;$s=0;
                                                                $seconds = $att->late_count;
                                                                $H = floor($seconds / 3600);
                                                                $i = ($seconds / 60) % 60;
                                                                $s = $seconds % 60;
                                                                // echo sprintf("%02d:%02d:%02d", $H, $i, $s);
                                                                # 02:22:05
                                                            @endphp
                                                            {{ $att->overtime_count > 1800 ? sprintf("%02d:%02d:%02d", $H, $i, $s) : 0 }}<br><span class="text-muted">{{$att->overtime_count > 1800 ? 'h:m:s' : ''}}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                        @endisset
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
    <!-- Responsive-table-->
    <script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>

@endsection

@section('script')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
