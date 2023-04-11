@extends('frontEnd.master')
@section('title')
    details
@endsection
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('/') . $resorts->image }}" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">01</h6>
                                    <small class="text-white text-uppercase">Jan</small>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                                <span class="text-primary px-2">|</span>
                                <a class="text-primary text-uppercase text-decoration-none" href=""> </a>
                            </div>
                            <h2 class="mb-3">{{ $resorts->name }}</h2>
                            <p>{!! $resorts->description !!}</p>


                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    {{-- @dd($resorts) --}}
                    <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                        <h5 style="font-weight:bold; color:#7AB730;">Contact Guide </h5>
                        <img src="{{ asset('/') . $resorts->saveguides->image }}" class="img-fluid mx-auto mb-3">
                        <h3 class="text-primary mb-3">{{ $resorts->saveguides->name ?? '' }}</h3>
                        <p>{{ $resorts->saveguides->phone }}</p>
                        <div class="d-flex justify-content-center">
                            <a class="text-primary px-2" href="{{ $resorts->saveguides->facebook }}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-primary px-2" href="{{ $resorts->saveguides->twitter }}">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-primary px-2" href="{{ $resorts->saveguides->linkdin }}">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-primary px-2" href="{{ $resorts->saveguides->Instagram }}">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-primary px-2" href="{{ $resorts->saveguides->youtube }}">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Comment Form Start -->
                <div class="col-lg-8 bg-white mb-3" style="padding: 30px;">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Leave a comment</h4>
                    <form action="{{ route('frontEnd.comment.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="website">comment</label>
                            <input type="text" name="comment" class="form-control" id="website">
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave a comment"
                                class="btn btn-primary font-weight-semi-bold py-2 px-3">
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
                @foreach ($comment as $savecomment)
                    <div class="bg-white col-lg-8" style="padding: 30px; margin-bottom: 30px;">
                        <div class="media">
                            <div class="media-body">
                                <img src="{{ asset('/') . $savecomment->image }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <p>{{ $savecomment->name }}</p>
                                <p>{{ $savecomment->email }}</p>
                                <p>{{ $savecomment->comment }}</p>
                                <p>{{ $savecomment->message }}</p>

                                <button class="btn btn-sm btn-outline-primary">Reply</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
@endsection
