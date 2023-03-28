@extends('admin.master')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <form action="{{ route('admin.resort_Management.saveresort') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="division">division</label>
                                <div class="col-sm-10">
                                    <select class="form-select" onchange="change_division()" name="division_id"
                                        aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="districts">districts</label>
                                <div class="col-sm-10">
                                    <select class="form-select" onchange="change_districts()" name="district_id"
                                        aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="upazila">upazila</label>
                                <div class="col-sm-10">
                                    <select class="form-select" onchange="change_upazila()" name="upazila_id"
                                        aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($upazilas as $upazila)
                                            <option value="{{ $upazila->id }}">{{ $upazila->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="union">union</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="union_id" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($unions as $union)
                                            <option value="{{ $union->id }}">{{ $union->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="guid">guid_id</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="guid_id" aria-label="Default select example">
                                        @foreach ($guids as $guid)
                                            <option value="{{ $guid->id }}">{{ $guid->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control phone-mask"
                                        placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="day">day</label>
                                <div class="col-sm-10">
                                    <input type="text" name="day" id="day" class="form-control phone-mask"
                                        placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-day" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="person">person</label>
                                <div class="col-sm-10">
                                    <input type="text" name="person" id="person" class="form-control phone-mask"
                                        placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-day" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="Phone">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone" id="phone" class="form-control phone-mask"
                                        placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-phone" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="age">age</label>
                                <div class="col-sm-10">
                                    <input type="text" name="age" id="age" class="form-control phone-mask"
                                        placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-age" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="description">description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="description" id="description"
                                        class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="entry fee">entry fee</label>
                                <div class="col-sm-10">
                                    <input type="text" name="entry_fee" id="entry fee" class="form-control phone-mask"
                                        placeholder="658 799 8941" aria-label="658 799 8941"
                                        aria-describedby="basic-default-entry fee" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="image">image upload</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" class="form-control phone-mask"
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

        <script>
            function change_division() {
                let division_id = event.target.value;
                fetch('/district/district-by-division', {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.value
                        },
                        body: JSON.stringify({
                            division_id
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        let district_id = document.querySelector(`select[name="district_id"]`)
                        district_id.innerHTML = res.map(i => `<option value="${i.id}">${i.name}</option>`).join('')
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }

            function change_districts() {
                let district_id = event.target.value;
                fetch('/upazila/upazila_by_district', {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.value
                        },
                        body: JSON.stringify({
                            district_id
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        let upazila_id = document.querySelector(`select[name="upazila_id"]`)
                        upazila_id.innerHTML = res.map(i => `<option value="${i.id}">${i.name}</option>`).join('')
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }

            function change_upazila() {
                let upazilla_id = event.target.value;
                fetch('/union/union_by_upazila', {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.value
                        },
                        body: JSON.stringify({
                            upazilla_id
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        let union_id = document.querySelector(`select[name="union_id"]`)
                        union_id.innerHTML = res.map(i => `<option value="${i.id}">${i.name}</option>`).join('')
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        </script>
    @endsection


    @section('scripts')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description',{
            filebrowserUploadUrl :"{{ route('admin.resort_Management.upload',['_token'=>csrf_token()])}}}",
            filebrowserUploadMethod:"form"
        } );
    </script>
    @endsection
