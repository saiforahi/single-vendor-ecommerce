@extends('layouts.app')

@push('style')
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_tracking_method {
            display: none !important;
        }

    </style>
    <style>
        .c_color {
            display: none !important;
        }

    </style>
    <style>
        .c_wireless {
            display: none !important;
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
        <h1><span>Select</span> Your Mouse</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('mouse-list') }}">Mouse</a>
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
                                                        ({{ \App\Models\Mouse::where('brand', $brand->brand)->count() }})
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
                                            aria-expanded="false" aria-controls="collapse1"> Tracking Method </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_tracking_method(this.id);"
                                                    class="option-input checkbox tracking_method"
                                                    name="filter['tracking_method']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_tracking_method(this.id);"
                                                    class="option-input checkbox tracking_method"
                                                    name="filter['tracking_method']" value=" Optical"> <span
                                                    class="ml-10"> Optical (88) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_tracking_method(this.id);"
                                                    class="option-input checkbox tracking_method"
                                                    name="filter['tracking_method']" value=" Trackball"> <span
                                                    class="ml-10"> Trackball (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_tracking_method(this.id);"
                                                    class="option-input checkbox tracking_method"
                                                    name="filter['tracking_method']" value="Laser"> <span
                                                    class="ml-10">Laser (130) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_tracking_method(this.id);"
                                                    class="option-input checkbox tracking_method"
                                                    name="filter['tracking_method']" value="Optical"> <span
                                                    class="ml-10">Optical (524) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_tracking_method(this.id);"
                                                    class="option-input checkbox tracking_method"
                                                    name="filter['tracking_method']" value="Touch Pad"> <span
                                                    class="ml-10">Touch Pad (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_tracking_method(this.id);"
                                                    class="option-input checkbox tracking_method"
                                                    name="filter['tracking_method']" value="Touchpad"> <span
                                                    class="ml-10">Touchpad (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_tracking_method(this.id);"
                                                    class="option-input checkbox tracking_method"
                                                    name="filter['tracking_method']" value="Trackball"> <span
                                                    class="ml-10">Trackball (6) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> Color </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value=" Black / Green"> <span
                                                    class="ml-10"> Black / Green (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value=" Black / Multicolor"> <span
                                                    class="ml-10"> Black / Multicolor (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value=" Black / Orange"> <span
                                                    class="ml-10"> Black / Orange (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value=" Black / Silver"> <span
                                                    class="ml-10"> Black / Silver (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black"> <span class="ml-10">Black
                                                    (323) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Blue"> <span
                                                    class="ml-10">Black / Blue (21) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Brown"> <span
                                                    class="ml-10">Black / Brown (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Gold"> <span
                                                    class="ml-10">Black / Gold (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Golden"> <span
                                                    class="ml-10">Black / Golden (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Gray"> <span
                                                    class="ml-10">Black / Gray (29) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Green"> <span
                                                    class="ml-10">Black / Green (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Grey"> <span
                                                    class="ml-10">Black / Grey (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Orange"> <span
                                                    class="ml-10">Black / Orange (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Purple"> <span
                                                    class="ml-10">Black / Purple (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Red"> <span
                                                    class="ml-10">Black / Red (16) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Silver"> <span
                                                    class="ml-10">Black / Silver (29) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Violet"> <span
                                                    class="ml-10">Black / Violet (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / White"> <span
                                                    class="ml-10">Black / White (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Yellow"> <span
                                                    class="ml-10">Black / Yellow (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black RBG"> <span
                                                    class="ml-10">Black RBG (15) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black RGB"> <span
                                                    class="ml-10">Black RGB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue"> <span class="ml-10">Blue
                                                    (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue / Black"> <span
                                                    class="ml-10">Blue / Black (23) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue / Gray"> <span
                                                    class="ml-10">Blue / Gray (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue / White"> <span
                                                    class="ml-10">Blue / White (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue RGB"> <span
                                                    class="ml-10">Blue RGB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Brown / Black"> <span
                                                    class="ml-10">Brown / Black (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Camouflage"> <span
                                                    class="ml-10">Camouflage (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Dark Gray"> <span
                                                    class="ml-10">Dark Gray (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Forest Floral"> <span
                                                    class="ml-10">Forest Floral (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Francesca Fox"> <span
                                                    class="ml-10">Francesca Fox (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Fusion Party"> <span
                                                    class="ml-10">Fusion Party (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gold"> <span class="ml-10">Gold
                                                    (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gold / Black"> <span
                                                    class="ml-10">Gold / Black (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Graphite"> <span
                                                    class="ml-10">Graphite (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray"> <span class="ml-10">Gray
                                                    (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray / Black"> <span
                                                    class="ml-10">Gray / Black (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray / Blue"> <span
                                                    class="ml-10">Gray / Blue (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray / White"> <span
                                                    class="ml-10">Gray / White (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Gray / Yellow"> <span
                                                    class="ml-10">Gray / Yellow (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Green"> <span
                                                    class="ml-10">Green (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Green / Black"> <span
                                                    class="ml-10">Green / Black (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="43" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Green / Gray"> <span
                                                    class="ml-10">Green / Gray (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="44" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Green / White"> <span
                                                    class="ml-10">Green / White (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="45" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Green / Yellow"> <span
                                                    class="ml-10">Green / Yellow (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="46" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Grey"> <span class="ml-10">Grey
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="47" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Grey / White"> <span
                                                    class="ml-10">Grey / White (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="48" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Hyper Beast"> <span
                                                    class="ml-10">Hyper Beast (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="49" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Light Blue"> <span
                                                    class="ml-10">Light Blue (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="50" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Mexico"> <span
                                                    class="ml-10">Mexico (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="51" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Mint"> <span class="ml-10">Mint
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="52" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Multi Color"> <span
                                                    class="ml-10">Multi Color (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="53" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Orange / Black "> <span
                                                    class="ml-10">Orange / Black (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="54" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Pastel Blue"> <span
                                                    class="ml-10">Pastel Blue (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="55" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Peach"> <span
                                                    class="ml-10">Peach (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="56" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Pink"> <span class="ml-10">Pink
                                                    (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="57" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Pink / Black"> <span
                                                    class="ml-10">Pink / Black (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="58" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Pink / White"> <span
                                                    class="ml-10">Pink / White (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="59" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Purple"> <span
                                                    class="ml-10">Purple (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="60" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Purple / Black"> <span
                                                    class="ml-10">Purple / Black (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="61" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Purple / White"> <span
                                                    class="ml-10">Purple / White (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="62" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="RBG"> <span class="ml-10">RBG
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="63" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="RGB"> <span class="ml-10">RGB
                                                    (35) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="64" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red"> <span class="ml-10">Red
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="65" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / Black"> <span
                                                    class="ml-10">Red / Black (32) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="66" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / Gray"> <span
                                                    class="ml-10">Red / Gray (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="67" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red / Silver"> <span
                                                    class="ml-10">Red / Silver (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="68" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Rose Pink"> <span
                                                    class="ml-10">Rose Pink (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="69" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver"> <span
                                                    class="ml-10">Silver (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="70" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver / Black"> <span
                                                    class="ml-10">Silver / Black (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="71" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver / Blue"> <span
                                                    class="ml-10">Silver / Blue (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="72" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver / White"> <span
                                                    class="ml-10">Silver / White (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="73" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Skate Burger"> <span
                                                    class="ml-10">Skate Burger (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="74" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Soft Pink"> <span
                                                    class="ml-10">Soft Pink (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="75" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Star Wars Edition"> <span
                                                    class="ml-10">Star Wars Edition (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="76" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Summer Bouquet"> <span
                                                    class="ml-10">Summer Bouquet (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="77" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White"> <span
                                                    class="ml-10">White (36) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="78" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Black"> <span
                                                    class="ml-10">White / Black (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="79" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Blue"> <span
                                                    class="ml-10">White / Blue (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="80" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Gray"> <span
                                                    class="ml-10">White / Gray (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="81" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Pink"> <span
                                                    class="ml-10">White / Pink (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="82" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Purpal"> <span
                                                    class="ml-10">White / Purpal (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="83" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Purple"> <span
                                                    class="ml-10">White / Purple (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="84" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Red"> <span
                                                    class="ml-10">White / Red (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="85" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White Paisley"> <span
                                                    class="ml-10">White Paisley (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="86" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White RGB"> <span
                                                    class="ml-10">White RGB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="87" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Yellow"> <span
                                                    class="ml-10">Yellow (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading4">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion4" href="#collapse4"
                                            aria-expanded="false" aria-controls="collapse1"> Wireless </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_wireless(this.id);" class="option-input checkbox wireless"
                                                    name="filter['wireless']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_wireless(this.id);" class="option-input checkbox wireless"
                                                    name="filter['wireless']" value="No"> <span class="ml-10">No
                                                    (399) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_wireless(this.id);" class="option-input checkbox wireless"
                                                    name="filter['wireless']" value="Yes"> <span class="ml-10">Yes
                                                    (358) </span></label> </div>
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
                    @include('pages.inc.table-upper-box')
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
                                @foreach ($mice as $mouse)
                                <tr class="items" data-href="#">
                                    <td scope="row" class="component d-sm-none">
                                        <a href="index.html">#</a>
                                    </td>
                                    <td class="box">
                                        <div class="logo-name">
                                            <div class="item-logo">
                                                <?php $images = $mouse->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $mouse->name }}" alt="{{ $mouse->name }}">
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
                                                href="{{route('mouse-details',['id'=>$mouse->id])}}">{{$mouse->name}}</a></div>
                                        <span class="table_span">
                                            <div class="detail">
                                                <div class="detail__name">Brand:</div>
                                                <div class="detail__value f_brand">{{$mouse->product->brand}}</div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Model:</div>
                                                <div class="detail__value f_model">{{$mouse->product->model}}</div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Stock:</div>
                                                <div class="detail__value f_stock"> {{ $mouse->product->stock }} </div>
                                            </div>
                                        </span>
                                        {{-- <span class="table_span">

                                            <div class="detail">
                                                <div class="detail__name">Tracking Method:</div>
                                                <div class="detail__value f_tracking_method"> Optical </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Color:</div>
                                                <div class="detail__value f_color"> Black </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Wireless:</div>
                                                <div class="detail__value f_wireless"> No </div>
                                            </div>
                                        </span> --}}

                                    </td>
                                    <td class="price">৳ {{ $mouse->product->price }}</td>
                                    <td><a class="btn btn-primary component-btn"
                                            href="{{ route('mouse-details', ['id' => $mouse->id]) }}"
                                            target="_blank">View
                                            details</a></td>
                                    <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                                            href="{{ route('add-mouse-to-system', ['mouse_id' => $mouse->id]) }}"><i
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
                        "@id": "https://pcbuilder.net/product/mouse/",
                        "name": "Mouse"
                    }
                }
            ]
        }
    </script>
    <script>
        function f_tracking_method(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("tracking_method");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_tracking_method")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_tracking_method");
                        } else {
                            tr[i].classList.remove("c_tracking_method");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_tracking_method")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_tracking_method");
                            } else {
                                tr[i].classList.add("c_tracking_method");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_tracking_method")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_tracking_method");
                            } else {
                                tr[i].classList.remove("c_tracking_method");
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
    <script>
        function f_wireless(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("wireless");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_wireless")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_wireless");
                        } else {
                            tr[i].classList.remove("c_wireless");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_wireless")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_wireless");
                            } else {
                                tr[i].classList.add("c_wireless");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_wireless")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_wireless");
                            } else {
                                tr[i].classList.remove("c_wireless");
                            }
                        }
                    }
                }
            }
        }
    </script>
@endpush
