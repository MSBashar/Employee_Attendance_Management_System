@php
    use Carbon\CarbonInterval;
@endphp

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
    <h4 class="page-title text-left">Check (In / Out)</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Check (In / Out)</a></li>

    </ol>
</div>
@endsection
@section('button')

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
                                        <td>Schedule</td>
                                        <td>:</td>
                                        <td>{{$employee->shift->name}}  {{ $employee->shift->id=='1' ? ' ( '.$employee->start_time->format('h:i A').'--'.$employee->end_time->format('h:i A').' )' : ' ( '.$employee->shift->start_time->format('h:i A').'--'.$employee->shift->end_time->format('h:i A').' )' }}</td>
                                    </tr>
                                    @isset($attendance->check_in_time)
                                    <tr>
                                        <td>Checked in at</td>
                                        <td>:</td>
                                        <td>{{ $attendance->check_in_time->format('h:i:s A') }} &nbsp; <span style="font-size:12px;color:red;">{{ $attendance->late_count > 900?'(You are late by '.CarbonInterval::seconds($attendance->late_count)->cascade()->forHumans().')':'' }}</span></td>
                                    </tr>
                                    @endisset

                                    @isset($attendance->check_out_time)
                                    <tr>
                                        <td>Checked out at</td>
                                        <td>:</td>
                                        <td>{{ $attendance->check_out_time->format('h:i:s A') }} &nbsp; <span style="font-size:12px;color:red;">{{ $attendance->overtime_count > 1800?'(Overtime today '.CarbonInterval::seconds($attendance->overtime_count)->cascade()->forHumans().')':'' }}</span></td>
                                    </tr>
                                    @endisset

                                    @if (!isset($attendance->check_out_time))
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <form action="{{ route('user.check.in.out') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-flat my-3" name="edit"><i class="fa fa-check-square-o"></i>
                                                    @isset($attendance->check_in_time)
                                                    Check Out
                                                    @else
                                                    Check In
                                                    @endisset
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


{{-- @include('includes.edit_account') --}}

@endsection


@section('script')
<!-- Responsive-table-->

@endsection
