@extends('admin.master')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <form action="{{ route('admin.destination.savedestination') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Serial">Number of city</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="city"   id="city" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-city" />
                                    </div>
                                </div>
                            </div>                        
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="image">image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-Status" />
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
