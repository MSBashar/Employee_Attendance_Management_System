@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Employees</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Employees</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Employees List</a></li>

    </ol>
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add</a>


@endsection

@section('content')
@include('includes.flash')

                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="margin-bottom: 0;">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="GET" action="{{ route('admin.employees') }}">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h4>View Employees</h4>
                                                    <p>By Filtering</p>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="row form-group">
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
                                                            <a href="{{ route('admin.employees') }}" class="btn btn-primary btn-flat"> Reset </a>
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
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                    <thead>
                                                    <tr>
                                                        <th data-priority="1" style="width: 40px;">ID</th>
                                                        <th data-priority="2">Name</th>
                                                        <th data-priority="3">Department & Job Title</th>
                                                        <th data-priority="5">Schedule</th>
                                                        <th data-priority="6">Member Since</th>
                                                        <th data-priority="6" style="width: 70px;">Status</th>
                                                        <th data-priority="7" style="width: 103px;">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $user)
                                                            @isset ($user->employee)
                                                                <tr>
                                                                    <td>{{$user->employee->id}}</td>
                                                                    <td>{{$user->first_name.' '.$user->last_name }}</td>
                                                                    <td>{!! $user->employee->department->name.nl2br(e('
                                                                        ')).$user->employee->jobTitle->name !!}</td>
                                                                    <td>{!! $user->employee->shift->id=='1'?$user->employee->shift->name.nl2br(e('
                                                                        ')) .$user->employee->start_time->format('h:i A').'--'.$user->employee->end_time->format('h:i A'):$user->employee->shift->name.nl2br(e('
                                                                        ')) .$user->employee->shift->start_time->format('h:i A').'--'.$user->employee->shift->end_time->format('h:i A') !!}</td>
                                                                    <td>{{$user->employee->created_at->format('Y-m-d')}}</td>
                                                                    <td>{!! $user->employee->status?'Active'.nl2br(e('
                                                                        ')). $user->role:'Inactive'.nl2br(e('
                                                                        ')). $user->role !!}</td>
                                                                    <td>

                                                                        <a href="#edit{{$user->employee->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                                                        <a href="#delete{{$user->employee->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                                                    </td>
                                                                </tr>
                                                            @endisset
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


@foreach ($users as $user)
    @isset ($user->employee)
        @include('includes.edit_delete_employee')
    @endisset
@endforeach

@include('includes.add_employee')

@endsection


@section('script')
<!-- Responsive-table-->

@endsection
