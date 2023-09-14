@extends('layouts.master')

@section('css')
<style>
    td {
        padding:6px 0;
    }
</style>
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Account & Profile</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Account & Profile</a></li>

    </ol>
</div>
@endsection
@section('button')
<a href="#edit{{$employee->id}}" data-toggle="modal" class="btn btn-primary btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>


@endsection

@section('content')
@include('includes.flash')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('assets/images/profile1.jpg')}}" class="img-thumbnail rounded img-fluid" style="width: 100%;" alt="{{$employee->user->first_name.' '.$employee->user->last_name }}">
                        </div>
                        <div class="col-8">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="min-width: 120px;">Name</td>
                                        <td style="width: 15px;">:</td>
                                        <td>{{$employee->user->first_name.' '.$employee->user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{$employee->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Member Since</td>
                                        <td>:</td>
                                        <td>{{$employee->created_at->format('Y-m-d')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td>:</td>
                                        <td>{{$employee->department->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Job Title</td>
                                        <td>:</td>
                                        <td>{{$employee->jobTitle->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Schedule</td>
                                        <td>:</td>
                                        <td>{{ $employee->shift->name=='Individual'?$employee->shift->name.' ( '.$employee->start_time->format('h:i A').'--'.$employee->end_time->format('h:i A').' )':$employee->shift->name.' ( '.$employee->shift->start_time->format('h:i A').'--'.$employee->shift->end_time->format('h:i A').' )' }}</td>
                                    </tr>
                                    <tr>
                                        <td>NID Number</td>
                                        <td>:</td>
                                        <td>{{$employee->nid_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>:</td>
                                        <td>{{$employee->date_of_birth}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td>{{$employee->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td>Blood Group</td>
                                        <td>:</td>
                                        <td>{{$employee->blood_group}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@include('includes.edit_account')

@endsection


@section('script')
<!-- Responsive-table-->

@endsection
