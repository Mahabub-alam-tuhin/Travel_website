@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <form action="{{route('admin.tour_guideence.update',$saveguides->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $saveguides->name }}" name="name" class="form-control" id="inputPhoneNo2" placeholder="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">phone</label>
                                <div class="col-sm-9">
                                    <input type="number" value="{{$saveguides->phone}}" name="phone" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">facebook</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$saveguides->facebook}}" name="facebook" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">twitter</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$saveguides->twitter}}" name="twitter" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">linkdin</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$saveguides->linkdin}}" name="linkdin" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Instagram</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$saveguides->Instagram}}" name="Instagram" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">youtube</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$saveguides->youtube}}" name="youtube" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="inputAddress4" rows="3" placeholder="image">{{$saveguides->image }}</>
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

