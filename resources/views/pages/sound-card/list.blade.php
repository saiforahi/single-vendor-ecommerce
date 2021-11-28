@extends('layouts.app')

@push('style')
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_channel_type {
            display: none !important;
        }

    </style>
    <style>
        .c_snr {
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
        <h1><span>Select</span> Your Sound Card</h1>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="sound-card-list">Sound Card</a>
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
                                                    (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Creative"> <span
                                                    class="ml-10">Creative (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Creative Labs"> <span
                                                    class="ml-10">Creative Labs (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Diamond Multimedia"> <span
                                                    class="ml-10">Diamond Multimedia (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="EVGA"> <span class="ml-10">EVGA
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="HT OMEGA"> <span class="ml-10">HT
                                                    OMEGA (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SIIG"> <span class="ml-10">SIIG
                                                    (3) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion2" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading2">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion2" href="#collapse2"
                                            aria-expanded="false" aria-controls="collapse1"> Channel Type </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_channel_type(this.id);"
                                                    class="option-input checkbox channel_type" name="filter['channel_type']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_channel_type(this.id);"
                                                    class="option-input checkbox channel_type" name="filter['channel_type']"
                                                    value="2.0"> <span class="ml-10">2.0 (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_channel_type(this.id);"
                                                    class="option-input checkbox channel_type" name="filter['channel_type']"
                                                    value="5.1"> <span class="ml-10">5.1 (12) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_channel_type(this.id);"
                                                    class="option-input checkbox channel_type" name="filter['channel_type']"
                                                    value="7.1"> <span class="ml-10">7.1 (9) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> SNR </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value=" 100 dB"> <span class="ml-10"> 100
                                                    dB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value=" 106 dB"> <span class="ml-10"> 106
                                                    dB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value=" 116 dB"> <span class="ml-10"> 116
                                                    dB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value=" 120 dB"> <span class="ml-10"> 120
                                                    dB (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value=" 124 dB"> <span class="ml-10"> 124
                                                    dB (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value=" 127 dB"> <span class="ml-10"> 127
                                                    dB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value="105 dB"> <span class="ml-10">105 dB
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value="110 dB"> <span class="ml-10">110 dB
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value="122 dB"> <span class="ml-10">122 dB
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value="123 dB"> <span class="ml-10">123
                                                    dB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value="129 dB"> <span class="ml-10">129
                                                    dB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_snr(this.id);" class="option-input checkbox snr"
                                                    name="filter['snr']" value="90 dB"> <span class="ml-10">90 dB
                                                    (2) </span></label> </div>
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
                                                    class="ml-10">Black (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray"> <span class="ml-10">Gray
                                                    (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red"> <span class="ml-10">Red
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White"> <span
                                                    class="ml-10">White (3) </span></label> </div>
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
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Sound Card....."
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
                        @foreach ($sound_cards as $sound_card )
                        <tbody>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $sound_card->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $sound_card->name }}" alt="{{ $sound_card->name }}">
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
                                            href="../../component-details/sound-card/creative-sb1780/index.html">Creative
                                            Sound Blaster AE-9 PCIe x1 7.1 Channel High Performance Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SB1780 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 129 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $390.55 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07M8SRBPH?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41flY9Y59EL._SL75_.jpg"
                                                title="Creative Sound Blaster Audigy PCIe RX 7.1 Sound Card with High Performance Headphone AMP"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Sound Blaster Audigy">
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
                                            href="../../component-details/sound-card/creative-sound-blaster-audigy-70sb155000001/index.html">Creative
                                            Sound Blaster Audigy PCIe RX 7.1 Sound Card with High Performance Headphone
                                            AMP</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Sound Blaster Audigy </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 106 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $72.22 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00EO6X7PG?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41ye4g6tnpL._SL75_.jpg"
                                                title="Creative Sound Blaster ZxR PCIe Audiophile Grade Gaming Sound Card with High Performance Headphone AMP and Desktop Audio Control Module"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Sound Blaster ZxR">
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
                                            href="../../component-details/sound-card/creative-sound-blaster-zxr-70sb151000000/index.html">Creative
                                            Sound Blaster ZxR PCIe Audiophile Grade Gaming Sound Card with High Performance
                                            Headphone AMP and Desktop Audio Control Module</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Sound Blaster ZxR </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 124 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $568.88 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00AQ5PK6I?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41ur7GglhKL._SL75_.jpg"
                                                title="ASUS XONAR SE 5.1 Channel Hi-Res PCIe Gaming Sound Card with Windows 10 Compatibility"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS  Xonar SE">
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
                                            href="../../component-details/sound-card/asus-xonar-se/index.html">ASUS XONAR SE
                                            5.1 Channel Hi-Res PCIe Gaming Sound Card with Windows 10 Compatibility</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Xonar SE </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 120 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>


                                </td>
                                <td class="price">
                                    $38($2.79/oz) </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07HCX1NY9?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51FUCINcQBL._SL75_.jpg"
                                                title="Creative Sound Blaster Z PCIe Gaming Sound Card with High Performance Headphone Amp and Beam Forming Microphone"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Sound Blaster Z">
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
                                            href="../../component-details/sound-card/creative-sound-blaster-z-70sb150000000/index.html">Creative
                                            Sound Blaster Z PCIe Gaming Sound Card with High Performance Headphone Amp and
                                            Beam Forming Microphone</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Sound Blaster Z </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 116 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Red </div>
                                        </div>
                                    </span>


                                </td>
                                <td class="price">
                                    $119.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B009ISU33E?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41EsEeFWdPL._SL75_.jpg"
                                                title="ASUS Strix SOAR PCI Express 7.1 Channel Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS  STRIX SOAR">
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
                                            href="../../component-details/sound-card/asus-strix-soar/index.html">ASUS Strix
                                            SOAR PCI Express 7.1 Channel Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> STRIX SOAR </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 116 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $158 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B019H3BI4W?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51SZiucySxL._SL75_.jpg"
                                                title="Creative Sound Blaster Audigy FX PCIe x1 5.1 Sound Card with High Performance Headphone AMP"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Sound Blaster Audigy Fx">

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
                                            href="../../component-details/sound-card/creative-sound-blaster-audigy-fx-30sb157000001/index.html">Creative
                                            Sound Blaster Audigy FX PCIe x1 5.1 Sound Card with High Performance Headphone
                                            AMP</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Sound Blaster Audigy Fx </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 106 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $44.48 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00IJ44K32?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41cRCTDLZaL._SL75_.jpg"
                                                title="ASUS Essence STX II PCIe x1 2.0 Channel Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS Essence STX II">
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
                                            href="../../component-details/sound-card/asus-essence-stx-ii/index.html">ASUS
                                            Essence STX II PCIe x1 2.0 Channel Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Essence STX II </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 124 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $136.85 (Used) </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ONSBF4K?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/311u6ogL05L._SL75_.jpg"
                                                title="Creative Sound Blaster AE-7 Hi-Res Internal PCIe Sound Card with Discrete Custom Bi-amp, Discrete 5.1/Virtual 7.1, Dolby, and DTS Encoding"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Sound Blaster AE-7">
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
                                            href="../../component-details/sound-card/creative-sound-blaster-ae-7-70sb180000000/index.html">Creative
                                            Sound Blaster AE-7 Hi-Res Internal PCIe Sound Card with Discrete Custom Bi-amp,
                                            Discrete 5.1/Virtual 7.1, Dolby, and DTS Encoding</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Sound Blaster AE-7 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 127 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $222.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07T9YYVV6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41BvNtsCsML._SL75_.jpg"
                                                title="Creative Sound Blaster Audigy FX PCIe 5.1 Sound Card with High Performance Headphone AMP"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Sound Blaster Audigy FX">
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
                                            href="../../component-details/sound-card/creative-sound-blaster-audigy-fx-sb1570/index.html">Creative
                                            Sound Blaster Audigy FX PCIe 5.1 Sound Card with High Performance Headphone
                                            AMP</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Sound Blaster Audigy FX </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 106 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $44.94 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00EO6X4XG?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41MTsrjoqAL._SL75_.jpg"
                                                title="EVGA Nu 712-P1-AN01-KR PCIe Audio Card with RGB LED & Designed with Audio Note"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, EVGA NU">
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
                                            href="../../component-details/sound-card/evga-nu-712-p1-an01-kr/index.html">EVGA
                                            Nu 712-P1-AN01-KR PCIe Audio Card with RGB LED & Designed with Audio Note</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> EVGA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> NU </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 123 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07MSQJ3GY?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41WxHatNK9L._SL75_.jpg"
                                                title="Asus Xonar AE PCIe x1 7.1 Channel Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS  Xonar AE">
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
                                            href="../../component-details/sound-card/asus-xonar-ae-90ya00p0-m0ua00/index.html">Asus
                                            Xonar AE PCIe x1 7.1 Channel Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Xonar AE </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 110 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $79.59($5.53/oz) </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B077DGQFTF?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41NZrzZTTHL._SL75_.jpg"
                                                title="ASUS Strix RAID DLX PCIe x1 5.1 Channel Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS  STRIX RAID DLX">
                                            <div class="stars-rating" title="3.5 out of 5">
                                                <div class="stars-score" style="width: 70%">
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
                                            href="../../component-details/sound-card/asus-strix-raid-dlx/index.html">ASUS
                                            Strix RAID DLX PCIe x1 5.1 Channel Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> STRIX RAID DLX </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 124 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $219.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B019H3BI3I?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/312mHlnT+rL._SL75_.jpg"
                                                title="HT OMEGA CLARO II PCI Express 7.1 Channel Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, HT OMEGA  CLARO II">
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
                                            href="../../component-details/sound-card/ht-omega-claro-ii-clt/index.html">HT
                                            OMEGA CLARO II PCI Express 7.1 Channel Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> HT OMEGA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CLARO II </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 120 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $184.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B006U9OML8?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41WzDAgeyqL._SL75_.jpg"
                                                title="SIIG LP-000022 Soundwave 5.1 PCIe based 90dB Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SIIG LP-000022">
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
                                            href="../../component-details/sound-card/siig-lp-000022-lp-000022-s2/index.html">SIIG
                                            LP-000022 Soundwave 5.1 PCIe based 90dB Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SIIG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LP-000022 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 90 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0036VNVWE?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/510yHFsajAL._SL75_.jpg"
                                                title="Sound Blaster Audigy SE Varpak PCIe based 7.1 Channel Type Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Labs  Audigy SE">
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
                                            href="../../component-details/sound-card/creative-labs-audigy-se-30sb057000000/index.html">Sound
                                            Blaster Audigy SE Varpak PCIe based 7.1 Channel Type Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative Labs </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Audigy SE </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 100 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000CF0ZXK?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41XqM96SkJL._SL75_.jpg"
                                                title="SIIG DP Soundwave PCIe based 5.1 Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SIIG IC 510111">
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
                                            href="../../component-details/sound-card/siig-ic-510111-ic-510111-s2/index.html">SIIG
                                            DP Soundwave PCIe based 5.1 Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SIIG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IC 510111 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 90 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005ZLTEQK?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31mPzln-iwL._SL75_.jpg"
                                                title="Creative Sound BlasterX AE-5 Pure Edition PCIe Gaming Sound Card and DAC with 4 RGB LED Strips"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Sound BlasterX AE-5">
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
                                            href="../../component-details/sound-card/creative-sound-blasterx-ae-5-70sb174000001/index.html">Creative
                                            Sound BlasterX AE-5 Pure Edition PCIe Gaming Sound Card and DAC with 4 RGB LED
                                            Strips</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Sound BlasterX AE-5 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 122 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
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
                                        href="https://amazon.com/dp/B077TWLQM5?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41Jegc-5paL._SL75_.jpg"
                                                title="ASUS Xonar DGX PCI Express 5.1 GX2.5 Audio Engine Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASUS Xonar DGX">
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
                                            href="../../component-details/sound-card/asus-xonar-dgx-90-yaa0q1-0uan0bz/index.html">ASUS
                                            Xonar DGX PCI Express 5.1 GX2.5 Audio Engine Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASUS </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Xonar DGX </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 105 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $28.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B007TMZ1BK?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31XaUQtL-WL._SL75_.jpg"
                                                title="HT CLHXT OMEGA Claro Halo XT PCI Express 7.1 Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, HT OMEGA CLHXT">
                                            <div class="stars-rating" title="3.5 out of 5">
                                                <div class="stars-score" style="width: 70%">
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
                                            href="../../component-details/sound-card/ht-omega-clhxt/index.html">HT CLHXT
                                            OMEGA Claro Halo XT PCI Express 7.1 Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> HT OMEGA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CLHXT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 120 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
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
                                        href="https://amazon.com/dp/B005OU6HOO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/412+CsoCcfL._SL75_.jpg"
                                                title="HT OMEGA eCLARO 7.1 Channel PCI Express Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, HT OMEGA OMEGA">
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
                                            href="../../component-details/sound-card/ht-omega-omega-ecl/index.html">HT OMEGA
                                            eCLARO 7.1 Channel PCI Express Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> HT OMEGA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> OMEGA </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 7.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 120 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $184.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005OTGFJC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41vPwbzBSOL._SL75_.jpg"
                                                title="SIIG IC 510211 PCIe x1 5.1 Channel Sound Card "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SIIG IC 510211">
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
                                            href="../../component-details/sound-card/siig-ic-510211-ic-510211-s1/index.html">SIIG
                                            IC 510211 PCIe x1 5.1 Channel Sound Card </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SIIG </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IC 510211 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 106 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00O19Z6XM?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41g+DqkeH6L._SL75_.jpg"
                                                title="HT OMEGA Claro Halo PCI Express 5.1 Sound Card"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, HT OMEGA OMEGA Claro">
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
                                            href="../../component-details/sound-card/ht-omega-omega-claro-clh/index.html">HT
                                            OMEGA Claro Halo PCI Express 5.1 Sound Card</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> HT OMEGA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> OMEGA Claro </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 120 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $199.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005OQ0XIO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51A1r+5yl3L._SL75_.jpg"
                                                title="Diamond XS51 XtremeSound 5.1 PCI 16 bit Sound Card for Desktop PC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Diamond Multimedia XtremeSound XS51">
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
                                            href="../../component-details/sound-card/diamond-multimedia-xtremesound-xs51-xs51/index.html">Diamond
                                            XS51 XtremeSound 5.1 PCI 16 bit Sound Card for Desktop PC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Diamond Multimedia </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> XtremeSound XS51 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Channel Type:</div>
                                            <div class="detail__value f_channel_type"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">SNR:</div>
                                            <div class="detail__value f_snr"> 120 dB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Gray </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000FJR1EY?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_24"
                                        href="javascript:void(0);" onclick="setid(24)"><i class="fa fa-plus"></i></a>
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
             "@id": "https://pcbuilder.net/product/sound-card/",
             "name": "Sound Card"
           }
          }
         ]
        }
        </script>
    <script>
        function f_channel_type(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("channel_type");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_channel_type")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_channel_type");
                        } else {
                            tr[i].classList.remove("c_channel_type");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_channel_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_channel_type");
                            } else {
                                tr[i].classList.add("c_channel_type");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_channel_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_channel_type");
                            } else {
                                tr[i].classList.remove("c_channel_type");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_snr(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("snr");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_snr")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_snr");
                        } else {
                            tr[i].classList.remove("c_snr");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_snr")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_snr");
                            } else {
                                tr[i].classList.add("c_snr");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_snr")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_snr");
                            } else {
                                tr[i].classList.remove("c_snr");
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
