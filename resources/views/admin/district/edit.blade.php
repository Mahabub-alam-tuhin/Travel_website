@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <form action="{{route('admin.district.update',$District->id)}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">division_id</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="division_id" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->division_id}}">{{$district->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $District->name }}" name="name" class="form-control" id="inputPhoneNo2" placeholder="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">bn_name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $District->bn_name }}" name="bn_name" class="form-control" id="inputPhoneNo2" placeholder="bn_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">lat</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $District->lat }}" name="lat" class="form-control" id="inputPhoneNo2" placeholder="lat">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">lon</label>
                                <div class="col-sm-9">
                                    <textarea name="lon" class="form-control" id="inputAddress4" rows="3" placeholder="lon">{{$District->lon }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">url</label>
                                <div class="col-sm-9">
                                    <textarea name="url" class="form-control" id="inputAddress4" rows="3" placeholder="url">{{$District->url }}</textarea>
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

