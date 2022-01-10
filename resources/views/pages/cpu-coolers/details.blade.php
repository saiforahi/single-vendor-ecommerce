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
        <h2>{{$cpu_cooler->name}}</h2>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('cpu-coolers-list')}}">Cpu Cooler</a>
            <i class="fa fa-angle-right"></i><a href="{{route('cpu-coolers-details',['id'=>$cpu_cooler->id])}}">{{$cpu_cooler->product->short_name}}</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <?php $product = $cpu_cooler->product; ?>
                @include('components.product-media')

                {{-- <div class="product-info d-none d-md-block">
                    <h4><strong>Product Specification</strong></h4>
                    <div class="level1"><span class="title">General</span>
                        <div class="level2"><span class="key">Cooler Type</span> : <span>CPU Air
                                Cooler</span></div>
                        <div class="level2"><span class="key">Bearing Type</span> : <span>Sleeve</span>
                        </div>
                        <div class="level2"><span class="key">Connectors</span> : <span>4-Pin</span>
                        </div>
                        <div class="level2"><span class="key">Control Method</span> : <span>PWM (Pulse
                                Width Modulation)</span></div>
                        <div class="level2"><span class="key">Fan Size</span> : <span>120 mm</span></div>
                        <div class="level2"><span class="key">Fan Speed</span> : <span>600 to
                                2000 rpm</span></div>
                        <div class="level2"><span class="key">Noise Level</span> : <span>9 to
                                36 dBA</span></div>
                        <div class="level2"><span class="key">LED</span> : <span>None</span></div>
                        <div class="level2"><span class="key">Maximum Airflow</span> :
                            <span>82.90 CFM</span>
                        </div>
                        <div class="level2"><span class="key">Power Consumption</span> :
                            <span>2.64 W</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Cooling</span>
                        <div class="level2"><span class="key">CPU Cooler Overall Height</span> :
                            <span>6.2" / 157.48 mm</span>
                        </div>
                        <div class="level2"><span class="key">CPU Cooler Length x Width</span> :
                            <span>4.7 x 3.1" / 119.4 x 78.7 mm</span>
                        </div>
                    </div>
                    <div class="level1"><span class="title">Packaging Info</span>
                        <div class="level2"><span class="key">Package Weight</span> : <span>1.9 lb</span>
                        </div>
                        <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>8.9 x
                                6.2 x 3.7"</span></div>
                    </div>
                </div> --}}
            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>{{$cpu_cooler->name}}</h1>
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
                    <div>&nbsp;&nbsp;(0 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                <div class="description">
                    {{$cpu_cooler->product->description}}
                </div>
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    {!!$cpu_cooler->product->features!!}

                    
                    <div class="budget-price">৳ {{$cpu_cooler->product->price}}</div>
                    
                    <div class="align-button">
                        <a href="{{route('add-product-to-cart',['product_id'=>$cpu_cooler->product->id])}}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i>Add Product to Cart</a>
                        <a href="{{route('add-cpu-cooler-to-system',['cpu_cooler_id'=>$cpu_cooler->id])}}" target="_blank"
                            class="btn btn-primary btn1">Add to System Builder</a>
                    </div>
                </div>
            </div>
            {{-- <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">General</span>
                    <div class="level2"><span class="key">Cooler Type</span> : <span>CPU Air
                            Cooler</span></div>
                    <div class="level2"><span class="key">Bearing Type</span> : <span>Sleeve</span></div>
                    <div class="level2"><span class="key">Connectors</span> : <span>4-Pin</span></div>
                    <div class="level2"><span class="key">Control Method</span> : <span>PWM (Pulse
                            Width Modulation)</span></div>
                    <div class="level2"><span class="key">Fan Size</span> : <span>120 mm</span></div>
                    <div class="level2"><span class="key">Fan Speed</span> : <span>600 to
                            2000 rpm</span></div>
                    <div class="level2"><span class="key">Noise Level</span> : <span>9 to 36 dBA</span>
                    </div>
                    <div class="level2"><span class="key">LED</span> : <span>None</span></div>
                    <div class="level2"><span class="key">Maximum Airflow</span> :
                        <span>82.90 CFM</span>
                    </div>
                    <div class="level2"><span class="key">Power Consumption</span> :
                        <span>2.64 W</span>
                    </div>
                </div>
                <div class="level1"><span class="title">Cooling</span>
                    <div class="level2"><span class="key">CPU Cooler Overall Height</span> : <span>6.2"
                            / 157.48 mm</span></div>
                    <div class="level2"><span class="key">CPU Cooler Length x Width</span> : <span>4.7
                            x 3.1" / 119.4 x 78.7 mm</span></div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>1.9 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>8.9 x
                            6.2 x 3.7"</span></div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
