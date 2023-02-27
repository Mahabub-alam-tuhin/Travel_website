@extends('admin.master')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <form action="{{ route('dashboard.store') }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="role">user name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="user_id" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="image">user_role</label>
                            <div class="col-sm-10">
                                @foreach($userRoles as $user)
                                <div class="form-check">
                                    <input class="form-check-input" name="user_role[]" type="checkbox" value="{{$user->id}}"  id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$user->title}}
                                    </label>
                                </div>
                                @endforeach
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
    </div>
@endsection
