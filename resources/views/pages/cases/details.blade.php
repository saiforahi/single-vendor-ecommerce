@extends('layouts.app')

@push('style')
    
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
        @media screen and (min-width: 768px) {
            ul {
                padding-right: 100px;
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
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h2>{{$casing->short_name}}</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('case-list')}}">Case</a>
            <i class="fa fa-angle-right"></i><a href="{{route('case-details',['id'=>$casing->id])}}">{{$casing->product->short_name}}</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <?php $product = $casing->product; ?>
                @include('components.product-media')
                {{-- <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">Compatibility</span>
                        <div class="level2"><span class="key">Motherboard Support</span> : <span>ATX,
                                Micro-ATX, Mini-ITX</span></div>
                        <div class="level2"><span class="key">External Drive Bays</span> :
                            <span>None</span></div>
                        <div class="level2"><span class="title">Internal Drive Bays</span>
                            <div class="level3"><span class="key"></span><span>3 x 3.5"</span></div>
                            <div class="level3"><span class="key"></span><span>3 x 2.5"</span></div>
                        </div>
                        <div class="level2"><span class="title">Additional Drive Mounting</span>
                            <div class="level3"><span class="key"></span><span>2 x 2.5" (Bottom)</span>
                            </div>
                            <div class="level3"><span class="key"></span><span>2 x 2.5" (Motherboard
                                    Tray)</span></div>
                        </div>
                        <div class="level2"><span class="key">Expansion Slots</span> : <span>7 x Full
                                Height</span></div>
                        <div class="level2"><span class="key">Maximum GPU Length</span> : <span>15.00" /
                                381 mm</span></div>
                        <div class="level2"><span class="key">CPU Cooler Height</span> : <span>6.50" /
                                165 mm</span></div>
                        <div class="level2"><span class="key">Supported PSU Size</span> :
                            <span>ATX</span></div>
                    </div>
                    <div class="level1"><span class="title">Cooling</span>
                        <div class="level2"><span class="title">Fan Mounting (Front)</span>
                            <div class="level3"><span class="key"></span><span>2 x 120 mm</span></div>
                            <div class="level3"><span class="key"></span><span>Or</span></div>
                            <div class="level3"><span class="key"></span><span>2 x 140 mm</span></div>
                        </div>
                        <div class="level2"><span class="title">Fan Mounting (Rear)</span>
                            <div class="level3"><span class="key"></span><span>1 x 120 mm</span></div>
                            <div class="level3"><span class="key"></span><span>Or</span></div>
                            <div class="level3"><span class="key"></span><span>1 x 140 mm</span></div>
                        </div>
                        <div class="level2"><span class="key">Fan Mounting (Side)</span> :
                            <span>None</span></div>
                        <div class="level2"><span class="title">Fan Mounting (Top)</span>
                            <div class="level3"><span class="key"></span><span>1 x 120 mm</span></div>
                            <div class="level3"><span class="key"></span><span>Or</span></div>
                            <div class="level3"><span class="key"></span><span>1 x 140 mm</span></div>
                        </div>
                        <div class="level2"><span class="key">Fan Mounting (Bottom)</span> :
                            <span>None</span></div>
                        <div class="level2"><span class="key">Fans Included (Rear)</span> : <span>1 x 120
                                mm (1200 Variable rpm)</span></div>
                        <div class="level2"><span class="key">Fans Included (Top)</span> : <span>1 x 120
                                mm (1200 Variable rpm)</span></div>
                        <div class="level2"><span class="key">Maximum Radiator Size (Front)</span> :
                            <span>280 mm</span></div>
                        <div class="level2"><span class="key">Maximum Radiator Size (Rear)</span> :
                            <span>120 mm</span></div>
                        <div class="level2"><span class="key">Fan Mounting (Internal)</span> :
                            <span>None</span></div>
                        <div class="level2"><span class="key">Noise Level</span> : <span>28 dBA</span>
                        </div>
                        <div class="level2"><span class="key">Fan Controller Included</span> :
                            <span>No</span></div>
                        <div class="level2"><span class="key">Filter Locations</span> : <span>Bottom,
                                Front</span></div>
                    </div>
                    <div class="level1"><span class="title">I/O</span>
                        <div class="level2"><span class="title">Connections</span>
                            <div class="level3"><span class="key"></span><span>1 x USB Type-C (USB 3.1
                                    / USB 3.2 Gen 2)</span></div>
                            <div class="level3"><span class="key"></span><span>1 x USB Type-A (USB 3.1
                                    / USB 3.2 Gen 1)</span></div>
                        </div>
                        <div class="level2"><span class="key">Audio Connections</span> : <span>1 x 3.5
                                mm Input/Output</span></div>
                        <div class="level2"><span class="key">Display Connections</span> :
                            <span>None</span></div>
                    </div>
                    <div class="level1"><span class="title">Physical</span>
                        <div class="level2"><span class="key">Windowed Panel</span> : <span>Yes</span>
                        </div>
                        <div class="level2"><span class="key">Material</span> : <span>Tempered Glass,
                                Steel</span></div>
                        <div class="level2"><span class="key">Built-In Lighting</span> :
                            <span>No</span></div>
                        <div class="level2"><span class="key">Cable Management Space</span> :
                            <span>0.91" / 23 mm</span></div>
                        <div class="level2"><span class="key">Dimensions (W x H x D)</span> :
                            <span>8.27 x 18.11 x 16.85" / 210 x 460 x 428 mm</span></div>
                        <div class="level2"><span class="key">Weight</span> : <span>14.55 lb /
                                6.6 kg</span></div>
                        <div class="level2"><span class="key">Warranty Length</span> : <span>Limited
                                2-Year Warranty</span></div>
                    </div>
                    <div class="level1"><span class="title">Packaging Info</span>
                        <div class="level2"><span class="key">Package Weight</span> : <span>18.75
                                lb</span></div>
                        <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> :
                            <span>19.75 x 19.25 x 11"</span></div>
                    </div>
                </div> --}}
            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>{{$casing->name}}</h1>
                <div class="pcb-product-summary">
                    <div class="stars-rating" title="4.7 out of 5">
                        <div class="stars-score" style="width: 94%">
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
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    {!!$casing->product->features!!}

                    
                    <div class="budget-price">৳ {{$casing->product->price}}</div>
                    
                    <div class="align-button">
                        <a href="{{route('add-product-to-cart',['product_id'=>$casing->product->id])}}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i> Add Product to Cart</a>
                        <a href="{{ route('add-casing-to-system', ['casing_id' => $casing->id]) }}"
                            class="btn btn-primary btn1 ">Add to System Builder </a>
                    </div>
                </div>
            </div>
            {{-- <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">Compatibility</span>
                    <div class="level2"><span class="key">Motherboard Support</span> : <span>ATX,
                            Micro-ATX, Mini-ITX</span></div>
                    <div class="level2"><span class="key">External Drive Bays</span> :
                        <span>None</span></div>
                    <div class="level2"><span class="title">Internal Drive Bays</span>
                        <div class="level3"><span class="key"></span><span>3 x 3.5"</span></div>
                        <div class="level3"><span class="key"></span><span>3 x 2.5"</span></div>
                    </div>
                    <div class="level2"><span class="title">Additional Drive Mounting</span>
                        <div class="level3"><span class="key"></span><span>2 x 2.5" (Bottom)</span>
                        </div>
                        <div class="level3"><span class="key"></span><span>2 x 2.5" (Motherboard
                                Tray)</span></div>
                    </div>
                    <div class="level2"><span class="key">Expansion Slots</span> : <span>7 x Full
                            Height</span></div>
                    <div class="level2"><span class="key">Maximum GPU Length</span> : <span>15.00" /
                            381 mm</span></div>
                    <div class="level2"><span class="key">CPU Cooler Height</span> : <span>6.50" /
                            165 mm</span></div>
                    <div class="level2"><span class="key">Supported PSU Size</span> : <span>ATX</span>
                    </div>
                </div>
                <div class="level1"><span class="title">Cooling</span>
                    <div class="level2"><span class="title">Fan Mounting (Front)</span>
                        <div class="level3"><span class="key"></span><span>2 x 120 mm</span></div>
                        <div class="level3"><span class="key"></span><span>Or</span></div>
                        <div class="level3"><span class="key"></span><span>2 x 140 mm</span></div>
                    </div>
                    <div class="level2"><span class="title">Fan Mounting (Rear)</span>
                        <div class="level3"><span class="key"></span><span>1 x 120 mm</span></div>
                        <div class="level3"><span class="key"></span><span>Or</span></div>
                        <div class="level3"><span class="key"></span><span>1 x 140 mm</span></div>
                    </div>
                    <div class="level2"><span class="key">Fan Mounting (Side)</span> :
                        <span>None</span></div>
                    <div class="level2"><span class="title">Fan Mounting (Top)</span>
                        <div class="level3"><span class="key"></span><span>1 x 120 mm</span></div>
                        <div class="level3"><span class="key"></span><span>Or</span></div>
                        <div class="level3"><span class="key"></span><span>1 x 140 mm</span></div>
                    </div>
                    <div class="level2"><span class="key">Fan Mounting (Bottom)</span> :
                        <span>None</span></div>
                    <div class="level2"><span class="key">Fans Included (Rear)</span> : <span>1 x 120
                            mm (1200 Variable rpm)</span></div>
                    <div class="level2"><span class="key">Fans Included (Top)</span> : <span>1 x 120 mm
                            (1200 Variable rpm)</span></div>
                    <div class="level2"><span class="key">Maximum Radiator Size (Front)</span> :
                        <span>280 mm</span></div>
                    <div class="level2"><span class="key">Maximum Radiator Size (Rear)</span> :
                        <span>120 mm</span></div>
                    <div class="level2"><span class="key">Fan Mounting (Internal)</span> :
                        <span>None</span></div>
                    <div class="level2"><span class="key">Noise Level</span> : <span>28 dBA</span>
                    </div>
                    <div class="level2"><span class="key">Fan Controller Included</span> :
                        <span>No</span></div>
                    <div class="level2"><span class="key">Filter Locations</span> : <span>Bottom,
                            Front</span></div>
                </div>
                <div class="level1"><span class="title">I/O</span>
                    <div class="level2"><span class="title">Connections</span>
                        <div class="level3"><span class="key"></span><span>1 x USB Type-C (USB 3.1 /
                                USB 3.2 Gen 2)</span></div>
                        <div class="level3"><span class="key"></span><span>1 x USB Type-A (USB 3.1 /
                                USB 3.2 Gen 1)</span></div>
                    </div>
                    <div class="level2"><span class="key">Audio Connections</span> : <span>1 x 3.5 mm
                            Input/Output</span></div>
                    <div class="level2"><span class="key">Display Connections</span> :
                        <span>None</span></div>
                </div>
                <div class="level1"><span class="title">Physical</span>
                    <div class="level2"><span class="key">Windowed Panel</span> : <span>Yes</span>
                    </div>
                    <div class="level2"><span class="key">Material</span> : <span>Tempered Glass,
                            Steel</span></div>
                    <div class="level2"><span class="key">Built-In Lighting</span> : <span>No</span>
                    </div>
                    <div class="level2"><span class="key">Cable Management Space</span> : <span>0.91" /
                            23 mm</span></div>
                    <div class="level2"><span class="key">Dimensions (W x H x D)</span> : <span>8.27 x
                            18.11 x 16.85" / 210 x 460 x 428 mm</span></div>
                    <div class="level2"><span class="key">Weight</span> : <span>14.55 lb /
                            6.6 kg</span></div>
                    <div class="level2"><span class="key">Warranty Length</span> : <span>Limited 2-Year
                            Warranty</span></div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>18.75 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>19.75 x
                            19.25 x 11"</span></div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
