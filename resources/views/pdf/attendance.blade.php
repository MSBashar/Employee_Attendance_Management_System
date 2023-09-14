@php
    use Carbon\CarbonInterval;
@endphp

@extends('layouts.master')

@section('css')

@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Attendance PDF</h4>
    </div>
@endsection

@section('content')


<p style="margin:5px 8px; font-size: 12px; font-weight: 700; letter-spacing: 1.2px"><span style="color:rgb(3, 114, 49)">P = Present</span>, &nbsp; <span style="color:rgb(212, 1, 1)">A = Absent</span>, &nbsp; <span style="color:rgb(212, 1, 1)">L = Late</span>, &nbsp; <span style="color:rgb(209 137 5)">AL = Absent by Late</span>, &nbsp; <span style="color:rgb(73, 26, 246)">Le = Leave</span>, &nbsp; <span style="color:rgb(111, 154, 129)">H = Holiday.</span></p>
<table style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead>
        <tr>
            <th style="max-width:80px; text-align: center">ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
                <tr>
                    <td style="text-align: center">{{$user->id}}</td>
                    <td style="white-space: nowrap;">{{$user->first_name.' '.$user->last_name}}</td>

                </tr>
        @endforeach

    </tbody>
</table>

@endsection


@section('script')

@endsection
