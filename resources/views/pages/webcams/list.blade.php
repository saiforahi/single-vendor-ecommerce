@extends('layouts.app')

@push('style')
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_resolution {
            display: none !important;
        }

    </style>
    <style>
        .c_sensor_resolution {
            display: none !important;
        }

    </style>
    <style>
        .c_microphone {
            display: none !important;
        }

    </style>
    <style>
        .float {
            display: none;
        }

        @media screen and (max-width: 767px) {
            .float {
                display: block;

                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 20px;
                right: 20px;
                background-color: #001119;
                color: #FFF !important;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 2px 2px 3px #999;
                z-index: 100;
            }

            .my-float {
                margin-top: 16px;
            }
        }

    </style>
    <style>
        @media screen and (max-width: 767px) {

            .modal-window {
                /* Add the blur effect */
                position: fixed;
                background-color: rgb(0 0 0 / 70%);
                top: 0;
                overflow: scroll;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 99999;
                visibility: hidden;
                opacity: 0;
                pointer-events: none;
            }

            .modal-window:target {
                visibility: visible;
                opacity: 1;
                pointer-events: auto;
            }

            .modal-window>div {
                width: 100%;
                position: absolute;
                top: 70%;
                left: 50%;

                top: 20%;
                left: 0;

                /*-webkit-transform: translate(-50%, -50%);
                          transform: translate(-50%, -50%);
                          */
                padding: 2em;
                background: #ffffff;
                overflow: scroll;
                height: 80%;
                padding-bottom: 5em;
            }

            .modal-bottom {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                display: flex;
                justify-content: space-around;
                padding: 15px 0;
                background-color: #fbfbfb;
            }

            .modal-bottom>* {
                flex-basis: 49%;
            }

            /*
                .modal-window div:not(:last-of-type) {
                  margin-bottom: 15px;
                }
                */

        }

    </style>
    <style>
        #content {
            display: flex;
        }

        .circle {
            width: 60px;
            height: 60px;
            line-height: 60px;
            border-radius: 50%;
            /* the magic */
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            text-align: center;
            color: white;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 700;
            margin: 10px 14px;
        }

        .blue {
            background-color: #3498db;
        }

        .green {
            background-color: #16a085;
        }

        .red {
            background-color: #e74c3c;
        }

    </style>
    <style>
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
            border-radius: 3px;
            color: #5b5b5b;
        }

    </style>
    <style>
        @media (min-width: 990px) {
            .filter-sidebar {
                margin-right: -15px;
            }
        }

        .filter-sidebar .card-header {
            padding: 0;
            border: 0;
            font-size: 16px;
            padding: 9px 3px !important;
            background-color: #43AA8B;
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        .filter-sidebar .card-body {
            padding: 10px 19px !important;
        }

        .filter-sidebar .card.panel-default {
            border: 1px solid rgb(0 17 25 / 0.3);
        }

        .filter-sidebar .card-title>a,
        .filter-sidebar .card-title>a:active {
            display: block;
            padding: 6px;
            color: #f3f3f3;
            font-size: 16px;
            /**text-transform: uppercase;
                    letter-spacing: 1px;
                    word-spacing: 3px;
                    text-decoration: none**/
        }

        .checkbox label,
        .radio label {
            margin-left: -8px;
            margin-top: 4px;
            font-size: 14px;
            color: #001119;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .filter-sidebar .card-header a:before {
            font-family: "Font Awesome 5 free";
            font-weight: 900;
            content: "\f107";
            float: right;
            transition: all 0.5s
        }

        .filter-sidebar .card-header a[aria-expanded="true"]:before {
            transform: scaleY(-1);
            -moz-transform: scaleY(-1);
            -webkit-transform: scaleY(-1);
            -ms-transform: scaleY(-1);
        }

        .filter-sidebar .card-header.active a:before {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .filter-sidebar .panel-default>.card-header {
            color: #282b2f;
            background-color: #001119 !important;
        }

        @keyframes click-wave {
            0% {
                height: 40px;
                width: 40px;
                opacity: 0.15;
                position: relative
            }

            100% {
                height: 200px;
                width: 200px;
                margin-left: -80px;
                margin-top: -80px;
                opacity: 0
            }
        }

        .filter-sidebar .ml-10 {
            margin-left: 6px;
            font-size: 14px;
            color: #001119;
            font-weight: 600;
        }

        .filter-sidebar .btn.btn-out {
            outline: 1px solid #fff;
            outline-offset: -5px
        }

        .filter-sidebar .btn {
            border-radius: 2px;
            text-transform: capitalize;
            font-size: 11px;
            padding: 10px 19px;
            cursor: pointer;
            color: #fff
        }

        .filter-sidebar .fa {
            font-size: 12px;
            color: #2874ef
        }

        .filter-sidebar .refine {
            padding: 0px 0px !important
        }

        .filter-sidebar .filters-text {
            margin-bottom: 15px;
            padding: 12px;
            background-color: #001119;
        }

        .filter-sidebar .filter-span {
            font-weight: 700;
            font-size: 17px;
            color: #ffffff;
            white-space: nowrap;
        }

        .containernew {
            margin-right: 15px;
            margin-left: 15px;
        }


        .card-title {
            margin-bottom: 0 !important;
            font-weight: 900;
        }

        .card-group {
            margin-bottom: 12px;
        }

    </style>
    <style>
        #FilterParameters.show,
        #FilterParameters.collapsing {
            display: block !important;
        }

        a.filter-toggle-button:before {
            font-family: "Font Awesome 5 free";
            content: "\f107";
            float: right;
            transition: all 0.5s
        }

        a[aria-expanded="true"].filter-toggle-button:before {
            transform: scaleY(-1);
            -moz-transform: scaleY(-1);
            -webkit-transform: scaleY(-1);
            -ms-transform: scaleY(-1);
        }

        .filter-toggle-button {
            padding-top: 12px;
            padding-bottom: 12px;
            margin-bottom: 20px;
            font-weight: 700;
        }



        .modal-close {
            background-color: #001119;
            border-color: #fff;
            padding: 9px !important;
            font-size: 18px !important;
            font-weight: 700;
            border-radius: 5px !important;
        }

        .modal-close:hover {
            background-color: #001119;
        }

    </style>
    <style>
        .loadingg {
            width: 34px !important;
            height: 34px !important;
            background: transparent !important;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-radius: 100%;
            animation: spin 0.6s ease-out infinite;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg)
            }
        }

    </style>


@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h1><span>Select</span> Your Webcam</h1>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="webcams-list">Webcam</a>
        </span>
    </section>
    <a href="#open-modal" class="float">
        <i class="fa fa-filter my-float"></i>
    </a>
    <section class="system-builder">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 modal-window" id="open-modal">
                    <div class="filter-sidebar FilterParameters" id="FilterParameters">
                        <div style="border-radius: 0.25rem;" class="filters-text">
                            <span class="filter-span">Filters</span>
                            <span style="float:right; color:#ffffff!important;"><i style="color:#ffffff!important;"
                                    class="fa fa-filter"></i></span>
                        </div>
                        <div class="card-group" id="accordion1" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading1">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion1" href="#collapse1"
                                            aria-expanded="true" aria-controls="collapse1"> Manufacturer </a> </h4>
                                </div>
                                <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                                    @foreach ($brands as $brand)
                                                    <div class="checkbox"> <label> <input id="{{ $loop->index + 1 }}"
                                                                type="checkbox" onclick="f_brand({{ $loop->index + 1 }});"
                                                                class="option-input checkbox brand" name="filter['brand']"
                                                                value="{{ $brand->brand }}"> <span
                                                                class="ml-10">{{ $brand->brand }}
                                                                ({{ \App\Models\WebCam::where('brand', $brand->brand)->count() }})
                                                            </span></label> </div>
                                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion2" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading2">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion2" href="#collapse2"
                                            aria-expanded="false" aria-controls="collapse1"> Resolution </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1080p"> <span class="ml-10">1080p (37) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="480p"> <span class="ml-10">480p (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="4K"> <span class="ml-10">4K (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="720p"> <span class="ml-10">720p (10) </span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> Sensor </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="1 MP"> <span
                                                    class="ml-10">1 MP (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="1.3 MP"> <span
                                                    class="ml-10">1.3 MP (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="10 MP"> <span
                                                    class="ml-10">10 MP (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="2 MP"> <span
                                                    class="ml-10">2 MP (28) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="2.1 MP"> <span
                                                    class="ml-10">2.1 MP (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="3 MP"> <span
                                                    class="ml-10">3 MP (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="4 MP"> <span
                                                    class="ml-10">4 MP (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="5 MP"> <span
                                                    class="ml-10">5 MP (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_sensor_resolution(this.id);"
                                                    class="option-input checkbox sensor_resolution"
                                                    name="filter['sensor_resolution']" value="8 MP"> <span
                                                    class="ml-10">8 MP (4) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading4">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion4" href="#collapse4"
                                            aria-expanded="false" aria-controls="collapse1"> Internal Mic </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_microphone(this.id);"
                                                    class="option-input checkbox microphone" name="filter['microphone']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_microphone(this.id);"
                                                    class="option-input checkbox microphone" name="filter['microphone']"
                                                    value="Yes"> <span class="ml-10">Yes (51) </span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="modal-bottom">
                            <a href="#" title="Close" class="d-md-none modal-close btn btn-primary">Close</a>
                            <a href="#" class="d-md-none modal-close btn btn-primary">Apply Filters</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="tool-design">
                        <div class="upper-box">
                            <div id="selectable" onclick="selectText('selectable','link')" class="copy-link"><i
                                    class="fa fa-link" aria-hidden="true"></i>
                                <div class="link px-2">https://pcbuilder.net/rigs/AVBdhB/</div>
                                <i class="fa fa-clone pl-2" aria-hidden="true"></i>
                            </div>
                            <div class="action-box">
                                <div class="action-box-item search"> Search: </div>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Webcam....."
                                    title="Search....">
                            </div>
                            <div class="history-box">
                                <div class="action-box-item"><i class="fa fa-plus" aria-hidden="true"></i> <span
                                        class="px-2" id="newList" onclick="newList();"> New List
                                    </span>
                                </div>
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
                        <div class="bottom-box">
                            <div class="compatibility"><i class="fa fa-check-circle pr-2"
                                    aria-hidden="true"></i>Compatibility: No
                                issues or incompatibilities found.</div>

                        </div>
                    </div>
                    <table id="myTable" class="mt-3 table table-design">
                        <thead>
                            <tr>
                                <th class="d-sm-none" scope="col" width="12%">#</th>
                                <th scope="col" width="9%">Product</th>
                                <th scope="col" width="47%">Title</th>
                                <th scope="col" width="7%">Price</th>
                                <th scope="col" width="18%">Product Link</th>
                                <th scope="col" width="12%">Add Product</th>
                            </tr>
                        </thead>
                        @foreach ($web_cams as $web_cam)
                        <tbody>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $web_cam->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $web_cam->name }}" alt="{{ $web_cam->name }}">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="{{ route('webcams-details', ['id' => $web_cam->id]) }}">{{ $web_cam->name }}</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> {{ $web_cam->brand }} </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model">{{ $web_cam->model }} </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 4K </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 1 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $155.39 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01N5UOYC4?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_6"
                                        href="javascript:void(0);" onclick="setid(6)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41DWe0t6EcL._SL75_.jpg"
                                                title="Logitech C920 HD Pro 1080P Webcam, Widescreen Video Calling and Recording"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C920 HD Pro">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c920-hd-pro-960-000764/index.html">Logitech
                                            C920 HD Pro 1080P Webcam, Widescreen Video Calling and Recording</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C920 HD Pro </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 5 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $70.94 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B006JH8T3S?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_7"
                                        href="javascript:void(0);" onclick="setid(7)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41MLn1GfE7L._SL75_.jpg"
                                                title="Logitech StreamCam 1080P HD Streaming Webcam with USB-C and Built-in Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech StreamCam">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-streamcam-960-001286/index.html">Logitech
                                            StreamCam 1080P HD Streaming Webcam with USB-C and Built-in Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> StreamCam </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $149.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07TZT4Q89?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_8"
                                        href="javascript:void(0);" onclick="setid(8)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41KXzpEMWYL._SL75_.jpg"
                                                title="Logitech C920S HD Pro 1080P Webcam for Streaming, Recording, and Video Conferencing "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C920s HD Pro">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c920s-hd-pro-960-001257/index.html">Logitech
                                            C920S HD Pro 1080P Webcam for Streaming, Recording, and Video Conferencing </a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C920s HD Pro </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $59.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07K986YLL?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_9"
                                        href="javascript:void(0);" onclick="setid(9)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/317NiJamIYL._SL75_.jpg"
                                                title="Logitech C270 HD 720P Webcam for Video Conferencing, Streaming, and Recording"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C270">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c270-960-000694/index.html">Logitech
                                            C270 HD 720P Webcam for Video Conferencing, Streaming, and Recording</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C270 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $24.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004FHO5Y6?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_10"
                                        href="javascript:void(0);" onclick="setid(10)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41GLG9+-M4L._SL75_.jpg"
                                                title="Logitech C922 Pro Stream HD 1080P Webcam for HD Video Streaming & Recording with Tripod Included"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C922 Pro Stream HD">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c922-pro-stream-hd-960-001087/index.html">Logitech
                                            C922 Pro Stream HD 1080P Webcam for HD Video Streaming & Recording with Tripod
                                            Included</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C922 Pro Stream HD </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $74.79 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01MTTMPKT?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_11"
                                        href="javascript:void(0);" onclick="setid(11)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/317SohMrbHL._SL75_.jpg"
                                                title="Razer Kiyo Streaming Webcam: 1080p 30 FPS / 720p 60 FPS - Ring Light w/ Adjustable Brightness - Built-in Microphone - Advanced Autofocus"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Razer Kiyo">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/razer-kiyo-rz19-02320100-r3u1/index.html">Razer
                                            Kiyo Streaming Webcam: 1080p 30 FPS / 720p 60 FPS - Ring Light w/ Adjustable
                                            Brightness - Built-in Microphone - Advanced Autofocus</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Razer </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Kiyo </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 4 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $71.44 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B075N1BYWB?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_12"
                                        href="javascript:void(0);" onclick="setid(12)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31iLoKznlnL._SL75_.jpg"
                                                title="Green Extreme T1000 All in One HD Conference 1080P Webcam with Built-in Speakerphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Green Extreme T1000">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/green-extreme-t1000-gx-t1000/index.html">Green
                                            Extreme T1000 All in One HD Conference 1080P Webcam with Built-in
                                            Speakerphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Green Extreme </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> T1000 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $69.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08BBLHSYK?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_13"
                                        href="javascript:void(0);" onclick="setid(13)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41j+qVPgb7L._SL75_.jpg"
                                                title="Adesso CyberTrack H4 FHD 1080P USB Webcam with Built-in Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Adesso CyberTrack H4">
                                            <div class="stars-rating" title="3.1 out of 5">
                                                <div class="stars-score" style="width: 62%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/adesso-cybertrack-h4/index.html">Adesso
                                            CyberTrack H4 FHD 1080P USB Webcam with Built-in Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Adesso </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CyberTrack H4 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 4 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $31.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B089QRXGKH?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_14"
                                        href="javascript:void(0);" onclick="setid(14)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41OC1UANYNL._SL75_.jpg"
                                                title="Logitech StreamCam 1080P HD Streaming Webcam with USB-C and Built-in Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech StreamCam">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-streamcam-960-001289/index.html">Logitech
                                            StreamCam 1080P HD Streaming Webcam with USB-C and Built-in Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> StreamCam </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 4 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $149.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07TYWPM67?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_15"
                                        href="javascript:void(0);" onclick="setid(15)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41GFTpnZKWL._SL75_.jpg"
                                                title="Wansview 102JD FHD 1080P Webcam with Microphone for Desktop PC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, wansview 102JD">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/wansview-102jd-benewy/index.html">Wansview
                                            102JD FHD 1080P Webcam with Microphone for Desktop PC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> wansview </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> 102JD </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $23.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B088D1W7F3?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_16"
                                        href="javascript:void(0);" onclick="setid(16)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/314NMJhhI0L._SL75_.jpg"
                                                title="Adesso CyberTrack H2 480P USB Webcam with Fixed-Focus & Built-in Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Adesso CyberTrack H2">
                                            <div class="stars-rating" title="2.7 out of 5">
                                                <div class="stars-score" style="width: 54%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/adesso-cybertrack-h2/index.html">Adesso
                                            CyberTrack H2 480P USB Webcam with Fixed-Focus & Built-in Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Adesso </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CyberTrack H2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 480p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 3 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $18 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B088X54T2Q?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_17"
                                        href="javascript:void(0);" onclick="setid(17)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41xDDRFmkgL._SL75_.jpg"
                                                title="Logitech B525 FHD 1080P Webcam for Video Conferencing, Recording, and Streaming"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech B525">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-b525-960-000841/index.html">Logitech
                                            B525 FHD 1080P Webcam for Video Conferencing, Recording, and Streaming</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> B525 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $79.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005GU0FPY?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_18"
                                        href="javascript:void(0);" onclick="setid(18)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41i53i4YPEL._SL75_.jpg"
                                                title="Wansview 101JD FHD 1080P USB Webcam with Microphone & Auto Light Correction"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, wansview 101JD">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/wansview-101jd-benewy/index.html">Wansview
                                            101JD FHD 1080P USB Webcam with Microphone & Auto Light Correction</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> wansview </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> 101JD </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $23.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B088D3VXC6?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_19"
                                        href="javascript:void(0);" onclick="setid(19)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41TrqXhylnL._SL75_.jpg"
                                                title="Logitech C925e FHD 1080P Webcam with Built-In Stereo Microphones"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C925e">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c925e-960-001075/index.html">Logitech
                                            C925e FHD 1080P Webcam with Built-In Stereo Microphones</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C925e </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 4 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $68.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01DPNPJ72?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_20"
                                        href="javascript:void(0);" onclick="setid(20)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41AzuQ8ZuPL._SL75_.jpg"
                                                title="Asus ROG Eye 1080P USB Webcam with Beamforming Microphone and Auto Exposure/Auto Focus Technology"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS ROG Eye">
                                            <div class="stars-rating" title="4.0 out of 5">
                                                <div class="stars-score" style="width: 80%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/asus-rog-eye/index.html">Asus ROG Eye 1080P
                                            USB Webcam with Beamforming Microphone and Auto Exposure/Auto Focus
                                            Technology</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ROG Eye </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $224.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07X6KN81L?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_21"
                                        href="javascript:void(0);" onclick="setid(21)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31P95eFrY6L._SL75_.jpg"
                                                title="AUKEY PC-LM1 FHD 1080P Webcam for Live Streaming with Stereo Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, AUKEY PC-LM1">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/aukey-pc-lm1-pc-lm1e/index.html">AUKEY
                                            PC-LM1 FHD 1080P Webcam for Live Streaming with Stereo Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> AUKEY </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PC-LM1 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $29.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B072MMH33F?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_22"
                                        href="javascript:void(0);" onclick="setid(22)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41J-52s5xgL._SL75_.jpg"
                                                title="Microsoft LifeCam Studio 1080P Webcam with Built-in Microphone for Streaming, Recording, and Video Conferencing"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Microsoft LifeCam Studio">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/microsoft-lifecam-studio-q2f-00013/index.html">Microsoft
                                            LifeCam Studio 1080P Webcam with Built-in Microphone for Streaming, Recording,
                                            and Video Conferencing</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Microsoft </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LifeCam Studio </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 8 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $54.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0096KSBB0?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_23"
                                        href="javascript:void(0);" onclick="setid(23)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41MoYSnfziL._SL75_.jpg"
                                                title="Logitech C930e FHD 1080P Webcam with 90-Degree Extended View for Streaming, Recording, and Conferencing"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C930e">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c930e-960-000971/index.html">Logitech
                                            C930e FHD 1080P Webcam with 90-Degree Extended View for Streaming, Recording,
                                            and Conferencing</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C930e </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $88 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00CRJWW2G?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_24"
                                        href="javascript:void(0);" onclick="setid(24)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41jLC1w5NpL._SL75_.jpg"
                                                title="Adesso CyberTrack H3 HD 720P USB Webcam with Video CMOS Sensor for Desktop PC & Laptop"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Adesso CyberTrack H3">
                                            <div class="stars-rating" title="3.4 out of 5">
                                                <div class="stars-score" style="width: 68%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/adesso-cybertrack-h3/index.html">Adesso
                                            CyberTrack H3 HD 720P USB Webcam with Video CMOS Sensor for Desktop PC &
                                            Laptop</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Adesso </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CyberTrack H3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 1.3 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $23.97 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B089NZ2613?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_25"
                                        href="javascript:void(0);" onclick="setid(25)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31XunZ1QM4L._SL75_.jpg"
                                                title="Green Extreme T300 FHD 1080P Webcam with Widescreen Mode, Autofocus System, and Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Green Extreme T300">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/green-extreme-t300-gx-t300/index.html">Green
                                            Extreme T300 FHD 1080P Webcam with Widescreen Mode, Autofocus System, and
                                            Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Green Extreme </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> T300 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $41.50 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0891X7SCH?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_26"
                                        href="javascript:void(0);" onclick="setid(26)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31dMvBEq1yL._SL75_.jpg"
                                                title="VDO360 2SEE Personal Visual Collaboration Webcam with a 4-Element Beamforming Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, VDO360 VDO360">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/vdo360-vdo360-vdos4m/index.html">VDO360
                                            2SEE Personal Visual Collaboration Webcam with a 4-Element Beamforming
                                            Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> VDO360 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> VDO360 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $129.25 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B087XCXCC1?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_27"
                                        href="javascript:void(0);" onclick="setid(27)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41CAESPKHEL._SL75_.jpg"
                                                title="AVerMedia Live Streamer CAM 313 with Full HD 1080P Streaming Webcam, Privacy Shutter, Dual Microphone, and Exclusive AI Facial Tracking Stickers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, AVerMedia CAM 313">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/avermedia-cam-313-pw313/index.html">AVerMedia
                                            Live Streamer CAM 313 with Full HD 1080P Streaming Webcam, Privacy Shutter, Dual
                                            Microphone, and Exclusive AI Facial Tracking Stickers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> AVerMedia </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CAM 313 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39.69 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07TS9C499?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_28"
                                        href="javascript:void(0);" onclick="setid(28)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/412mB0R+4RL._SL75_.jpg"
                                                title="Logitech HD Webcam C525 Portable HD 720P Webcam for Video Calling with Autofocus"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C525">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c525-960-000715/index.html">Logitech
                                            HD Webcam C525 Portable HD 720P Webcam for Video Calling with Autofocus</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C525 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 8 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $117 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004WO8HQ4?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_29"
                                        href="javascript:void(0);" onclick="setid(29)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31qo2vND6UL._SL75_.jpg"
                                                title="Microsoft LifeCam Studio FHD 1080P Webcam for Streaming, Recording, and Conferencing"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Microsoft LifeCam Studio">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/microsoft-lifecam-studio-5wh-00002/index.html">Microsoft
                                            LifeCam Studio FHD 1080P Webcam for Streaming, Recording, and Conferencing</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Microsoft </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LifeCam Studio </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 5 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $61.80 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004ABO7QI?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_30"
                                        href="javascript:void(0);" onclick="setid(30)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/410EPG-rN4L._SL75_.jpg"
                                                title="Logitech HD Webcam C310 HD 720P Webcam for Recording, Streaming, and Conferencing"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C310">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c310-960-000585/index.html">Logitech
                                            HD Webcam C310 HD 720P Webcam for Recording, Streaming, and Conferencing</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C310 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $34.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B003LVZO8S?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_31"
                                        href="javascript:void(0);" onclick="setid(31)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31S7L1sv1cL._SL75_.jpg"
                                                title="Microsoft LifeCam HD-3000 HD 720P Webcam with Built-in Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Microsoft LifeCam HD-3000">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/microsoft-lifecam-hd-3000-t4h-00002/index.html">Microsoft
                                            LifeCam HD-3000 HD 720P Webcam with Built-in Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Microsoft </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LifeCam HD-3000 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 4 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $26.25 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005BZNEKM?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_32"
                                        href="javascript:void(0);" onclick="setid(32)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41xXAc2417L._SL75_.jpg"
                                                title="Aoni A31 Full HD 1080P Webcam with Auto Focus for Desktop PC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Aoni A31">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/aoni-a31/index.html">Aoni A31 Full HD 1080P
                                            Webcam with Auto Focus for Desktop PC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Aoni </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> A31 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $18.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08BC11GFG?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_33"
                                        href="javascript:void(0);" onclick="setid(33)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41dvMzSeTjL._SL75_.jpg"
                                                title="Microsoft LifeCam Cinema Webcam with 720P Video Recording and Built-in Microphone "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Microsoft Lifecam Cinema">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/microsoft-lifecam-cinema-h5d-00013/index.html">Microsoft
                                            LifeCam Cinema Webcam with 720P Video Recording and Built-in Microphone </a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Microsoft </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Lifecam Cinema </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 5 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $37.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B009CPC6QA?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_34"
                                        href="javascript:void(0);" onclick="setid(34)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>

                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/4113auzPXXL._SL75_.jpg"
                                                title="Microsoft LifeCam HD-3000 L2 Webcam with HD 720P Recording & Streaming"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Microsoft LifeCam HD-3000 L2">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/microsoft-lifecam-hd-3000-l2-t3h-00011/index.html">Microsoft
                                            LifeCam HD-3000 L2 Webcam with HD 720P Recording & Streaming</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Microsoft </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LifeCam HD-3000 L2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $25.81 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B008ZVRAQS?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_35"
                                        href="javascript:void(0);" onclick="setid(35)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41jROGx2saL._SL75_.jpg"
                                                title="Microsoft LifeCam Cinema 720P HD Webcam for Business with Built-in Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Microsoft LifeCam Cinema">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/microsoft-lifecam-cinema-6ch-00001/index.html">Microsoft
                                            LifeCam Cinema 720P HD Webcam for Business with Built-in Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Microsoft </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LifeCam Cinema </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 1 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $42.35 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004ABQAFO?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_36"
                                        href="javascript:void(0);" onclick="setid(36)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41wSTqANACL._SL75_.jpg"
                                                title="Walfront FHD 1080P USB Webcam with Microphone, Privacy Cover, and with 95° Wide Angle"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Walfront HD 1080P">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/walfront-hd-1080p-hd-1080p-web-camera-s4/index.html">Walfront
                                            FHD 1080P USB Webcam with Microphone, Privacy Cover, and with 95° Wide Angle</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Walfront </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HD 1080P </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $26.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08BBXZWQ3?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_37"
                                        href="javascript:void(0);" onclick="setid(37)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41UaLC+1TlL._SL75_.jpg"
                                                title="Aoozi FHD 1080P Webcam with Microphone, Widescreen Video Calling, and Recording"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Aoozi BENEWY">
                                            <div class="stars-rating" title="4.0 out of 5">
                                                <div class="stars-score" style="width: 80%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/aoozi-benewy-1080p-webcam/index.html">Aoozi
                                            FHD 1080P Webcam with Microphone, Widescreen Video Calling, and Recording</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Aoozi </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BENEWY </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 5 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $19.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B088D1C9JL?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_38"
                                        href="javascript:void(0);" onclick="setid(38)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41wvdhFza5L._SL75_.jpg"
                                                title="Walfront Model-S3 1080P Webcam with 360-Degree Rotation Streaming Webcam & Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Walfront Model-S3">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/walfront-model-s3-s3/index.html">Walfront
                                            Model-S3 1080P Webcam with 360-Degree Rotation Streaming Webcam & Microphone</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Walfront </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Model-S3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $14.44 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B088CQWPY1?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_39"
                                        href="javascript:void(0);" onclick="setid(39)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41tQmJ6dB9L._SL75_.jpg"
                                                title="Amcrest AWC201 FHD 1080P USB Webcam with Microphone and Privacy Cover"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Amcrest AWC201">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/amcrest-awc201/index.html">Amcrest AWC201
                                            FHD 1080P USB Webcam with Microphone and Privacy Cover</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Amcrest </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> AWC201 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $29.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B085STB7FR?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_40"
                                        href="javascript:void(0);" onclick="setid(40)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41DA14ht+OL._SL75_.jpg"
                                                title="DEPSTECH FHD 1080P USB Webcam with Microphone, and Auto Light Correction"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, DEPSTECH D04">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/depstech-d04/index.html">DEPSTECH FHD 1080P
                                            USB Webcam with Microphone, and Auto Light Correction</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> DEPSTECH </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> D04 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $22.09 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B088D3Y2YC?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_41"
                                        href="javascript:void(0);" onclick="setid(41)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41nOOq0gsgL._SL75_.jpg"
                                                title="AutoFocus FHD 1080P Streaming Webcam with Stereo Microphone and Privacy Cover"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, NexiGo AutoFocus">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/nexigo-autofocus-autofocus-1080/index.html">AutoFocus
                                            FHD 1080P Streaming Webcam with Stereo Microphone and Privacy Cover</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> NexiGo </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> AutoFocus </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $54.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08931JJLV?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_42"
                                        href="javascript:void(0);" onclick="setid(42)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41Y-R+U48eL._SL75_.jpg"
                                                title="Samcorn FHD 1080P USB Webcam with Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Samcorn A36">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/samcorn-a36-benewy/index.html">Samcorn FHD
                                            1080P USB Webcam with Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Samcorn </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> A36 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08FXZJSXV?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_43"
                                        href="javascript:void(0);" onclick="setid(43)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41jbac8uEVL._SL75_.jpg"
                                                title="NexiGo FHD 1080P Business USB Webcam with Microphone & Privacy Cover"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, NexiGo N60">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/nexigo-n60/index.html">NexiGo FHD 1080P
                                            Business USB Webcam with Microphone & Privacy Cover</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> NexiGo </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> N60 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $33.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B088TSR6YJ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_44"
                                        href="javascript:void(0);" onclick="setid(44)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41lZ96Z4KcL._SL75_.jpg"
                                                title="Litepro FHD 1080P USB Webcams with Microphone, and Privacy Cover"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Litepro Litepro1080p">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/litepro-litepro1080p/index.html">Litepro
                                            FHD 1080P USB Webcams with Microphone, and Privacy Cover</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Litepro </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Litepro1080p </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 3 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B088D91MGJ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_45"
                                        href="javascript:void(0);" onclick="setid(45)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41dl1f3fpRL._SL75_.jpg"
                                                title="Adesso CyberTrack H5 1080p HD USB Auto Focus Webcam with Built-in Dual Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Adesso Cybertrack H5">
                                            <div class="stars-rating" title="3.9 out of 5">
                                                <div class="stars-score" style="width: 78%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/adesso-cybertrack-h5/index.html">Adesso
                                            CyberTrack H5 1080p HD USB Auto Focus Webcam with Built-in Dual Microphone</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Adesso </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Cybertrack H5 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2.1 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $46.87 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08HR8S3D1?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_46"
                                        href="javascript:void(0);" onclick="setid(46)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41IO-ElY1KL._SL75_.jpg"
                                                title="Green Extreme T200 HD Webcam with Microphone, 1080P HD Webcam 30FPS Widescreen Mode Streaming Computer Web Camera Hi-Speed USB"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Green Extreme Extreme T200">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/green-extreme-extreme-t200-wqy/index.html">Green
                                            Extreme T200 HD Webcam with Microphone, 1080P HD Webcam 30FPS Widescreen Mode
                                            Streaming Computer Web Camera Hi-Speed USB</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Green Extreme </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Extreme T200 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $49.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B087P2J1XZ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_47"
                                        href="javascript:void(0);" onclick="setid(47)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41QsObWW8OL._SL75_.jpg"
                                                title="NEW Logitech HD Pro Webcam C910 (Cameras & Frames)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C910">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c910-960-000597/index.html">NEW
                                            Logitech HD Pro Webcam C910 (Cameras & Frames)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C910 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 10 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $124.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B003M2YT96?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_48"
                                        href="javascript:void(0);" onclick="setid(48)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31IoidDAYUL._SL75_.jpg"
                                                title="Logitech C505 HD Webcam - 720p HD External USB Camera for Desktop or Laptop with Long-Range Microphone, Compatible with PC or Mac"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C505">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c505-960-001363/index.html">Logitech
                                            C505 HD Webcam - 720p HD External USB Camera for Desktop or Laptop with
                                            Long-Range Microphone, Compatible with PC or Mac</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C505 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2.1 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $49.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08BNJPVXG?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_49"
                                        href="javascript:void(0);" onclick="setid(49)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41epyfs3isL._SL75_.jpg"
                                                title="AVerMedia PW315 Webcam - 1080p HD Wide Angle Camera for Video Conferencing, Online Teaching, and Streaming"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, AVerMedia PW315">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/avermedia-pw315/index.html">AVerMedia PW315
                                            Webcam - 1080p HD Wide Angle Camera for Video Conferencing, Online Teaching, and
                                            Streaming</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> AVerMedia </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PW315 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $108.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08W278Z75?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_50"
                                        href="javascript:void(0);" onclick="setid(50)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41-byategfL._SL75_.jpg"
                                                title="AVerMedia PW310P Webcam - Full 1080p 30fps HD Camera with Autofocus and Dual Stereo Microphones, Work from Home, Remote Learning."
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, AVerMedia PW310P">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/avermedia-pw310p/index.html">AVerMedia
                                            PW310P Webcam - Full 1080p 30fps HD Camera with Autofocus and Dual Stereo
                                            Microphones, Work from Home, Remote Learning.</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> AVerMedia </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PW310P </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2.1 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $59.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08W24W4WB?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_51"
                                        href="javascript:void(0);" onclick="setid(51)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41TdYWFnjxL._SL75_.jpg"
                                                title="Logitech C505e Webcam"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech C505e">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/logitech-c505e-960-001385/index.html">Logitech
                                            C505e Webcam</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C505e </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 720p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $42.98 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08DR2M7QL?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_52"
                                        href="javascript:void(0);" onclick="setid(52)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31upidSOY3L._SL75_.jpg"
                                                title="Razer Kiyo Pro Streaming Webcam: Uncompressed 1080p 60FPS - High-Performance Adaptive Light Sensor - HDR-Enabled "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Razer Kiyo Pro">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/razer-kiyo-pro-rz19-03640100-r3u1/index.html">Razer
                                            Kiyo Pro Streaming Webcam: Uncompressed 1080p 60FPS - High-Performance Adaptive
                                            Light Sensor - HDR-Enabled </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Razer </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Kiyo Pro </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2.1 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $171.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08T1MWX6J?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_53"
                                        href="javascript:void(0);" onclick="setid(53)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41FzIekj1IL._SL75_.jpg"
                                                title="AVerMedia Live Streamer CAM 513. A Plug & Play USB 3.0, 4K UHD, Wide-Angle Lens Webcam"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, AVerMedia PW513">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/avermedia-pw513/index.html">AVerMedia Live
                                            Streamer CAM 513. A Plug & Play USB 3.0, 4K UHD, Wide-Angle Lens Webcam</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> AVerMedia </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PW513 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 4K </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 8 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $164.61 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08LZVCCGZ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_54"
                                        href="javascript:void(0);" onclick="setid(54)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31ZZJO4vjvL._SL75_.jpg"
                                                title="Creative Live! Cam Sync 1080p Full HD Wide-Angle USB Webcam with Dual Built-in Mic, Privacy Lens Cap, Universal Tripod Mount, High-res Video Calling"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative VF0860">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/creative-vf0860-73vf086000000/index.html">Creative
                                            Live! Cam Sync 1080p Full HD Wide-Angle USB Webcam with Dual Built-in Mic,
                                            Privacy Lens Cap, Universal Tripod Mount, High-res Video Calling</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> VF0860 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 1080p </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 2 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $29.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08BTQLVZL?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_55"
                                        href="javascript:void(0);" onclick="setid(55)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31DvoMLRgSL._SL75_.jpg"
                                                title="Adesso Cybertrack H6 4K Ultra HD USB Webcam with Built-in Dual Microphone & Privacy Shutter Cover"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Adesso Cybertrack H6">
                                            <div class="stars-rating" title="3.2 out of 5">
                                                <div class="stars-score" style="width: 64%">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/webcam/adesso-cybertrack-h6/index.html">Adesso
                                            Cybertrack H6 4K Ultra HD USB Webcam with Built-in Dual Microphone & Privacy
                                            Shutter Cover</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Adesso </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Cybertrack H6 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Resolution:</div>
                                            <div class="detail__value f_resolution"> 4K </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Internal Mic:</div>
                                            <div class="detail__value f_microphone"> Yes </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Sensor:</div>
                                            <div class="detail__value f_sensor_resolution"> 8 MP </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $44.26 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08D3SVYR8?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_56"
                                        href="javascript:void(0);" onclick="setid(56)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        
                    </table>
                </div>
            </div>
    </section>
@endsection

@push('script')
    <script>
        function f_brand(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("brand");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_brand")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_brand");
                        } else {
                            tr[i].classList.remove("c_brand");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_brand")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_brand");
                            } else {
                                tr[i].classList.add("c_brand");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_brand")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_brand");
                            } else {
                                tr[i].classList.remove("c_brand");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script type="application/ld+json">
        {
         "@context": "http://schema.org",
         "@type": "BreadcrumbList",
         "itemListElement":
         [
          {
           "@type": "ListItem",
           "position": 1,
           "item":
           {
            "@id": "https://pcbuilder.net/",
            "name": "PC Builder"
            }
          },
          {
           "@type": "ListItem",
           "position": 2,
           "item":
           {
            "@id": "https://pcbuilder.net/product/",
            "name": "Product"
            }
          },
          {
           "@type": "ListItem",
          "position": 3,
          "item":
           {
             "@id": "https://pcbuilder.net/product/webcam/",
             "name": "Webcam"
           }
          }
         ]
        }
        </script>
    
    <script>
        function f_resolution(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("resolution");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_resolution")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_resolution");
                        } else {
                            tr[i].classList.remove("c_resolution");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_resolution")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_resolution");
                            } else {
                                tr[i].classList.add("c_resolution");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_resolution")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_resolution");
                            } else {
                                tr[i].classList.remove("c_resolution");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_sensor_resolution(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("sensor_resolution");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_sensor_resolution")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_sensor_resolution");
                        } else {
                            tr[i].classList.remove("c_sensor_resolution");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_sensor_resolution")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_sensor_resolution");
                            } else {
                                tr[i].classList.add("c_sensor_resolution");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_sensor_resolution")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_sensor_resolution");
                            } else {
                                tr[i].classList.remove("c_sensor_resolution");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_microphone(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("microphone");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_microphone")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_microphone");
                        } else {
                            tr[i].classList.remove("c_microphone");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_microphone")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_microphone");
                            } else {
                                tr[i].classList.add("c_microphone");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_microphone")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_microphone");
                            } else {
                                tr[i].classList.remove("c_microphone");
                            }
                        }
                    }
                }
            }
        }
    </script>
@endpush
