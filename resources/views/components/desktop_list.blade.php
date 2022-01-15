@extends('layouts.app')
@push('style')
    <style>
        .row-flex {
            display: flex;
            flex-wrap: wrap;
            font-family: 'Roboto', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
            font-size: 1.6em;
            font-weight: 300;
            letter-spacing: .01em;
            line-height: 1.6;
            padding-top: 20px;
        }

        .content-gap {
            display: flex;
            flex-wrap: wrap;
            flex: 1 1 0px;
            margin-bottom: 50px;
        }

        .content {
            height: 100%;
            padding: 12px;
            box-sizing: border-box;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.30), 0 -1px 2px rgba(0, 0, 0, 0.30);
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        .content:hover {
            -ms-transform: scale(1.03);
            /* IE 9 */
            -webkit-transform: scale(1.03);
            /* Safari 3-8 */
            transform: scale(1.01);
            box-shadow: 0 10px 12px rgba(0, 0, 0, 0.30), 0 6px 10px rgba(0, 0, 0, 0.22), 0 -5px 10px rgba(0, 0, 0, 0.30);
            cursor: pointer;
        }


        .colour-1 {
            /*#70AE6E; #82204A #558C8C #483C46 #3C6E71 #917C78 66*/
        }

        .content h3,
        .content p {
            /*color:white;*/
        }

        .product-image {
            position: relative;
            transition: all .3s ease 0s;
            overflow: hidden;
        }

        .product-image img {
            overflow: hidden;
            position: absolute;
            margin: auto;
            right: 0;
            bottom: 0;
            top: 0;
            left: 0;
        }

        .content .product-image {
            height: 150px;
            margin-left: auto;
            margin-right: auto;
        }

        .content .pic-2 {
            display: none;
            position: absolute;
            margin: auto;
            right: 0;
            bottom: 0;
            top: 0;
            left: 0;
            z-index: 99;
        }

        .content:hover .pic-2 {
            height: 150px;
            display: table;
            margin: auto;
        }

        .content-information {
            border-top: 1px solid #a9a9a9;
            position: relative;
            height: auto;
            font-size: 13px;
            color: #2a2a2a;
            border-top: 1px dashed #001119;
            display: flex !important;
            flex-wrap: wrap;
        }

        .content-information .content-detail {
            -ms-flex-align: center !important;
            justify-content: center !important;
            align-items: center !important;
            height: 65px;
            border-bottom: 1px dashed #001119;
            flex: 0 50%;
        }

        .content-information div:nth-child(even) {
            font-weight: 600;
            padding-left: 25px;
        }

        .content-information div:nth-child(odd) {
            border-right: 1px dashed #001119;
            font-weight: 600;
            padding-left: 25px;
        }

    </style>
    <style>
        .pre-builts {
            background-color: #dae2e5;
            padding-top: 30px;
        }

        .pre-builts .component-btn {
            display: inline-block;
            /* padding: 5px 15px; */
            background-color: #1d3f66;
            border-radius: 5px;
            -webkit-transition: all .3s;
            transition: all .3s;
            color: white;
            font-size: 14px;
            white-space: nowrap;
        }

        h4 {
            font-size: 1.2rem;
            font-weight: 700;
        }

        h3 {
            padding-top: 14px;
            font-size: 1.2rem;
            font-weight: 700;

            font-size: 28px;
            text-transform: capitalize;
            color: #001119;
        }



        @media screen and (min-width: 767px) {
            .tool-design .upper-box .action-box {
                flex-basis: 33.5%;
            }
        }

        .search {
            flex-grow: 0;
        }

        #myInput:focus {
            outline: none;
        }

        #myInput {

            border: none;
            font-size: 14px;
            font-weight: 600;
            color: var(--headerElementColor);
            padding: 4px 25px 4px 10px;
            border-radius: 6px;
            color: #5b5b5b;
        }

        .component-icons {
            position: absolute;
            left: 3px;
            width: 20px;
            height: 20px;
            /* top: 15px; */
        }

    </style>
    <style>
        .pcb-breadcrumb-p {
            color: white;
            margin-top: 0;
            width: 70%;
            margin-bottom: 1rem;
            text-align: center;
            margin: auto;
        }

        .pcb-breadcrumb-hr {
            background-color: #ffffff4a !important;
            margin: auto;
            width: 16%;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        @media screen and (max-width: 767px) {
            .pcb-breadcrumb-p {
                width: 90%;
            }

            .pcb-breadcrumb-hr {
                width: 60%;
            }
        }

    </style>
@endpush
@section('content')
    <section class="pcb-breadcrumb">
        <h1>{{ ucfirst($type) }} Desktop</h1>
        <span><a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{!! route('laptops') !!}">Desktop</a>
            <i class="fa fa-angle-right"></i><a href="{!! route('desktop-list', ['type' => $type]) !!}">{{ ucfirst($type) }} Desktop</a>
        </span>
    </section>
    <section class="system-builder pre-builts">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tool-design">
                        <div class="upper-box">
                            <div class="action-box">
                                <div class="action-box-item search"> Search: </div>
                                <input type="text" id="myInput" onkeyup="myFunction()"
                                    placeholder="Search Gaming Desktop....." title="Search....">
                            </div>
                            <div class="action-box">
                                <div class="action-box-item ">Share: </div>
                                <div onclick="window.open('https://www.facebook.com/sharer.php?t=Best+Laptops+for+Business+in+2020+-+PC+Builder&amp;u=https%3A%2F%2Fpcbuilder.net%2Flaptop%2Fbusiness-laptop%2F','_blank')"
                                    class="action-box-item" data-toggle="tooltip" title="Share To Facebook"><i
                                        class="fab fa-facebook" aria-hidden="true"></i></div>
                                <div onclick="window.open('https://twitter.com/intent/tweet?text=Best+Laptops+for+Business+in+2020+-+PC+Builder&amp;url=https%3A%2F%2Fpcbuilder.net%2Flaptop%2Fbusiness-laptop%2F','_blank')"
                                    class="action-box-item" data-toggle="tooltip" title="Share To Twitter"><i
                                        class="fab fa-twitter" aria-hidden="true"></i></div>
                                <div onclick="window.open('https://www.linkedin.com/shareArticle/?title=Best+Laptops+for+Business+in+2020+-+PC+Builder&amp;url=https%3A%2F%2Fpcbuilder.net%2Flaptop%2Fbusiness-laptop%2F','_blank')"
                                    class="action-box-item" data-toggle="tooltip" title="Share To Linkedin"><i
                                        class="fab fa-linkedin" aria-hidden="true"></i></div>
                                <div onclick="window.open('https://in.pinterest.com/pin/create/button/?description=Best+Laptops+for+Business+in+2020+-+PC+Builder&amp;url=https%3A%2F%2Fpcbuilder.net%2Flaptop%2Fbusiness-laptop%2F&amp;media=','_blank')"
                                    class="action-box-item" data-toggle="tooltip" title="Share To Pinterest"><i
                                        class="fab fa-pinterest" aria-hidden="true"></i></div>
                                <div onclick="window.open('https://www.reddit.com/submit?title=Best+Laptops+for+Business+in+2020+-+PC+Builder&amp;url=https%3A%2F%2Fpcbuilder.net%2Flaptop%2Fbusiness-laptop%2F','_blank')"
                                    class="action-box-item" data-toggle="tooltip" title="Share To Reddit"><i
                                        class="fab fa-reddit" aria-hidden="true"></i></div>
                                <div onclick="window.open('https://www.tumblr.com/widgets/share/tool/preview?title=Best+Laptops+for+Business+in+2020+-+PC+Builder&amp;canonicalUrl=https%3A%2F%2Fpcbuilder.net%2Flaptop%2Fbusiness-laptop%2F&amp;posttype=link','_blank')"
                                    class="action-box-item" data-toggle="tooltip" title="Share To Tumblr"><i
                                        class="fab fa-tumblr" aria-hidden="true"></i></div>
                            </div>
                            <div class="selectbox dropup center-block">
                                <div class="choose-country px-2"><b>Select Country:</b></div>
                                <li class="image-li dropdown pcb-country">
                                    <a class="country dropdown-toggle" id="navbarDropdownMenuLink3" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                            class="img-fluid change-country lazy"
                                            data-src="https://images.pcbuilder.dev/assets/images/flags/us.svg">United
                                        States</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                                        <a class="dropdown-item" onclick="changecountry('US');"><img
                                                class="img-fluid dropdown-image lazy"
                                                data-src="https://images.pcbuilder.dev/assets/images/flags/us.svg">United
                                            States</a>
                                        <a class="dropdown-item" onclick="changecountry('GB');"><img
                                                class="img-fluid dropdown-image lazy"
                                                data-src="https://images.pcbuilder.dev/assets/images/flags/gb.svg">United
                                            Kingdom</a>
                                        <a class="dropdown-item" onclick="changecountry('CA');"><img
                                                class="img-fluid dropdown-image lazy"
                                                data-src="https://images.pcbuilder.dev/assets/images/flags/ca.svg">Canada</a>
                                        <a class="dropdown-item" onclick="changecountry('IN');"><img
                                                class="img-fluid dropdown-image lazy"
                                                data-src="https://images.pcbuilder.dev/assets/images/flags/in.svg">India</a>
                                        <a class="dropdown-item" onclick="changecountry('AU');"><img
                                                class="img-fluid dropdown-image lazy"
                                                data-src="https://images.pcbuilder.dev/assets/images/flags/au.svg">Australia</a>
                                        <a class="dropdown-item" onclick="changecountry('IT');"><img
                                                class="img-fluid dropdown-image lazy"
                                                data-src="https://images.pcbuilder.dev/assets/images/flags/it.svg">Italy</a>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-flex" id="myTable">
                @foreach ($desktop as $item)
                    <div class="searching col-md-4 col-sm-6 col-xs-12">
                        <div style="background:#ffffff;" class="content-gap">
                            <div class="content box">
                                <div class="ribbon hot-ribbon"><span>Hot</span></div>
                                <div class="product-image ">
                                    @foreach ($item->product->getMedia('main_image') as $image)
                                        {{-- <p>{{ $loop->index+1 }}</p> --}}
                                        <a href="#">
                                            <img class="pic-{{ $loop->index + 1 }} lazy" src="{{ $image->getUrl('main_image') }}"
                                                data-src="{{ $image->getUrl('main_image') }}" title="{{ $item->name }}"
                                                alt="{{ $item->name }}">
                                        </a>
                                    @endforeach
                                    {{-- <a
                                href="#">
                                <img class="pic-1 lazy" src="../../../images.pcbuilder.dev/assets/images/blank.jpg"
                                    data-src="https://m.media-amazon.com/images/I/41Kp8-ILkYL._SL160_.jpg"
                                    title="Apple MacBook Air (13-inch, 8GB RAM, 256GB SSD Storage) - Gold (Latest Model)"
                                    alt="PC Builder, Build My PC, Apple, Business Laptop">
                            </a>
                            <a
                                href="#">
                                <img class="pic-2 lazy" src="../../../images.pcbuilder.dev/assets/images/blank.jpg"
                                    data-src="https://m.media-amazon.com/images/I/21NSNFwRHaL.jpg"
                                    title="Apple MacBook Air (13-inch, 8GB RAM, 256GB SSD Storage) - Gold (Latest Model)"
                                    alt="PC Builder, Build My PC, Apple, Business Laptop">
                            </a> --}}
                                </div>
                                <center>
                                    <h4
                                        onclick="window.location='../../complete-laptop-details/business-laptop/apple-macbook-air-mwtl2ll-a/index.html'">
                                        {{ $item->short_name }}</h4>
                                    <div onclick="window.location='../../complete-laptop-details/business-laptop/apple-macbook-air-mwtl2ll-a/index.html'"
                                        style="font-weight:500;" class="content-information">
                                        <div class="content-detail col-md-6 d-flex align-items-center"><img
                                                class="component-icons lazy"
                                                src="{{asset('images/pre-builts/windows.svg')}}">{{ empty(json_decode($item->specifications, true)) ? '' : json_decode($item->specifications, true)['os'] }}
                                        </div>
                                        <div class="content-detail col-md-6 d-flex align-items-center"><img
                                                class="component-icons lazy"
                                                src="{{asset('images/pre-builts/cpu.svg')}}">{{ empty(json_decode($item->specifications, true)) ? '' : json_decode($item->specifications, true)['processor'] ?? null }}
                                        </div>
                                        <div class="content-detail col-md-6 d-flex align-items-center"><img class="component-icons lazy" src="{{asset('images/pre-builts/graphics-card.svg')}}">{{ empty(json_decode($item->specifications, true)) ? '' : json_decode($item->specifications, true)['gpu'] ?? null }}
                                        </div>
                                        <div class="content-detail col-md-6 d-flex align-items-center"><img
                                                class="component-icons lazy"
                                                src="{{asset('images/pre-builts/ram-memory.svg')}}">{{ empty(json_decode($item->specifications, true)) ? '' : json_decode($item->specifications, true)['memory'] ?? null }}
                                        </div>
                                        <div class="content-detail col-md-6 d-flex align-items-center"><img class="component-icons lazy" src="{{asset('images/pre-builts/rgb.svg')}}">{{ empty(json_decode($item->specifications, true)) ? '' : json_decode($item->specifications, true)['color'] ?? null }}</div>
                                        <div class="content-detail col-md-6 d-flex align-items-center"><img
                                                class="component-icons lazy"
                                                src="{{asset('images/pre-builts/ssd.svg')}}">{{ empty(json_decode($item->specifications, true)) ? '' : json_decode($item->specifications, true)['storage'] ?? null }}
                                        </div>
                                    </div>
                                    <div onclick="window.location='../../complete-laptop-details/business-laptop/apple-macbook-air-mwtl2ll-a/index.html'"
                                        class="col-md-12">
                                        <h3>
                                            <img style="width:30px; height:30px" class="lazy"
                                                src="{{asset('images/pre-builts/receive-amount.svg')}}" />
                                            ৳ {{ $item->product->price }}
                                        </h3>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a style="margin:10px;" class="btn component-btn btn-block" href="{{route('add-product-to-cart',['product_id'=>$item->product->id])}}"
                                            target="_blank"><i class=""></i> Add to Cart</a>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
