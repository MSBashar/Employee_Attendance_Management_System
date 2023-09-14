<!-- Edit -->
<div class="modal fade" id="edit{{ $shift->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <b style="font-size: 16px;">Edit Shift</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.shift.update', $shift->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="card-body text-left">

                        <input type="hidden" name="_method" value="PUT">

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="name" class="col-sm-12 control-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $shift->name }}" required />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="col-sm-12 control-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option {{ $shift->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $shift->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6 bootstrap-timepicker">
                                <label for="start_time" class="col-sm-12 control-label">Start Time</label>
                                <input type="time" class="form-control timepicker @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ $shift->start_time->format('H:i:s') }}">
                                @error('start_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="end_time" class="col-sm-12 control-label">End Time</label>
                                <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ $shift->end_time->format('H:i:s') }}">
                                @error('end_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="description" class="col-sm-12 control-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ $shift->description }}</textarea>
                                @error('description')
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
<div class="modal fade" id="delete{{ $shift->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <b style="font-size: 16px;">Delete Shift</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.shift.destroy', $shift->id) }}">
                @csrf
                {{ method_field('DELETE') }}
                <div class="modal-body">
                        <div class="text-center">
                            <h6>Are you sure you want to delete:</h6>
                            <h2 class="bold del_shift_name">{{$shift->name}}</h2>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
