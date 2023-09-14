<!-- Edit -->
<div class="modal fade" id="edit{{ $employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <b style="font-size: 16px;">Edit Employee</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form class="form-horizontal" method="POST" action="{{ route('user.update') }}">
                @csrf
                <div class="modal-body">
                    <b style="border-bottom: 2px solid #e7e7e7">&nbsp; &nbsp; Account's Information &nbsp; &nbsp;</b>
                    <div class="card-body text-left">

                        <input type="hidden" name="_method" value="PUT">

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="first_name" class="col-sm-12 control-label">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $employee->user->first_name }}" required />
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="col-sm-12 control-label">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $employee->user->last_name }}" required />
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="password" class="col-sm-12 control-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <hr>
                    <b style="border-bottom: 2px solid #e7e7e7">&nbsp; &nbsp; Portfolio &nbsp; &nbsp;</b>
                    <div class="card-body text-left">

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="nid_number" class="col-sm-12 control-label">NID Number</label>
                                <input type="text" class="form-control @error('nid_number') is-invalid @enderror" id="nid_number" name="nid_number" value="{{ $employee->nid_number }}">
                                @error('nid_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth" class="col-sm-12 control-label">Date of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth }}">
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
                                    <option {{ $employee->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                    <option {{ $employee->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                                    <option {{ $employee->gender == 'transgender' ? 'selected' : '' }} value="transgender">Transgender</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="blood_group" class="col-sm-12 control-label">Blood Group</label>
                                <input type="text" class="form-control @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" value="{{ $employee->blood_group }}">
                                @error('blood_group')
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
