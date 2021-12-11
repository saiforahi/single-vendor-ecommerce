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
        .component-details {
            padding: 40px;
            color: rgba(255, 255, 255, 0.8);
            background-color: #1d2b36;
        }
        .component-details .big-image {
            width: 300px;
            height: 300px;
            margin: auto;
        }
        .small-image {
            min-height: 50px;
            min-width: 50px;
            
        }
        .carousel-indicators {
            position: relative;
        }
        .carousel-indicators li {
            background-color: white;
        }
        .component-details h1 {
            font-size: 28px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }
        .component-details h2,.component-details h3,.component-details h4 {
            color: rgba(255, 255, 255, 0.9);
        }
        span.carousel-control-prev-icon, span.carousel-control-next-icon {
            background-color: #373737;
        }
        span.carousel-control-prev-icon:after, span.carousel-control-next-icon:after {
            color: #fff;
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
        <h2>Cooler Master MasterFan MF120R (R4-120R-203C-R1)</h2>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../../../product/case-cooler/index.html">Case Cooler</a>
            <i class="fa fa-angle-right"></i><a href="index.html">Cooler Master MasterFan MF120R</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item img-gradient active">
                            <img class="d-block img-fluid big-image lazy"
                                title="Cooler Master MasterFan MF120R ARGB 120mm 3 Pack Fan with Independently-Controlled ARGB LEDs, Absorbing Rubber Pads, Controller, PWM Control for Computer Case, CPU Liquid & Air Cooler"
                                data-src="https://m.media-amazon.com/images/I/411RCdonZAL.jpg"
                                alt="Build My PC, PC Builder, Cooler Master MasterFan MF120R">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Cooler Master MasterFan MF120R ARGB 120mm 3 Pack Fan with Independently-Controlled ARGB LEDs, Absorbing Rubber Pads, Controller, PWM Control for Computer Case, CPU Liquid & Air Cooler"
                                data-src="https://m.media-amazon.com/images/I/51H-6n9yDjL.jpg"
                                alt="Build My PC, PC Builder, Cooler Master MasterFan MF120R">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Cooler Master MasterFan MF120R ARGB 120mm 3 Pack Fan with Independently-Controlled ARGB LEDs, Absorbing Rubber Pads, Controller, PWM Control for Computer Case, CPU Liquid & Air Cooler"
                                data-src="https://m.media-amazon.com/images/I/41Lx22WCyeL.jpg"
                                alt="Build My PC, PC Builder, Cooler Master MasterFan MF120R">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Cooler Master MasterFan MF120R ARGB 120mm 3 Pack Fan with Independently-Controlled ARGB LEDs, Absorbing Rubber Pads, Controller, PWM Control for Computer Case, CPU Liquid & Air Cooler"
                                data-src="https://m.media-amazon.com/images/I/51A8+9SQEBL.jpg"
                                alt="Build My PC, PC Builder, Cooler Master MasterFan MF120R">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Cooler Master MasterFan MF120R ARGB 120mm 3 Pack Fan with Independently-Controlled ARGB LEDs, Absorbing Rubber Pads, Controller, PWM Control for Computer Case, CPU Liquid & Air Cooler"
                                data-src="https://m.media-amazon.com/images/I/41T+z5sPpQL.jpg"
                                alt="Build My PC, PC Builder, Cooler Master MasterFan MF120R">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Cooler Master MasterFan MF120R ARGB 120mm 3 Pack Fan with Independently-Controlled ARGB LEDs, Absorbing Rubber Pads, Controller, PWM Control for Computer Case, CPU Liquid & Air Cooler"
                                data-src="https://m.media-amazon.com/images/I/51Rlp8jk6zL.jpg"
                                alt="Build My PC, PC Builder, Cooler Master MasterFan MF120R">
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
                    </ol>
                </div>

            </div>

            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>Cooler Master MasterFan MF120R ARGB 120mm 3 Pack Fan with Independently-Controlled ARGB LEDs, Absorbing
                    Rubber Pads, Controller, PWM Control for Computer Case, CPU Liquid & Air Cooler</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="4.4 out of 5">
                        <div class="stars-score" style="width: 88%">
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
                    <div>&nbsp;&nbsp;(848 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">

                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    <ul>
                        <li><span>Addressable RGB color- addressable RGB that achieves full Color customization. Certified
                                compatible with as US aura, ASROCK RGB, and MSI RGB.. Air flow - 59 CFM. Noise level - 25.0
                                decibels</span></li>
                        <li><span>Silent cooling Technology - a mix of noise reduction technology and sound absorbing rubber
                                pads for peace and quiet even when your PC is working overtime.</span></li>
                        <li><span>Hybrid design- a combination of both Jet engine and helicopter blade designs gives you the
                                static air pressure you need without sacrificing airflow.</span></li>
                        <li><span>Smart Fan sensor for jam protection - never worry about your cables getting snagged or
                                components being mucked up ever again.</span></li>
                        <li><span>Wired addressable RGB Controller– even without an addressable RGB Capable motherboard, the
                                included controller allows customize colors, brightness and effects</span></li>
                    </ul>


                    <div class="budget-price">$105.99</div>

                    <div class="align-button">
                        <a href="{{route('add-product-to-cart',['product_id'=>$case_cooler->product->id])}}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i> Add Product to Cart</a>
                        <a href="https://amazon.com/dp/B07GSRJJTQ?tag=pcbuilder00-20" target="_blank"
                            class="btn btn-primary btn1 "><i class="fab fa-amazon"></i> View on Amazon </a>
                    </div>
                </div>
            </div>
            <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">General</span>
                    <div class="level2"><span class="key">Cooler Type</span> : <span>Case Fan</span>
                    </div>
                    <div class="level2"><span class="key">Bearing Type</span> : <span>Rifle</span></div>
                    <div class="level2"><span class="key">Connectors</span> : <span>4-Pin</span></div>
                    <div class="level2"><span class="key">Fan Size</span> : <span>120 mm</span></div>
                    <div class="level2"><span class="key">Fan Speed</span> : <span>650 to 2000 rpm</span>
                    </div>
                    <div class="level2"><span class="key">Noise Level</span> : <span>31 dBA</span></div>
                    <div class="level2"><span class="key">LED</span> : <span>RGB</span></div>
                    <div class="level2"><span class="key">Maximum Airflow</span> : <span>59 CFM</span>
                    </div>
                    <div class="level2"><span class="key">Dimensions (W x H x D)</span> : <span>4.7 x 4.7
                            x 1.0" / 120.0 x 120.0 x 25.0 mm</span></div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>1.3 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>6.7 x
                            5.35 x 1.29"</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
