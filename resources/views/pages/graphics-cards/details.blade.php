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
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h2>{{$graphic->name}}</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('graphics-cards-list')}}">Graphics Card</a>
            <i class="fa fa-angle-right"></i><a href="{{route('graphics-details',['id'=>$graphic->id])}}">{{$graphic->product->short_name}}</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item img-gradient active">
                            <img class="d-block img-fluid big-image lazy"
                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                data-src="https://m.media-amazon.com/images/I/41t1VU+qlYL._SL500_.jpg"
                                alt="Build My PC, PC Builder, MSI RTX 3090 GAMING X TRIO 24G">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                data-src="https://m.media-amazon.com/images/I/41bTXLPtpaL._SL500_.jpg"
                                alt="Build My PC, PC Builder, MSI RTX 3090 GAMING X TRIO 24G">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                data-src="https://m.media-amazon.com/images/I/41uCUS87aiL._SL500_.jpg"
                                alt="Build My PC, PC Builder, MSI RTX 3090 GAMING X TRIO 24G">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                data-src="https://m.media-amazon.com/images/I/31ytZ-hrs8L._SL500_.jpg"
                                alt="Build My PC, PC Builder, MSI RTX 3090 GAMING X TRIO 24G">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                data-src="https://m.media-amazon.com/images/I/41329zTARGL._SL500_.jpg"
                                alt="Build My PC, PC Builder, MSI RTX 3090 GAMING X TRIO 24G">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                data-src="https://m.media-amazon.com/images/I/41uOWq0-lsL._SL500_.jpg"
                                alt="Build My PC, PC Builder, MSI RTX 3090 GAMING X TRIO 24G">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                data-src="https://m.media-amazon.com/images/I/416b6-eZt4L._SL500_.jpg"
                                alt="Build My PC, PC Builder, MSI RTX 3090 GAMING X TRIO 24G">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                data-src="https://m.media-amazon.com/images/I/21y6T7pjnTL._SL500_.jpg"
                                alt="Build My PC, PC Builder, MSI RTX 3090 GAMING X TRIO 24G">
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
                    </ol>
                </div>
                
                <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">General</span>
                        <div class="level2"><span class="key">Brand</span> : <span>MSI</span></div>
                        <div class="level2"><span class="key">Chipset</span> : <span>GeForce RTX
                                3090</span></div>
                        <div class="level2"><span class="key">Memory</span> : <span>24 GB (GDRR6X)</span>
                        </div>
                        <div class="level2"><span class="key">Bechmark</span> : <span>19,970</span></div>
                        <div class="level2"><span class="key">Max Power Consumption</span> : <span>350
                                W</span></div>
                    </div>
                    <div class="level1"><span class="title">Clock Speed</span>
                        <div class="level2"><span class="key">Clock Speed</span> : <span>1785 MHz</span>
                        </div>
                        <div class="level2"><span class="key">Base Clock Speed</span> : <span>1395
                                MHz</span></div>
                    </div>
                    <div class="level1"><span class="title">Additional Information</span>
                        <div class="level2"><span class="key">Length</span> : <span>335 mm</span></div>
                        <div class="level2"><span class="key">Frame Sync</span> : <span>G-Sync</span>
                        </div>
                        <div class="level2"><span class="key">SLI</span> : <span>2-way SLI Capable</span>
                        </div>
                        <div class="level2"><span class="key">Cooler Type</span> : <span>Open
                                Fansink</span></div>
                        <div class="level2"><span class="key">Interface</span> : <span>PCIe x16</span>
                        </div>
                        <div class="level2"><span class="key">Supported API</span> : <span>DirectX 12,
                                OpenGL 4.6, Vulkan</span></div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC
                    Graphics Card (RTX 3090 GAMING X TRIO 24G)</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="4.3 out of 5">
                        <div class="stars-score" style="width: 86%">
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
                    <div>&nbsp;&nbsp;(63 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    {{$graphic->product->features}}

                    
                    <div class="budget-price">৳ {{$graphic->product->price}}</div>
                   
                    <div class="align-button">
                        <a href="{{route('add-product-to-cart',['product_id'=>$graphic->product->id])}}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i> Add Product to cart</a>
                        <a href="https://amazon.com/dp/B08HRBW6VB?tag=pcbuilder00-20" target="_blank"
                            class="btn btn-primary btn1 "><i class="fab fa-amazon"></i> View on Amazon </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
