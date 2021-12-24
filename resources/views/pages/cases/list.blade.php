@extends('layouts.app')

@push('style')
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
    <style>
        .c_brand {
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
        .c_color {
            display: none !important;
        }

    </style>
    <style>
        .c_side_panel {
            display: none !important;
        }

    </style>
    <style>
        .c_cabinet_type {
            display: none !important;
        }

    </style>
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h1><span>Select</span> Your Case</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('case-list') }}">Case</a>
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
                                                        ({{ \App\Models\Casing::where('brand', $brand->brand)->count() }})
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
                                            aria-expanded="false" aria-controls="collapse1"> Side Panel </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value=" Tinted Tempered Glass"> <span class="ml-10"> Tinted
                                                    Tempered Glass (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Acrylic"> <span class="ml-10">Acrylic (128)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Acrylic, Steel, Tempered Glass"> <span
                                                    class="ml-10">Acrylic, Steel, Tempered Glass (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Acrylic, Tempered Glass"> <span class="ml-10">Acrylic,
                                                    Tempered Glass (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Acrylic,Steel"> <span class="ml-10">Acrylic,Steel (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Aluminum"> <span class="ml-10">Aluminum (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Aluminum, Plastic"> <span class="ml-10">Aluminum,
                                                    Plastic (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Aluminum, Steel"> <span class="ml-10">Aluminum, Steel
                                                    (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Aluminum, Steel, Plastic"> <span class="ml-10">Aluminum,
                                                    Steel, Plastic (4) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Aluminum, Steel, Tempered Glass"> <span
                                                    class="ml-10">Aluminum, Steel, Tempered Glass (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Aluminum, Tempered Glass"> <span class="ml-10">Aluminum,
                                                    Tempered Glass (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Aluminum, Tempered Glass, Steel"> <span
                                                    class="ml-10">Aluminum, Tempered Glass, Steel (7)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Aluminum, Tempered Glass, Steel, Plastic"> <span
                                                    class="ml-10">Aluminum, Tempered Glass, Steel, Plastic (4)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="NoSteel"> <span class="ml-10">NoSteel (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="None"> <span class="ml-10">None (19) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Plastic"> <span class="ml-10">Plastic (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Plastic, Steel, Tempered Glass"> <span
                                                    class="ml-10">Plastic, Steel, Tempered Glass (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Steel"> <span class="ml-10">Steel (144) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Steel, Acrylic"> <span class="ml-10">Steel, Acrylic (3)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Steel, Plastic"> <span class="ml-10">Steel, Plastic
                                                    (16) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Steel, Plastic, Acrylic"> <span class="ml-10">Steel,
                                                    Plastic, Acrylic (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Steel, Tempered Glass"> <span class="ml-10">Steel,
                                                    Tempered Glass (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Tempered Glas"> <span class="ml-10">Tempered Glas (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Tempered Glass"> <span class="ml-10">Tempered Glass
                                                    (342) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Tempered Glass, Acrylic"> <span class="ml-10">Tempered
                                                    Glass, Acrylic (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Tempered Glass, Steel"> <span class="ml-10">Tempered
                                                    Glass, Steel (56) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Tempered Glass, Steel, Plastic"> <span
                                                    class="ml-10">Tempered Glass, Steel, Plastic (18)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_side_panel(this.id);"
                                                    class="option-input checkbox side_panel" name="filter['side_panel']"
                                                    value="Tinted Tempered Glass"> <span class="ml-10">Tinted
                                                    Tempered Glass (44) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> Cabinet Type </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_cabinet_type(this.id);"
                                                    class="option-input checkbox cabinet_type"
                                                    name="filter['cabinet_type']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_cabinet_type(this.id);"
                                                    class="option-input checkbox cabinet_type"
                                                    name="filter['cabinet_type']" value="ATX Full Tower"> <span
                                                    class="ml-10">ATX Full Tower (93) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_cabinet_type(this.id);"
                                                    class="option-input checkbox cabinet_type"
                                                    name="filter['cabinet_type']" value="ATX Mid Tower"> <span
                                                    class="ml-10">ATX Mid Tower (518) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_cabinet_type(this.id);"
                                                    class="option-input checkbox cabinet_type"
                                                    name="filter['cabinet_type']" value="ATX Mini Tower"> <span
                                                    class="ml-10">ATX Mini Tower (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_cabinet_type(this.id);"
                                                    class="option-input checkbox cabinet_type"
                                                    name="filter['cabinet_type']" value="MicroATX Mid Tower"> <span
                                                    class="ml-10">MicroATX Mid Tower (41) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_cabinet_type(this.id);"
                                                    class="option-input checkbox cabinet_type"
                                                    name="filter['cabinet_type']" value="MicroATX Mini Tower"> <span
                                                    class="ml-10">MicroATX Mini Tower (68) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_cabinet_type(this.id);"
                                                    class="option-input checkbox cabinet_type"
                                                    name="filter['cabinet_type']" value="Mini ITX"> <span
                                                    class="ml-10">Mini ITX (89) </span></label> </div>
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
                                                    name="filter['color']" value=" Black RGB"> <span
                                                    class="ml-10"> Black RGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black"> <span
                                                    class="ml-10">Black (530) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black /  Green"> <span
                                                    class="ml-10">Black / Green (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / ARGB"> <span
                                                    class="ml-10">Black / ARGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Blue"> <span
                                                    class="ml-10">Black / Blue (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Gold"> <span
                                                    class="ml-10">Black / Gold (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Gray"> <span
                                                    class="ml-10">Black / Gray (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Green"> <span
                                                    class="ml-10">Black / Green (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Grey"> <span
                                                    class="ml-10">Black / Grey (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Orange"> <span
                                                    class="ml-10">Black / Orange (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Purple"> <span
                                                    class="ml-10">Black / Purple (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / RGB"> <span
                                                    class="ml-10">Black / RGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Red"> <span
                                                    class="ml-10">Black / Red (24) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Silver"> <span
                                                    class="ml-10">Black / Silver (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / White"> <span
                                                    class="ml-10">Black / White (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Yellow"> <span
                                                    class="ml-10">Black / Yellow (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black ARGB"> <span
                                                    class="ml-10">Black ARGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black RBG"> <span
                                                    class="ml-10">Black RBG (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black RGB"> <span
                                                    class="ml-10">Black RGB (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue"> <span class="ml-10">Blue
                                                    (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue / Black"> <span
                                                    class="ml-10">Blue / Black (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Challenger S"> <span
                                                    class="ml-10">Challenger S (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="E300L Silver"> <span
                                                    class="ml-10">E300L Silver (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gold"> <span class="ml-10">Gold
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray"> <span class="ml-10">Gray
                                                    (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray / Black"> <span
                                                    class="ml-10">Gray / Black (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray Solid"> <span
                                                    class="ml-10">Gray Solid (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Green / Black"> <span
                                                    class="ml-10">Green / Black (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Grey"> <span class="ml-10">Grey
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Level 20 HT Black"> <span
                                                    class="ml-10">Level 20 HT Black (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="MB Lite 5 RGB"> <span
                                                    class="ml-10">MB Lite 5 RGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Orange"> <span
                                                    class="ml-10">Orange (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Orange / Black "> <span
                                                    class="ml-10">Orange / Black (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Pink"> <span class="ml-10">Pink
                                                    (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="RGB"> <span class="ml-10">RGB
                                                    (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="RVZ03B"> <span
                                                    class="ml-10">RVZ03B (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red"> <span class="ml-10">Red
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / Black"> <span
                                                    class="ml-10">Red / Black (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Rose Gold / White"> <span
                                                    class="ml-10">Rose Gold / White (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="SG13B-Q-V1"> <span
                                                    class="ml-10">SG13B-Q-V1 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="SG13P-USA"> <span
                                                    class="ml-10">SG13P-USA (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver"> <span
                                                    class="ml-10">Silver (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="43" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver / Black"> <span
                                                    class="ml-10">Silver / Black (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="44" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White"> <span
                                                    class="ml-10">White (79) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="45" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Black"> <span
                                                    class="ml-10">White / Black (31) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="46" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Gray"> <span
                                                    class="ml-10">White / Gray (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="47" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Red"> <span
                                                    class="ml-10">White / Red (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="48" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White ARGB"> <span
                                                    class="ml-10">White ARGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="49" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White RGB"> <span
                                                    class="ml-10">White RGB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="50" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Window Black"> <span
                                                    class="ml-10">Window Black (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="51" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Window Orange"> <span
                                                    class="ml-10">Window Orange (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="52" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Yellow / Blue"> <span
                                                    class="ml-10">Yellow / Blue (1) </span></label> </div>
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
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Case....."
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
                            @foreach ($casings as $casing)
                                <tr class="items" data-href="#">
                                    <td scope="row" class="component d-sm-none">
                                        <a href="index.html">#</a>
                                    </td>
                                    <td class="box">
                                        <div class="logo-name">
                                            <div class="item-logo">
                                                <?php $images = $casing->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $casing->name }}" alt="{{ $casing->name }}">
                                                {{-- <div class="stars-rating" title="4.7 out of 5">
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
                                                    </div> --}}
                                            </div>
                                        </div>
                </div>
                </td>
                <td class="comp-details">
                    <div class="table_title"><a
                            href="{{ route('case-details', ['id' => $casing->id]) }}">{{ $casing->name }}
                        </a></div>
                    <span class="table_span">
                        <div class="detail">
                            <div class="detail__name">Brand:</div>
                            <div class="detail__value f_brand"> {{ $casing->brand }} </div>
                        </div>
                        <div class="detail">
                            <div class="detail__name">Model:</div>
                            <div class="detail__value f_model"> {{ $casing->model }} </div>
                        </div>
                    </span>
                    <span class="table_span">

                        <div class="detail">
                            <div class="detail__name">Side Panel:</div>
                            <div class="detail__value f_side_panel">
                                {{ empty(json_decode($casing->physical_specs, true)) ? '' : json_decode($casing->physical_specs, true)['material'] }}
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail__name">Motherboard support:</div>
                            <div class="detail__value f_cabinet_type"> {{ empty(json_decode($casing->compatibility_specs, true)) ? '' : json_decode($casing->compatibility_specs, true)['motherboard_support'] }} </div>
                        </div>
                        <div class="detail">
                            <div class="detail__name">Color:</div>
                            <div class="detail__value f_color"> White </div>
                        </div>
                    </span>

                </td>
                <td class="price">৳ {{ $casing->product->price }}</td>
                <td><a class="btn btn-primary component-btn" href="{{ route('case-details', ['id' => $casing->id]) }}"
                        target="_blank">View
                        details</a></td>
                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                        href="{{ route('add-casing-to-system', ['casing_id' => $casing->id]) }}"><i
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
                        "@id": "https://pcbuilder.net/product/case/",
                        "name": "Case"
                    }
                }
            ]
        }
    </script>
    <script>
        function f_side_panel(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("side_panel");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_side_panel")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_side_panel");
                        } else {
                            tr[i].classList.remove("c_side_panel");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_side_panel")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_side_panel");
                            } else {
                                tr[i].classList.add("c_side_panel");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_side_panel")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_side_panel");
                            } else {
                                tr[i].classList.remove("c_side_panel");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_cabinet_type(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("cabinet_type");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_cabinet_type")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_cabinet_type");
                        } else {
                            tr[i].classList.remove("c_cabinet_type");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_cabinet_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_cabinet_type");
                            } else {
                                tr[i].classList.add("c_cabinet_type");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_cabinet_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_cabinet_type");
                            } else {
                                tr[i].classList.remove("c_cabinet_type");
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
