@extends('admin.master')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <form action="{{route('admin.upazila.saveupazila')}}"  method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="district_id">district_id</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="district_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach($upazilas as $upazila)
                                        <option value="{{$upazila->district_id}}">{{$upazila->name}}</option>
                                    @endforeach
                                </select>  
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="bn_name">bn_name</label>
                            <div class="col-sm-10">
                                <input type="text" name="bn_name" class="form-control" id="bn_name" placeholder="ACME Inc." />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="url">url</label>
                            <div class="col-sm-10">
                                <input type="text" name="url" id="url" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-url" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

@endsection
