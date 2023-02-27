@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <form action="{{route('dashboard.permission.update',$permission->id)}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">title</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $permission->title }}" name="title" class="form-control" id="inputEnterYourName" placeholder="Enter Your title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $permission->address }}" name="address" class="form-control" id="inputPhoneNo2" placeholder="address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Designation</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$permission->designation}}" name="designation" class="form-control" id="inputEmailAddress2" placeholder="designation">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <textarea name="Phone" class="form-control" id="inputAddress4" rows="3" placeholder="Phone">{{$permission->Phone }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

