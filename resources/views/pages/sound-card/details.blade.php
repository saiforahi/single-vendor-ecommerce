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
        <h2>{{$sound_card->name}}</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('sound-card-list')}}">Sound Card</a>
            <i class="fa fa-angle-right"></i><a href="{{route('sound-card-details',['id'=>$sound_card->id])}}">{{$sound_card->product->short_name}}</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item img-gradient active">
                            <img class="d-block img-fluid big-image lazy"
                                title="Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card"
                                data-src="https://m.media-amazon.com/images/I/41r004qhcPL.jpg"
                                alt="Build My PC, PC Builder, Creative SB1780">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card"
                                data-src="https://m.media-amazon.com/images/I/31vE3N2YubL.jpg"
                                alt="Build My PC, PC Builder, Creative SB1780">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card"
                                data-src="https://m.media-amazon.com/images/I/31eDIau5X5L.jpg"
                                alt="Build My PC, PC Builder, Creative SB1780">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card"
                                data-src="https://m.media-amazon.com/images/I/41nlzIN9-LL.jpg"
                                alt="Build My PC, PC Builder, Creative SB1780">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card"
                                data-src="https://m.media-amazon.com/images/I/41qu+Uj0qeL.jpg"
                                alt="Build My PC, PC Builder, Creative SB1780">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card"
                                data-src="https://m.media-amazon.com/images/I/31kIjp7bgZL.jpg"
                                alt="Build My PC, PC Builder, Creative SB1780">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card"
                                data-src="https://m.media-amazon.com/images/I/31aKpxXLewL.jpg"
                                alt="Build My PC, PC Builder, Creative SB1780">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card"
                                data-src="https://m.media-amazon.com/images/I/41ehaIRCM6L.jpg"
                                alt="Build My PC, PC Builder, Creative SB1780">
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

                {{-- <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">General</span>
                        <div class="level2"><span class="key">Host Interface</span> : <span>PCIe</span>
                        </div>
                        <div class="level2"><span class="title">Ports</span>
                            <div class="level3"><span class="key"></span><span>1 x TOSLINK S/PDIF
                                    Input</span></div>
                            <div class="level3"><span class="key"></span><span>1 x TOSLINK S/PDIF
                                    Output</span></div>
                            <div class="level3"><span class="key"></span><span>2 x 1/8" / 3.5 mm Line
                                    Output</span></div>
                            <div class="level3"><span class="key"></span><span>1 x 2RCA Line
                                    Output</span></div>
                            <div class="level3"><span class="key"></span><span>1 x Proprietary Link
                                    Input/Output</span></div>
                        </div>
                        <div class="level2"><span class="key">Channels</span> : <span>7.1</span></div>
                        <div class="level2"><span class="title">Impedance</span>
                            <div class="level3"><span class="key"></span><span>1 Ohm (Output)</span>
                            </div>
                            <div class="level3"><span class="key"></span><span>16 to 600 Ohms
                                    (Headphone)</span></div>
                            <div class="level3"><span class="key"></span><span>16 to 31 Ohms (IEM)</span>
                            </div>
                            <div class="level3"><span class="key"></span><span>32 to 149 Ohms
                                    (Normal)</span></div>
                            <div class="level3"><span class="key"></span><span>150 to 600 Ohms (High
                                    Gain)</span></div>
                        </div>
                        <div class="level2"><span class="key">Max Sample Rate/Resolution</span> :
                            <span>384 kHz / 32-Bit</span>
                        </div>
                        <div class="level2"><span class="key">THD</span> : <span> 0.0004% </span></div>
                    </div>
                    <div class="level1"><span class="title">Software System Requirements</span>
                        <div class="level2"><span class="title">OS Compatibility</span>
                            <div class="level3"><span class="key"></span><span>Windows 10</span></div>
                            <div class="level3"><span class="key"></span><span>Windows 8.1</span></div>
                            <div class="level3"><span class="key"></span><span>Windows 7</span></div>
                        </div>
                        <div class="level2"><span class="key">Memory Requirement</span> : <span>1
                                GB</span></div>
                        <div class="level2"><span class="key">Storage Requirement</span> : <span>600 MB
                            </span></div>
                    </div>
                    <div class="level1"><span class="title">Physical</span>
                        <div class="level2"><span class="key">Audio Controls</span> : <span>Yes</span>
                        </div>
                        <div class="level2"><span class="key">Power Requirements</span> : <span>2 x 6-Pin
                                PCIe Power (500 W PSU)</span></div>
                        <div class="level2"><span class="title">Dimensions</span>
                            <div class="level3"><span class="key"></span><span>7.01 x 5 x 0.87" / 178 x
                                    127 x 22 mm (PCIe Card)</span></div>
                            <div class="level3"><span class="key"></span><span>5.91 x 5.04 x 2.56" / 150
                                    x 128 x 65 mm (Module)</span></div>
                        </div>
                        <div class="level2"><span class="title">Weight</span>
                            <div class="level3"><span class="key"></span><span>8.11 oz / 230 g (PCIe
                                    Card)</span></div>
                            <div class="level3"><span class="key"></span><span>16.9 oz / 480 g
                                    (Module)</span></div>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Packaging Info</span>
                        <div class="level2"><span class="key">Package Weight</span> : <span>2.8
                                lb</span></div>
                        <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>8.5
                                x 7.8 x 4.7"</span></div>
                    </div>
                </div> --}}
            </div>

            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>Creative Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="4.1 out of 5">
                        <div class="stars-score" style="width: 82%">
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
                    <div>&nbsp;&nbsp;(9 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    {{$sound_card->product->features}}

                    
                    <div class="budget-price">৳ {{$sound_card->product->price}}</div>
                    
                    <div class="align-button">
                        <a href="{{ route('add-product-to-cart', ['product_id' => $sound_card->product->id]) }}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i> Add Product to List</a>
                        <a href="https://amazon.com/dp/B07M8SRBPH?tag=pcbuilder00-20" target="_blank"
                            class="btn btn-primary btn1 "> View on Amazon </a>
                    </div>
                </div>
            </div>
            <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">General</span>
                    <div class="level2"><span class="key">Host Interface</span> : <span>PCIe</span>
                    </div>
                    <div class="level2"><span class="title">Ports</span>
                        <div class="level3"><span class="key"></span><span>1 x TOSLINK S/PDIF
                                Input</span></div>
                        <div class="level3"><span class="key"></span><span>1 x TOSLINK S/PDIF
                                Output</span></div>
                        <div class="level3"><span class="key"></span><span>2 x 1/8" / 3.5 mm Line
                                Output</span></div>
                        <div class="level3"><span class="key"></span><span>1 x 2RCA Line Output</span>
                        </div>
                        <div class="level3"><span class="key"></span><span>1 x Proprietary Link
                                Input/Output</span></div>
                    </div>
                    <div class="level2"><span class="key">Channels</span> : <span>7.1</span></div>
                    <div class="level2"><span class="title">Impedance</span>
                        <div class="level3"><span class="key"></span><span>1 Ohm (Output)</span></div>
                        <div class="level3"><span class="key"></span><span>16 to 600 Ohms
                                (Headphone)</span></div>
                        <div class="level3"><span class="key"></span><span>16 to 31 Ohms (IEM)</span>
                        </div>
                        <div class="level3"><span class="key"></span><span>32 to 149 Ohms
                                (Normal)</span></div>
                        <div class="level3"><span class="key"></span><span>150 to 600 Ohms (High
                                Gain)</span></div>
                    </div>
                    <div class="level2"><span class="key">Max Sample Rate/Resolution</span> : <span>384
                            kHz / 32-Bit</span></div>
                    <div class="level2"><span class="key">THD</span> : <span> 0.0004% </span></div>
                </div>
                <div class="level1"><span class="title">Software System Requirements</span>
                    <div class="level2"><span class="title">OS Compatibility</span>
                        <div class="level3"><span class="key"></span><span>Windows 10</span></div>
                        <div class="level3"><span class="key"></span><span>Windows 8.1</span></div>
                        <div class="level3"><span class="key"></span><span>Windows 7</span></div>
                    </div>
                    <div class="level2"><span class="key">Memory Requirement</span> : <span>1 GB</span>
                    </div>
                    <div class="level2"><span class="key">Storage Requirement</span> : <span>600 MB
                        </span></div>
                </div>
                <div class="level1"><span class="title">Physical</span>
                    <div class="level2"><span class="key">Audio Controls</span> : <span>Yes</span>
                    </div>
                    <div class="level2"><span class="key">Power Requirements</span> : <span>2 x 6-Pin
                            PCIe Power (500 W PSU)</span></div>
                    <div class="level2"><span class="title">Dimensions</span>
                        <div class="level3"><span class="key"></span><span>7.01 x 5 x 0.87" / 178 x 127
                                x 22 mm (PCIe Card)</span></div>
                        <div class="level3"><span class="key"></span><span>5.91 x 5.04 x 2.56" / 150 x
                                128 x 65 mm (Module)</span></div>
                    </div>
                    <div class="level2"><span class="title">Weight</span>
                        <div class="level3"><span class="key"></span><span>8.11 oz / 230 g (PCIe
                                Card)</span></div>
                        <div class="level3"><span class="key"></span><span>16.9 oz / 480 g
                                (Module)</span></div>
                    </div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>2.8 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>8.5 x
                            7.8 x 4.7"</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
