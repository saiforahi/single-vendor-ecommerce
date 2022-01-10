@extends('layouts.app')

@push('style')
    <style>
        .product-info {
            /*box-shadow: 0 2px 4px #fff, -2px 0 4px #fff;*/
            padding: 10px;
            margin-top: 40px;
        }

        .product-info h4 {
            padding-bottom: .5rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #717184;
            font-size: 20px;
        }



        .product-info .title {
            font-weight: 600;
        }


        .level1 {
            font-size: 17px;
            font-weight: 700;
            border-bottom: 1px solid #717184;
            padding-bottom: 0.4rem;
            margin-bottom: 2rem;
        }

        .product-info .level1>span {}




        .level2 {
            position: relative;
            font-size: 15px;
            font-weight: 400;
            padding-left: 20px;
            border: none;
            border-top: 1px dotted #37374d;
            padding-top: 0.4rem;
            margin-top: 0.4rem;
            padding-bottom: 0.4rem;
            margin-bottom: 0.4rem;
        }

        .level2 .key {
            font-weight: 600;
        }

        .level2:before {
            content: "";
            background: url("../../../assets/images/arrow5e1f.svg?v=2") no-repeat 0 0;
            display: inline-block;
            margin-right: 5px;
            background-size: 100%;

            margin-left: -18px;
            width: 14px;
            height: 14px;
            position: absolute;
            top: 11px;
            left: 16px;

        }

        .level3 {
            font-size: 12px;
            font-weight: 400;
            padding-left: 30px;
            border: none;
            border-top: 1px dotted #37374d;
            padding-bottom: 0.15rem;
            margin-bottom: 0.15rem;
            position: relative;
        }

        .level3:before {

            content: "";
            background: url("../../../assets/images/arrow5e1f.svg?v=2") no-repeat 0 0;
            display: inline-block;
            margin-right: 5px;
            background-size: 100%;

            margin-left: -12px;
            width: 10px;
            height: 10px;
            position: absolute;
            top: 5px;
            left: 22px;
        }

        .product-info .level3>span {}

        .level4 {
            font-size: 10px;
            font-weight: 500;
            padding-left: 35px;
            border: none;
            padding-bottom: 0rem;
            margin-bottom: 0rem;
        }

    </style>
    <style>
        .sticky {
            /*position: sticky!important;
                        top: 80px;*/
        }

    </style>
    <style>
        @media screen and (min-width: 768px) {
            ul {
                padding-right: 100px;
            }
        }

    </style>
    <style>
        .budget-price {
            color: #fff !important;
            font-size: 35px;
            font-weight: 600;
            margin-bottom: 20px;
        }

    </style>
    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
        }


        .btn2 {
            background: linear-gradient(to bottom, #95ffce, #08b18a);
            border: none;
            color: #1d2b36;
            font-weight: 600;
            padding: 15px 30px;
            margin-right: 10px;
        }

        .btn1 {
            background: linear-gradient(to bottom, #f7dfa5, #f0c14b);
            border: none;
            color: #1d2b36;
            font-weight: 600;
            padding: 15px 30px;
        }



        .btn2:hover {
            color: #4a008e;
        }

        .btn1:hover {
            color: #630000;
        }

        @media screen and (max-width: 768px) {
            .btn1 {
                margin-top: 10px;
                width: 100%;
            }

            .btn2 {
                width: 100%;
            }
        }

    </style>
    <style>
    
    .pcb-product-summary {
        display: flex;
        align-items: center;
    }
    
    .hot-selling {
        margin-left: auto;
        margin-right: 10px;
        display: flex;
        align-items:center;
    }
    .hot {
    background-color: #ff4e00;
    background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%);
    
    color:transparent;
    -webkit-background-clip: text;
    background-clip: text;
    font-size: 26px;
    }
    </style>
    <style>
        .stars-rating {
            color: rgba(255, 255, 255, 0.9);
            position: relative;
            display: inline-block;
        }
        
        .stars-rating .stars-score {
          color: rgba(255, 255, 255, 0.9);
          position: absolute;
          top: 0;
          left: 0;
          overflow: hidden;
          width: 20%;
          white-space: nowrap;
        }
    </style>
    <style>
        ul {
            padding-inline-start: 40px;
        }
    </style>
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h2>{{$head_phone->name}}</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('headphones-list')}}">Headphone</a>
            <i class="fa fa-angle-right"></i><a href="{{route('headphones-details',['id'=>$head_phone->id])}}">{{$head_phone->product->short_name}}</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item img-gradient active">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41-qCkIdG4L.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/512PvwKtbmL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/410rcXv5hqL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41KXAfvc20L.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41AXIzTcAwL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41o5W6bOSML.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41tI4YqyN8L.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41B-8XlCZEL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41WcrzeIXGL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41cdk2K7niL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/514sZJiK8bL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51itLxTNJpL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51M2tfTcqWL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51veJ6SH8UL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51LV+LEkhnL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41iVl0D6nGL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51ktkN1yCWL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51sKFQzO6hL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41cF1C4GsdL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51jY6uNQkdL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51nVbgGZOiL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51JBidxZI9L.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51kBDwMFQgL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41+CKelidKL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51xOCUR5VLL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/41B-tuePX1L.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame, Detachable Microphone, Works with PC, PS4, Xbox One"
                                data-src="https://m.media-amazon.com/images/I/51Y0ALqOFOL.jpg"
                                alt="Build My PC, PC Builder, HyperX Cloud II">
                        </div>
                    </div>
                    <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon temp"></span>
                        <span class="sr-only" aria-hidden="true">Prev</span>
                    </a>
                    <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only" aria-hidden="true">Next</span>
                    </a>
                    <ol class="carousel-indicators">
                        <li data-target="#main-carousel" data-slide-to="0" class="active">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="1">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="2">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="3">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="4">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="5">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="6">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="7">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="8">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="9">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="10">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="11">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="12">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="13">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="14">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="15">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="16">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="17">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="18">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="19">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="20">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="21">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="22">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="23">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="24">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="25">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="26">
                        </li>
                    </ol>
                </div>

            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>HyperX Cloud II - Gaming Headset, 7.1 Surround Sound, Memory Foam Ear Pads, Durable Aluminum Frame,
                    Detachable Microphone, Works with PC, PS4, Xbox One</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="4.5 out of 5">
                        <div class="stars-score" style="width: 90%">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stars-scale">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div>&nbsp;&nbsp;(28967 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    {{$head_phone->product->features}}

                    
                    <div class="budget-price">৳ {{$head_phone->product->features}}</div>
                    
                    <div class="align-button">
                        <a href="{{route('add-product-to-cart',['product_id'=>$head_phone->product->id])}}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i> Add Product to List</a>
                        <a href="https://amazon.com/dp/B00SAYCXWG?tag=pcbuilder00-20" target="_blank"
                            class="btn btn-primary btn1 "> View on Amazon </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
