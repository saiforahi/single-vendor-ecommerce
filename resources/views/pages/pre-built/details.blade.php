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
        .star-rating {
            color: #d0e8f0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .star-rating .rated {
            color: #80c1d5;
        }

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
            content: '⮚ ';
            margin-left: -18px;
        }

        .level3 {
            font-size: 12px;
            font-weight: 400;
            padding-left: 30px;
            border: none;
            border-top: 1px dotted #37374d;
            padding-bottom: 0.15rem;
            margin-bottom: 0.15rem;
        }

        .level3:before {
            content: '⮚ ';
            margin-left: -12px;
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

    </style>
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h2>{{$desktop->name}}</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../../../builts/gaming-pc/index.html">Gaming Pc</a>
            <i class="fa fa-angle-right"></i><a href="{{route('desktop-details',['id'=>$desktop->id])}}">{{$desktop->short_name}}</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($desktop->product->getMedia('main_image') as $image)
                            <div
                                class="{{ $loop->index == 0 ? 'carousel-item img-gradient active' : 'carousel-item img-gradient' }}">
                                <img class="d-block img-fluid big-image lazy"
                                    title="AMD Ryzen Threadripper 3990X, 64 Cores & 128-Threads Unlocked Desktop Processor without Cooler"
                                    data-src="{{ $image->getUrl('main_image') }}"
                                    alt="Build My PC, System Builder, AMD Ryzen Threadripper 3990X">
                            </div>
                        @endforeach

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
                        @foreach ($desktop->getMedia('main_image') as $image)
                            <li data-target="#main-carousel" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach
                    </ol>
                </div>

            </div>
            <div class="col-12 col-md-9 pl-md-5">
                <h1>{{$desktop->name}}</h1>
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
                    <div>&nbsp;&nbsp;(0 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                <h4 class="price">Product Features </h4>
                {!!$desktop->product->features!!}

                <div class="budget-price">{{$desktop->product->price}}</div>

                <div class="align-button">
                        <a href="{{ route('add-product-to-cart', ['product_id' => $desktop->product->id]) }}"
                            class="btn btn-primary btn2 "><i class="fa fa-plus"></i> Add Product to Cart</a>
                </div>
            </div>
        </div>
    </div>
@endsection
