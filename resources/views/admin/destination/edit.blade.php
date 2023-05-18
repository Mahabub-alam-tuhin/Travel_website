@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <form action="{{route('admin.destination.update',$Destination->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">title</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $Destination->title }}" name="title" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">city</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $Destination->city }}" name="city" class="form-control" id="inputPhoneNo2" placeholder="city">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="inputAddress4" rows="3" placeholder="image">{{$Destination->image }}</>
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

