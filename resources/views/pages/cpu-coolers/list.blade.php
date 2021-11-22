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
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_color {
            display: none !important;
        }

    </style>
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h1><span>Select</span> Your CPU Cooler</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('cpu-coolers-list') }}">CPU Cooler</a>
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
                                                    name="filter['brand']" value="ARCTIC"> <span
                                                    class="ml-10">ARCTIC (36) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ARESGAME"> <span
                                                    class="ml-10">ARESGAME (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ASUS"> <span class="ml-10">ASUS
                                                    (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="AeroCool"> <span
                                                    class="ml-10">AeroCool (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Akasa"> <span class="ml-10">Akasa
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Alphacool"> <span
                                                    class="ml-10">Alphacool (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Antec"> <span class="ml-10">Antec
                                                    (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Cooler Master"> <span
                                                    class="ml-10">Cooler Master (51) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Corsair"> <span
                                                    class="ml-10">Corsair (34) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Cougar"> <span
                                                    class="ml-10">Cougar (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Cryorig"> <span
                                                    class="ml-10">Cryorig (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="DEEP COOL"> <span
                                                    class="ml-10">DEEP COOL (32) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="DEEPCOOL"> <span
                                                    class="ml-10">DEEPCOOL (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Dynatron"> <span
                                                    class="ml-10">Dynatron (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="EK"> <span class="ml-10">EK (6)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="EVGA"> <span class="ml-10">EVGA
                                                    (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Enermax"> <span
                                                    class="ml-10">Enermax (23) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Evercool"> <span
                                                    class="ml-10">Evercool (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="FSP"> <span class="ml-10">FSP (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Fractal Design"> <span
                                                    class="ml-10">Fractal Design (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="GAMEMAX"> <span
                                                    class="ml-10">GAMEMAX (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Gelid"> <span class="ml-10">Gelid
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Gelid Solutions"> <span
                                                    class="ml-10">Gelid Solutions (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Gigabyte"> <span
                                                    class="ml-10">Gigabyte (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ID-COOLING"> <span
                                                    class="ml-10">ID-COOLING (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="IN WIN"> <span class="ml-10">IN
                                                    WIN (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Intel"> <span
                                                    class="ml-10">Intel (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Lian Li"> <span
                                                    class="ml-10">Lian Li (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Logisys"> <span
                                                    class="ml-10">Logisys (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="MSI"> <span class="ml-10">MSI
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="MassCool"> <span
                                                    class="ml-10">MassCool (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Montech"> <span
                                                    class="ml-10">Montech (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="NZXT"> <span class="ml-10">NZXT
                                                    (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Noctua"> <span
                                                    class="ml-10">Noctua (31) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Phanteks"> <span
                                                    class="ml-10">Phanteks (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Phononic"> <span
                                                    class="ml-10">Phononic (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Prolima Tech"> <span
                                                    class="ml-10">Prolima Tech (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="RAIJINTEK Corporation"> <span
                                                    class="ml-10">RAIJINTEK Corporation (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Raijintek"> <span
                                                    class="ml-10">Raijintek (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Reeven"> <span
                                                    class="ml-10">Reeven (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Rosewill"> <span
                                                    class="ml-10">Rosewill (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SCYTHE"> <span
                                                    class="ml-10">SCYTHE (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="43" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SilenX"> <span
                                                    class="ml-10">SilenX (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="44" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SilentiumPC"> <span
                                                    class="ml-10">SilentiumPC (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="45" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SilverStone Technology"> <span
                                                    class="ml-10">SilverStone Technology (25) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="46" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="StarTech"> <span
                                                    class="ml-10">StarTech (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="47" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Thermal Right"> <span
                                                    class="ml-10">Thermal Right (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="48" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Thermalright"> <span
                                                    class="ml-10">Thermalright (21) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="49" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Thermaltake"> <span
                                                    class="ml-10">Thermaltake (35) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="50" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Titan"> <span
                                                    class="ml-10">Titan (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="51" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Vetroo"> <span
                                                    class="ml-10">Vetroo (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="52" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="XPG"> <span class="ml-10">XPG
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="53" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Xigmatek"> <span
                                                    class="ml-10">Xigmatek (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="54" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ZADAK"> <span
                                                    class="ml-10">ZADAK (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="55" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Zalman"> <span
                                                    class="ml-10">Zalman (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="56" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="audio ques"> <span
                                                    class="ml-10">audio ques (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="57" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="be quiet!"> <span
                                                    class="ml-10">be quiet! (23) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="58" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="upHere"> <span
                                                    class="ml-10">upHere (8) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="card-group" id="accordion2" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading2">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion2" href="#collapse2"
                                            aria-expanded="false" aria-controls="collapse1"> Color </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value=" White / Orange"> <span
                                                    class="ml-10"> White / Orange (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black"> <span
                                                    class="ml-10">Black (200) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black /  Yellow"> <span
                                                    class="ml-10">Black / Yellow (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Blue"> <span
                                                    class="ml-10">Black / Blue (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Gray"> <span
                                                    class="ml-10">Black / Gray (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Purple"> <span
                                                    class="ml-10">Black / Purple (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Red"> <span
                                                    class="ml-10">Black / Red (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Silver"> <span
                                                    class="ml-10">Black / Silver (31) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Silver / RGB"> <span
                                                    class="ml-10">Black / Silver / RGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Silver RBG"> <span
                                                    class="ml-10">Black / Silver RBG (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / White"> <span
                                                    class="ml-10">Black / White (21) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Yellow"> <span
                                                    class="ml-10">Black / Yellow (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black ARBG"> <span
                                                    class="ml-10">Black ARBG (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black RBG"> <span
                                                    class="ml-10">Black RBG (47) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue"> <span class="ml-10">Blue
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue / Black"> <span
                                                    class="ml-10">Blue / Black (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue / Gray"> <span
                                                    class="ml-10">Blue / Gray (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue / Silver"> <span
                                                    class="ml-10">Blue / Silver (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue / White"> <span
                                                    class="ml-10">Blue / White (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Brown"> <span
                                                    class="ml-10">Brown (24) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Copper"> <span
                                                    class="ml-10">Copper (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Golden"> <span
                                                    class="ml-10">Golden (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray"> <span class="ml-10">Gray
                                                    (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray / Black"> <span
                                                    class="ml-10">Gray / Black (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray RGB"> <span
                                                    class="ml-10">Gray RGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Orange"> <span
                                                    class="ml-10">Orange (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Orange / Red"> <span
                                                    class="ml-10">Orange / Red (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="RGB"> <span class="ml-10">RGB
                                                    (89) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red "> <span class="ml-10">Red
                                                    (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / Black"> <span
                                                    class="ml-10">Red / Black (16) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / Gray"> <span
                                                    class="ml-10">Red / Gray (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / Silver"> <span
                                                    class="ml-10">Red / Silver (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / White"> <span
                                                    class="ml-10">Red / White (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver"> <span
                                                    class="ml-10">Silver (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver / Black"> <span
                                                    class="ml-10">Silver / Black (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White"> <span
                                                    class="ml-10">White (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Black"> <span
                                                    class="ml-10">White / Black (16) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Blue"> <span
                                                    class="ml-10">White / Blue (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Green"> <span
                                                    class="ml-10">White / Green (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Pink"> <span
                                                    class="ml-10">White / Pink (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Purple"> <span
                                                    class="ml-10">White / Purple (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White RGB"> <span
                                                    class="ml-10">White RGB (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="43" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Yellow / Black"> <span
                                                    class="ml-10">Yellow / Black (3) </span></label> </div>
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
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search CPU Cooler....."
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
                            @foreach ($cpucoolers as $cpucooler)
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $cpucooler->product->getMedia('main_image'); ?>
                                            <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                class="img-responsive lazy img-fluid"
                                                data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                title="{{ $memory->name }}" alt="{{ $memory->name }}">
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
                                            href="{{route("cpu-cooler-details")}}">Cooler
                                            Master Hyper 212 Evo CPU Cooler, 4 CDC Heatpipes, 120mm PWM Fan, Aluminum
                                            Fins</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cooler Master </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Hyper 212 EVO </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Fan RPM:</div>
                                            <div class="detail__value f_fan_rpm"> 600 to 2000 rpm </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Noise Level:</div>
                                            <div class="detail__value f_noise_level"> 9 to 36 dBA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> RGB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $35 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005O65JXI?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                                        href="javascript:void(0);" onclick="setid(1)"><i class="fa fa-plus"></i></a>
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
@endpush
