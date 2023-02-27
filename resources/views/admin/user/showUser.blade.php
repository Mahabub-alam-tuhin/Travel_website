@extends('admin.master')
@section('content')

    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 user_plan"></div>
                <div class="col-md-4 user_status"></div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row me-2">
                    <div class="col-md-2">
                        <div class="me-3">
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>
                                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label><input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0" /></label>
                            </div>
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="btn-group">
                                    <button class="btn btn-secondary buttons-collection dropdown-toggle btn-label-secondary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                                        <span><i class="ti ti-screen-share me-1 ti-xs"></i>Export</span><span class="dt-down-arrow"></span>
                                    </button>
                                </div>
                                <button class="btn btn-secondary add-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                                    <span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr>
                            <th>sl no</th>
                            <th>name</th>
                            <th>company_name</th>
                            <th>email</th>
                            <th>Phone</th>
                            <th>designation</th>
                            <th>role</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1 @endphp @foreach($saveusers as $saveuser)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$saveuser->name}}</td>
                                <td>{{$saveuser->company}}</td>
                                <td>{{$saveuser->email}}</td>
                                <td>{{$saveuser->phone}}</td>
                                <td>{{$saveuser->designation}}</td>
                                <td>
                                    @if ($saveuser->role)
                                        <ol>
                                            @foreach(json_decode($saveuser->role) as $role)
                                                <li>{{ $role }}</li>
                                            @endforeach
                                        </ol>
                                     @endif
                                </td>
                                <td><img src="{{ asset('/').$saveuser->image}}" height="40px" ; width="40px" ; alt="" /></td>
                                <td>
                                    <a href="{{ route('dashboard.edit-User',$saveuser->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('dashboard.delete-User',$saveuser->id) }}" class="btn btn-danger">Delete</a>
                                    <a href="{{ route('dashboard.details-User',$saveuser->id) }}" style="width: 60px;" class="btn btn-info">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="row mx-2">
                    <div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form action="{{route('dashboard.saveUser')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-user-name">name</label>
                        <input type="text" class="form-control" id="add-user-name" placeholder="John Doe" name="name" aria-label="John Doe" />
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-user-company_name">company name</label>
                        <input type="text" id="add-user-company_name" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="company" />
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-email">email</label>
                        <input type="text" id="add-user-email" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="email" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-phone">phone</label>
                        <input type="text" id="add-user-phone" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="phone" />
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
                            <select class="form-select" name="role" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="designer">designer</option>
                                <option value="editor">editor</option>
                                <option value="developer">developer</option>
                                <option value="trainer">trainer</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-image">image</label>
                        <input type="file" id="add-user-image" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="image" />
                    </div>

                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                    <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden" />
                </form>
            </div>
        </div>
    </div>

    {{--
    <script>
        --}}
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
    {{--
</script>
--}} @endsection
