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
    <style>
        .budget-price {
            color: #fff !important;
            font-size: 35px;
            font-weight: 600;
            margin-bottom: 20px;
        }

    </style>
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h2>{{ $storage->name }}</h2>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('storage-list')}}">Storage</a>
            <i class="fa fa-angle-right"></i><a href="{{route('storage-details',['id'=>$storage->id])}}">Samsung 970 EVO</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($storage->product->getMedia('main_image') as $image)
                        <div class="carousel-item img-gradient active">
                            <img class="d-block img-fluid big-image lazy"
                                title="Samsung EVO 970 1TB PCIe Gen3 x4 NVMe M.2-2280 Internal Solid State Drive with V-NAND Technology & 1024MB Cache"
                                data-src="https://m.media-amazon.com/images/I/31SSaevqVNL.jpg"
                                alt="Build My PC, PC Builder, Samsung 970 EVO">
                        </div>
                        @endforeach
                    </div>
                    @if(count($storage->product->getMedia('main_image'))>1)
                    <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon temp"></span>
                        <span class="sr-only" aria-hidden="true">Prev</span>
                    </a>
                    <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only" aria-hidden="true">Next</span>
                    </a>
                    @endif
                    <ol class="carousel-indicators">
                        @foreach ($storage->product->getMedia('main_image') as $image)
                            <li data-target="#main-carousel" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach
                    </ol>
                </div>
                
                <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">Storage</span>
                        <div class="level2"><span class="key">Drive Capacity</span> : <span>{{ empty(json_decode($storage->storage_specs, true)) ? '' : json_decode($storage->storage_specs, true)['drive_capacity'] }}</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Performance</span>
                        <div class="level2"><span class="key">Interface</span> : <span>{{ empty(json_decode($storage->performance_specs, true)) ? '' : json_decode($storage->performance_specs, true)['interface'] }}</span>
                        </div>
                        <div class="level2"><span class="key">Sequential Read Speed</span> :
                            <span>{{ empty(json_decode($storage->performance_specs, true)) ? '' : json_decode($storage->performance_specs, true)['read_speed'] }}</span>
                        </div>
                        <div class="level2"><span class="key">Sequential Write Speed</span> :
                            <span>{{ empty(json_decode($storage->performance_specs, true)) ? '' : json_decode($storage->performance_specs, true)['write_speed'] }}</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Physical</span>
                        <div class="level2"><span class="key">Drive Type</span> : <span>{{ empty(json_decode($storage->physical_specs, true)) ? '' : json_decode($storage->physical_specs, true)['drive_type'] }}</span></div>
                        <div class="level2"><span class="key">Form Factor</span> : <span>{{ empty(json_decode($storage->physical_specs, true)) ? '' : json_decode($storage->physical_specs, true)['form_factor'] }}</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">SSD Specs</span>
                        <div class="level2"><span class="key">Flash Controller</span> :
                            <span>Samsung Phoenix</span>
                        </div>
                        <div class="level2"><span class="key">Flash Memory Type</span> : <span>3D
                                V-NAND</span></div>
                        <div class="level2"><span class="key">SMART Support</span> : <span>Yes</span>
                        </div>
                        <div class="level2"><span class="key">TRIM Support</span> : <span>Yes</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Reliability / Data Integrity</span>
                        <div class="level2"><span class="key">Encryption</span> : <span>{{ empty(json_decode($storage->reliability_specs, true)) ? "":json_decode($storage->reliability_specs, true)['encryption']}}</span></div>
                    </div>
                    {{--<div class="level1"><span class="title">Packaging Info</span>
                        <div class="level2"><span class="key">Package Weight</span> : <span>0.185
                                lb</span></div>
                        <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>6.7 x
                                6.25 x
                                6.15"</span></div>
                    </div> --}}
                </div>
            </div>
            <style>
                .sticky {
                    /*position: sticky!important;
                        top: 80px;*/
                }

            </style>
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>{{$storage->name}}</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="4.9 out of 5">
                        <div class="stars-score" style="width: 98%">
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
                    <div>&nbsp;&nbsp;(12940 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                <div class="description">
                    <p>Looking for the best SSD? The new Samsung 970 EVO (1 TB) NVMe M.2 Internal SSD from Samsung is
                        built with its 4th generation VNAND technology in an M.2 form factor with PCIe Gen3 x4
                        connectivity. </p>
                    <p>The Samsung EVO 970 supports 3400 and 2500 MB/s read and write speeds respectively. This SSD is
                        ideal for faster boot and load timing and it comes with a 5-years warranty.</p>
                </div>
                <style>
                    @media screen and (min-width: 768px) {
                        ul {
                            padding-right: 100px;
                        }
                    }

                </style>
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                   {{$storage->product->features}}

                    
                    <div class="budget-price">৳ {{$storage->product->price}}</div>

                    <div class="align-button">
                        <a href="{{route('add-product-to-cart',['product_id'=>$storage->product->id])}}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i> Add Product to Cart</a>
                        <a href="https://amazon.com/dp/B07BN217QG?tag=pcbuilder00-20" target="_blank"
                            class="btn btn-primary btn2 "><i class="fab fa-plus"></i> View on Amazon </a>
                    </div>
                </div>
            </div>
            <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">Storage</span>
                    <div class="level2"><span class="key">Drive Capacity</span> : <span>{{ empty(json_decode($storage->storage_specs, true)) ? '' : json_decode($storage->storage_specs, true)['drive_capacity'] }}</span>
                    </div>
                </div>
                <div class="level1"><span class="title">Performance</span>
                    <div class="level2"><span class="key">Interface</span> : <span>{{ empty(json_decode($storage->performance_specs, true)) ? '' : json_decode($storage->performance_specs, true)['interface'] }}</span>
                    </div>
                    <div class="level2"><span class="key">Sequential Read Speed</span> :
                        <span>{{ empty(json_decode($storage->performance_specs, true)) ? '' : json_decode($storage->performance_specs, true)['read_speed'] }}</span>
                    </div>
                    <div class="level2"><span class="key">Sequential Write Speed</span> :
                        <span>{{ empty(json_decode($storage->performance_specs, true)) ? '' : json_decode($storage->performance_specs, true)['write_speed'] }}</span>
                    </div>
                </div>
                <div class="level1"><span class="title">Physical</span>
                    <div class="level2"><span class="key">Drive Type</span> : <span>{{ empty(json_decode($storage->physical_specs, true)) ? '' : json_decode($storage->physical_specs, true)['drive_type'] }}</span></div>
                    <div class="level2"><span class="key">Form Factor</span> : <span>{{ empty(json_decode($storage->physical_specs, true)) ? '' : json_decode($storage->physical_specs, true)['form_factor'] }}</span>
                    </div>
                </div>
                <div class="level1"><span class="title">SSD Specs</span>
                    <div class="level2"><span class="key">Flash Controller</span> :
                        <span>Samsung Phoenix</span>
                    </div>
                    <div class="level2"><span class="key">Flash Memory Type</span> : <span>3D
                            V-NAND</span></div>
                    <div class="level2"><span class="key">SMART Support</span> : <span>Yes</span></div>
                    <div class="level2"><span class="key">TRIM Support</span> : <span>Yes</span></div>
                </div>
                <div class="level1"><span class="title">Reliability / Data Integrity</span>
                    <div class="level2"><span class="key">Encryption</span> : <span>{{ empty(json_decode($storage->reliability_specs, true)) ? "":json_decode($storage->reliability_specs, true)['encryption']}}</span></div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>0.185 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>6.7 x
                            6.25 x
                            6.15"</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
