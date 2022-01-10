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
        <h2>{{$monitor->name}}</h2>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{route('monitor-list')}}">Monitor</a>
            <i class="fa fa-angle-right"></i><a href="{{route('monitor-details',['id'=>$monitor->id])}}">{{$monitor->product->short_name}}</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($monitor->product->getMedia('main_image') as $image)
                            <div class="{{ $loop->index == 0 ? 'carousel-item img-gradient active':'carousel-item img-gradient' }}">
                                <img class="d-block img-fluid big-image lazy"
                                    title="G.SKILL Trident Z Royal Series, 16GB (2 x 8GB) 288-Pin DDR4-4800MHz Desktop Memory Model with CL18"
                                    data-src="{{$image->getUrl('main_image')}}"
                                    alt="Build My PC, PC Builder, G.Skill Trident Z Royal">
                            </div>
                        @endforeach
                        
                    </div>
                    @if(count($monitor->product->getMedia('main_image'))>0)
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
                        @foreach ($monitor->getMedia('main_image') as $image)
                            <li data-target="#main-carousel" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach
                    </ol>
                </div>
               
            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>{{$monitor->name}}</h1>
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
                    {!!$monitor->product->description!!}
                </div>
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    {!!$monitor->product->features!!}

                    
                    <div class="budget-price">৳ {{$monitor->product->price}}</div>
                    
                    <div class="align-button">
                        <a href="{{route('add-product-to-cart',['product_id'=>$monitor->product->id])}}" class="btn btn-primary btn2 "><i
                                class="fa fa-plus"></i> Add Product to Cart</a>
                        <a href="{{route('add-monitor-to-system',['monitor_id'=>$monitor->id])}}" target="_blank"
                            class="btn btn-primary btn1 "><i class="fab fa-amazon"></i>Add to System Builder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
