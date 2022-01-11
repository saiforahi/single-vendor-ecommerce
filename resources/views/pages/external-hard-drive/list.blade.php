@extends('layouts.app')

@push('style')
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_storage_type {
            display: none !important;
        }

    </style>
    <style>
        .c_capacity {
            display: none !important;
        }

    </style>
    <style>
        .c_form_factor {
            display: none !important;
        }

    </style>
    <style>
        .c_rpm {
            display: none !important;
        }

    </style>
    <style>
        .c_interface {
            display: none !important;
        }

    </style>
    <style>
        .c_cache_memory {
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
        <h1><span>Select</span> Your External Hard Drive</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{route('external-hard-drive-list')}}">External Hard Drive</a>
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
                                                                ({{ \App\Models\ExternalHardDrive::where('brand', $brand->brand)->count() }})
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
                                            aria-expanded="false" aria-controls="collapse1"> Storage Type </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="HDD"> <span class="ml-10">HDD (127) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="SDD"> <span class="ml-10">SDD (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="SSD"> <span class="ml-10">SSD (21) </span></label>
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
                                            aria-expanded="false" aria-controls="collapse1"> Capacity </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1.92 TB"> <span
                                                    class="ml-10">1.92 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="10 TB"> <span
                                                    class="ml-10">10 TB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="12 TB"> <span
                                                    class="ml-10">12 TB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="128 GB"> <span
                                                    class="ml-10">128 GB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="14 TB"> <span
                                                    class="ml-10">14 TB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="16 TB"> <span
                                                    class="ml-10">16 TB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1 TB"> <span
                                                    class="ml-10">1 TB (32) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="2 TB"> <span class="ml-10">2
                                                    TB (25) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="20 TB"> <span
                                                    class="ml-10">20 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="24 TB"> <span
                                                    class="ml-10">24 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="256 GB"> <span
                                                    class="ml-10">256 GB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="28000 GB"> <span
                                                    class="ml-10">28000 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="3 TB"> <span class="ml-10">3
                                                    TB (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="320 GB"> <span
                                                    class="ml-10">320 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="4 TB"> <span class="ml-10">4
                                                    TB (21) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="480 GB"> <span
                                                    class="ml-10">480 GB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="5 TB"> <span class="ml-10">5
                                                    TB (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="500 GB"> <span
                                                    class="ml-10">500 GB (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="512 GB"> <span
                                                    class="ml-10">512 GB (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="6 TB"> <span class="ml-10">6
                                                    TB (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="8 TB"> <span class="ml-10">8
                                                    TB (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="960 GB"> <span
                                                    class="ml-10">960 GB (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading4">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion4" href="#collapse4"
                                            aria-expanded="false" aria-controls="collapse1"> Form Factor </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="2.5&quot;"> <span class="ml-10">2.5" (42)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="3.5&quot;"> <span class="ml-10">3.5" (54)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="M.2-2280"> <span class="ml-10">M.2-2280 (10)
                                                </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion5" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading5">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion5" href="#collapse5"
                                            aria-expanded="false" aria-controls="collapse1"> RPM </a> </h4>
                                </div>
                                <div id="collapse5" class="collapse " role="tabpanel" aria-labelledby="heading5">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="5400 RPM"> <span
                                                    class="ml-10">5400 RPM (40) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="5700 RPM"> <span
                                                    class="ml-10">5700 RPM (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="7200 RPM"> <span
                                                    class="ml-10">7200 RPM (22) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion6" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading6">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion6" href="#collapse6"
                                            aria-expanded="false" aria-controls="collapse1"> Interface </a> </h4>
                                </div>
                                <div id="collapse6" class="collapse " role="tabpanel" aria-labelledby="heading6">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA 6 Gb/s"> <span
                                                    class="ml-10">SATA 6 Gb/s (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB 2.0"> <span
                                                    class="ml-10">USB 2.0 (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB 3.0"> <span
                                                    class="ml-10">USB 3.0 (125) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB 3.1"> <span
                                                    class="ml-10">USB 3.1 (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB 3.2"> <span
                                                    class="ml-10">USB 3.2 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="USB Type-C"> <span
                                                    class="ml-10">USB Type-C (13) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion7" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading7">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion7" href="#collapse7"
                                            aria-expanded="false" aria-controls="collapse1"> Cache Memory </a> </h4>
                                </div>
                                <div id="collapse7" class="collapse " role="tabpanel" aria-labelledby="heading7">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="32 MB"> <span
                                                    class="ml-10">32 MB (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="64 MB"> <span
                                                    class="ml-10">64 MB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="8 MB"> <span
                                                    class="ml-10">8 MB (5) </span></label> </div>
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
                                    placeholder="Search External Hard Drive....." title="Search....">
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
                       
                            <tbody>
                                @foreach ($external_hard_drives as $external_hard_drive)
                                <tr class="items" data-href="#">
                                    <td scope="row" class="component d-sm-none">
                                        <a href="index.html">#</a>
                                    </td>
                                    <td class="box">
                                        <div class="logo-name">
                                            <div class="item-logo">
                                                <?php $images = $external_hard_drive->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $external_hard_drive->name }}"
                                                    alt="{{ $external_hard_drive->name }}">
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
                                                href="{{ route('external-hard-drive-details', ['id' => $external_hard_drive->id]) }}">{{ $external_hard_drive->name </a></div>
                                        <span class="table_span">
                                            <div class="detail">
                                                <div class="detail__name">Brand:</div>
                                                <div class="detail__value f_brand"> {{$external_hard_drive->product->brand}} </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Model:</div>
                                                <div class="detail__value f_model"> {{$external_hard_drive->product->model}} </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Stock:</div>
                                                <div class="detail__value f_stock"> {{ $external_hard_drive->product->stock }} </div>
                                            </div>
                                         </span>
                                        // <span class="table_span">

                                        //     <div class="detail">
                                        //         <div class="detail__name">Capacity:</div>
                                        //         <div class="detail__value f_capacity"> 1 TB </div>
                                        //     </div>
                                        //     <div class="detail">
                                        //         <div class="detail__name">Type:</div>
                                        //         <div class="detail__value f_storage_type"> HDD </div>
                                        //     </div>
                                        //     <div class="detail">
                                        //         <div class="detail__name">RPM:</div>
                                        //         <div class="detail__value f_rpm"> 5400 RPM </div>
                                        //     </div>
                                        // </span><span class="table_span">
                                        //     <div class="detail">
                                        //         <div class="detail__name">Interface:</div>
                                        //         <div class="detail__value f_interface"> USB 3.0 </div>
                                        //     </div>
                                        //     <div class="detail d-none">
                                        //         <div class="detail__name">Cache Memory:</div>
                                        //         <div class="detail__value f_cache_memory"> </div>
                                        //     </div>
                                        //     <div class="detail">
                                        //         <div class="detail__name">Form Factor:</div>
                                        //         <div class="detail__value f_form_factor"> 2.5" </div>
                                        //     </div>
                                        // </span>

                                    </td>
                                    <td class="price">
                                        {{ $external_hard_drive->product->price }} </td>

                                    <td><a class="btn btn-primary component-btn"
                                            href="{{ route('external-hard-drive-details', ['id' => $external_hard_drive->id]) }}" target="_blank">View
                                            Details</a></td>
                                    <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                                            href="{{ route('add-external-hard-drive-to-system', ['external_hard_drive_id' => $external_hard_drive->id]) }}"><i
                                                class="fa fa-plus"></i></a>
                                    </td>
                                </tr>
                                
                               
                          
                        @endforeach
                    </tbody>

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
                        "@id": "https://pcbuilder.net/product/external-hard-drive/",
                        "name": "External Hard Drive"
                    }
                }
            ]
        }
    </script>
    <script>
        function f_storage_type(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("storage_type");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_storage_type")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_storage_type");
                        } else {
                            tr[i].classList.remove("c_storage_type");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_storage_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_storage_type");
                            } else {
                                tr[i].classList.add("c_storage_type");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_storage_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_storage_type");
                            } else {
                                tr[i].classList.remove("c_storage_type");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_capacity(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("capacity");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity");
                        } else {
                            tr[i].classList.remove("c_capacity");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_capacity")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_capacity");
                            } else {
                                tr[i].classList.add("c_capacity");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_capacity")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_capacity");
                            } else {
                                tr[i].classList.remove("c_capacity");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_form_factor(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("form_factor");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_form_factor")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_form_factor");
                        } else {
                            tr[i].classList.remove("c_form_factor");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_form_factor")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_form_factor");
                            } else {
                                tr[i].classList.add("c_form_factor");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_form_factor")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_form_factor");
                            } else {
                                tr[i].classList.remove("c_form_factor");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_rpm(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("rpm");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_rpm")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_rpm");
                        } else {
                            tr[i].classList.remove("c_rpm");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_rpm")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_rpm");
                            } else {
                                tr[i].classList.add("c_rpm");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_rpm")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_rpm");
                            } else {
                                tr[i].classList.remove("c_rpm");
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
    <script>
        function f_cache_memory(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("cache_memory");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_cache_memory")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_cache_memory");
                        } else {
                            tr[i].classList.remove("c_cache_memory");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_cache_memory")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_cache_memory");
                            } else {
                                tr[i].classList.add("c_cache_memory");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_cache_memory")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_cache_memory");
                            } else {
                                tr[i].classList.remove("c_cache_memory");
                            }
                        }
                    }
                }
            }
        }
    </script>
@endpush
