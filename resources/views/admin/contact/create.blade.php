@extends('admin.master')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <form action="{{ route('admin.contact.savecontact') }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" id="address" placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Serial">contact number</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="contact"   id="contact" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="facebook">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
        </form>
@endsection
