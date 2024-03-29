@extends('layouts.app')

@push('style')
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
        

    </style>
    <style>
        ul {
            padding-inline-start: 40px;
        }

    </style>
    <div class="budget-price">$6,499.77</div>
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
        <h2>{{$processor->name}}</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('processor-list')}}">Processor</a>
            <i class="fa fa-angle-right"></i><a href="{{route('processor-details',['id'=>$processor->id])}}">{{$processor->product->short_name}}</a>
        </span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($processor->product->getMedia('main_image') as $image)
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
                        @foreach ($processor->getMedia('main_image') as $image)
                            <li data-target="#main-carousel" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach
                    </ol>
                </div>

                {{-- <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">General</span>
                        <div class="level2"><span class="key">CPU Model</span> : <span>AMD Ryzen
                                Threadripper 3990X</span></div>
                        <div class="level2"><span class="key">CPU Socket</span> : <span>TRX4</span></div>
                        <div class="level2"><span class="key">Manufacturing Process</span> : <span>7
                                nm</span></div>
                        <div class="level2"><span class="key">Maximum Number of PCIe Lanes</span> :
                            <span>88 (Revision
                                4.0)</span>
                        </div>
                        <div class="level2"><span class="key">Unlocked</span> : <span>Yes</span></div>
                    </div>
                    <div class="level1"><span class="title">Performance</span>
                        <div class="level2"><span class="key">Number of Cores</span> : <span>64</span>
                        </div>
                        <div class="level2"><span class="key">Number of Threads</span> : <span>128</span>
                        </div>
                        <div class="level2"><span class="key">Base Clock Speed</span> : <span>2.9
                                GHz</span></div>
                        <div class="level2"><span class="key">Maximum Boost Speed</span> : <span>4.3
                                GHz</span></div>
                        <div class="level2"><span class="key">L3 Cache</span> : <span>256 MB</span></div>
                    </div>
                    <div class="level1"><span class="title">Memory Support</span>
                        <div class="level2"><span class="key">Memory Support</span> : <span>DDR4 3200
                                MHz</span></div>
                        <div class="level2"><span class="key">ECC Memory</span> : <span>Yes</span></div>
                        <div class="level2"><span class="key">Channel Architecture</span> : <span>Quad
                                Channel</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Power</span>
                        <div class="level2"><span class="key">Thermal Design Power (TDP)</span> :
                            <span>280 W</span>
                        </div>
                        <div class="level2"><span class="key">Maximum Temperature</span> : <span>154.4°F
                                / 68°C</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Integrated Graphics</span>
                        <div class="level2"><span class="key">Graphics Chipset</span> : <span>None</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Packaging Info</span>
                        <div class="level2"><span class="key">Package Weight</span> : <span>1.955
                                lb</span></div>
                        <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>11.4
                                x 7.7 x
                                4.2"</span></div>
                    </div>
                </div> --}}
            </div>

            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>{{ $processor->name }}</h1>
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
                    <div>&nbsp;&nbsp;(27 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                <div class="description">
                    {!!$processor->product->description!!}
                </div>

                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    {!!$processor->product->features!!}

                    <div class="budget-price">৳ {{$processor->product->price}}</div>
                    
                    <div class="align-button">
                        <a href="{{ route('add-product-to-cart', ['product_id' => $processor->product->id]) }}"
                            class="btn btn-primary btn2 "><i class="fa fa-plus"></i> Add Product to Cart</a>
                        <a href="{{ route('add-processor-to-system', ['processor_id' => $processor->id]) }}"
                            class="btn btn-primary btn1 ">Add to System Builder</a>
                    </div>
                </div>
            </div>
            {{-- <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">General</span>
                    <div class="level2"><span class="key">CPU Model</span> : <span>AMD Ryzen
                            Threadripper 3990X</span>
                    </div>
                    <div class="level2"><span class="key">CPU Socket</span> : <span>TRX4</span></div>
                    <div class="level2"><span class="key">Manufacturing Process</span> : <span>7
                            nm</span></div>
                    <div class="level2"><span class="key">Maximum Number of PCIe Lanes</span> :
                        <span>88 (Revision
                            4.0)</span>
                    </div>
                    <div class="level2"><span class="key">Unlocked</span> : <span>Yes</span></div>
                </div>
                <div class="level1"><span class="title">Performance</span>
                    <div class="level2"><span class="key">Number of Cores</span> : <span>64</span>
                    </div>
                    <div class="level2"><span class="key">Number of Threads</span> : <span>128</span>
                    </div>
                    <div class="level2"><span class="key">Base Clock Speed</span> : <span>2.9
                            GHz</span></div>
                    <div class="level2"><span class="key">Maximum Boost Speed</span> : <span>4.3
                            GHz</span></div>
                    <div class="level2"><span class="key">L3 Cache</span> : <span>256 MB</span></div>
                </div>
                <div class="level1"><span class="title">Memory Support</span>
                    <div class="level2"><span class="key">Memory Support</span> : <span>DDR4 3200
                            MHz</span></div>
                    <div class="level2"><span class="key">ECC Memory</span> : <span>Yes</span></div>
                    <div class="level2"><span class="key">Channel Architecture</span> : <span>Quad
                            Channel</span></div>
                </div>
                <div class="level1"><span class="title">Power</span>
                    <div class="level2"><span class="key">Thermal Design Power (TDP)</span> : <span>280
                            W</span></div>
                    <div class="level2"><span class="key">Maximum Temperature</span> : <span>154.4°F /
                            68°C</span></div>
                </div>
                <div class="level1"><span class="title">Integrated Graphics</span>
                    <div class="level2"><span class="key">Graphics Chipset</span> : <span>None</span>
                    </div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>1.955 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>11.4 x
                            7.7 x 4.2"</span>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
