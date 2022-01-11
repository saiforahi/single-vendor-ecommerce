@extends('layouts.app')

@push('style')
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_capacity_w {
            display: none !important;
        }

    </style>
    <style>
        .c_capacity_v {
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
        <h1><span>Select</span> Your UPS</h1>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="ups-list">UPS</a>
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
                                A                    <div class="checkbox"> <label> <input id="{{ $loop->index + 1 }}"
                                                                type="checkbox" onclick="f_brand({{ $loop->index + 1 }});"
                                                                class="option-input checkbox brand" name="filter['brand']"
                                                                value="{{ $brand->brand }}"> <span
                                                                class="ml-10">{{ $brand->brand }}
                                                                ({{ \App\Models\Ups::where('brand', $brand->brand)->count() }})
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
                                            aria-expanded="false" aria-controls="collapse1"> Capacity (W) </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1000 W"> <span class="ml-10">1000 W (7) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="10000 W"> <span class="ml-10">10000 W (4)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1050 W"> <span class="ml-10">1050 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1125 W"> <span class="ml-10">1125 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1200 W"> <span class="ml-10">1200 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1300 W"> <span class="ml-10">1300 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1320 W"> <span class="ml-10">1320 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1350 W"> <span class="ml-10">1350 W (10) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1425 W"> <span class="ml-10">1425 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1440 W"> <span class="ml-10">1440 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1540 W"> <span class="ml-10">1540 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1600 W"> <span class="ml-10">1600 W (9) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1650 W"> <span class="ml-10">1650 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1750 W"> <span class="ml-10">1750 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="180 W"> <span class="ml-10">180 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1800 W"> <span class="ml-10">1800 W (6) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="185 W"> <span class="ml-10">185 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1900 W"> <span class="ml-10">1900 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1920 W"> <span class="ml-10">1920 W (6) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="1980 W"> <span class="ml-10">1980 W (14)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="200 W"> <span class="ml-10">200 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="2100 W"> <span class="ml-10">2100 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="225 W"> <span class="ml-10">225 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="2250 W"> <span class="ml-10">2250 W (6) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="240 W"> <span class="ml-10">240 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="2400 W"> <span class="ml-10">2400 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="2500 W"> <span class="ml-10">2500 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="255 W"> <span class="ml-10">255 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="260 W"> <span class="ml-10">260 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="2700 W"> <span class="ml-10">2700 W (25)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="280 W"> <span class="ml-10">280 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="2850 W"> <span class="ml-10">2850 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="2880 W"> <span class="ml-10">2880 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="300 W"> <span class="ml-10">300 W (18) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="325 W"> <span class="ml-10">325 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="330 W"> <span class="ml-10">330 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="340 W"> <span class="ml-10">340 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="350 W"> <span class="ml-10">350 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="3500 W"> <span class="ml-10">3500 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="360 W"> <span class="ml-10">360 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="375 W"> <span class="ml-10">375 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="3750 W"> <span class="ml-10">3750 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="43" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="3800 W"> <span class="ml-10">3800 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="44" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="390 W"> <span class="ml-10">390 W (6) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="45" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="400 W"> <span class="ml-10">400 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="46" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="4000 W"> <span class="ml-10">4000 W (4) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="47" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="405 W"> <span class="ml-10">405 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="48" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="420 W"> <span class="ml-10">420 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="49" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="4200 W"> <span class="ml-10">4200 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="50" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="425 W"> <span class="ml-10">425 W (4) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="51" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="4250 W"> <span class="ml-10">4250 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="52" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="450 W"> <span class="ml-10">450 W (18) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="53" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="4500 W"> <span class="ml-10">4500 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="54" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="475 W"> <span class="ml-10">475 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="55" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="480 W"> <span class="ml-10">480 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="56" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="500 W"> <span class="ml-10">500 W (12) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="57" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="510 W"> <span class="ml-10">510 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="58" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="525 W"> <span class="ml-10">525 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="59" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="5400 W"> <span class="ml-10">5400 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="60" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="5600 W"> <span class="ml-10">5600 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="61" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="600 W"> <span class="ml-10">600 W (16) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="62" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="6000 W"> <span class="ml-10">6000 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="63" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="640 W"> <span class="ml-10">640 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="64" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="6400 W"> <span class="ml-10">6400 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="65" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="650 W"> <span class="ml-10">650 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="66" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="670 W"> <span class="ml-10">670 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="67" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="675 W"> <span class="ml-10">675 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="68" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="700 W"> <span class="ml-10">700 W (8) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="69" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="7000 W"> <span class="ml-10">7000 W (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="70" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="720 W"> <span class="ml-10">720 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="71" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="750 W"> <span class="ml-10">750 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="72" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="780 W"> <span class="ml-10">780 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="73" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="800 W"> <span class="ml-10">800 W (10) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="74" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="8000 W"> <span class="ml-10">8000 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="75" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="810 W"> <span class="ml-10">810 W (4) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="76" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="8400 W"> <span class="ml-10">8400 W (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="77" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="865 W"> <span class="ml-10">865 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="78" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="900 W"> <span class="ml-10">900 W (21) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="79" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="940 W"> <span class="ml-10">940 W (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="80" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="950 W"> <span class="ml-10">950 W (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="81" type="checkbox"
                                                    onclick="f_capacity_w(this.id);"
                                                    class="option-input checkbox capacity_w" name="filter['capacity_w']"
                                                    value="980 W"> <span class="ml-10">980 W (8) </span></label>
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
                                            aria-expanded="false" aria-controls="collapse1"> Capacity (VA) </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1000 VA"> <span class="ml-10">1000 VA (40)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="10000 VA"> <span class="ml-10">10000 VA (7)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1050 VA"> <span class="ml-10">1050 VA (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1100 VA"> <span class="ml-10">1100 VA (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1200 VA"> <span class="ml-10">1200 VA (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="12000 VA"> <span class="ml-10">12000 VA (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1300 VA"> <span class="ml-10">1300 VA (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1350 VA"> <span class="ml-10">1350 VA (3)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1400 VA"> <span class="ml-10">1400 VA (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1440 VA"> <span class="ml-10">1440 VA (5)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1500 VA"> <span class="ml-10">1500 VA (60)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="1920 VA"> <span class="ml-10">1920 VA (4)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="2000 VA"> <span class="ml-10">2000 VA (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="2070 VA"> <span class="ml-10">2070 VA (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="2190 VA"> <span class="ml-10">2190 VA (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="2200 VA"> <span class="ml-10">2200 VA (34)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="2880 VA"> <span class="ml-10">2880 VA (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="300 VA"> <span class="ml-10">300 VA (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="3000 VA"> <span class="ml-10">3000 VA (49)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="325 VA"> <span class="ml-10">325 VA (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="330 VA"> <span class="ml-10">330 VA (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="350 VA"> <span class="ml-10">350 VA (8) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="400 VA"> <span class="ml-10">400 VA (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="420 VA"> <span class="ml-10">420 VA (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="425 VA"> <span class="ml-10">425 VA (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="450 VA"> <span class="ml-10">450 VA (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="500 VA"> <span class="ml-10">500 VA (11)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="5000 VA"> <span class="ml-10">5000 VA (15)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="550 VA"> <span class="ml-10">550 VA (10)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="600 VA"> <span class="ml-10">600 VA (6) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="6000 VA"> <span class="ml-10">6000 VA (11)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="620 VA"> <span class="ml-10">620 VA (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="650 VA"> <span class="ml-10">650 VA (9) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="675 VA"> <span class="ml-10">675 VA (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="685 VA"> <span class="ml-10">685 VA (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="700 VA"> <span class="ml-10">700 VA (11)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="750 VA"> <span class="ml-10">750 VA (31)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="800 VA"> <span class="ml-10">800 VA (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="8000 VA"> <span class="ml-10">8000 VA (4)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="825 VA"> <span class="ml-10">825 VA (2) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="850 VA"> <span class="ml-10">850 VA (4) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_capacity_v(this.id);"
                                                    class="option-input checkbox capacity_v" name="filter['capacity_v']"
                                                    value="900 VA"> <span class="ml-10">900 VA (3) </span></label>
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
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search UPS....."
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
                        
                        <tbody>
                            @foreach ($ups as $ups)
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $ups->product->getMedia('main_image'); ?>
                                            <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                class="img-responsive lazy img-fluid"
                                                data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                title="{{ $ups->name }}" alt="{{ $ups->name }}">
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
                                            href="{{ route('ups-details', ['id' => $ups->id]) }}">{{ $ups->name }}</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> {{ $ups->brand }} </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> {{ $ups->model }} </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Stock:</div>
                                            <div class="detail__value f_stock"> {{ $ups->product->stock }} </div>
                                        </div>
                                    </span>
                                    {{-- <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Capacity (W):</div>
                                            <div class="detail__value f_capacity_w"> 10000 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Capacity (VA):</div>
                                            <div class="detail__value f_capacity_v"> 10000 VA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Output Voltage:</div>
                                            <div class="detail__value f_capacity_output_voltage"> 230 V </div>
                                        </div>
                                    </span> --}}

                                </td>
                                <td class="price">
                                    {{ $ups->product->price }} </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="{{ route('ups-details', ['id' => $ups->id]) }}" target="_blank">View
                                        Details</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                                        href="{{ route('add-ups-to-system', ['ups_id' => $ups->id]) }}"><i
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
         "@id": "https://pcbuilder.net/product/ups/",
         "name": "UPS"
       }
      }
     ]
    }
    </script>
<script>
    function f_capacity_w(id) {

        /*
        $('html, body').animate({
            scrollTop: $("#myTable").offset().top - 100
        }, 2000);
        */

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementsByClassName("capacity_w");
        input = input[id];
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        if (filter == 'ALL') {
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    td = td.getElementsByClassName("f_capacity_w")['0'];
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].classList.remove("c_capacity_w");
                    } else {
                        tr[i].classList.remove("c_capacity_w");
                    }
                }
            }
        } else {
            filter = ' ' + filter + ' ';
            if (input.checked) {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity_w")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity_w");
                        } else {
                            tr[i].classList.add("c_capacity_w");
                        }
                    }
                }
            } else {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity_w")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity_w");
                        } else {
                            tr[i].classList.remove("c_capacity_w");
                        }
                    }
                }
            }
        }
    }
</script>
<script>
    function f_capacity_v(id) {

        /*
        $('html, body').animate({
            scrollTop: $("#myTable").offset().top - 100
        }, 2000);
        */

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementsByClassName("capacity_v");
        input = input[id];
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        if (filter == 'ALL') {
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    td = td.getElementsByClassName("f_capacity_v")['0'];
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].classList.remove("c_capacity_v");
                    } else {
                        tr[i].classList.remove("c_capacity_v");
                    }
                }
            }
        } else {
            filter = ' ' + filter + ' ';
            if (input.checked) {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity_v")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity_v");
                        } else {
                            tr[i].classList.add("c_capacity_v");
                        }
                    }
                }
            } else {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity_v")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity_v");
                        } else {
                            tr[i].classList.remove("c_capacity_v");
                        }
                    }
                }
            }
        }
    }
</script>

@endpush
