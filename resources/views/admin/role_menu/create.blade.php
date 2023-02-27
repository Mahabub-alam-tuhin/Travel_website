@extends('admin.master')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <form action="{{route('dashboard.saveRole')}}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="ID">ID</label>
                                <div class="col-sm-10">
                                    <input type="number" name="role_id" class="form-control" id="ID" placeholder="John Doe" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Title">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="Title" placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Serial">Serial</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="serial"   id="Serial" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-Serial" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Status">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" name="status" id="Status" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-Status" />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
        </form>
@endsection
