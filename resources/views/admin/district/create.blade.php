@extends('admin.master')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <form action="{{route('admin.district.savedistrict')}}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="division_id">division_id</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="division_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->division_id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>  
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="ACME Inc." />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="bn_name">bn_name</label>
                            <div class="col-sm-10">
                                <input type="bn_name" name="bn_name" id="bn_name" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-bn_name" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="lat">lat</label>
                            <div class="col-sm-10">
                                <input type="number" name="	lat" id="lat" class="form-control lat-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-lat" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="lon">lon</label>
                            <div class="col-sm-10">
                                <input type="number" name="lon" id="lon" class="form-control lon-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-lon" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="url">url</label>
                            <div class="col-sm-10">
                                <input type="text" name="url" id="url" class="form-control url-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-url" />
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
