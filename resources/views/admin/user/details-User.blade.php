@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <form>
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $saveusers->name }}" name="name" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Company name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{  $saveusers->company }}" name="company_name" class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" value="{{$saveusers->email}}" name="email" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">phone</label>
                                <div class="col-sm-9">
                                    <textarea name="phone" class="form-control" id="inputAddress4" rows="3" placeholder="Address">{{$saveusers->phone }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">designation</label>
                                <div class="col-sm-9">
                                    {{--                                    <textarea name="designation" class="form-control" id="inputAddress4" rows="3" placeholder="Address"></textarea>--}}
                                    <select class="form-select" name="designation" aria-label="Default select example">

                                        <option>Open this select menu</option>
                                        <option @if($saveusers->designation=="Teacher") selected @endif value="Teacher">Teacher</option>
                                        <option @if($saveusers->designation=="Student") selected @endif value="Student">Student</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="role">role</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="role" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option  value="designer">designer</option>
                                        <option  value="editor">editor</option>
                                        <option  value="developer">developer</option>
                                        <option  value="trainer">trainer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="inputAddress4" rows="3" placeholder="Address">{{$saveusers->image}}
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <a href="{{ route('dashboard.showUser') }}" type="submit" class="btn btn-primary px-5">back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

    {{--    <script>--}}
    {{--        function insert_data(){--}}
    {{--            event.preventDefault();--}}
    {{--            let target = event.target;--}}
    {{--            remomve_form_error();--}}
    {{--            set_form_message("");--}}

    {{--            fetch(`{{route('dashboard.showUser')}}`,{--}}
    {{--                method: 'POST',--}}
    {{--                body: new FormData(target)--}}
    {{--            })--}}
    {{--                .then( async res=>{--}}
    {{--                    let status = res.status--}}
    {{--                    let json_data = await res.json();--}}

    {{--                    if(status == 201){--}}
    {{--                        set_form_message("data created");--}}
    {{--                        target.reset();--}}
    {{--                        setTimeout(() => {--}}
    {{--                            set_form_message("");--}}
    {{--                        }, 500);--}}
    {{--                    }--}}
    {{--                    if(status == 422){--}}
    {{--                        render_form_error(json_data)--}}
    {{--                    }--}}
    {{--                })--}}
    {{--        }--}}

    {{--        function set_form_message(message){--}}
    {{--            document.getElementById('message').innerHTML = message;--}}
    {{--        }--}}

    {{--        function remomve_form_error(slector = `div.form_error`) {--}}
    {{--            document.querySelectorAll(slector).forEach(el=>el.remove());--}}
    {{--        }--}}

    {{--        function render_form_error(json_data){--}}
    {{--            for (const key in json_data) {--}}
    {{--                if (Object.hasOwnProperty.call(json_data, key)) {--}}
    {{--                    const element = json_data[key];--}}

    {{--                    var erro_er = document.createElement('div');--}}
    {{--                    erro_er.classList.add('form_error');--}}
    {{--                    erro_er.classList.add('text-danger');--}}
    {{--                    erro_er.innerHTML = element[0];--}}

    {{--                    document.querySelector(`input[name="${key}"]`).insertAdjacentElement('afterend',erro_er);--}}
    {{--                    console.log(element );--}}
    {{--                }--}}
    {{--            }--}}
    {{--            document.getElementById('message').innerHTML = "data created";--}}
    {{--        }--}}
    {{--    </script>--}}
@endsection

