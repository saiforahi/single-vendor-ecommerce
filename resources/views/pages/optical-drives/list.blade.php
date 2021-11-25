@extends('layouts.app')

@push('style')
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_buffer_memory {
            display: none !important;
        }

    </style>
    <style>
        .c_interface {
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
        <h1><span>Select</span> Your Optical Drive</h1>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="index.html">Optical Drive</a>
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
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ASUS"> <span class="ml-10">ASUS
                                                    (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="BUSlink"> <span
                                                    class="ml-10">BUSlink (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="HEWLETT PACKARD"> <span
                                                    class="ml-10">HEWLETT PACKARD (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="HP"> <span class="ml-10">HP (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="I/OMagic"> <span
                                                    class="ml-10">I/OMagic (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="LG"> <span class="ml-10">LG (10)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Lenovo"> <span
                                                    class="ml-10">Lenovo (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Lite-On"> <span
                                                    class="ml-10">Lite-On (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Memorex"> <span
                                                    class="ml-10">Memorex (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="PLDS CORPORATION"> <span
                                                    class="ml-10">PLDS CORPORATION (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Pioneer"> <span
                                                    class="ml-10">Pioneer (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Plextor"> <span
                                                    class="ml-10">Plextor (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Samsung"> <span
                                                    class="ml-10">Samsung (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SilverStone Technology"> <span
                                                    class="ml-10">SilverStone Technology (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Sony"> <span class="ml-10">Sony
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Supermicro"> <span
                                                    class="ml-10">Supermicro (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion2" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading2">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion2" href="#collapse2"
                                            aria-expanded="false" aria-controls="collapse1"> Buffer Memory </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_buffer_memory(this.id);"
                                                    class="option-input checkbox buffer_memory"
                                                    name="filter['buffer_memory']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_buffer_memory(this.id);"
                                                    class="option-input checkbox buffer_memory"
                                                    name="filter['buffer_memory']" value="1 MB"> <span
                                                    class="ml-10">1 MB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_buffer_memory(this.id);"
                                                    class="option-input checkbox buffer_memory"
                                                    name="filter['buffer_memory']" value="2 MB"> <span
                                                    class="ml-10">2 MB (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_buffer_memory(this.id);"
                                                    class="option-input checkbox buffer_memory"
                                                    name="filter['buffer_memory']" value="4 MB"> <span
                                                    class="ml-10">4 MB (7) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> Interface </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PATA 100"> <span
                                                    class="ml-10">PATA 100 (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA 1.5 Gb/s"> <span
                                                    class="ml-10">SATA 1.5 Gb/s (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA 3 Gb/s"> <span
                                                    class="ml-10">SATA 3 Gb/s (34) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA 6 Gb/s"> <span
                                                    class="ml-10">SATA 6 Gb/s (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA I (1.5 Gb/s)"> <span
                                                    class="ml-10">SATA I (1.5 Gb/s) (3) </span></label> </div>
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
                                    placeholder="Search Optical Drive....." title="Search....">
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
                        @foreach ($opticaldrives as $opticaldrive)
                        <tbody>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $opticaldrive->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $opticaldrive->name }}" alt="{{ $opticaldrive->name }}">
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
                                            href="../../component-details/optical-drive/asus-drw-24-b1sta-drw-24b1sta-black-bulk/index.html">Asus
                                            24x DVD-RW Serial-ATA Internal OEM Optical Drive DRW</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> DRW 24 B1STA </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA I (1.5 Gb/s) </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $19.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0033Z2BAQ?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31jYc9cXEmL._SL75_.jpg"
                                                title="LG Electronics 14x SATA Blu-ray Internal Rewriter without Software"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG WH14NS40">
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
                                            href="../../component-details/optical-drive/lg-wh14ns40/index.html">LG
                                            Electronics 14x SATA Blu-ray Internal Rewriter without Software</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> WH14NS40 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA I (1.5 Gb/s) </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 4 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $53.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B007VPGL5U?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/315RiDHzLZL._SL75_.jpg"
                                                title="LG BH14NS40 14X SATA Blu-ray Internal Rewriter with Software"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG BH14NS40">
                                            <div class="stars-rating" title="3.7 out of 5">
                                                <div class="stars-score" style="width: 74%">
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
                                            href="../../component-details/optical-drive/lg-bh14ns40/index.html">LG BH14NS40
                                            14X SATA Blu-ray Internal Rewriter with Software</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BH14NS40 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 4 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B007ILBJAY?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41NZSfUeeyL._SL75_.jpg"
                                                title="Pioneer Electronics USA Internal Blu-Ray Writer "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Pioneer BDR 209DBK">
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
                                            href="../../component-details/optical-drive/pioneer-bdr-209dbk/index.html">Pioneer
                                            Electronics USA Internal Blu-Ray Writer </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Pioneer </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BDR 209DBK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 4 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $89.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00H2GTXKS?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/416X3wRYtzL._SL75_.jpg"
                                                title="LG WH16NS40 Super 16x Multi Blue-ray Internal SATA Disc Rewriter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG WH 16NS40">
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
                                            href="../../component-details/optical-drive/lg-wh-16ns40-wh16ns40/index.html">LG
                                            WH16NS40 Super 16x Multi Blue-ray Internal SATA Disc Rewriter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> WH 16NS40 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA I (1.5 Gb/s) </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 4 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $69.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00E7B08MS?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31LRMhJAOML._SL75_.jpg"
                                                title="LG BDRW DL 16X SATA Internal M-Disc with SW CD-ROM Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG BH16NS40">
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
                                            href="../../component-details/optical-drive/lg-bh16ns40/index.html">LG BDRW DL
                                            16X SATA Internal M-Disc with SW CD-ROM Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BH16NS40 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 4 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $115 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00BQI1W9I?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31X8Q+E6WTL._SL75_.jpg"
                                                title="I/OMagic Internal Blu-ray ReWritable Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, I/OMagic IBD1">
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
                                            href="../../component-details/optical-drive/io-magic-ibd1/index.html">I/OMagic
                                            Internal Blu-ray ReWritable Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> I/OMagic </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IBD1 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $109.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001PTT8EO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41IsGAx7xeL._SL75_.jpg"
                                                title="LG BLU-RAY-Writer 16X Internal SATA M-Disk"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG BH16NS55.AUAR10B">
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
                                            href="../../component-details/optical-drive/lg-bh16ns55-auar10b/index.html">LG
                                            BLU-RAY-Writer 16X Internal SATA M-Disk</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BH16NS55.AUAR10B </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 6 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B017C4SLL6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/413bFpj-MsL._SL75_.jpg"
                                                title="Samsung SN-208DB Internal SATA based DVD-Writer "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Samsung SN 208DB">
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
                                            href="../../component-details/optical-drive/samsung-sn-208db-sbw-06d2x-u-blk-g-as/index.html">Samsung
                                            SN-208DB Internal SATA based DVD-Writer </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Samsung </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SN 208DB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> External </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 1 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $109.79 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00AW0AHUG?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31BBXEWtXhL._SL75_.jpg"
                                                title="Asus Storage DVD-E818AAT DVD-ROM 18X SATA Internal Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS E818AAT">
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
                                            href="../../component-details/optical-drive/asus-e818aat-4328470908/index.html">Asus
                                            Storage DVD-E818AAT DVD-ROM 18X SATA Internal Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> E818AAT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00J7ZXJJS?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41pBSmdy4oL._SL75_.jpg"
                                                title="HP QS208AA Internal SATA based DVD-RW/DVD-RAM Drive "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, HP QS208AA">
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
                                            href="../../component-details/optical-drive/hp-qs208aa/index.html">HP QS208AA
                                            Internal SATA based DVD-RW/DVD-RAM Drive </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> HP </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> QS208AA </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $110 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005ASKZP2?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31liZUVKCwL._SL75_.jpg"
                                                title="Plextor PX-891SAF 24X SATA DVD/RW Dual Layer Internal SATA Burner Drive Writer"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Plextor PX 891SAF">
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
                                            href="../../component-details/optical-drive/plextor-px-891saf/index.html">Plextor
                                            PX-891SAF 24X SATA DVD/RW Dual Layer Internal SATA Burner Drive Writer</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Plextor </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PX 891SAF </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $24.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00VPK9S7K?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31YcMBkhumL._SL75_.jpg"
                                                title="LG Electronics 24X SATA Super-Multi DVD Internal Rewriter with M-Disc Support "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG GH24NS95">
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
                                            href="../../component-details/optical-drive/lg-gh24ns95-gh24ns95b/index.html">LG
                                            Electronics 24X SATA Super-Multi DVD Internal Rewriter with M-Disc Support </a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GH24NS95 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $26.99 (Used) </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B009F1DYF8?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41hanRbFbaL._SL75_.jpg"
                                                title="Sony AD-7280S-0B 24x SATA Internal DVD+/-RW Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Sony AD 7280S">
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
                                            href="../../component-details/optical-drive/sony-ad-7280s-ad-7280s-0b/index.html">Sony
                                            AD-7280S-0B 24x SATA Internal DVD+/-RW Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Sony </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> AD 7280S </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 1 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $86.77 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0057FRTPW?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/21o4S7gIt2L._SL75_.jpg"
                                                title="Samsung Electronics SH 224GB Internal SATA DVDRW Optical Drives "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Samsung SH 224GB">
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
                                            href="../../component-details/optical-drive/samsung-sh-224gb-sh-224gb-bsbe/index.html">Samsung
                                            Electronics SH 224GB Internal SATA DVDRW Optical Drives </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Samsung </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SH 224GB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $29.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01D04Y224?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41PbDWk0e8L._SL75_.jpg"
                                                title="Samsung Electronics SN-208FB Internal Slim Optical Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Samsung SN-208FB">
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
                                            href="../../component-details/optical-drive/samsung-sn-208fb-sn-208fb-bebe/index.html">Samsung
                                            Electronics SN-208FB Internal Slim Optical Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Samsung </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SN-208FB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00GXNPJI6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/21Q+kEE7oGL._SL75_.jpg"
                                                title="Lite-On IHAS324 24X SATA Internal DVD+/-RW Drive with Software"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lite-On IHAS324">
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
                                            href="../../component-details/optical-drive/lite-on-ihas324-ihas324-07/index.html">Lite-On
                                            IHAS324 24X SATA Internal DVD+/-RW Drive with Software</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lite-On </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IHAS324 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00CAYGEUO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/21jyjK0M8QL._SL75_.jpg"
                                                title="Lite-On Int 12X BLU Ray SATA Internal ROM DVDrw Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lite-On IHES112">
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
                                            href="../../component-details/optical-drive/lite-on-ihes112-ihes112-29/index.html">Lite-On
                                            Int 12X BLU Ray SATA Internal ROM DVDrw Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lite-On </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IHES112 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $155 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005039I3M?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31TZ6dEsh7L._SL75_.jpg"
                                                title="LG Electronics GH24NS72B 24x SATA Internal DVDRW Drives"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG GH24NS72B">
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
                                            href="../../component-details/optical-drive/lg-gh24ns72b/index.html">LG
                                            Electronics GH24NS72B 24x SATA Internal DVDRW Drives</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GH24NS72B </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $18.94 (Used) </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B008PJYCSO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41ICvZngHJL._SL75_.jpg"
                                                title="LG GH24NSB0B 24X SATA Internal DVD Rewriter "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG GH24NSB0B">
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
                                            href="../../component-details/optical-drive/lg-gh24nsb0b/index.html">LG
                                            GH24NSB0B 24X SATA Internal DVD Rewriter </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GH24NSB0B </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $48.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00EUAFAF6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/318EtFXnBIL._SL75_.jpg"
                                                title="Sony Optiarc DDU1681S0B 18X SATA Internal DVD-ROM Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Sony Optiarc">
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
                                            href="../../component-details/optical-drive/sony-optiarc-ddu1681s0b/index.html">Sony
                                            Optiarc DDU1681S0B 18X SATA Internal DVD-ROM Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Sony </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Optiarc </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $59 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0029RUBNS?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51oeJpdIsNL._SL75_.jpg"
                                                title="HEWLETT PACKARD HP 447326-B21 - 16X Serial ATA Internal DVD-ROM Drive "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, HEWLETT PACKARD 447326-B21">
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
                                            href="../../component-details/optical-drive/hewlett-packard-447326-b21/index.html">HEWLETT
                                            PACKARD HP 447326-B21 - 16X Serial ATA Internal DVD-ROM Drive </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> HEWLETT PACKARD </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> 447326-B21 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $54 (Used) </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000Z1K4FA?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41UFFs5UNgL._SL75_.jpg"
                                                title="Memorex 98240 24x SATA based Internal DVD Burner"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Memorex 98240">
                                            <div class="stars-rating" title="3.7 out of 5">
                                                <div class="stars-score" style="width: 74%">
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
                                            href="../../component-details/optical-drive/memorex-98240/index.html">Memorex
                                            98240 24x SATA based Internal DVD Burner</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Memorex </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> 98240 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $19.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002G1WYLE?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31l1xlryOvL._SL75_.jpg"
                                                title="I/OMagic IDVD24S Internal 24x DVD+R/RW Optical Drive with SATA Interface"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, I/OMagic IDVD24S">
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
                                            href="../../component-details/optical-drive/io-magic-idvd24s/index.html">I/OMagic
                                            IDVD24S Internal 24x DVD+R/RW Optical Drive with SATA Interface</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> I/OMagic </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IDVD24S </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $30.06 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B003SVWOUC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/21HLWcTnl8L._SL75_.jpg"
                                                title="Supermicro DVM-TEAC-824B 8X Slim IDE External DVD-ROM Drive "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Supermicro DVM-TEAC-824B">
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
                                            href="../../component-details/optical-drive/supermicro-dvm-teac-824b/index.html">Supermicro
                                            DVM-TEAC-824B 8X Slim IDE External DVD-ROM Drive </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Supermicro </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> DVM-TEAC-824B </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> External </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PATA 100 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $99.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005DM75XK?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41aFh2Gz+3L._SL75_.jpg"
                                                title="Lenovo Desktop Super Multi-murner"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lenovo 0A65618">
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
                                            href="../../component-details/optical-drive/lenovo-0a65618/index.html">Lenovo
                                            Desktop Super Multi-murner</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lenovo </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> 0A65618 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $93.35 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005J4XKHM?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31l+Lw6Q35L._SL75_.jpg"
                                                title="LG Electronics Internal DVD Writer Drive GUB0N"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG GUB0N">
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
                                            href="../../component-details/optical-drive/lg-gub0n/index.html">LG Electronics
                                            Internal DVD Writer Drive GUB0N</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GUB0N </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39.69 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ODDFTU6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41vfXvmeVqL._SL75_.jpg"
                                                title="Samsung DVDRW 22X SATA Black Without Software Bare"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SAMSUNG SH-222AB">
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
                                            href="../../component-details/optical-drive/samsung-sh-222ab-sh-222ab-bebe/index.html">Samsung
                                            DVDRW 22X SATA Black Without Software Bare</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SAMSUNG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SH-222AB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $149.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004W3J7F0?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/410ao9eBIdL._SL75_.jpg"
                                                title="Liteon iHAS324 24X DVD-RW SATA Optical Disk Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lite-On IHAS324-98">
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
                                            href="../../component-details/optical-drive/lite-on-ihas324-98/index.html">Liteon
                                            iHAS324 24X DVD-RW SATA Optical Disk Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lite-On </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IHAS324-98 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $49.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002QGDWLK?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41mBSwSSm9L._SL75_.jpg"
                                                title="SilverStone Technology 9.5/12.7mm Slim Blu-Ray/DVD/CD Read and Write Tray-Loading Optical Disk"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SilverStone Technology TOB04">
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
                                            href="../../component-details/optical-drive/silverstone-technology-tob04-sst-tob04/index.html">SilverStone
                                            Technology 9.5/12.7mm Slim Blu-Ray/DVD/CD Read and Write Tray-Loading Optical
                                            Disk</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SilverStone Technology </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TOB04 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 1.5 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 4 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $129.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07GN5B2C6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41+FU6T5OGL._SL75_.jpg"
                                                title="Pioneer BDR-212EBK Internal 16x BD Writer"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, PIONEER BDR-212EBK">
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
                                            href="../../component-details/optical-drive/pioneer-bdr-212ebk/index.html">Pioneer
                                            BDR-212EBK Internal 16x BD Writer</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> PIONEER </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BDR-212EBK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 6 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $85.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B084DTFYMV?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41a4Dh7z+nL._SL75_.jpg"
                                                title="Asus Black 12X BD-ROM 16X DVD-ROM 48X CD-ROM SATA Internal Blu-Ray Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS BC-12B1ST">
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
                                            href="../../component-details/optical-drive/asus-bc-12b1st/index.html">Asus
                                            Black 12X BD-ROM 16X DVD-ROM 48X CD-ROM SATA Internal Blu-Ray Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BC-12B1ST </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 6 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $79.99 (Used) </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004SUO068?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41N-MhWtwDL._SL75_.jpg"
                                                title="LG Electronics GTB0N 8X SATA Slim Super-Multi Internal Drive for Notebooks with M-DISC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LG GTB0N">
                                            <div class="stars-rating" title="3.7 out of 5">
                                                <div class="stars-score" style="width: 74%">
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
                                            href="../../component-details/optical-drive/lg-gtb0n/index.html">LG Electronics
                                            GTB0N 8X SATA Slim Super-Multi Internal Drive for Notebooks with M-DISC</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GTB0N </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $34.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ODDFROE?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31P6TIdE4OL._SL75_.jpg"
                                                title="Samsung SATA 1.5 Gb-s Optical Drive, Black SH-224DB/BEBE"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Samsung SH-224DB/BEBE">
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
                                            href="../../component-details/optical-drive/samsung-sh-224db-bebe/index.html">Samsung
                                            SATA 1.5 Gb-s Optical Drive, Black SH-224DB/BEBE</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Samsung </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SH-224DB/BEBE </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $19.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00CE58ZYC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31U5VPJJRHL._SL75_.jpg"
                                                title="ASUS BW-16D1HT - ultra-fast 16X Blu-ray burner with M-DISC support"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS BW-16D1HT">
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
                                            href="../../component-details/optical-drive/asus-bw-16d1ht/index.html">ASUS
                                            BW-16D1HT - ultra-fast 16X Blu-ray burner with M-DISC support</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BW-16D1HT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $78.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00DWFPDJI?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31mKfk9zdiL._SL75_.jpg"
                                                title="Asus Internal Blu-Ray Combo (12x BD-R (DL), 16x DVD+/-R, BDXL"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS BC-12D2HT">
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
                                            href="../../component-details/optical-drive/asus-bc-12d2ht-109120/index.html">Asus
                                            Internal Blu-Ray Combo (12x BD-R (DL), 16x DVD+/-R, BDXL</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BC-12D2HT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 6 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $97.09 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00F0SQL6O?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41-LpdTLTlS._SL75_.jpg"
                                                title="Asus DRW-24D5MT Internal DVD Super Multi DL Black Optical Disc Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS DRW-24D5MT">
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
                                            href="../../component-details/optical-drive/asus-drw-24d5mt/index.html">Asus
                                            DRW-24D5MT Internal DVD Super Multi DL Black Optical Disc Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> DRW-24D5MT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $32.38 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B019F6FV5S?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31PUKguRFGL._SL75_.jpg"
                                                title="ASUS DRW-24F1ST - DVD SATA SUPERMULTI Burner - SERIAL ATA "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS DRW-24F1ST/BLK/B/AS">
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
                                            href="../../component-details/optical-drive/asus-drw-24f1st-blk-b-as/index.html">ASUS
                                            DRW-24F1ST - DVD SATA SUPERMULTI Burner - SERIAL ATA </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> DRW-24F1ST/BLK/B/AS </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $18.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00D2CO8WO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31QK+Rh0kkL._SL75_.jpg"
                                                title="Pioneer Electronics BDR-212DBK 16x Internal BD/DVD/CD Writer Supports Blu-Ray & M-Disc Format, Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, PIONEER BDR-212DBK">
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
                                            href="../../component-details/optical-drive/pioneer-bdr-212dbk/index.html">Pioneer
                                            Electronics BDR-212DBK 16x Internal BD/DVD/CD Writer Supports Blu-Ray & M-Disc
                                            Format, Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> PIONEER </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BDR-212DBK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 6 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 4 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $69.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B081R5CS4L?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31ciKoszYOL._SL75_.jpg"
                                                title="Lite-On 24X SATA Internal DVD+/-RW Drive Optical Drive "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lite-On IHAS124-14">
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
                                            href="../../component-details/optical-drive/lite-on-ihas124-14/index.html">Lite-On
                                            24X SATA Internal DVD+/-RW Drive Optical Drive </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lite-On </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IHAS124-14 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $16.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ERJXTE4?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41dXzlXEHSL._SL75_.jpg"
                                                title="Pioneer Electronics Internal Blu-Ray Writer"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, PIONEER BDR-2209">
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
                                            href="../../component-details/optical-drive/pioneer-bdr-2209-main-85177/index.html">Pioneer
                                            Electronics Internal Blu-Ray Writer</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> PIONEER </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BDR-2209 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $119 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00GD792US?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51VeqtZCmVL._SL75_.jpg"
                                                title="Lite-On iHAP422 22x DVD±RW IDE/PATA Burner with OEM Bulk Drive LightScribe"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, PLDS CORPORATION IHAP422-98">
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
                                            href="../../component-details/optical-drive/plds-corporation-ihap422-98/index.html">Lite-On
                                            iHAP422 22x DVD±RW IDE/PATA Burner with OEM Bulk Drive LightScribe</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> PLDS CORPORATION </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IHAP422-98 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PATA 100 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $72.36 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002FJJGUO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/416zvNdW49L._SL75_.jpg"
                                                title="Buslink INT4X DVD+R DL 16X4X16X-DVD+RW CD-RW "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, BUSlink DBW-1647">
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
                                            href="../../component-details/optical-drive/buslink-dbw-1647/index.html">Buslink
                                            INT4X DVD+R DL 16X4X16X-DVD+RW CD-RW </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> BUSlink </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> DBW-1647 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PATA 100 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000AUC5YO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31uMR717RAL._SL75_.jpg"
                                                title="ASUS DRW-22B3S Power Saving X Multi DVD±R/RW Drive "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS ASUS DRW-22B3S/BLK/G/AS">
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
                                            href="../../component-details/optical-drive/asus-asus-drw-22b3s-blk-g-as/index.html">ASUS
                                            DRW-22B3S Power Saving X Multi DVD±R/RW Drive </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ASUS DRW-22B3S/BLK/G/AS </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PATA 100 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $49.98 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004SUEKSQ?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41qPvN23JbL._SL75_.jpg"
                                                title="Sony Optiarc AD-7200S-0B 20X Dual Layer DVD+/-RW SATA Drive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Sony AD7200S-0B">
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
                                            href="../../component-details/optical-drive/sony-ad7200s-0b/index.html">Sony
                                            Optiarc AD-7200S-0B 20X Dual Layer DVD+/-RW SATA Drive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Sony </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> AD7200S-0B </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $65.51 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001TOD5FI?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/21CbMfx1EIL._SL75_.jpg"
                                                title="Hewlett Packard DVDrom 16X Sata Drive Blk"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Hewlett Packard AR629AA">
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
                                            href="../../component-details/optical-drive/hewlett-packard-ar629aa/index.html">Hewlett
                                            Packard DVDrom 16X Sata Drive Blk</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Hewlett Packard </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> AR629AA </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $43 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00261FP9C?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51OCKrjTBkL._SL75_.jpg"
                                                title="Lite-On IHAP122-04 IDE DVD+/-RW Drive - Bulk Packaging"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lite-On IHAP122-04 BLACK/BULK">
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
                                            href="../../component-details/optical-drive/lite-on-ihap122-04-black-bulk/index.html">Lite-On
                                            IHAP122-04 IDE DVD+/-RW Drive - Bulk Packaging</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lite-On </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IHAP122-04 BLACK/BULK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PATA 100 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> 2 MB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001OBSM5O?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41iTGLf7xxL._SL75_.jpg"
                                                title="HP 1270I 24X SATA Multiformat DVD Writer"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lite-On 1270i">
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
                                            href="../../component-details/optical-drive/lite-on-1270i-hp1270i/index.html">HP
                                            1270I 24X SATA Multiformat DVD Writer</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lite-On </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> 1270i </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_type"> Internal </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> SATA 3 Gb/s </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Buffer Memory:</div>
                                            <div class="detail__value f_buffer_memory"> N/A </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $49.98 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002KT1YEU?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_48"
                                        href="javascript:void(0);" onclick="setid(48)"><i class="fa fa-plus"></i></a>
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
    <script>
        function f_buffer_memory(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("buffer_memory");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_buffer_memory")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_buffer_memory");
                        } else {
                            tr[i].classList.remove("c_buffer_memory");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_buffer_memory")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_buffer_memory");
                            } else {
                                tr[i].classList.add("c_buffer_memory");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_buffer_memory")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_buffer_memory");
                            } else {
                                tr[i].classList.remove("c_buffer_memory");
                            }
                        }
                    }
                }
            }
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
@endpush
