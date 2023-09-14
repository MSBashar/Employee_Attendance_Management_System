<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <b style="font-size: 16px;">Add Employee</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>


        <form action="{{ route('admin.employee.store') }}" method="POST">
        @csrf
            <div class="modal-body">
                <b style="border-bottom: 2px solid #e7e7e7">&nbsp; &nbsp; Account's Information &nbsp; &nbsp;</b>
                <div class="card-body text-left">

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="first_name" class="col-sm-12 control-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required />
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="col-sm-12 control-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required />
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="email" class="col-sm-12 control-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required >
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="password" class="col-sm-12 control-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required >
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="col-sm-12 control-label">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="Admin">Employee + Admin</option>
                                <option value="Employee" selected>Employee</option>
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
                                <option value="1" selected>Active</option>
                                <option value="2">Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-12 control-label">&nbsp; &nbsp;</label>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </div>

                </div>
                <hr>
                <b style="border-bottom: 2px solid #e7e7e7">&nbsp; &nbsp; Portfolio &nbsp; &nbsp;</b>
                <div class="card-body text-left">

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="nid_number" class="col-sm-12 control-label">NID Number</label>
                            <input type="text" class="form-control @error('nid_number') is-invalid @enderror" id="nid_number" name="nid_number" value="{{ old('nid_number') }}">
                            @error('nid_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="date_of_birth" class="col-sm-12 control-label">Date of Birth</label>
                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
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
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="transgender">Transgender</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="blood_group" class="col-sm-12 control-label">Blood Group</label>
                            <input type="text" class="form-control @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" value="{{ old('blood_group') }}">
                            @error('blood_group')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="hire_date" class="col-sm-12 control-label">Hire Date</label>
                            <input type="date" class="form-control @error('hire_date') is-invalid @enderror" id="hire_date" name="hire_date" value="{{ old('hire_date') }}">
                            @error('hire_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="leave_date" class="col-sm-12 control-label">Leave Date</label>
                            <input type="date" class="form-control @error('leave_date') is-invalid @enderror" id="leave_date" name="leave_date" value="{{ old('leave_date') }}">
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
                                <option value="{{$department->id}}">{{$department->name}}</option>
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
                                <option value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
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
                                <option value="{{$shift->id}}">{{$shift->name}}</option>
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
                                    <input type="time" class="form-control timepicker @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}">
                                    @error('start_time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="end_time" class="col-sm-12 control-label">End Time</label>
                                    <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ old('end_time') }}">
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
                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="5">{{ old('note') }}</textarea>
                            @error('note')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="card-footer text-left">
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        </div>

    </div>
</div>
</div>
