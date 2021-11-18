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
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h1><span>Select</span> Your Motherboard</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('motherboard-list') }}">Motherboard</a>
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
                                                    name="filter['brand']" value="ASRock"> <span
                                                    class="ml-10">ASRock (105) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ASRock Rack"> <span
                                                    class="ml-10">ASRock Rack (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ASUS"> <span class="ml-10">ASUS
                                                    (132) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Biostar"> <span
                                                    class="ml-10">Biostar (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ECS Elitegroup"> <span
                                                    class="ml-10">ECS Elitegroup (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="EVGA"> <span class="ml-10">EVGA
                                                    (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Gigabyte"> <span
                                                    class="ml-10">Gigabyte (105) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="MSI"> <span class="ml-10">MSI
                                                    (85) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="NZXT"> <span class="ml-10">NZXT
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Supermicro"> <span
                                                    class="ml-10">Supermicro (3) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_brand {
                                display: none !important;
                            }

                        </style>
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
                                            aria-expanded="false" aria-controls="collapse1"> Chipset </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD 760G"> <span
                                                    class="ml-10">AMD 760G (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD 880G"> <span
                                                    class="ml-10">AMD 880G (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD 970"> <span
                                                    class="ml-10">AMD 970 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD A320"> <span
                                                    class="ml-10">AMD A320 (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD A520"> <span
                                                    class="ml-10">AMD A520 (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD A78"> <span
                                                    class="ml-10">AMD A78 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD B350"> <span
                                                    class="ml-10">AMD B350 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD B450"> <span
                                                    class="ml-10">AMD B450 (39) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD B550"> <span
                                                    class="ml-10">AMD B550 (51) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD TRX40"> <span
                                                    class="ml-10">AMD TRX40 (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD X370"> <span
                                                    class="ml-10">AMD X370 (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD X399"> <span
                                                    class="ml-10">AMD X399 (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD X470"> <span
                                                    class="ml-10">AMD X470 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="AMD X570"> <span
                                                    class="ml-10">AMD X570 (40) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel B360"> <span
                                                    class="ml-10">Intel B360 (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel B365"> <span
                                                    class="ml-10">Intel B365 (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel B460"> <span
                                                    class="ml-10">Intel B460 (27) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel B560"> <span
                                                    class="ml-10">Intel B560 (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel B85"> <span
                                                    class="ml-10">Intel B85 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel H110"> <span
                                                    class="ml-10">Intel H110 (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel H310"> <span
                                                    class="ml-10">Intel H310 (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel H370"> <span
                                                    class="ml-10">Intel H370 (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel H410"> <span
                                                    class="ml-10">Intel H410 (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel H470"> <span
                                                    class="ml-10">Intel H470 (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel H510"> <span
                                                    class="ml-10">Intel H510 (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel H570"> <span
                                                    class="ml-10">Intel H570 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel Q370"> <span
                                                    class="ml-10">Intel Q370 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel Q470"> <span
                                                    class="ml-10">Intel Q470 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel X299"> <span
                                                    class="ml-10">Intel X299 (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel X99"> <span
                                                    class="ml-10">Intel X99 (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel Z270"> <span
                                                    class="ml-10">Intel Z270 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel Z370"> <span
                                                    class="ml-10">Intel Z370 (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel Z390"> <span
                                                    class="ml-10">Intel Z390 (28) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel Z490"> <span
                                                    class="ml-10">Intel Z490 (51) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Intel Z590"> <span
                                                    class="ml-10">Intel Z590 (23) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_chipset {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_chipset(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("chipset");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_chipset")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_chipset");
                                            } else {
                                                tr[i].classList.remove("c_chipset");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_chipset")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_chipset");
                                                } else {
                                                    tr[i].classList.add("c_chipset");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_chipset")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_chipset");
                                                } else {
                                                    tr[i].classList.remove("c_chipset");
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
                                            aria-expanded="false" aria-controls="collapse1"> Socket Type </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="AM3"> <span class="ml-10">AM3 (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="AM3+"> <span class="ml-10">AM3+ (6) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="AM4"> <span class="ml-10">AM4 (162) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 1150"> <span class="ml-10">LGA 1150 (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 1151"> <span class="ml-10">LGA 1151 (97)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 1200"> <span class="ml-10">LGA 1200 (137)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 2011"> <span class="ml-10">LGA 2011 (4)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 2066"> <span class="ml-10">LGA 2066 (11)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="sTR4"> <span class="ml-10">sTR4 (9) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="sTRX4"> <span class="ml-10">sTRX4 (13) </span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_socket_type {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_socket_type(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("socket_type");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_socket_type")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_socket_type");
                                            } else {
                                                tr[i].classList.remove("c_socket_type");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_socket_type")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_socket_type");
                                                } else {
                                                    tr[i].classList.add("c_socket_type");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_socket_type")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_socket_type");
                                                } else {
                                                    tr[i].classList.remove("c_socket_type");
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
                                                    value="ATX"> <span class="ml-10">ATX (239) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="Extended ATX"> <span class="ml-10">Extended ATX (24)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="Micro ATX"> <span class="ml-10">Micro ATX (141)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="Mini ITX"> <span class="ml-10">Mini ITX (39)
                                                </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_form_factor {
                                display: none !important;
                            }

                        </style>
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
                        <div class="card-group" id="accordion5" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading5">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion5" href="#collapse5"
                                            aria-expanded="false" aria-controls="collapse1"> Memory Slots </a> </h4>
                                </div>
                                <div id="collapse5" class="collapse " role="tabpanel" aria-labelledby="heading5">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="2"> <span class="ml-10">2
                                                    (94) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="4"> <span class="ml-10">4
                                                    (315) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_ram_quantity(this.id);"
                                                    class="option-input checkbox ram_quantity"
                                                    name="filter['ram_quantity']" value="8"> <span class="ml-10">8
                                                    (34) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_ram_quantity {
                                display: none !important;
                            }

                        </style>
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
                        <div class="card-group" id="accordion6" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading6">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion6" href="#collapse6"
                                            aria-expanded="false" aria-controls="collapse1"> Max Memory Support </a> </h4>
                                </div>
                                <div id="collapse6" class="collapse " role="tabpanel" aria-labelledby="heading6">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_max_memory_support(this.id);"
                                                    class="option-input checkbox max_memory_support"
                                                    name="filter['max_memory_support']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_max_memory_support(this.id);"
                                                    class="option-input checkbox max_memory_support"
                                                    name="filter['max_memory_support']" value="128 GB"> <span
                                                    class="ml-10">128 GB (230) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_max_memory_support(this.id);"
                                                    class="option-input checkbox max_memory_support"
                                                    name="filter['max_memory_support']" value="16 GB"> <span
                                                    class="ml-10">16 GB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_max_memory_support(this.id);"
                                                    class="option-input checkbox max_memory_support"
                                                    name="filter['max_memory_support']" value="256 GB"> <span
                                                    class="ml-10">256 GB (19) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_max_memory_support(this.id);"
                                                    class="option-input checkbox max_memory_support"
                                                    name="filter['max_memory_support']" value="32 GB"> <span
                                                    class="ml-10">32 GB (41) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_max_memory_support(this.id);"
                                                    class="option-input checkbox max_memory_support"
                                                    name="filter['max_memory_support']" value="64 GB"> <span
                                                    class="ml-10">64 GB (149) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_max_memory_support(this.id);"
                                                    class="option-input checkbox max_memory_support"
                                                    name="filter['max_memory_support']" value="8 GB"> <span
                                                    class="ml-10">8 GB (2) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_max_memory_support {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_max_memory_support(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("max_memory_support");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_max_memory_support")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_max_memory_support");
                                            } else {
                                                tr[i].classList.remove("c_max_memory_support");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_max_memory_support")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_max_memory_support");
                                                } else {
                                                    tr[i].classList.add("c_max_memory_support");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_max_memory_support")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_max_memory_support");
                                                } else {
                                                    tr[i].classList.remove("c_max_memory_support");
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
                                <div class="link px-2">https://pcbuilder.net/rigs/cjT2wn/</div>
                                <i class="fa fa-clone pl-2" aria-hidden="true"></i>
                            </div>
                            <div class="action-box">
                                <div class="action-box-item search"> Search: </div>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Motherboard....."
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
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51GC1-pJzWL._SL75_.jpg"
                                                title="ASRock MB TRX40 Creator AMD Ryzen Threadripper sTRX4 TRX40 Max256GB DR4 ATX"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ASRock TRX40 CREATOR">
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
                                            href="../../component-details/motherboard/asrock-trx40-creator/index.html">ASRock
                                            MB TRX40 Creator AMD Ryzen Threadripper sTRX4 TRX40 Max256GB DR4 ATX</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ASRock </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TRX40 CREATOR </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Chipset:</div>
                                            <div class="detail__value f_chipset"> AMD X570 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Form Factor:</div>
                                            <div class="detail__value f_form_factor"> ATX </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Socket Type:</div>
                                            <div class="detail__value f_socket_type"> sTRX4 </div>
                                        </div>
                                    </span><span class="table_span view-more-184" style="display: none;">
                                        <div class="detail">
                                            <div class="detail__name">Memory Slots:</div>
                                            <div class="detail__value f_ram_quantity"> 8 Slots </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Max Memory Support:</div>
                                            <div class="detail__value f_max_memory_support"> 256 GB </div>
                                        </div>
                                    </span>

                                    <span class="view-more">
                                        <div class="view-More184" onclick="viewMore(184);"><span
                                                class="viewMore184">View More Details</span> <i
                                                class="fas fa-chevron-circle-down"></i></div>
                                    </span>
                                </td>
                                <td class="price">
                                    $786.86 (Used) </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B081JX35ZK?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_184"
                                        href="javascript:void(0);" onclick="setid(184)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr> 
                        </tbody>
                        
                    </table>
                </div>
            </div>
    </section>
@endsection
