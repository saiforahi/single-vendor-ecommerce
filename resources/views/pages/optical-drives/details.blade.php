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

@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h2>{{$optical_drive->name}}</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../../../product/optical-drive/index.html">Optical Drive</a>
            <i class="fa fa-angle-right"></i><a href="optical-drives-details">ASUS DRW 24 B1STA </a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item img-gradient active">
                            <img class="d-block img-fluid big-image lazy"
                                title="Asus 24x DVD-RW Serial-ATA Internal OEM Optical Drive DRW"
                                data-src="https://m.media-amazon.com/images/I/31JpWsniizL.jpg"
                                alt="Build My PC, PC Builder, ASUS DRW 24 B1STA ">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Asus 24x DVD-RW Serial-ATA Internal OEM Optical Drive DRW"
                                data-src="https://m.media-amazon.com/images/I/310SUnMHJnL.jpg"
                                alt="Build My PC, PC Builder, ASUS DRW 24 B1STA ">
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
                    </ol>
                </div>

            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>Asus 24x DVD-RW Serial-ATA Internal OEM Optical Drive DRW</h1>
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
                    <div>&nbsp;&nbsp;(5384 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                   {{$optical_drive->product->features}}

                    
                    <div class="budget-price">৳ {{$optical_drive->product->price}}</div>
                    
                    <div class="align-button">
                        <a href="{{ route('add-product-to-cart', ['product_id' => $optical_drive->product->id]) }}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i> Add Product to List</a>
                        <a href="https://amazon.com/dp/B0033Z2BAQ?tag=pcbuilder00-20" target="_blank"
                            class="btn btn-primary btn1 "><i class="fab fa-amazon"></i> View on Amazon </a>
                    </div>
                </div>
            </div>
            <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">General</span>
                    <div class="level2"><span class="key">Enclosure Type</span> : <span>Internal</span>
                    </div>
                    <div class="level2"><span class="key">Interface</span> : <span>SATA I (1.5
                            Gb/s)</span></div>
                    <div class="level2"><span class="key">DVD Access Time</span> : <span>150 ms</span>
                    </div>
                    <div class="level2"><span class="title">DVD Read Speed</span>
                        <div class="level3"><span class="key"></span><span>DVD-R (SL): 16x</span></div>
                        <div class="level3"><span class="key"></span><span>DVD+R (DL): 12x</span></div>
                        <div class="level3"><span class="key"></span><span>DVD-R (DL): 12x</span></div>
                        <div class="level3"><span class="key"></span><span>DVD-RW: 12x</span></div>
                        <div class="level3"><span class="key"></span><span>DVD-ROM (DL): 12x</span></div>
                        <div class="level3"><span class="key"></span><span>DVD-RAM: 12x</span></div>
                        <div class="level3"><span class="key"></span><span>DVD-ROM (SL): 16x</span></div>
                        <div class="level3"><span class="key"></span><span>DVD+R (SL): 16x</span></div>
                        <div class="level3"><span class="key"></span><span>DVD+RW: 12x</span></div>
                    </div>
                    <div class="level2"><span class="key">CD Access Time</span> : <span>130 ms</span>
                    </div>
                    <div class="level2"><span class="title">CD Read Speed</span>
                        <div class="level3"><span class="key"></span><span>CD-R: 48x</span></div>
                        <div class="level3"><span class="key"></span><span>CD-ROM: 48x</span></div>
                        <div class="level3"><span class="key"></span><span>CD-RW: 40x</span></div>
                    </div>
                    <div class="level2"><span class="key">Mounting Orientation</span> : <span>Horizontal,
                            Vertical</span></div>
                    <div class="level2"><span class="key">Operating Temperature</span> : <span>41 to
                            113°F / 5 to 45°C</span></div>
                    <div class="level2"><span class="key">Operating Humidity</span> : <span>20 to
                            80%</span></div>
                    <div class="level2"><span class="key">Storage Temperature</span> : <span>-4 to 140°F
                            / -20 to 60°C</span></div>
                    <div class="level2"><span class="key">Storage Humidity</span> : <span>15 to
                            90%</span></div>
                    <div class="level2"><span class="key">Dimensions (W x H x D)</span> : <span>5.8 x 6.7
                            x 1.7" / 14.8 x 17.1 x 4.2 cm</span></div>
                    <div class="level2"><span class="key">Weight</span> : <span>1.5 lb / 0.7 kg</span>
                    </div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>1.475 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>8.9 x
                            6.3 x 3"</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
