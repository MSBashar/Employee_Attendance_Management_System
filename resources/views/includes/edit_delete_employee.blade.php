<!-- Edit -->
<div class="modal fade" id="edit{{ $user->employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <b style="font-size: 16px;">Edit Employee</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.employee.update', $user->employee->id) }}">
                @csrf
                <div class="modal-body">
                    <b style="border-bottom: 2px solid #e7e7e7">&nbsp; &nbsp; Account's Information &nbsp; &nbsp;</b>
                    <div class="card-body text-left">

                        <input type="hidden" name="_method" value="PUT">

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="first_name" class="col-sm-12 control-label">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $user->first_name }}" required />
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="col-sm-12 control-label">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $user->last_name }}" required />
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email" class="col-sm-12 control-label">Email</label>
                                <input disabled type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required >
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="password" class="col-sm-12 control-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="col-sm-12 control-label">Role</label>
                                <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                                    <option {{ $user->role == 'Admin' ? 'selected' : '' }} value="Admin">Employee + Admin</option>
                                    <option {{ $user->role == 'Employee' ? 'selected' : '' }} value="Employee">Employee</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="status" class="col-sm-12 control-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option {{ $user->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $user->status == 2 ? 'selected' : '' }} value="2">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="col-sm-12 control-label">&nbsp; &nbsp;</label>
                                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
                                    Update</button>
                                <button type="button" class="btn btn-secondary btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i>
                                    Close</button>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <b style="border-bottom: 2px solid #e7e7e7">&nbsp; &nbsp; Portfolio &nbsp; &nbsp;</b>
                    <div class="card-body text-left">

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="nid_number" class="col-sm-12 control-label">NID Number</label>
                                <input type="text" class="form-control @error('nid_number') is-invalid @enderror" id="nid_number" name="nid_number" value="{{ $user->employee->nid_number }}">
                                @error('nid_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth" class="col-sm-12 control-label">Date of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ $user->employee->date_of_birth }}">
                                @error('date_of_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="gender" class="col-sm-12 control-label">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option disabled value="" selected>--Select--</option>
                                    <option {{ $user->employee->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                    <option {{ $user->employee->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                                    <option {{ $user->employee->gender == 'transgender' ? 'selected' : '' }} value="transgender">Transgender</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="blood_group" class="col-sm-12 control-label">Blood Group</label>
                                <input type="text" class="form-control @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" value="{{ $user->employee->blood_group }}">
                                @error('blood_group')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="hire_date" class="col-sm-12 control-label">Hire Date</label>
                                <input type="date" class="form-control @error('hire_date') is-invalid @enderror" id="hire_date" name="hire_date" value="{{ $user->employee->hire_date }}">
                                @error('hire_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="leave_date" class="col-sm-12 control-label">Leave Date</label>
                                <input type="date" class="form-control @error('leave_date') is-invalid @enderror" id="leave_date" name="leave_date" value="{{ $user->employee->leave_date }}">
                                @error('leave_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="department_id" class="col-sm-12 control-label">Department</label>
                                <select class="form-control @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                                    <option disabled value="" selected>--Select--</option>
                                    @foreach ($departments as $department)
                                    <option {{ $department->id == $user->employee->department_id ? 'selected' : '' }} value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="job_title_id" class="col-sm-12 control-label">Job Title</label>
                                <select class="form-control @error('job_title_id') is-invalid @enderror" id="job_title_id" name="job_title_id">
                                    <option disabled value="" selected>--Select--</option>
                                    @foreach ($jobTitles as $jobTitle)
                                    <option {{ $jobTitle->id == $user->employee->job_title_id ? 'selected' : '' }} value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
                                    @endforeach
                                </select>
                                @error('job_title_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="shift_id" class="col-sm-12 control-label">Shift</label>
                                <select class="form-control @error('shift_id') is-invalid @enderror" id="shift_id" name="shift_id">
                                    <option disabled value="" selected>--Select--</option>
                                    @foreach ($shifts as $shift)
                                    <option {{ $shift->id == $user->employee->shift_id ? 'selected' : '' }} value="{{$shift->id}}">{{$shift->name}}</option>
                                    @endforeach
                                </select>
                                @error('shift_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <b class="d-block mb-2" style="border-bottom: 2px solid #e7e7e7">Individual Shift</b>
                                <div class="row form-group mb-0 px-4">
                                    <div class="col-md-6 bootstrap-timepicker">
                                        <label for="start_time" class="col-sm-12 control-label">Start Time</label>
                                        <input type="time" class="form-control timepicker @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ $user->employee->start_time?$user->employee->start_time->format('H:i:s'):null }}">
                                        @error('start_time')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_time" class="col-sm-12 control-label">End Time</label>
                                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ $user->employee->end_time?$user->employee->end_time->format('H:i:s'):null }}">
                                        @error('end_time')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="note" class="col-sm-12 control-label">Note</label>
                                <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="5">{{ $user->employee->note }}</textarea>
                                @error('note')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-left">
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
                                    Update</button>
                                <button type="button" class="btn btn-secondary btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i>
                                    Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{ $user->employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <b style="font-size: 16px;">Delete Employee</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.employee.destroy', $user->employee->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">{{$user->employee->first_name.' '.$user->employee->last_name}}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
