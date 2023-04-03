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
                            <img class="img-fluid w-100" src="{{ asset('/').$resorts->image}}" alt="">
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
                    <img src="{{ asset('/').$resorts->saveguides->image}}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                    <h3 class="text-primary mb-3">{{$resorts->saveguides->name ??''}}</h3>
                    <p>{{$resorts->saveguides->phone }}</p>
                    <div class="d-flex justify-content-center">
                        <a class="text-primary px-2" href="{{$resorts->saveguides->facebook }}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-2" href="{{$resorts->saveguides->twitter }}">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-2" href="{{$resorts->saveguides->linkdin }}">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-2" href="{{$resorts->saveguides->Instagram }}">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary px-2" href="{{$resorts->saveguides->youtube }}">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
     
                <!-- Search Form -->
             

                <!-- Category List -->
              

                <!-- Recent Post -->
               

                <!-- Tag Cloud -->
              
            </div>
        </div>
    </div>
</div>
@endsection
