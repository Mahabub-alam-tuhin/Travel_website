@extends('admin.master')
@section('content')
    <div class="row justify-content-center">

        <!-- Basic Layout -->
        <div class="col-md-8">
            <form action="{{ route('dashboard.saveUser') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="John Doe" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="company">company name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="company" class="form-control" id="company"
                                        placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="email">email</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="john.doe" aria-label="john.doe"
                                            aria-describedby="basic-default-email2" />

                                    </div>
                                    <div class="form-text"> You can use letters, numbers & periods </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Phone">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" id="Phone" class="form-control phone-mask"
                                        placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-phone" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="designation">designation</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="designation" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Student">Student</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="role">role</label>
                                <div class="col-sm-10">
                                    <select multiple class="form-select" name="role[]" aria-label="Default select example">
                                        <option selected>Open this select menu  </option>
                                        <option value="designer">designer</option>
                                        <option value="editor">editor</option>
                                        <option value="developer">developer</option>
                                        <option value="trainer">trainer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="image">image upload</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" class="formphp a-control phone-mask"
                                        placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-image" />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    @endsection
