@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Job Titles</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Employees</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Job Title List</a></li>

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
                                <div class="card">
                                    <div class="card-body">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                    <thead>
                                                    <tr>
                                                        <th data-priority="1" style="width: 40px;">ID</th>
                                                        <th data-priority="2">Name</th>
                                                        <th data-priority="6" style="width: 70px;">Status</th>
                                                        <th data-priority="7" style="width: 103px;">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $jobTitles as $jobTitle)

                                                        <tr>
                                                            <td>{{$jobTitle->id}}</td>
                                                            <td>{{$jobTitle->name }}</td>
                                                            <td>{{$jobTitle->status?'Active':'Inactive'}}</td>
                                                            <td>
                                                                <a href="#edit{{$jobTitle->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                                                <a href="#delete{{$jobTitle->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


@foreach( $jobTitles as $jobTitle)
@include('includes.edit_delete_jobTitle')
@endforeach

@include('includes.add_jobTitle')

@endsection


@section('script')
<!-- Responsive-table-->

@endsection
