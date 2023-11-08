@extends('frontEnd.master')

@section('title')
    login
@endsection

@section('content')
<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div style="margin-bottom: 4rem;">
                    <h6 style="color: #007bff; letter-spacing: 5px;" class="text-uppercase">Mega Offer</h6>
                    <h1 style="color: #fff;">30% OFF For Honeymoon</h1>
                </div>
                <p style="color: #fff;">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est dolor</p>
                <ul class="list-inline text-white m-0">
                    <li class="py-2"><i style="color: #007bff;" class="fa fa-check mr-3"></i>Labore eos amet dolor amet diam</li>
                    <li class="py-2"><i style="color: #007bff;" class="fa fa-check mr-3"></i>Etsea et sit dolor amet ipsum</li>
                    <li class="py-2"><i style="color: #007bff;" class="fa fa-check mr-3"></i>Diam dolor diam elitripsum vero.</li>
                </ul>
            </div>
            <div class="col-lg-5">
                <div class="card border-0">
                    <div class="card-header bg-primary text-center p-4">
                        <h1 style="color: #fff;">Register Now</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-white p-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="color: #000;">Name</label>
                                <input type="text" id="name" name="name" class="form-control p-4" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email" style="color: #000;">Email</label>
                                <input type="email" id="email" name="email" class="form-control p-4" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="user_role" style="color: #000;">User Role</label>
                                <select id="user_role" name="user_role" class="form-control p-4" required="required">
                                    <option>Open this select menu</option>
                                    @foreach (App\Models\userRole_id::where('name', '!=', 'admin')->get() as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password" style="color: #000;">Password</label>
                                <input type="password" id="password" name="password" class="form-control p-4" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" style="color: #000;">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control p-4" required="required" />
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="form-group">
                                    <input type="checkbox" id="terms" name="terms" required />
                                    <label for="terms">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" style="color: #000; text-decoration: underline;" class="text-sm">Terms of Service</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" style="color: #000; text-decoration: underline;" class="text-sm">Privacy Policy</a>',
                                        ]) !!}
                                    </label>
                                </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">
                                <a style="color: #007bff; text-decoration: underline;" class="text-sm" href="{{ route('login') }}">
                                    Already registered?
                                </a>

                                <button type="submit" class="btn btn-primary btn-block py-3" style="background: #007bff; border-radius: 50px;">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
