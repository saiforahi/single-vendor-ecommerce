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
        .c_brand {
            display: none !important;
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
        .c_ram {
            display: none !important;
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
        .c_ram_quantity {
            display: none !important;
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
        .c_cas_latency {
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
        .c_ram_type {
            display: none !important;
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
        .c_ram_speed {
            display: none !important;
        }

    </style>
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h1><span>Select</span> Your RAM</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('memory-list') }}">RAM</a>
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
                                                    name="filter['brand']" value="ADATA"> <span class="ml-10">ADATA
                                                    (22) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Corsair"> <span
                                                    class="ml-10">Corsair (304) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Crucial"> <span
                                                    class="ml-10">Crucial (121) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="G-Skill"> <span
                                                    class="ml-10">G-Skill (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="G.Skill"> <span
                                                    class="ml-10">G.Skill (407) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="GSkill"> <span
                                                    class="ml-10">GSkill (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="GeIL"> <span class="ml-10">GeIL
                                                    (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Gigabyte"> <span
                                                    class="ml-10">Gigabyte (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="HP"> <span class="ml-10">HP (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="HyperX"> <span
                                                    class="ml-10">HyperX (55) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="IBM"> <span class="ml-10">IBM (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="KLEVV"> <span class="ml-10">KLEVV
                                                    (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Kingston"> <span
                                                    class="ml-10">Kingston (65) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Kingston Technology"> <span
                                                    class="ml-10">Kingston Technology (32) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="MICRON - CRUCIAL DRAM"> <span
                                                    class="ml-10">MICRON - CRUCIAL DRAM (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Micron"> <span
                                                    class="ml-10">Micron (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Micron Technology, Inc"> <span
                                                    class="ml-10">Micron Technology, Inc (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Mushkin"> <span
                                                    class="ml-10">Mushkin (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="OLOy"> <span class="ml-10">OLOy
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="PNY"> <span class="ml-10">PNY (7)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Patriot"> <span
                                                    class="ml-10">Patriot (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Patriot Memory"> <span
                                                    class="ml-10">Patriot Memory (68) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SP Silicon Power"> <span
                                                    class="ml-10">SP Silicon Power (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Samsung"> <span
                                                    class="ml-10">Samsung (20) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Samsung Electronics"> <span
                                                    class="ml-10">Samsung Electronics (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Team"> <span class="ml-10">Team
                                                    (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="TeamGroup"> <span
                                                    class="ml-10">TeamGroup (70) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Thermaltake"> <span
                                                    class="ml-10">Thermaltake (18) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Timetec"> <span
                                                    class="ml-10">Timetec (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Transcend"> <span
                                                    class="ml-10">Transcend (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Unknown"> <span
                                                    class="ml-10">Unknown (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="XPG"> <span class="ml-10">XPG
                                                    (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card-group" id="accordion2" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading2">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion2" href="#collapse2"
                                            aria-expanded="false" aria-controls="collapse1"> RAM Size </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="1 GB "> <span class="ml-10">1 GB
                                                    (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="12 GB"> <span class="ml-10">12 GB
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="128 GB "> <span class="ml-10">128
                                                    GB (45) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="16"> <span class="ml-10">16 (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="16 GB"> <span class="ml-10">16 GB
                                                    (483) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="2 GB"> <span class="ml-10">2 GB
                                                    (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="256 GB"> <span class="ml-10">256
                                                    GB (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="32 GB"> <span class="ml-10">32 GB
                                                    (326) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="4 GB "> <span class="ml-10">4 GB
                                                    (55) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="64"> <span class="ml-10">64 (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="64 GB"> <span class="ml-10">64 GB
                                                    (139) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_ram(this.id);" class="option-input checkbox ram"
                                                    name="filter['ram']" value="8 GB"> <span class="ml-10">8 GB
                                                    (175) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> RAM Quantity </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="1 x 1 GB"> <span
                                                    class="ml-10">1 x 1 GB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="1 x 16 GB"> <span
                                                    class="ml-10">1 x 16 GB (64) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="1 x 2 GB "> <span
                                                    class="ml-10">1 x 2 GB (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="1 x 32 GB"> <span
                                                    class="ml-10">1 x 32 GB (23) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="1 x 4 GB "> <span
                                                    class="ml-10">1 x 4 GB (47) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="1 x 64 GB"> <span
                                                    class="ml-10">1 x 64 GB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="1 x 8 GB "> <span
                                                    class="ml-10">1 x 8 GB (109) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="2 x 16 GB"> <span
                                                    class="ml-10">2 x 16 GB (182) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="2 x 2 GB"> <span
                                                    class="ml-10">2 x 2 GB (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="2 x 32 GB"> <span
                                                    class="ml-10">2 x 32 GB (48) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="2 x 4 GB"> <span
                                                    class="ml-10">2 x 4 GB (64) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="2 x 8 GB"> <span
                                                    class="ml-10">2 x 8 GB (408) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="3 x 4"> <span
                                                    class="ml-10">3 x 4 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="4 x 16 GB"> <span
                                                    class="ml-10">4 x 16 GB (76) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="4 x 2 GB"> <span
                                                    class="ml-10">4 x 2 GB (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="4 x 32 GB "> <span
                                                    class="ml-10">4 x 32 GB (31) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="4 x 4 GB"> <span
                                                    class="ml-10">4 x 4 GB (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="4 x 8 GB"> <span
                                                    class="ml-10">4 x 8 GB (118) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="8 x 16 GB"> <span
                                                    class="ml-10">8 x 16 GB (15) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="8 x 32 GB"> <span
                                                    class="ml-10">8 x 32 GB (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="8 x 8 GB"> <span
                                                    class="ml-10">8 x 8 GB (12) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading4">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion4" href="#collapse4"
                                            aria-expanded="false" aria-controls="collapse1"> RAM Speed </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="1066 MHz"> <span
                                                    class="ml-10">1066 MHz (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="1333 MHz"> <span
                                                    class="ml-10">1333 MHz (44) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="1600 MHz"> <span
                                                    class="ml-10">1600 MHz (101) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="1866 MHz"> <span
                                                    class="ml-10">1866 MHz (18) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="2133 MHz"> <span
                                                    class="ml-10">2133 MHz (56) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="2400 MHz"> <span
                                                    class="ml-10">2400 MHz (121) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="2666"> <span
                                                    class="ml-10">2666 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="2666 MHz"> <span
                                                    class="ml-10">2666 MHz (130) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="2800 MHz"> <span
                                                    class="ml-10">2800 MHz (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="2933 MHz"> <span
                                                    class="ml-10">2933 MHz (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3000 MHz"> <span
                                                    class="ml-10">3000 MHz (116) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3200 MHz"> <span
                                                    class="ml-10">3200 MHz (308) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3333 MHz"> <span
                                                    class="ml-10">3333 MHz (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3400 MHz"> <span
                                                    class="ml-10">3400 MHz (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3466 MHz"> <span
                                                    class="ml-10">3466 MHz (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3600"> <span
                                                    class="ml-10">3600 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3600 MHz"> <span
                                                    class="ml-10">3600 MHz (207) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3733 MHz"> <span
                                                    class="ml-10">3733 MHz (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3800 MHz"> <span
                                                    class="ml-10">3800 MHz (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="3866 MHz"> <span
                                                    class="ml-10">3866 MHz (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="4000 MHz"> <span
                                                    class="ml-10">4000 MHz (63) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="4133 MHz"> <span
                                                    class="ml-10">4133 MHz (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="4266 MHz"> <span
                                                    class="ml-10">4266 MHz (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="4400 MHz"> <span
                                                    class="ml-10">4400 MHz (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="4500 MHz"> <span
                                                    class="ml-10">4500 MHz (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="4600 MHz"> <span
                                                    class="ml-10">4600 MHz (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_ram_speed(this.id);" class="option-input checkbox ram_speed"
                                                    name="filter['ram_speed']" value="4800 MHz"> <span
                                                    class="ml-10">4800 MHz (2) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card-group" id="accordion5" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading5">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion5" href="#collapse5"
                                            aria-expanded="false" aria-controls="collapse1"> RAM Type </a> </h4>
                                </div>
                                <div id="collapse5" class="collapse " role="tabpanel" aria-labelledby="heading5">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_ram_type(this.id);" class="option-input checkbox ram_type"
                                                    name="filter['ram_type']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_ram_type(this.id);" class="option-input checkbox ram_type"
                                                    name="filter['ram_type']" value="DDR3"> <span
                                                    class="ml-10">DDR3 (186) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_ram_type(this.id);" class="option-input checkbox ram_type"
                                                    name="filter['ram_type']" value="DDR4"> <span
                                                    class="ml-10">DDR4 (1068) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card-group" id="accordion6" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading6">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion6" href="#collapse6"
                                            aria-expanded="false" aria-controls="collapse1"> CAS Latency </a> </h4>
                                </div>
                                <div id="collapse6" class="collapse " role="tabpanel" aria-labelledby="heading6">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL10"> <span class="ml-10">CL10 (37) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL11"> <span class="ml-10">CL11 (54) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL13"> <span class="ml-10">CL13 (8) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL14"> <span class="ml-10">CL14 (58) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL15"> <span class="ml-10">CL15 (160) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL16"> <span class="ml-10">CL16 (461) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL17"> <span class="ml-10">CL17 (71) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL18"> <span class="ml-10">CL18 (168) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL19"> <span class="ml-10">CL19 (112) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL20"> <span class="ml-10">CL20 (7) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL21"> <span class="ml-10">CL21 (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL22"> <span class="ml-10">CL22 (18) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL7"> <span class="ml-10">CL7 (6) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL8"> <span class="ml-10">CL8 (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_cas_latency(this.id);"
                                                    class="option-input checkbox cas_latency" name="filter['cas_latency']"
                                                    value="CL9"> <span class="ml-10">CL9 (88) </span></label>
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
                                <div class="link px-2">https://pcbuilder.net/rigs/cjT2wn/</div>
                                <i class="fa fa-clone pl-2" aria-hidden="true"></i>
                            </div>
                            <div class="action-box">
                                <div class="action-box-item search"> Search: </div>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search RAM....."
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
                            @foreach ($memories as $memory)
                                <tr class="items" data-href="#">
                                    <td scope="row" class="component d-sm-none">
                                        <a href="index.html">#</a>
                                    </td>
                                    <td class="box">
                                        <div class="logo-name">
                                            <div class="item-logo">
                                                <?php $images = $memory->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $memory->name }}" alt="{{ $memory->name }}">

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
                                                href="{{ route('memory-details', ['id' => $memory->id]) }}">{{ $memory->name }}</a>
                                        </div>
                                        <span class="table_span">
                                            <div class="detail">
                                                <div class="detail__name">Brand:</div>
                                                <div class="detail__value f_brand"> G.Skill </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Model:</div>
                                                <div class="detail__value f_model"> Trident Z Royal </div>
                                            </div>
                                        </span>
                                        <span class="table_span">

                                            <div class="detail">
                                                <div class="detail__name">RAM Size:</div>
                                                <div class="detail__value f_ram">
                                                    {{ json_decode($memory->memory_specs, true)['memory'] == null ? '' : json_decode($memory->memory_specs, true)['memory'] }}
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Quantity:</div>
                                                <div class="detail__value f_ram_quantity"> 2 x 8 GB </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">RAM Type:</div>
                                                <div class="detail__value f_ram_type"> DDR4 </div>
                                            </div>
                                        </span><span class="table_span view-more-185" style="display: none;">
                                            <div class="detail">
                                                <div class="detail__name">RAM Speed:</div>
                                                <div class="detail__value f_ram_speed"> 4800 MHz </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">DIMM Type:</div>
                                                <div class="detail__value f_dimm_type"> 288-Pin </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">CAS Latency:</div>
                                                <div class="detail__value f_cas_latency"> CL18 </div>
                                            </div>
                                        </span>

                                        <span class="view-more">
                                            <div class="view-More185" onclick="viewMore(185);"><span
                                                    class="viewMore185">View More Details</span> <i
                                                    class="fas fa-chevron-circle-down"></i></div>
                                        </span>
                                    </td>
                                    <td class="price">{{ $memory->product->price }}</td>
                                    <td><a class="btn btn-primary component-btn"
                                            href="{{ route('memory-details', ['id' => $memory->id]) }}" target="_blank">View
                                            Details</a></td>
                                    <td class="remove"><a class="btn btn-danger component-add-btn" id="p_185"
                                            href="{{ route('add-memory-to-system', ['memory_id' => $memory->id]) }}"><i
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
        function f_cas_latency(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("cas_latency");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_cas_latency")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_cas_latency");
                        } else {
                            tr[i].classList.remove("c_cas_latency");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_cas_latency")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_cas_latency");
                            } else {
                                tr[i].classList.add("c_cas_latency");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_cas_latency")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_cas_latency");
                            } else {
                                tr[i].classList.remove("c_cas_latency");
                            }
                        }
                    }
                }
            }
        }
    </script>
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
        function f_ram(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("ram");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_ram")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_ram");
                        } else {
                            tr[i].classList.remove("c_ram");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ram")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ram");
                            } else {
                                tr[i].classList.add("c_ram");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ram")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ram");
                            } else {
                                tr[i].classList.remove("c_ram");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_ram_quantity(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("ram_quantity");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_ram_quantity")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_ram_quantity");
                        } else {
                            tr[i].classList.remove("c_ram_quantity");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ram_quantity")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ram_quantity");
                            } else {
                                tr[i].classList.add("c_ram_quantity");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ram_quantity")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ram_quantity");
                            } else {
                                tr[i].classList.remove("c_ram_quantity");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_ram_speed(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("ram_speed");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_ram_speed")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_ram_speed");
                        } else {
                            tr[i].classList.remove("c_ram_speed");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ram_speed")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ram_speed");
                            } else {
                                tr[i].classList.add("c_ram_speed");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ram_speed")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ram_speed");
                            } else {
                                tr[i].classList.remove("c_ram_speed");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_ram_type(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("ram_type");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_ram_type")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_ram_type");
                        } else {
                            tr[i].classList.remove("c_ram_type");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ram_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ram_type");
                            } else {
                                tr[i].classList.add("c_ram_type");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_ram_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_ram_type");
                            } else {
                                tr[i].classList.remove("c_ram_type");
                            }
                        }
                    }
                }
            }
        }
    </script>
@endpush
