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
        .budget-price {
            color: #fff !important;
            font-size: 35px;
            font-weight: 600;
            margin-bottom: 20px;
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
        <h2>{{$motherboard->name}}</h2>
        <span><a href="../../../index.html">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('motherboard-list')}}">Motherboard</a>
            <i class="fa fa-angle-right"></i><a href="{{route('motherboard-details',['id'=>$motherboard->id])}}">{{$motherboard->product->short_name}}</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($motherboard->product->getMedia('main_image') as $image)
                            <div
                                class="{{ $loop->index == 0 ? 'carousel-item img-gradient active' : 'carousel-item img-gradient' }}">
                                <img class="d-block img-fluid big-image lazy"
                                    title="AMD Ryzen Threadripper 3990X, 64 Cores & 128-Threads Unlocked Desktop Processor without Cooler"
                                    data-src="{{ $image->getUrl('main_image') }}"
                                    alt="Build My PC, System Builder, AMD Ryzen Threadripper 3990X">
                            </div>
                        @endforeach
                    </div>
                    @if(count($motherboard->product->getMedia('main_image'))>1)
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
                        @foreach ($motherboard->product->getMedia('main_image') as $image)
                            <li data-target="#main-carousel" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach

                    </ol>
                </div>
                
                {{-- <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">CPU</span>
                        <div class="level2"><span class="key">Chipset</span> : <span>AMD X570</span>
                        </div>
                        <div class="level2"><span class="key">CPU Socket</span> : <span>TRX4</span></div>
                    </div>
                    <div class="level1"><span class="title">Back Panel I/O</span>
                        <div class="level2"><span class="title">USB</span>
                            <div class="level3"><span class="key"></span><span>2 x USB 3.1 / USB 3.2 Gen
                                    2 Type-A</span></div>
                            <div class="level3"><span class="key"></span><span>1 x USB 3.2 Gen 2x2
                                    Type-C</span></div>
                            <div class="level3"><span class="key"></span><span>4 x USB 3.1 / USB 3.2 Gen
                                    1 Type-A</span></div>
                        </div>
                        <div class="level2"><span class="key">Thunderbolt</span> : <span>None</span>
                        </div>
                        <div class="level2"><span class="key">Display</span> : <span>None</span></div>
                        <div class="level2"><span class="title">Audio</span>
                            <div class="level3"><span class="key"></span><span>5 x 3.5 mm</span></div>
                            <div class="level3"><span class="key"></span><span>1 x S/PDIF</span></div>
                        </div>
                        <div class="level2"><span class="title">Ethernet / Controller</span>
                            <div class="level3"><span class="key"></span><span>1 x Aquantia AQC107
                                    10GbE</span></div>
                            <div class="level3"><span class="key"></span><span>1 x Realtek Dragon
                                    RTL8125AG 2.5Gigabit</span></div>
                        </div>
                        <div class="level2"><span class="key">PS/2</span> : <span>1 x PS/2</span></div>
                        <div class="level2"><span class="key">Wi-Fi Antenna</span> : <span>2 x
                                Connector</span></div>
                        <div class="level2"><span class="key">Buttons</span> : <span>BIOS Flashback,
                                Clear CMOS</span></div>
                    </div>
                    <div class="level1"><span class="title">Memory</span>
                        <div class="level2"><span class="key">Memory Slots</span> : <span>8 x
                                288-Pin</span></div>
                        <div class="level2"><span class="key">Memory Support</span> : <span>DDR4 2133,
                                2400, 2667, 2933, 3200, 3466, 3600, 3733, 3800, 3866, 4000, 4133, 4200, 4266, 4333, 4400,
                                4533, 4600, 4666 MHz</span></div>
                        <div class="level2"><span class="key">Maximum Capacity</span> : <span>256
                                GB</span></div>
                        <div class="level2"><span class="key">Channel Architecture</span> : <span>Quad
                                Channel</span></div>
                        <div class="level2"><span class="key">ECC Support</span> : <span>Non-ECC, ECC
                                Unbuffered</span></div>
                    </div>
                    <div class="level1"><span class="title">Storage Expansion</span>
                        <div class="level2"><span class="key">SATA</span> : <span>8 x SATA III</span>
                        </div>
                        <div class="level2"><span class="title">M.2</span>
                            <div class="level3"><span class="key"></span><span>2 x M Key 2260, 2280 (PCIe
                                    4.0 x4)</span></div>
                            <div class="level3"><span class="key"></span><span>1 x M Key 2242, 2260,
                                    2280, 22110 (PCIe 4.0 x4, SATA III)</span></div>
                        </div>
                        <div class="level2"><span class="key">U.2</span> : <span>None</span></div>
                        <div class="level2"><span class="key">RAID Support</span> : <span>RAID 0, 1, 10
                                (SATA)</span></div>
                    </div>
                    <div class="level1"><span class="title">Internal I/O</span>
                        <div class="level2"><span class="key">Expansion Slots</span> : <span>4 x PCIe
                                4.0 x16</span></div>
                        <div class="level2"><span class="title">USB</span>
                            <div class="level3"><span class="key"></span><span>1 x USB 2.0 Header
                                    (Supports 2 USB Type-A Port)</span></div>
                            <div class="level3"><span class="key"></span><span>2 x USB 3.1 / USB 3.2
                                    Gen 1 Header (Supports 4 USB Type-A Port)</span></div>
                            <div class="level3"><span class="key"></span><span>1 x USB 3.1 / USB 3.2
                                    Gen 2 Header (Supports 1 USB Type-C Port)</span></div>
                        </div>
                        <div class="level2"><span class="title">Multi-GPU Support</span>
                            <div class="level3"><span class="key"></span><span>3-Way, 4-Way NVIDIA
                                    SLI</span></div>
                            <div class="level3"><span class="key"></span><span>3-Way, 4-Way AMD
                                    CrossFireX</span></div>
                        </div>
                        <div class="level2"><span class="title">Air Cooling</span>
                            <div class="level3"><span class="key"></span><span>1 x 4-Pin CPU</span>
                            </div>
                            <div class="level3"><span class="key"></span><span>3 x 4-Pin System</span>
                            </div>
                        </div>
                        <div class="level2"><span class="key">Liquid Cooling</span> : <span>1 x 4-Pin
                                Pump</span></div>
                        <div class="level2"><span class="title">Power Connectors</span>
                            <div class="level3"><span class="key"></span><span>1 x 24-Pin
                                    Mainboard</span></div>
                            <div class="level3"><span class="key"></span><span>2 x 8-Pin CPU</span>
                            </div>
                            <div class="level3"><span class="key"></span><span>1 x 6-Pin ATX</span>
                            </div>
                        </div>
                        <div class="level2"><span class="key">Security</span> : <span>TPM Module</span>
                        </div>
                        <div class="level2"><span class="key">LED Header</span> : <span>4 x RGB</span>
                        </div>
                        <div class="level2"><span class="key">Audio</span> : <span>1 x Speaker</span>
                        </div>
                        <div class="level2"><span class="key">Diagnostics</span> : <span>2-Digit Debug
                                LED, CPU Overclock, Power, Reset</span></div>
                    </div>
                    <div class="level1"><span class="title">Front Panel I/O</span>
                        <div class="level2"><span class="key">I/O Connection Headers</span> :
                            <span>AAFP, USB 3.1 / USB 3.2 Gen 1, USB 3.1 / USB 3.2 Gen 2</span></div>
                    </div>
                    <div class="level1"><span class="title">Audio</span>
                        <div class="level2"><span class="key">Audio Codec</span> : <span>Realtek
                                ALC4050H+ALC1220 (7.1-Channel)</span></div>
                    </div>
                    <div class="level1"><span class="title">Wireless</span>
                        <div class="level2"><span class="key">Bluetooth</span> : <span>5.0</span></div>
                        <div class="level2"><span class="key">Wi-Fi</span> : <span>Wi-Fi 6 (802.11ax)
                                (MU-MIMO)</span></div>
                    </div>
                    <div class="level1"><span class="title">Software</span>
                        <div class="level2"><span class="key">Supported Operating Systems</span> :
                            <span>Windows 10 (64-Bit)</span></div>
                    </div>
                    <div class="level1"><span class="title">Physical</span>
                        <div class="level2"><span class="key">Form Factor</span> : <span>ATX</span>
                        </div>
                        <div class="level2"><span class="key">Dimensions</span> : <span>9.6 x 12" /
                                243.84 x 304.80 mm</span></div>
                    </div>
                    <div class="level1"><span class="title">Packaging Info</span>
                        <div class="level2"><span class="key">Package Weight</span> : <span>5.415
                                lb</span></div>
                        <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> :
                            <span>14.55 x 12.4 x 3.8"</span></div>
                    </div>
                </div> --}}
            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>{{ $motherboard->name }}</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="4.2 out of 5">
                        <div class="stars-score" style="width: 84%">
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
                    <div>&nbsp;&nbsp;(5 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                   {{$motherboard->product->features}}
                   
                    <div class="budget-price">৳ {{$motherboard->product->price}}</div>
                    
                    <div class="align-button">
                        <a href="{{ route('add-product-to-cart', ['product_id' => $motherboard->product->id]) }}" class="btn btn-primary btn2 ">Add Product to Cart</a>
                        <a href="{{ route('add-motherboard-to-system', ['motherboard_id' => $motherboard->id]) }}"
                            class="btn btn-primary btn1 ">Add to System Builder</a>
                    </div>
                </div>
            </div>
            <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">CPU</span>
                    <div class="level2"><span class="key">Chipset</span> : <span>AMD X570</span></div>
                    <div class="level2"><span class="key">CPU Socket</span> : <span>TRX4</span></div>
                </div>
                <div class="level1"><span class="title">Back Panel I/O</span>
                    <div class="level2"><span class="title">USB</span>
                        <div class="level3"><span class="key"></span><span>2 x USB 3.1 / USB 3.2 Gen 2
                                Type-A</span></div>
                        <div class="level3"><span class="key"></span><span>1 x USB 3.2 Gen 2x2
                                Type-C</span></div>
                        <div class="level3"><span class="key"></span><span>4 x USB 3.1 / USB 3.2 Gen 1
                                Type-A</span></div>
                    </div>
                    <div class="level2"><span class="key">Thunderbolt</span> : <span>None</span></div>
                    <div class="level2"><span class="key">Display</span> : <span>None</span></div>
                    <div class="level2"><span class="title">Audio</span>
                        <div class="level3"><span class="key"></span><span>5 x 3.5 mm</span></div>
                        <div class="level3"><span class="key"></span><span>1 x S/PDIF</span></div>
                    </div>
                    <div class="level2"><span class="title">Ethernet / Controller</span>
                        <div class="level3"><span class="key"></span><span>1 x Aquantia AQC107
                                10GbE</span></div>
                        <div class="level3"><span class="key"></span><span>1 x Realtek Dragon RTL8125AG
                                2.5Gigabit</span></div>
                    </div>
                    <div class="level2"><span class="key">PS/2</span> : <span>1 x PS/2</span></div>
                    <div class="level2"><span class="key">Wi-Fi Antenna</span> : <span>2 x
                            Connector</span></div>
                    <div class="level2"><span class="key">Buttons</span> : <span>BIOS Flashback, Clear
                            CMOS</span></div>
                </div>
                <div class="level1"><span class="title">Memory</span>
                    <div class="level2"><span class="key">Memory Slots</span> : <span>8 x
                            288-Pin</span></div>
                    <div class="level2"><span class="key">Memory Support</span> : <span>DDR4 2133,
                            2400, 2667, 2933, 3200, 3466, 3600, 3733, 3800, 3866, 4000, 4133, 4200, 4266, 4333, 4400, 4533,
                            4600, 4666 MHz</span></div>
                    <div class="level2"><span class="key">Maximum Capacity</span> : <span>256 GB</span>
                    </div>
                    <div class="level2"><span class="key">Channel Architecture</span> : <span>Quad
                            Channel</span></div>
                    <div class="level2"><span class="key">ECC Support</span> : <span>Non-ECC, ECC
                            Unbuffered</span></div>
                </div>
                <div class="level1"><span class="title">Storage Expansion</span>
                    <div class="level2"><span class="key">SATA</span> : <span>8 x SATA III</span></div>
                    <div class="level2"><span class="title">M.2</span>
                        <div class="level3"><span class="key"></span><span>2 x M Key 2260, 2280 (PCIe
                                4.0 x4)</span></div>
                        <div class="level3"><span class="key"></span><span>1 x M Key 2242, 2260, 2280,
                                22110 (PCIe 4.0 x4, SATA III)</span></div>
                    </div>
                    <div class="level2"><span class="key">U.2</span> : <span>None</span></div>
                    <div class="level2"><span class="key">RAID Support</span> : <span>RAID 0, 1, 10
                            (SATA)</span></div>
                </div>
                <div class="level1"><span class="title">Internal I/O</span>
                    <div class="level2"><span class="key">Expansion Slots</span> : <span>4 x PCIe 4.0
                            x16</span></div>
                    <div class="level2"><span class="title">USB</span>
                        <div class="level3"><span class="key"></span><span>1 x USB 2.0 Header (Supports
                                2 USB Type-A Port)</span></div>
                        <div class="level3"><span class="key"></span><span>2 x USB 3.1 / USB 3.2 Gen 1
                                Header (Supports 4 USB Type-A Port)</span></div>
                        <div class="level3"><span class="key"></span><span>1 x USB 3.1 / USB 3.2 Gen 2
                                Header (Supports 1 USB Type-C Port)</span></div>
                    </div>
                    <div class="level2"><span class="title">Multi-GPU Support</span>
                        <div class="level3"><span class="key"></span><span>3-Way, 4-Way NVIDIA
                                SLI</span></div>
                        <div class="level3"><span class="key"></span><span>3-Way, 4-Way AMD
                                CrossFireX</span></div>
                    </div>
                    <div class="level2"><span class="title">Air Cooling</span>
                        <div class="level3"><span class="key"></span><span>1 x 4-Pin CPU</span></div>
                        <div class="level3"><span class="key"></span><span>3 x 4-Pin System</span>
                        </div>
                    </div>
                    <div class="level2"><span class="key">Liquid Cooling</span> : <span>1 x 4-Pin
                            Pump</span></div>
                    <div class="level2"><span class="title">Power Connectors</span>
                        <div class="level3"><span class="key"></span><span>1 x 24-Pin Mainboard</span>
                        </div>
                        <div class="level3"><span class="key"></span><span>2 x 8-Pin CPU</span></div>
                        <div class="level3"><span class="key"></span><span>1 x 6-Pin ATX</span></div>
                    </div>
                    <div class="level2"><span class="key">Security</span> : <span>TPM Module</span>
                    </div>
                    <div class="level2"><span class="key">LED Header</span> : <span>4 x RGB</span>
                    </div>
                    <div class="level2"><span class="key">Audio</span> : <span>1 x Speaker</span></div>
                    <div class="level2"><span class="key">Diagnostics</span> : <span>2-Digit Debug LED,
                            CPU Overclock, Power, Reset</span></div>
                </div>
                <div class="level1"><span class="title">Front Panel I/O</span>
                    <div class="level2"><span class="key">I/O Connection Headers</span> : <span>AAFP,
                            USB 3.1 / USB 3.2 Gen 1, USB 3.1 / USB 3.2 Gen 2</span></div>
                </div>
                <div class="level1"><span class="title">Audio</span>
                    <div class="level2"><span class="key">Audio Codec</span> : <span>Realtek
                            ALC4050H+ALC1220 (7.1-Channel)</span></div>
                </div>
                <div class="level1"><span class="title">Wireless</span>
                    <div class="level2"><span class="key">Bluetooth</span> : <span>5.0</span></div>
                    <div class="level2"><span class="key">Wi-Fi</span> : <span>Wi-Fi 6 (802.11ax)
                            (MU-MIMO)</span></div>
                </div>
                <div class="level1"><span class="title">Software</span>
                    <div class="level2"><span class="key">Supported Operating Systems</span> :
                        <span>Windows 10 (64-Bit)</span></div>
                </div>
                <div class="level1"><span class="title">Physical</span>
                    <div class="level2"><span class="key">Form Factor</span> : <span>ATX</span></div>
                    <div class="level2"><span class="key">Dimensions</span> : <span>9.6 x 12" / 243.84
                            x 304.80 mm</span></div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>5.415 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>14.55 x
                            12.4 x 3.8"</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
