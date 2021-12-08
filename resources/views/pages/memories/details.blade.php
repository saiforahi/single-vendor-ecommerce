@extends('layouts.app')

@push('style')
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

        .component-details h2,
        .component-details h3,
        .component-details h4 {
            color: rgba(255, 255, 255, 0.9);
        }

        span.carousel-control-prev-icon,
        span.carousel-control-next-icon {
            background-color: #373737;
        }

        span.carousel-control-prev-icon:after,
        span.carousel-control-next-icon:after {
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
            align-items: center;
        }

        .hot {
            background-color: #ff4e00;
            background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%);

            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            font-size: 26px;
        }

    </style>
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
        <h2>{{ $memory->name }}</h2>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../../../product/ram/index.html">Ram</a>
            <i class="fa fa-angle-right"></i><a href="index.html">G.Skill Trident Z Royal</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($memory->product->getMedia('main_image') as $image)
                            <div class="{{ $loop->index == 0 ? 'carousel-item img-gradient active':'carousel-item img-gradient' }}">
                                <img class="d-block img-fluid big-image lazy"
                                    title="G.SKILL Trident Z Royal Series, 16GB (2 x 8GB) 288-Pin DDR4-4800MHz Desktop Memory Model with CL18"
                                    data-src="{{$image->getUrl('main_image')}}"
                                    alt="Build My PC, System Builder, G.Skill Trident Z Royal">
                            </div>
                        @endforeach
                    </div>
                    @if(count($memory->product->getMedia('main_image'))>1)
                    <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon temp"></span>
                        <span class="sr-only" aria-hidden="true">Prev</span>
                    </a>
                    <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only" aria-hidden="true">Next</span>
                    </a>
                    @endif
                    <ol>
                        @foreach ($memory->product->getMedia('main_image') as $image)
                            <li data-target="#main-carousel" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach

                    </ol>

                </div>

                <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">General</span>
                        <div class="level2"><span class="key">Brand</span> :
                            <span>{{ $memory->brand }}</span>
                        </div>
                        <div class="level2"><span class="key">Model</span> :
                            <span>{{ $memory->model }}</span>
                        </div>
                        <div class="level2"><span class="key">Warranty</span> : <span>Limited
                                Lifetime</span></div>
                        <div class="level2"><span class="key">Part Number</span> :
                            <span>F4-4800C18D-16GTRS</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Memory</span>
                        <div class="level2"><span class="key">Memory</span> : <span>16 GB (2 x 8
                                GB)</span></div>
                        <div class="level2"><span class="key">RAM Type</span> : <span>DDR4 - 4800
                                MHz</span></div>
                        <div class="level2"><span class="key">CAS Latency</span> : <span>CL18</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Additional Information</span>
                        <div class="level2"><span class="key">DIMM Type</span> : <span>288-Pin</span>
                        </div>
                        <div class="level2"><span class="key">Voltage</span> : <span>1.35 V</span></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>{{ $memory->name }}</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="5.0 out of 5">
                        <div class="stars-score" style="width: 100%">
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
                    <div>&nbsp;&nbsp;(1 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                <div class="description">
                    <p>The G.SKILL Trident Z Royal Series 16GB (2 x 8GB) DDR4 memory comes with a frequency of 4800MHz,
                        which is perfect for those who want to experience the next level in gaming performance. It also
                        supports CL18 CAS latency at 1.35v operating voltage.</p>
                    <p>This is actually a great product that supports advanced performance and overclocking, and it is
                        compatible with the latest AMD and Intel motherboards. It can also be easily overclocked without any
                        complications, giving you the chance to boost.</p>
                </div>
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    <ul>
                        <li><span>This desktop memory has 18-22-22-42 timing.</span></li>
                        <li><span>It delivers a high-quality performance of 4800MHz that can be easily and effortlessly
                                overclocked for an even better gaming experience.</span></li>
                        <li><span>It comes in 16GB (2 x 8GB) capacity.</span></li>
                        <li><span>This DDR4 RAM comes with CL18 CAS latency at 1.35V tested voltage.</span></li>
                    </ul>


                    <div class="budget-price">৳ {{ $memory->product->price }}</div>
                    <div class="align-button">
                        <a href="javascript::void(0)" onclick="document.getElementById('add_product_form').submit()" class="btn btn-primary btn2 "><i
                            class="fa fa-plus"></i> Add Product to Cart</a>
                        <form style="display: none;" action="{{route('add-product-to-cart',['product_id'=>$memory->product->id])}}" method="GET" id="add_product_form">
                            @csrf
                        </form>
                        <a href="{{ route('add-memory-to-system', ['memory_id' => $memory->id]) }}"
                            class="btn btn-primary btn1 "><i class="fa fa-plus"></i>Add to Sytem Builder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
