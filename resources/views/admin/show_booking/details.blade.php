@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <form action="{{ route('admin.show_booking.update',$details->id) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $details->name }}" name="name" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">email</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $details->email }}" name="email" class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">phone</label>
                                <div class="col-sm-9">
                                    <textarea name="phone" class="form-control" id="inputAddress4" rows="3" placeholder="phone">{{$details->phone }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">address</label>
                                <div class="col-sm-9">
                                    <textarea name="address" class="form-control" id="inputAddress4" rows="3" placeholder="Address">{{$details->address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="status">status</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option @if($details->status=="Pending") selected @endif value="Pending">Pending</option>
                                        <option @if($details->status=="Approve") selected @endif value="Approve">Approve</option>
                                        <option @if($details->status=="Cancel") selected @endif value="Cancel">Cancel</option>
                                    </select>
                                </div>
                            </div>
                           <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button  type="submit" class="btn btn-primary px-5">update</button>
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

