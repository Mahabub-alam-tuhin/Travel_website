@extends('frontEnd.master')
@section('title')
    Booking
@endsection
@section('content')
   <!-- Contact Start -->
   <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Booking fast</h6>
            <h1>Booking Form</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-white" style="padding: 30px;">
                    <div id="success"></div>
                    <form action="{{ route('frontEnd.booking.saveBooking') }}" method="post">
                        @csrf
                        <div class="form-row">
                                <input type="hidden" class="form-control p-4" id="resort_id" placeholder="Your Name" value="{{ $id }}"
                                    required="required" name="resort_id" data-validation-required-message="Please enter your name" />
                              
                            
                            <div class="control-group col-sm-6">
                                <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                    required="required" name="name" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group col-sm-6">
                                <input type="email" class="form-control p-4" id="email" placeholder="Your Email"
                                    required="required" name="email" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="phone" placeholder="phone"
                                required="required" name="phone" data-validation-required-message="Please enter a phone" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="price" placeholder="price"
                                required="required" name="price" data-validation-required-message="Please enter a price" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control py-3 px-4" name="address" rows="5" id="address" placeholder="address"
                                required="required"
                                data-validation-required-message="Please enter your address"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<!-- Comment Form End -->






@endsection
