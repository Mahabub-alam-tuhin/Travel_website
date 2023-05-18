@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <form action="{{ route ('admin.comment_reply.savereply',$comment->id)}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">comment</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $comment->comment }}" name="comment" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">comment_id</label>
                                <div class="col-sm-9">
                                    <input type="text"  value="{{ $comment->id }}" name="comment_id" class="form-control" id="inputPhoneNo2" placeholder="comment_id">
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">reply</label>
                                <div class="col-sm-9">
                                    <input type="text" name="reply" class="form-control" id="inputPhoneNo2" placeholder="Phone No">
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

