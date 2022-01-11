@extends('layouts.app')

@push('style')
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_interface {
            display: none !important;
        }

    </style>
    <style>
        .c_ports {
            display: none !important;
        }

    </style>
    <style>
        .c_color {
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
        <h1><span>Select</span> Your Wired Network Adapter</h1>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="wired-network-adapter-list">Wired Network Adapter</a>
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
                                                                ({{ \App\Models\WiredNetworkAdapter::where('brand', $brand->brand)->count() }})
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
                                            aria-expanded="false" aria-controls="collapse1"> Interface </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe"> <span
                                                    class="ml-10">PCIe (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe x1"> <span
                                                    class="ml-10">PCIe x1 (16) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe x4"> <span
                                                    class="ml-10">PCIe x4 (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe x8"> <span
                                                    class="ml-10">PCIe x8 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB 1.0"> <span
                                                    class="ml-10">USB 1.0 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB 2.0"> <span
                                                    class="ml-10">USB 2.0 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB 3.0"> <span
                                                    class="ml-10">USB 3.0 (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB Type C"> <span
                                                    class="ml-10">USB Type C (2) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> Ports </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_ports(this.id);" class="option-input checkbox ports"
                                                    name="filter['ports']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_ports(this.id);" class="option-input checkbox ports"
                                                    name="filter['ports']" value="1 x 10 Gbit/s"> <span
                                                    class="ml-10">1 x 10 Gbit/s (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_ports(this.id);" class="option-input checkbox ports"
                                                    name="filter['ports']" value="1 x 100 Mbit/s"> <span
                                                    class="ml-10">1 x 100 Mbit/s (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_ports(this.id);" class="option-input checkbox ports"
                                                    name="filter['ports']" value="1 x 1000 Mbit/s"> <span
                                                    class="ml-10">1 x 1000 Mbit/s (22) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_ports(this.id);" class="option-input checkbox ports"
                                                    name="filter['ports']" value="1 x 2.5 Gbit/s"> <span
                                                    class="ml-10">1 x 2.5 Gbit/s (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_ports(this.id);" class="option-input checkbox ports"
                                                    name="filter['ports']" value="2 x 10 Gbit/s"> <span
                                                    class="ml-10">2 x 10 Gbit/s (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_ports(this.id);" class="option-input checkbox ports"
                                                    name="filter['ports']" value="2 x 1000 Mbit/s"> <span
                                                    class="ml-10">2 x 1000 Mbit/s (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_ports(this.id);" class="option-input checkbox ports"
                                                    name="filter['ports']" value="4 x 1000 Mbit/s"> <span
                                                    class="ml-10">4 x 1000 Mbit/s (6) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading4">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion4" href="#collapse4"
                                            aria-expanded="false" aria-controls="collapse1"> Color </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black"> <span
                                                    class="ml-10">Black (39) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / silver"> <span
                                                    class="ml-10">Black / silver (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red"> <span class="ml-10">Red
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / Black"> <span
                                                    class="ml-10">Red / Black (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver"> <span
                                                    class="ml-10">Silver (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White"> <span
                                                    class="ml-10">White (5) </span></label> </div>
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
                                <input type="text" id="myInput" onkeyup="myFunction()"
                                    placeholder="Search Wired Network Adapter....." title="Search....">
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
                        @foreach ($wired_network_adapters as $wired_network_adapter)
                        <tbody>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $wired_network_adapter->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $wired_network_adapter->name }}" alt="{{ $wired_network_adapter->name }}">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="{{ route('wired-network-adapter-details', ['id' => $wired_network_adapter->id]) }}">{{ $wired_network_adapter->name }}</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> {{ $wired_network_adapter->brand }} </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> {{ $wired_network_adapter->model }} </div>
                                        </div>
                                    </span>
                                    {{-- <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black / silver </div>
                                        </div>
                                    </span> --}}

                                </td>
                                <td class="price">
                                    $14.63 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B003CFATNI?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                                        href="javascript:void(0);" onclick="setid(1)"><i class="fa fa-plus"></i></a>
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
                                                data-src="https://m.media-amazon.com/images/I/31USWhohfpL._SL75_.jpg"
                                                title="StarTech ST3300U3S USB 3.0 to Gigabit Ethernet NIC Network Adapter with 3 Port Hub "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech ST3300U3S">
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
                                            href="../../component-details/wired-network-adapter/startech-st3300u3s/index.html">StarTech
                                            ST3300U3S USB 3.0 to Gigabit Ethernet NIC Network Adapter with 3 Port Hub </a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ST3300U3S </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $45.46 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00BB7TU8Y?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_2"
                                        href="javascript:void(0);" onclick="setid(2)"><i class="fa fa-plus"></i></a>
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
                                                data-src="https://m.media-amazon.com/images/I/41zOefaipLL._SL75_.jpg"
                                                title="ASUS XG-C100C PCIe x4 10Gb/s Network Adapter Card with Single RJ-45 Port"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS C100C">
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
                                            href="../../component-details/wired-network-adapter/asus-c100c-xg-c100c/index.html">ASUS
                                            XG-C100C PCIe x4 10Gb/s Network Adapter Card with Single RJ-45 Port</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C100C </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Red </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $92.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B072N84DG6?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_3"
                                        href="javascript:void(0);" onclick="setid(3)"><i class="fa fa-plus"></i></a>
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
                                                data-src="https://m.media-amazon.com/images/I/41PxuFPoE4L._SL75_.jpg"
                                                title="StarTech PCIe x1 10Gb/s Ethernet NIC Network Card  NIC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech ST10000SPEX">
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
                                            href="../../component-details/wired-network-adapter/startech-st10000spex/index.html">StarTech
                                            PCIe x1 10Gb/s Ethernet NIC Network Card NIC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ST10000SPEX </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $361.42 (Used) </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00LPRS36K?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_4"
                                        href="javascript:void(0);" onclick="setid(4)"><i class="fa fa-plus"></i></a>
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
                                                data-src="https://m.media-amazon.com/images/I/515X-bcxALL._SL75_.jpg"
                                                title="Intel Corporation X550T2 Converged Dual Port Gigabyte PCIe x4 Network Adapter "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Intel X550">
                                            <div class="stars-rating" title="3.0 out of 5">
                                                <div class="stars-score" style="width: 60%">
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
                                            href="../../component-details/wired-network-adapter/intel-x550-x550t2/index.html">Intel
                                            Corporation X550T2 Converged Dual Port Gigabyte PCIe x4 Network Adapter </a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Intel </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> X550 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $356.57 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01D3ZE0FY?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_5"
                                        href="javascript:void(0);" onclick="setid(5)"><i class="fa fa-plus"></i></a>
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
                                                data-src="https://m.media-amazon.com/images/I/41kP8hD-X7L._SL75_.jpg"
                                                title="Intel CT 1Gb/s Gigabit PCIe x1 Network Adapter Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Intel CT PCIe">
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
                                            href="../../component-details/wired-network-adapter/intel-ct-pcie-expi9301ctblk/index.html">Intel
                                            CT 1Gb/s Gigabit PCIe x1 Network Adapter Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Intel </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CT PCIe </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $38.14 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001CY0P7G?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31xNCftd2NL._SL75_.jpg"
                                                title="SIIG JU-NE0621-S2 USB 3.0 to Gigabit Ethernet 1Gb/s RJ45 LAN Adapter for Desktop PC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SIIG JU-NE0621-S2">
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
                                            href="../../component-details/wired-network-adapter/siig-ju-ne0621-s2/index.html">SIIG
                                            JU-NE0621-S2 USB 3.0 to Gigabit Ethernet 1Gb/s RJ45 LAN Adapter for Desktop
                                            PC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SIIG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> JU-NE0621-S2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $13.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00YT737ZU?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41k1Dh8xSfL._SL75_.jpg"
                                                title="D-Link DXE-820T Dual Port10Gb/s Gigabit RJ45 PCI Express Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, D-Link DXE-820T">
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
                                            href="../../component-details/wired-network-adapter/d-link-dxe-820t/index.html">D-Link
                                            DXE-820T Dual Port10Gb/s Gigabit RJ45 PCI Express Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> D-Link </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> DXE-820T </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x8 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00PVDQ2BW?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41gtaFbaRRL._SL75_.jpg"
                                                title="Edimax EN-9320TX-E, 10 Gigabit PCI Express Ethernet Server Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edimax EN-9320TX-E">
                                            <div class="stars-rating" title="3.8 out of 5">
                                                <div class="stars-score" style="width: 76%">
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
                                            href="../../component-details/wired-network-adapter/edimax-en-9320tx-e/index.html">Edimax
                                            EN-9320TX-E, 10 Gigabit PCI Express Ethernet Server Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edimax </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> EN-9320TX-E </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0779PKJCP?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/216TQsaMMNL._SL75_.jpg"
                                                title="Intel E1G42ETBLK Dual Port 1 Gigabit PCIe x4 Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Intel E1G42ETBLK">
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
                                            href="../../component-details/wired-network-adapter/intel-e1g42etblk/index.html">Intel
                                            E1G42ETBLK Dual Port 1 Gigabit PCIe x4 Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Intel </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> E1G42ETBLK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $49.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001G2UEH0?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31ExWWQ87+L._SL75_.jpg"
                                                title="QLogic QLE3242-CU-CK 10Gb/s Dual Gigabit PCIe x8 Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, QLogic QLE3242CUCK">
                                            <div class="stars-rating" title="5.0 out of 5">
                                                <div class="stars-score" style="width: 100%">
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
                                            href="../../component-details/wired-network-adapter/qlogic-qle3242cuck/index.html">QLogic
                                            QLE3242-CU-CK 10Gb/s Dual Gigabit PCIe x8 Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> QLogic </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> QLE3242CUCK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x8 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00CIQKWMA?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41+layE-ivL._SL75_.jpg"
                                                title="StarTech USB 3.0 to Dual Port Gigabit Ethernet NIC Adapter with USB Port "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech USB32000SPT">
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
                                            href="../../component-details/wired-network-adapter/startech-usb32000spt/index.html">StarTech
                                            USB 3.0 to Dual Port Gigabit Ethernet NIC Adapter with USB Port </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> USB32000SPT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $47.62 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00D8XTOD0?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41mYieVJxwL._SL75_.jpg"
                                                title="Intel I340-T4 PCI Express x4 Lane Ethernet Server Adapter 1Gb/s RJ-45 Copper "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Intel E1G44HTBLK">
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
                                            href="../../component-details/wired-network-adapter/intel-e1g44htblk/index.html">Intel
                                            I340-T4 PCI Express x4 Lane Ethernet Server Adapter 1Gb/s RJ-45 Copper </a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Intel </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> E1G44HTBLK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 4 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $81 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B003A7LKOU?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31bI4rqYUUL._SL75_.jpg"
                                                title="TRENDnet TUC-ET2G USB Type-C 3.1 to RJ-45 2.5Gb/s LAN Ethernet Adapter for Desktop PC, MacBook, and Chromebook"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, TRENDnet TUC-ET2G">
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
                                            href="../../component-details/wired-network-adapter/trendnet-tuc-et2g/index.html">TRENDnet
                                            TUC-ET2G USB Type-C 3.1 to RJ-45 2.5Gb/s LAN Ethernet Adapter for Desktop PC,
                                            MacBook, and Chromebook</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> TRENDnet </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TUC-ET2G </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB Type C </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 2.5 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $32.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07RBMTVYF?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31VDO1rx-PL._SL75_.jpg"
                                                title="StarTech ST1000SPEXD2 Low Profile Dual Port Gigabit Network Server Adapter NIC Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech ST1000SPEXD2">
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
                                            href="../../component-details/wired-network-adapter/startech-st1000spexd2/index.html">StarTech
                                            ST1000SPEXD2 Low Profile Dual Port Gigabit Network Server Adapter NIC Card</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ST1000SPEXD2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $11.66 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005WKKDQO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41aQjghbX4L._SL75_.jpg"
                                                title="Rosewill RC-NIC416Dual 10Gb/s PCI Express Dual Port Ethernet Network Adapter with Intel X550-AT2 Chipset"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Rosewill RC-NIC416Dual">
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
                                            href="../../component-details/wired-network-adapter/rosewill-rc-nic416dual/index.html">Rosewill
                                            RC-NIC416Dual 10Gb/s PCI Express Dual Port Ethernet Network Adapter with Intel
                                            X550-AT2 Chipset</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Rosewill </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> RC-NIC416Dual </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07NJN87QN?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41MKOz3sfzL._SL75_.jpg"
                                                title="Syba  SY-HUB24047 4 Port RJ45 Gigabit USB 3.0 Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Syba SY-HUB24047">
                                            <div class="stars-rating" title="3.3 out of 5">
                                                <div class="stars-score" style="width: 66%">
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
                                            href="../../component-details/wired-network-adapter/syba-sy-hub24047/index.html">Syba
                                            SY-HUB24047 4 Port RJ45 Gigabit USB 3.0 Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Syba </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SY-HUB24047 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 4 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $54.80 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01N16C75R?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/515q+pyBjDL._SL75_.jpg"
                                                title="QNAP QXG-10G1T PCIe Gen3 x4 10Gb/s Ethernet Network Expansion Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, QNAP QXG-10G1T">
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
                                            href="../../component-details/wired-network-adapter/qnap-qxg-10g1t/index.html">QNAP
                                            QXG-10G1T PCIe Gen3 x4 10Gb/s Ethernet Network Expansion Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> QNAP </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> QXG-10G1T </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $108.76 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07CW2C2J1?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41yD00lMf3L._SL75_.jpg"
                                                title="StarTech USB 2.0 to Gigabit Ethernet NIC Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech USB21000S2">
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
                                            href="../../component-details/wired-network-adapter/startech-usb21000s2/index.html">StarTech
                                            USB 2.0 to Gigabit Ethernet NIC Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> USB21000S2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $54.94 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B007U5MGDC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51dovzTVhmL._SL75_.jpg"
                                                title="Intel EXPI9301CT 1 Gigabit CT PCIe x1 Network Adapter for Desktop PC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Intel EXPI9301CT">
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
                                            href="../../component-details/wired-network-adapter/intel-expi9301ct/index.html">Intel
                                            EXPI9301CT 1 Gigabit CT PCIe x1 Network Adapter for Desktop PC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Intel </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> EXPI9301CT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $38.23 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001CXWWBE?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/311xXGwJp2L._SL75_.jpg"
                                                title="TP-Link TL-UE300 USB to Ethernet Adapter, Foldable USB 3.0 to 1000Gb/s Ethernet LAN Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, TP-Link TL-UE300">
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
                                            href="../../component-details/wired-network-adapter/tp-link-tl-ue300/index.html">TP-Link
                                            TL-UE300 USB to Ethernet Adapter, Foldable USB 3.0 to 1000Gb/s Ethernet LAN
                                            Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> TP-Link </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TL-UE300 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $11.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00YUU3KC6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/419H7vmlAkL._SL75_.jpg"
                                                title="Intel PRO PCIe x4 Based 2x1000Gb/s Dual Port Network Adapter "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Intel EXPI9402PTG2P20">
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
                                            href="../../component-details/wired-network-adapter/intel-expi9402ptg2p20/index.html">Intel
                                            PRO PCIe x4 Based 2x1000Gb/s Dual Port Network Adapter </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Intel </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> EXPI9402PTG2P20 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $73.15 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00154L0KE?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41w2-E38ENL._SL75_.jpg"
                                                title="Syba SI-PEX24042 4 Port Gigabit Ethernet PCI Express Network Adapter Card with Realtek Chipset"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Syba SI-PEX24042">
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
                                            href="../../component-details/wired-network-adapter/syba-si-pex24042/index.html">Syba
                                            SI-PEX24042 4 Port Gigabit Ethernet PCI Express Network Adapter Card with
                                            Realtek Chipset</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Syba </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SI-PEX24042 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 4 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $109 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01HH6WETO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41SKQH6+DPL._SL75_.jpg"
                                                title="TRENDnet TEG-10GECTX 10 Gigabit PCIe Network Adapter, Converts a PCIe Slot into a 10Gb/s Ethernet Port, Supports 802.1Q Vlan"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, TRENDnet TEG-10GECTX">
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
                                            href="../../component-details/wired-network-adapter/trendnet-teg-10gectx/index.html">TRENDnet
                                            TEG-10GECTX 10 Gigabit PCIe Network Adapter, Converts a PCIe Slot into a 10Gb/s
                                            Ethernet Port, Supports 802.1Q Vlan</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> TRENDnet </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TEG-10GECTX </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Silver </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $94.86 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01N5AOWW6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41zJsHecNzL._SL75_.jpg"
                                                title="Rosewill RC 411v3 PCIe based Ethernet Network Interface Card (NIC) for Desktop PC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Rosewill RC-411v3">
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
                                            href="../../component-details/wired-network-adapter/rosewill-rc-411v3/index.html">Rosewill
                                            RC 411v3 PCIe based Ethernet Network Interface Card (NIC) for Desktop PC</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Rosewill </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> RC-411v3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $12.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004F34ONC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31FKCM9B-EL._SL75_.jpg"
                                                title="Rosewill RC 400-LX PCIe Ethernet Network Interface Card (NIC) with 5 Speed control"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Rosewill RC-400-LX">
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
                                            href="../../component-details/wired-network-adapter/rosewill-rc-400-lx/index.html">Rosewill
                                            RC 400-LX PCIe Ethernet Network Interface Card (NIC) with 5 Speed control</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Rosewill </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> RC-400-LX </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Silver </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $13.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004F3CO5M?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/418bt2FoPDL._SL75_.jpg"
                                                title="Intel E1G44ET2BLK Gigabit ET2 PCIe x4 Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Intel E1G44ET2BLK">
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
                                            href="../../component-details/wired-network-adapter/intel-e1g44et2blk/index.html">Intel
                                            E1G44ET2BLK Gigabit ET2 PCIe x4 Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Intel </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> E1G44ET2BLK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 4 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $376.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0042EOA7O?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/310jTkr9xaL._SL75_.jpg"
                                                title="Syba SD-PEX24009 Gigabit LAN Network NIC PCIe x1 Ethernet Card "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Syba SD-PEX24009">
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
                                            href="../../component-details/wired-network-adapter/syba-sd-pex24009/index.html">Syba
                                            SD-PEX24009 Gigabit LAN Network NIC PCIe x1 Ethernet Card </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Syba </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SD-PEX24009 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $13.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004M18EEC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41ZQXwAHr7L._SL75_.jpg"
                                                title="Rosewill RNG 407 Dual Port RJ45 10/100/1000Mbps Gigabit PCI Express Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Rosewill RNG 407 Dual">
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
                                            href="../../component-details/wired-network-adapter/rosewill-rng-407-dual-rng-407-dualv2/index.html">Rosewill
                                            RNG 407 Dual Port RJ45 10/100/1000Mbps Gigabit PCI Express Network Adapter</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Rosewill </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> RNG 407 Dual </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00DODX5MA?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41rj6tmPPXL._SL75_.jpg"
                                                title="Linksys USB3GIG USB 3.0 Ethernet Network Adapter, for Desktop PC, MacBook Air, Chromebook, & Ultrabook"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Linksys USB3GIG">
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
                                            href="../../component-details/wired-network-adapter/linksys-usb3gig/index.html">Linksys
                                            USB3GIG USB 3.0 Ethernet Network Adapter, for Desktop PC, MacBook Air,
                                            Chromebook, & Ultrabook</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Linksys </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> USB3GIG </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $29.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00LIW8TBG?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41gv9IjtPCL._SL75_.jpg"
                                                title="Intel E1G44HT I340-T4 PCIe x4 Ethernet Server Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Intel E1G44HT">
                                            <div class="stars-rating" title="5.0 out of 5">
                                                <div class="stars-score" style="width: 100%">
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
                                            href="../../component-details/wired-network-adapter/intel-e1g44ht/index.html">Intel
                                            E1G44HT I340-T4 PCIe x4 Ethernet Server Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Intel </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> E1G44HT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 4 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $86 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B003A7WPB2?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41nV0fjDyoL._SL75_.jpg"
                                                title="StarTech PCIe x1 32-Bit Gigabit Ethernet Network Adapter Card "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech ST1000BT32">
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
                                            href="../../component-details/wired-network-adapter/startech-st1000bt32/index.html">StarTech
                                            PCIe x1 32-Bit Gigabit Ethernet Network Adapter Card </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ST1000BT32 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $11.10 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0000TO0BQ?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41TqdRcixGL._SL75_.jpg"
                                                title="SIIG CN-GP4011-S1 PCIe x4 Gigabit Ethernet Network Adapter "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SIIG CN-GP4011-S1">
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
                                            href="../../component-details/wired-network-adapter/siig-cn-gp4011-s1/index.html">SIIG
                                            CN-GP4011-S1 PCIe x4 Gigabit Ethernet Network Adapter </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SIIG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CN-GP4011-S1 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 4 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00B4G1CZQ?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41HvZRTQlHL._SL75_.jpg"
                                                title="Syba SD-PEX24055 PCIe x4 10 Gigabit Ethernet Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Syba SD-PEX24055">
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
                                            href="../../component-details/wired-network-adapter/syba-sd-pex24055/index.html">Syba
                                            SD-PEX24055 PCIe x4 10 Gigabit Ethernet Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Syba </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SD-PEX24055 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 10 Gbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Red / Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $89.69 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07G2DV9K2?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31Ps58kpamL._SL75_.jpg"
                                                title="Edimax EU4208 USB 2.0 Fast Ethernet Adapter with 1 x 100 Mbit/s Port"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edimax EU4208">
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
                                            href="../../component-details/wired-network-adapter/edimax-eu4208/index.html">Edimax
                                            EU4208 USB 2.0 Fast Ethernet Adapter with 1 x 100 Mbit/s Port</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edimax </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> EU4208 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 100 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $13.90 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0094D4X5C?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41BzRkY99cL._SL75_.jpg"
                                                title="Syba SY-PEX24028 Gigabit Ethernet PCIe x1 Network Interface Card "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Syba SY-PEX24028">
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
                                            href="../../component-details/wired-network-adapter/syba-sy-pex24028/index.html">Syba
                                            SY-PEX24028 Gigabit Ethernet PCIe x1 Network Interface Card </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Syba </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SY-PEX24028 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00965J4TS?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41ZgU4aQtuL._SL75_.jpg"
                                                title="StarTech ST1000SPEX2 PCI-Express Gigabit Network Server Adapter with Realtek Chip NIC Card "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech ST1000SPEX2">
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
                                            href="../../component-details/wired-network-adapter/startech-st1000spex2/index.html">StarTech
                                            ST1000SPEX2 PCI-Express Gigabit Network Server Adapter with Realtek Chip NIC
                                            Card </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ST1000SPEX2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $18.97 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ARJLWW4?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31L5LUJEzwL._SL75_.jpg"
                                                title="Belkin B2B145-BLK USB Type-C based Ethernet Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Belkin B2B145-BLK">
                                            <div class="stars-rating" title="5.0 out of 5">
                                                <div class="stars-score" style="width: 100%">
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
                                            href="../../component-details/wired-network-adapter/belkin-b2b145-blk/index.html">Belkin
                                            B2B145-BLK USB Type-C based Ethernet Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Belkin </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> B2B145-BLK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB Type C </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $28.76 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B06XP2BK31?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41fZ6CPrH2L._SL75_.jpg"
                                                title="D-Link DUB-E100 USB 2.0 Ethernet Adapter with High Speed Network for Desktop PC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, D-Link DUB-E100">
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
                                            href="../../component-details/wired-network-adapter/d-link-dub-e100/index.html">D-Link
                                            DUB-E100 USB 2.0 Ethernet Adapter with High Speed Network for Desktop PC</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> D-Link </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> DUB-E100 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 1.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 100 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $16.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00006B7D8?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31srvpz1a0L._SL75_.jpg"
                                                title="SYBA SY-ADA24040 USB 3.0 based Ethernet Network Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Syba SY-ADA24040">
                                            <div class="stars-rating" title="5.0 out of 5">
                                                <div class="stars-score" style="width: 100%">
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
                                            href="../../component-details/wired-network-adapter/syba-sy-ada24040/index.html">SYBA
                                            SY-ADA24040 USB 3.0 based Ethernet Network Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Syba </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SY-ADA24040 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00YBQOCHG?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31DYbXxyRbL._SL75_.jpg"
                                                title="Plugable USB to Ethernet Network Adapter, USB 3.0 to Gigabit Ethernet Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Plugable USB3-E1000">
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
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/wired-network-adapter/plugable-usb3-e1000/index.html">Plugable
                                            USB to Ethernet Network Adapter, USB 3.0 to Gigabit Ethernet Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Plugable </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> USB3-E1000 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $19.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00AQM8586?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/411ThYG-WZL._SL75_.jpg"
                                                title="StarTech PCIe x1 Port Ethernet Network Card with RJ45 Port & Realtek RTL8111H Chipset"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech ST1000SPEX2L">
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
                                            href="../../component-details/wired-network-adapter/startech-st1000spex2l/index.html">StarTech
                                            PCIe x1 Port Ethernet Network Card with RJ45 Port & Realtek RTL8111H Chipset</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ST1000SPEX2L </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $20.46 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00E4KZDJ0?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31wNE-w0QXL._SL75_.jpg"
                                                title="Rosewill USB to Ethernet Adapter (USB 3 to Ethernet, USB to Gigabit Ethernet, USB to RJ45) "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Rosewill RNG-406Uv2">
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
                                            href="../../component-details/wired-network-adapter/rosewill-rng-406uv2/index.html">Rosewill
                                            USB to Ethernet Adapter (USB 3 to Ethernet, USB to Gigabit Ethernet, USB to
                                            RJ45) </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Rosewill </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> RNG-406Uv2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $18.95 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00AQU7M82?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41AI3nn8p5L._SL75_.jpg"
                                                title="StarTech Dual Port PCI Express Gigabit Ethernet Network Card Adapter "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech ST2000PEXPSE">
                                            <div class="stars-rating" title="3.6 out of 5">
                                                <div class="stars-score" style="width: 72%">
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
                                            href="../../component-details/wired-network-adapter/startech-st2000pexpse/index.html">StarTech
                                            Dual Port PCI Express Gigabit Ethernet Network Card Adapter </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ST2000PEXPSE </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Red / Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $111.97 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B009X6D2MU?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41ATobnbf3L._SL75_.jpg"
                                                title="SIIG Dual Profile GigaLAN PCIe Ethernet Adapter for Desktop PC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SIIG CN-GP1021-S3">
                                            <div class="stars-rating" title="2.6 out of 5">
                                                <div class="stars-score" style="width: 52%">
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
                                            href="../../component-details/wired-network-adapter/siig-cn-gp1021-s3/index.html">SIIG
                                            Dual Profile GigaLAN PCIe Ethernet Adapter for Desktop PC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SIIG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CN-GP1021-S3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $28.06 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00B4G1CK6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51oMEDB1g-L._SL75_.jpg"
                                                title="Lenovo ThinkSystem NetXtreme PCIe x1 RJ45 Ethernet Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lenovo NetXtreme">
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
                                            href="../../component-details/wired-network-adapter/lenovo-netxtreme-7zt7a00482/index.html">Lenovo
                                            ThinkSystem NetXtreme PCIe x1 RJ45 Ethernet Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lenovo </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> NetXtreme </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 2 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $94.26 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B076LTBZGS?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41PnBGtDW-L._SL75_.jpg"
                                                title="StarTech PCI Express based Ethernet Network Interface Adapter Card "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech PEX100S">
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
                                            href="../../component-details/wired-network-adapter/startech-pex100s/index.html">StarTech
                                            PCI Express based Ethernet Network Interface Adapter Card </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PEX100S </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 100 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $15.48 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00186YI9Y?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31ML8LCWD3L._SL75_.jpg"
                                                title="StarTech USB 3.0 to Gigabit Ethernet Adapter NIC with USB Port (White) "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, StarTech USB31000SPTW">
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
                                            href="../../component-details/wired-network-adapter/startech-usb31000sptw/index.html">StarTech
                                            USB 3.0 to Gigabit Ethernet Adapter NIC with USB Port (White) </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> StarTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> USB31000SPTW </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $34.24 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00E4KZCIM?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31bzwqFe7zL._SL75_.jpg"
                                                title="D-Link USB 3.0 to Gigabit Ethernet Adapter with USB to RJ45 for 10/100/1000 Network"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, D-Link DUB-1312">
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
                                            href="../../component-details/wired-network-adapter/d-link-dub-1312/index.html">D-Link
                                            USB 3.0 to Gigabit Ethernet Adapter with USB to RJ45 for 10/100/1000 Network</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> D-Link </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> DUB-1312 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> USB 3.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $27.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00H09E5KK?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41tlVrjatYL._SL75_.jpg"
                                                title="Syba Gigabit Ethernet PCIe x1 Interface Based Card with Realtek Chipset"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Syba SY-PEX24030">
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
                                            href="../../component-details/wired-network-adapter/syba-sy-pex24030/index.html">Syba
                                            Gigabit Ethernet PCIe x1 Interface Based Card with Realtek Chipset</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Syba </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SY-PEX24030 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Ports:</div>
                                            <div class="detail__value f_ports"> 1 x 1000 Mbit/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $17.65 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00C56TN5U?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_50"
                                        href="javascript:void(0);" onclick="setid(50)"><i class="fa fa-plus"></i></a>
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
            "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@id": "https://pcbuilder.net/",
                        "name": "PC Builder"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@id": "https://pcbuilder.net/product/",
                        "name": "Product"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "item": {
                        "@id": "https://pcbuilder.net/product/wired-network-adapter/",
                        "name": "Wired Network Adapter"
                    }
                }
            ]
        }
    </script>
    <script>
        function f_interface(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("interface");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_interface")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_interface");
                        } else {
                            tr[i].classList.remove("c_interface");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_interface")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_interface");
                            } else {
                                tr[i].classList.add("c_interface");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_interface")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_interface");
                            } else {
                                tr[i].classList.remove("c_interface");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_ports(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("ports");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_ports")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_ports");
                        } else {
                            tr[i].classList.remove("c_ports");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ports")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ports");
                            } else {
                                tr[i].classList.add("c_ports");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ports")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ports");
                            } else {
                                tr[i].classList.remove("c_ports");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_color(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("color");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_color")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_color");
                        } else {
                            tr[i].classList.remove("c_color");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_color")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_color");
                            } else {
                                tr[i].classList.add("c_color");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_color")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_color");
                            } else {
                                tr[i].classList.remove("c_color");
                            }
                        }
                    }
                }
            }
        }
    </script>
@endpush
