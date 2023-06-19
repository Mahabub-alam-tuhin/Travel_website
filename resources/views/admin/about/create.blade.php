@extends('admin.master')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <form action="{{ route('admin.about.saveabout') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">main_image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="main_image" class="form-control" id="address" placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Serial">first_image</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="file" name="first_image"   id="first_image" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="facebook">second_image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="second_image" class="form-control" id="second_image" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="title">title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="details">details</label>
                                <div class="col-sm-10">
                                    <input type="text" name="details" class="form-control" id="details" placeholder="ACME Inc." />
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
