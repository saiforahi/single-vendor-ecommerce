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
        .c_screen {
            display: none !important;
        }

    </style>
    <style>
        .c_resolution {
            display: none !important;
        }

    </style>
    <style>
        .c_aspect_ratio {
            display: none !important;
        }

    </style>
    <style>
        .c_response_time {
            display: none !important;
        }

    </style>
    <style>
        .c_refresh_rate {
            display: none !important;
        }

    </style>
    <style>
        .c_panel_type {
            display: none !important;
        }

    </style>
    <style>
        .accept-cookie {
            z-index: 99999;
            background-color: #393d43;
        }

        @media only screen and (max-width:767px) {
            .accept-cookie p {
                flex-grow: 1;
            }

            .accept-cookie button {
                flex-basis: 100%;
            }
        }

    </style>


@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h1><span>Select</span> Your Monitor</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('monitor-list') }}">Monitor</a>
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
                                                                ({{ \App\Models\Monitor::where('brand', $brand->brand)->count() }})
                                                            </span></label> </div>
                                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        <div class="card-group" id="accordion2" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading2">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion2" href="#collapse2"
                                            aria-expanded="false" aria-controls="collapse1"> Screen Size </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="15&quot;"> <span
                                                    class="ml-10">15" (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="15.6&quot;"> <span
                                                    class="ml-10">15.6" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="17&quot;"> <span
                                                    class="ml-10">17" (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="18.5&quot;"> <span
                                                    class="ml-10">18.5" (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="18.9&quot;"> <span
                                                    class="ml-10">18.9" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="19&quot;"> <span
                                                    class="ml-10">19" (25) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="19.1&quot;"> <span
                                                    class="ml-10">19.1" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="19.5&quot;"> <span
                                                    class="ml-10">19.5" (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="20&quot;"> <span
                                                    class="ml-10">20" (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="21.3&quot;"> <span
                                                    class="ml-10">21.3" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="21.5&quot;"> <span
                                                    class="ml-10">21.5" (63) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="21.6&quot;"> <span
                                                    class="ml-10">21.6" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="22&quot;"> <span
                                                    class="ml-10">22" (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="22.5&quot;"> <span
                                                    class="ml-10">22.5" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="22.8&quot;"> <span
                                                    class="ml-10">22.8" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="23&quot;"> <span
                                                    class="ml-10">23" (22) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="23.5&quot;"> <span
                                                    class="ml-10">23.5" (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="23.6&quot;"> <span
                                                    class="ml-10">23.6" (40) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="23.7&quot;"> <span
                                                    class="ml-10">23.7" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="23.8&quot;"> <span
                                                    class="ml-10">23.8" (71) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="24&quot;"> <span
                                                    class="ml-10">24" (54) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="24.1&quot;"> <span
                                                    class="ml-10">24.1" (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="24.5&quot;"> <span
                                                    class="ml-10">24.5" (23) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="25&quot;"> <span
                                                    class="ml-10">25" (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="26.9&quot;"> <span
                                                    class="ml-10">26.9" (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="27&quot;"> <span
                                                    class="ml-10">27" (230) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="28&quot;"> <span
                                                    class="ml-10">28" (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="29&quot;"> <span
                                                    class="ml-10">29" (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="29.8&quot;"> <span
                                                    class="ml-10">29.8" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="30&quot;"> <span
                                                    class="ml-10">30" (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="31&quot;"> <span
                                                    class="ml-10">31" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="31.5&quot;"> <span
                                                    class="ml-10">31.5" (47) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="32&quot;"> <span
                                                    class="ml-10">32" (28) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="34&quot;"> <span
                                                    class="ml-10">34" (45) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="34.1&quot;"> <span
                                                    class="ml-10">34.1" (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="35&quot;"> <span
                                                    class="ml-10">35" (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="37.5&quot;"> <span
                                                    class="ml-10">37.5" (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="37.8&quot;"> <span
                                                    class="ml-10">37.8" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="38&quot;"> <span
                                                    class="ml-10">38" (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="42.5&quot;"> <span
                                                    class="ml-10">42.5" (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="43&quot;"> <span
                                                    class="ml-10">43" (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="43.4&quot;"> <span
                                                    class="ml-10">43.4" (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="43" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="48.8&quot;"> <span
                                                    class="ml-10">48.8" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="44" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="49&quot;"> <span
                                                    class="ml-10">49" (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="45" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="64.5&quot;"> <span
                                                    class="ml-10">64.5" (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="46" type="checkbox"
                                                    onclick="f_screen(this.id);" class="option-input checkbox screen"
                                                    name="filter['screen']" value="65&quot;"> <span
                                                    class="ml-10">65" (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function f_screen(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("screen");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_screen")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_screen");
                                            } else {
                                                tr[i].classList.remove("c_screen");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_screen")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_screen");
                                                } else {
                                                    tr[i].classList.add("c_screen");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_screen")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_screen");
                                                } else {
                                                    tr[i].classList.remove("c_screen");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        </script>
                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> Resolution </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value=" 1920 x 1080"> <span class="ml-10"> 1920 x 1080 (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1024 x 768"> <span class="ml-10">1024 x 768 (3)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1280 x 1024"> <span class="ml-10">1280 x 1024 (31)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1366 x 768"> <span class="ml-10">1366 x 768 (10)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1440 x 900"> <span class="ml-10">1440 x 900 (9)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1600 x 1200"> <span class="ml-10">1600 x 1200 (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1600 x 900"> <span class="ml-10">1600 x 900 (18)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1680 x 1050"> <span class="ml-10">1680 x 1050 (9)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1920 x 1080"> <span class="ml-10">1920 x 1080 (373)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="1920 x 1200"> <span class="ml-10">1920 x 1200 (16)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="2560 x 1080"> <span class="ml-10">2560 x 1080 (20)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="2560 x 1440"> <span class="ml-10">2560 x 1440 (148)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="2560 x 1600"> <span class="ml-10">2560 x 1600 (4)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="3440 x 1440"> <span class="ml-10">3440 x 1440 (49)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="3840 x 1080"> <span class="ml-10">3840 x 1080 (3)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="3840 x 1200"> <span class="ml-10">3840 x 1200 (3)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="3840 x 1600"> <span class="ml-10">3840 x 1600 (10)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="3840 x 2160"> <span class="ml-10">3840 x 2160 (89)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="4096 x 2160"> <span class="ml-10">4096 x 2160 (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="5120 x 1440"> <span class="ml-10">5120 x 1440 (7)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="5120 x 2160"> <span class="ml-10">5120 x 2160 (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_resolution(this.id);"
                                                    class="option-input checkbox resolution" name="filter['resolution']"
                                                    value="7680 x 4320"> <span class="ml-10">7680 x 4320 (1)
                                                </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading4">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion4" href="#collapse4"
                                            aria-expanded="false" aria-controls="collapse1"> Aspect Ratio </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="12:5"> <span
                                                    class="ml-10">12:5 (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="16:10"> <span
                                                    class="ml-10">16:10 (37) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="16:5"> <span
                                                    class="ml-10">16:5 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="16:9"> <span
                                                    class="ml-10">16:9 (642) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="21:9"> <span
                                                    class="ml-10">21:9 (75) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="32:10"> <span
                                                    class="ml-10">32:10 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="32:9"> <span
                                                    class="ml-10">32:9 (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="4:3"> <span
                                                    class="ml-10">4:3 (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_aspect_ratio(this.id);"
                                                    class="option-input checkbox aspect_ratio"
                                                    name="filter['aspect_ratio']" value="5:4"> <span
                                                    class="ml-10">5:4 (31) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function f_aspect_ratio(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("aspect_ratio");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_aspect_ratio")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_aspect_ratio");
                                            } else {
                                                tr[i].classList.remove("c_aspect_ratio");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_aspect_ratio")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_aspect_ratio");
                                                } else {
                                                    tr[i].classList.add("c_aspect_ratio");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_aspect_ratio")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_aspect_ratio");
                                                } else {
                                                    tr[i].classList.remove("c_aspect_ratio");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        </script>
                        <div class="card-group" id="accordion5" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading5">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion5" href="#collapse5"
                                            aria-expanded="false" aria-controls="collapse1"> Response Time </a> </h4>
                                </div>
                                <div id="collapse5" class="collapse " role="tabpanel" aria-labelledby="heading5">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="0.1 ms"> <span
                                                    class="ml-10">0.1 ms (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="0.4 ms"> <span
                                                    class="ml-10">0.4 ms (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="0.5 ms"> <span
                                                    class="ml-10">0.5 ms (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="1 ms"> <span
                                                    class="ml-10">1 ms (190) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="12 ms"> <span
                                                    class="ml-10">12 ms (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="12.5 ms"> <span
                                                    class="ml-10">12.5 ms (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="14 ms"> <span
                                                    class="ml-10">14 ms (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="16 ms"> <span
                                                    class="ml-10">16 ms (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="2 ms"> <span
                                                    class="ml-10">2 ms (18) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="2.5 ms"> <span
                                                    class="ml-10">2.5 ms (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="3 ms"> <span
                                                    class="ml-10">3 ms (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="3.5 ms"> <span
                                                    class="ml-10">3.5 ms (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="4 ms"> <span
                                                    class="ml-10">4 ms (143) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="5 ms"> <span
                                                    class="ml-10">5 ms (315) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="5.4 ms"> <span
                                                    class="ml-10">5.4 ms (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="5.5 ms"> <span
                                                    class="ml-10">5.5 ms (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="6 ms"> <span
                                                    class="ml-10">6 ms (42) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="6.5 ms"> <span
                                                    class="ml-10">6.5 ms (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="7 ms"> <span
                                                    class="ml-10">7 ms (21) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="8 ms"> <span
                                                    class="ml-10">8 ms (39) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_response_time(this.id);"
                                                    class="option-input checkbox response_time"
                                                    name="filter['response_time']" value="9 ms"> <span
                                                    class="ml-10">9 ms (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function f_response_time(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("response_time");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_response_time")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_response_time");
                                            } else {
                                                tr[i].classList.remove("c_response_time");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_response_time")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_response_time");
                                                } else {
                                                    tr[i].classList.add("c_response_time");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_response_time")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_response_time");
                                                } else {
                                                    tr[i].classList.remove("c_response_time");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        </script>
                        <div class="card-group" id="accordion6" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading6">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion6" href="#collapse6"
                                            aria-expanded="false" aria-controls="collapse1"> Refresh Rate </a> </h4>
                                </div>
                                <div id="collapse6" class="collapse " role="tabpanel" aria-labelledby="heading6">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="100 Hz"> <span
                                                    class="ml-10">100 Hz (19) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="120 Hz"> <span
                                                    class="ml-10">120 Hz (15) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="144 Hz"> <span
                                                    class="ml-10">144 Hz (133) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="155 Hz"> <span
                                                    class="ml-10">155 Hz (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="160 Hz"> <span
                                                    class="ml-10">160 Hz (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="165 Hz"> <span
                                                    class="ml-10">165 Hz (34) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="170 Hz"> <span
                                                    class="ml-10">170 Hz (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="180 Hz"> <span
                                                    class="ml-10">180 Hz (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="185 Hz"> <span
                                                    class="ml-10">185 Hz (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="200 Hz"> <span
                                                    class="ml-10">200 Hz (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="240 Hz"> <span
                                                    class="ml-10">240 Hz (30) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="280 Hz"> <span
                                                    class="ml-10">280 Hz (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="360 Hz"> <span
                                                    class="ml-10">360 Hz (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="60 Hz"> <span
                                                    class="ml-10">60 Hz (454) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="70 Hz"> <span
                                                    class="ml-10">70 Hz (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="75 Hz"> <span
                                                    class="ml-10">75 Hz (101) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="76 Hz"> <span
                                                    class="ml-10">76 Hz (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_refresh_rate(this.id);"
                                                    class="option-input checkbox refresh_rate"
                                                    name="filter['refresh_rate']" value="85 Hz"> <span
                                                    class="ml-10">85 Hz (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function f_refresh_rate(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("refresh_rate");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_refresh_rate")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_refresh_rate");
                                            } else {
                                                tr[i].classList.remove("c_refresh_rate");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_refresh_rate")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_refresh_rate");
                                                } else {
                                                    tr[i].classList.add("c_refresh_rate");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_refresh_rate")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_refresh_rate");
                                                } else {
                                                    tr[i].classList.remove("c_refresh_rate");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        </script>
                        <div class="card-group" id="accordion7" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading7">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion7" href="#collapse7"
                                            aria-expanded="false" aria-controls="collapse1"> Panel Type </a> </h4>
                                </div>
                                <div id="collapse7" class="collapse " role="tabpanel" aria-labelledby="heading7">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_panel_type(this.id);"
                                                    class="option-input checkbox panel_type" name="filter['panel_type']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_panel_type(this.id);"
                                                    class="option-input checkbox panel_type" name="filter['panel_type']"
                                                    value="AHVA"> <span class="ml-10">AHVA (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_panel_type(this.id);"
                                                    class="option-input checkbox panel_type" name="filter['panel_type']"
                                                    value="IPS"> <span class="ml-10">IPS (435) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_panel_type(this.id);"
                                                    class="option-input checkbox panel_type" name="filter['panel_type']"
                                                    value="OLED"> <span class="ml-10">OLED (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_panel_type(this.id);"
                                                    class="option-input checkbox panel_type" name="filter['panel_type']"
                                                    value="PLS"> <span class="ml-10">PLS (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_panel_type(this.id);"
                                                    class="option-input checkbox panel_type" name="filter['panel_type']"
                                                    value="PSL"> <span class="ml-10">PSL (10) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_panel_type(this.id);"
                                                    class="option-input checkbox panel_type" name="filter['panel_type']"
                                                    value="TN"> <span class="ml-10">TN (188) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_panel_type(this.id);"
                                                    class="option-input checkbox panel_type" name="filter['panel_type']"
                                                    value="VA"> <span class="ml-10">VA (170) </span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function f_panel_type(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("panel_type");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_panel_type")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_panel_type");
                                            } else {
                                                tr[i].classList.remove("c_panel_type");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_panel_type")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_panel_type");
                                                } else {
                                                    tr[i].classList.add("c_panel_type");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_panel_type")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_panel_type");
                                                } else {
                                                    tr[i].classList.remove("c_panel_type");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        </script>
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
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Monitor....."
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
                            @foreach ($monitors as $monitor)
                                <tr class="items" data-href="#">
                                    <td scope="row" class="component d-sm-none">
                                        <a href="index.html">#</a>
                                    </td>
                                    <td class="box">
                                        <div class="logo-name">
                                            <div class="item-logo">
                                                <?php $images = $monitor->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $monitor->name }}" alt="{{ $monitor->name }}">
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
                                                href="{{ route('monitor-details', ['id' => $monitor->id]) }}">{{ $monitor->name }}</a>
                                        </div>
                                        <span class="table_span">
                                            <div class="detail">
                                                <div class="detail__name">Brand:</div>
                                                <div class="detail__value f_brand"> {{$monitor->product->brand}} </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Model:</div>
                                                <div class="detail__value f_model">  {{$monitor->product->model}} </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Stock:</div>
                                                <div class="detail__value f_stock"> {{ $monitor->product->stock }} </div>
                                            </div>
                                        </span>
                                        {{-- <span class="table_span">

                                            <div class="detail">
                                                <div class="detail__name">Screen Size:</div>
                                                <div class="detail__value f_screen"> 24" </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Resolution:</div>
                                                <div class="detail__value f_resolution"> 1920 x 1080 </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Aspect Ratio:</div>
                                                <div class="detail__value f_aspect_ratio"> 16:9 </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Response Time:</div>
                                                <div class="detail__value f_response_time"> 1 ms </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Panel Type:</div>
                                                <div class="detail__value f_panel_type"> VA </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Refresh Rate:</div>
                                                <div class="detail__value f_refresh_rate"> 144 Hz </div>
                                            </div>
                                        </span> --}}

                                    </td>
                                    <td class="price">{{ $monitor->product->price }}</td>
                                    <td><a class="btn btn-primary component-btn"
                                            href="{{ route('monitor-details', ['id' => $monitor->id]) }}"
                                            target="_blank">View
                                            Details</a></td>
                                    <td class="remove"><a class="btn btn-danger component-add-btn" id="p_185"
                                            href="{{ route('add-monitor-to-system', ['monitor_id' => $monitor->id]) }}"><i
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
                        "@id": "https://pcbuilder.net/product/monitor/",
                        "name": "Monitor"
                    }
                }
            ]
        }
    </script>
    <script>
        function f_screen(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("screen");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_screen")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_screen");
                        } else {
                            tr[i].classList.remove("c_screen");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_screen")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_screen");
                            } else {
                                tr[i].classList.add("c_screen");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_screen")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_screen");
                            } else {
                                tr[i].classList.remove("c_screen");
                            }
                        }
                    }
                }
            }
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
        function f_aspect_ratio(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("aspect_ratio");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_aspect_ratio")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_aspect_ratio");
                        } else {
                            tr[i].classList.remove("c_aspect_ratio");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_aspect_ratio")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_aspect_ratio");
                            } else {
                                tr[i].classList.add("c_aspect_ratio");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_aspect_ratio")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_aspect_ratio");
                            } else {
                                tr[i].classList.remove("c_aspect_ratio");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_response_time(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("response_time");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_response_time")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_response_time");
                        } else {
                            tr[i].classList.remove("c_response_time");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_response_time")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_response_time");
                            } else {
                                tr[i].classList.add("c_response_time");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_response_time")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_response_time");
                            } else {
                                tr[i].classList.remove("c_response_time");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_refresh_rate(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("refresh_rate");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_refresh_rate")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_refresh_rate");
                        } else {
                            tr[i].classList.remove("c_refresh_rate");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_refresh_rate")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_refresh_rate");
                            } else {
                                tr[i].classList.add("c_refresh_rate");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_refresh_rate")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_refresh_rate");
                            } else {
                                tr[i].classList.remove("c_refresh_rate");
                            }
                        }
                    }
                }
            }
        }
    </script>
    <script>
        function f_panel_type(id) {

            /*
            $('html, body').animate({
                scrollTop: $("#myTable").offset().top - 100
            }, 2000);
            */

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementsByClassName("panel_type");
            input = input[id];
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (filter == 'ALL') {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_panel_type")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_panel_type");
                        } else {
                            tr[i].classList.remove("c_panel_type");
                        }
                    }
                }
            } else {
                filter = ' ' + filter + ' ';
                if (input.checked) {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_panel_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_panel_type");
                            } else {
                                tr[i].classList.add("c_panel_type");
                            }
                        }
                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            td = td.getElementsByClassName("f_panel_type")['0'];
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].classList.remove("c_panel_type");
                            } else {
                                tr[i].classList.remove("c_panel_type");
                            }
                        }
                    }
                }
            }
        }
    </script>

@endpush
