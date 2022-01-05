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
        <h2>Western Digital WD 1TB (WDBUZG0010BBK-WESN)</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../../../product/external-hard-drive/index.html">External Hard
                Drive</a>
            <i class="fa fa-angle-right"></i><a href="{{route('external-hard-drive-details')}}">Western Digital WD 1TB</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item img-gradient active">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/31e9a-wExeL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/514vKkesoPL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/51Dd-wKEQLL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/41vWCU5ybxL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/41ytasYsV3L.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/51vVtgJf4HL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/41qoljT6n3L.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/41c7TSQiCLL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/311gCGhRyZL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/41JSWOt5yuL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Western Digital WD Elements 1TB Portable External Hard Drive"
                                data-src="https://m.media-amazon.com/images/I/31h2rp12GjL.jpg"
                                alt="Build My PC, PC Builder, Western Digital WD 1TB">
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
                    </ol>
                </div>

                <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">General</span>
                        <div class="level2"><span class="key">Storage Capacity</span> : <span>1 TB</span>
                        </div>
                        <div class="level2"><span class="key">Connection Interface</span> : <span>1 x USB
                                3.2 / USB 3.1 Gen 1 (USB Micro-B)</span></div>
                        <div class="level2"><span class="key">Pre-Format</span> : <span>NTFS</span></div>
                    </div>
                    <div class="level1"><span class="title">Internal Drive</span>
                        <div class="level2"><span class="key">Internal Interface</span> : <span>SATA
                                (Unspecified)</span></div>
                        <div class="level2"><span class="key">Type</span> : <span>Hard Disk Drive</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">External Enclosure</span>
                        <div class="level2"><span class="key">Bus Power</span> : <span>USB</span></div>
                        <div class="level2"><span class="key">Environmental Resistance</span> :
                            <span>None</span>
                        </div>
                        <div class="level2"><span class="key">Operating Temperature</span> : <span>41 to
                                95°F / 5 to 35°C</span></div>
                        <div class="level2"><span class="key">Storage Temperature</span> : <span>-4 to
                                149°F / -20 to 65°C</span></div>
                        <div class="level2"><span class="key">Dimensions (L x W x H)</span> : <span>4.3 x
                                3.3 x 0.6" / 110.5 x 84.3 x 15.0 mm</span></div>
                        <div class="level2"><span class="key">Weight</span> : <span>0.29 lb /
                                0.13 kg</span></div>
                    </div>
                    <div class="level1"><span class="title">Packaging Info</span>
                        <div class="level2"><span class="key">Package Weight</span> : <span>0.5 lb</span>
                        </div>
                        <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>5.75
                                x 4.8 x 1.7"</span></div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>Western Digital WD Elements 1TB Portable External Hard Drive</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="4.6 out of 5">
                        <div class="stars-score" style="width: 92%">
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
                    <div>&nbsp;&nbsp;(75297 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    {{$external_hard_drive->product->features}}

                    
                    <div class="budget-price">৳ {{$external_hard_drive->product->price}}</div>
                    
                    <div class="align-button">
                        <a href="{{route('add-product-to-cart',['product_id'=>$external_hard_drive->product->id])}}"
                            class="btn btn-primary btn2 "><i class="fa fa-plus"></i> Add Product to Cart</a>
                        <a href="https://amazon.com/dp/B06VVS7S94?tag=pcbuilder00-20" target="_blank"
                            class="btn btn-primary btn1 "><i class="fab fa-amazon"></i> View on Amazon </a>
                    </div>
                </div>
            </div>
            <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">General</span>
                    <div class="level2"><span class="key">Storage Capacity</span> : <span>1 TB</span>
                    </div>
                    <div class="level2"><span class="key">Connection Interface</span> : <span>1 x USB
                            3.2 / USB 3.1 Gen 1 (USB Micro-B)</span></div>
                    <div class="level2"><span class="key">Pre-Format</span> : <span>NTFS</span></div>
                </div>
                <div class="level1"><span class="title">Internal Drive</span>
                    <div class="level2"><span class="key">Internal Interface</span> : <span>SATA
                            (Unspecified)</span></div>
                    <div class="level2"><span class="key">Type</span> : <span>Hard Disk Drive</span>
                    </div>
                </div>
                <div class="level1"><span class="title">External Enclosure</span>
                    <div class="level2"><span class="key">Bus Power</span> : <span>USB</span></div>
                    <div class="level2"><span class="key">Environmental Resistance</span> :
                        <span>None</span>
                    </div>
                    <div class="level2"><span class="key">Operating Temperature</span> : <span>41 to
                            95°F / 5 to 35°C</span></div>
                    <div class="level2"><span class="key">Storage Temperature</span> : <span>-4 to
                            149°F / -20 to 65°C</span></div>
                    <div class="level2"><span class="key">Dimensions (L x W x H)</span> : <span>4.3 x
                            3.3 x 0.6" / 110.5 x 84.3 x 15.0 mm</span></div>
                    <div class="level2"><span class="key">Weight</span> : <span>0.29 lb /
                            0.13 kg</span></div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>0.5 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>5.75 x
                            4.8 x 1.7"</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
