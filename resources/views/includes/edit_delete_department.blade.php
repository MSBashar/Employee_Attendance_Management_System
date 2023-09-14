<!-- Edit -->
<div class="modal fade" id="edit{{ $department->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <b style="font-size: 16px;">Edit Department</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.department.update', $department->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="card-body text-left">

                        <input type="hidden" name="_method" value="PUT">

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="name" class="col-sm-12 control-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $department->name }}" required />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="col-sm-12 control-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option {{ $department->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $department->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="description" class="col-sm-12 control-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{!! $department->description !!}</textarea>
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
<div class="modal fade" id="delete{{ $department->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <b style="font-size: 16px;">Delete department</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.department.destroy', $department->id) }}">
                @csrf
                {{ method_field('DELETE') }}
                <div class="modal-body">
                        <div class="text-center">
                            <h6>Are you sure you want to delete:</h6>
                            <h2 class="bold del_department_name">{{$department->name}}</h2>
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
