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
        <h1><span>Select</span> Your Processor</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('processor-list') }}">Processor</a>
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
                                                    name="filter['brand']" value="AMD"> <span class="ml-10">AMD
                                                    (43) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Intel"> <span class="ml-10">Intel
                                                    (121) </span></label> </div>
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
                                            aria-expanded="false" aria-controls="collapse1"> Socket </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="AM4"> <span class="ml-10">AM4 (33) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 1150"> <span class="ml-10">LGA 1150 (8)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 1151"> <span class="ml-10">LGA 1151 (55)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 1156"> <span class="ml-10">LGA 1156 (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 1200"> <span class="ml-10">LGA 1200 (31)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 2011"> <span class="ml-10">LGA 2011 (6)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="LGA 2066"> <span class="ml-10">LGA 2066 (20)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="sTR4"> <span class="ml-10">sTR4 (7) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_socket_type(this.id);"
                                                    class="option-input checkbox socket_type" name="filter['socket_type']"
                                                    value="sTRX4"> <span class="ml-10">sTRX4 (3) </span></label>
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
                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1"> Series </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="3"> <span class="ml-10">3 (7)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="5"> <span class="ml-10">5 (12)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="7"> <span class="ml-10">7 (9)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="9"> <span class="ml-10">9 (5)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="Threadripper"> <span
                                                    class="ml-10">Threadripper (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="i3"> <span class="ml-10">i3 (19)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="i5"> <span class="ml-10">i5 (36)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="i7"> <span class="ml-10">i7 (39)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_series(this.id);" class="option-input checkbox series"
                                                    name="filter['series']" value="i9"> <span class="ml-10">i9
                                                    (27) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_series {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_series(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("series");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_series")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_series");
                                            } else {
                                                tr[i].classList.remove("c_series");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_series")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_series");
                                                } else {
                                                    tr[i].classList.add("c_series");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_series")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_series");
                                                } else {
                                                    tr[i].classList.remove("c_series");
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
                                            aria-expanded="false" aria-controls="collapse1"> Cores </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="2"> <span class="ml-10">2 (9)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="4"> <span class="ml-10">4 (49)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="6"> <span class="ml-10">6 (38)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="8"> <span class="ml-10">8 (33)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="10"> <span class="ml-10">10 (10)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="12"> <span class="ml-10">12 (8)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="14"> <span class="ml-10">14 (3)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="16"> <span class="ml-10">16 (6)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="18"> <span class="ml-10">18 (3)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="24"> <span class="ml-10">24 (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="32"> <span class="ml-10">32 (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_cores(this.id);" class="option-input checkbox cores"
                                                    name="filter['cores']" value="64"> <span class="ml-10">64 (1)
                                                </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_cores {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_cores(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("cores");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_cores")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_cores");
                                            } else {
                                                tr[i].classList.remove("c_cores");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_cores")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_cores");
                                                } else {
                                                    tr[i].classList.add("c_cores");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_cores")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_cores");
                                                } else {
                                                    tr[i].classList.remove("c_cores");
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
                                            aria-expanded="false" aria-controls="collapse1"> Integrated Graphics </a> </h4>
                                </div>
                                <div id="collapse5" class="collapse " role="tabpanel" aria-labelledby="heading5">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value=" Intel UHD Graphics 750">
                                                <span class="ml-10"> Intel UHD Graphics 750 (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Intel HD Graphics 4600">
                                                <span class="ml-10">Intel HD Graphics 4600 (7) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']"
                                                    value="Intel Iris Pro Graphics 6200"> <span
                                                    class="ml-10">Intel Iris Pro Graphics 6200 (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Intel UHD Graphics 630">
                                                <span class="ml-10">Intel UHD Graphics 630 (32) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Intel UHD Graphics 730">
                                                <span class="ml-10">Intel UHD Graphics 730 (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Intel UHD Graphics 750">
                                                <span class="ml-10">Intel UHD Graphics 750 (5) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Intel HD Graphics 510">
                                                <span class="ml-10">Intel HD Graphics 510 (3) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Intel HD Graphics 530">
                                                <span class="ml-10">Intel HD Graphics 530 (9) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Intel HD Graphics 630">
                                                <span class="ml-10">Intel HD Graphics 630 (13) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="None"> <span
                                                    class="ml-10">None (88) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Radeon RX Vega 11"> <span
                                                    class="ml-10">Radeon RX Vega 11 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_integrated_graphics(this.id);"
                                                    class="option-input checkbox integrated_graphics"
                                                    name="filter['integrated_graphics']" value="Radeon Vega 8"> <span
                                                    class="ml-10">Radeon Vega 8 (2) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_integrated_graphics {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_integrated_graphics(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("integrated_graphics");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_integrated_graphics")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_integrated_graphics");
                                            } else {
                                                tr[i].classList.remove("c_integrated_graphics");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_integrated_graphics")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_integrated_graphics");
                                                } else {
                                                    tr[i].classList.add("c_integrated_graphics");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_integrated_graphics")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_integrated_graphics");
                                                } else {
                                                    tr[i].classList.remove("c_integrated_graphics");
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
                                            aria-expanded="false" aria-controls="collapse1"> Unlocked </a> </h4>
                                </div>
                                <div id="collapse6" class="collapse " role="tabpanel" aria-labelledby="heading6">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_unlocked(this.id);" class="option-input checkbox unlocked"
                                                    name="filter['unlocked']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_unlocked(this.id);" class="option-input checkbox unlocked"
                                                    name="filter['unlocked']" value="No"> <span class="ml-10">No
                                                    (41) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_unlocked(this.id);" class="option-input checkbox unlocked"
                                                    name="filter['unlocked']" value="Yes"> <span class="ml-10">Yes
                                                    (123) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_unlocked {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_unlocked(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("unlocked");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_unlocked")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_unlocked");
                                            } else {
                                                tr[i].classList.remove("c_unlocked");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_unlocked")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_unlocked");
                                                } else {
                                                    tr[i].classList.add("c_unlocked");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_unlocked")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_unlocked");
                                                } else {
                                                    tr[i].classList.remove("c_unlocked");
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
                                            aria-expanded="false" aria-controls="collapse1"> Micro Architecture </a> </h4>
                                </div>
                                <div id="collapse7" class="collapse " role="tabpanel" aria-labelledby="heading7">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Broadwell"> <span
                                                    class="ml-10">Broadwell (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Coffee Lake"> <span
                                                    class="ml-10">Coffee Lake (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Coffee Lake Refresh"> <span
                                                    class="ml-10">Coffee Lake Refresh (18) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Comet Lake"> <span
                                                    class="ml-10">Comet Lake (23) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Haswell"> <span
                                                    class="ml-10">Haswell (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Kaby Lake"> <span
                                                    class="ml-10">Kaby Lake (15) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Rocket Lake"> <span
                                                    class="ml-10">Rocket Lake (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Skylake"> <span
                                                    class="ml-10">Skylake (28) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Zen"> <span
                                                    class="ml-10">Zen (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Zen 2"> <span
                                                    class="ml-10">Zen 2 (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Zen 3"> <span
                                                    class="ml-10">Zen 3 (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_micro_architecture(this.id);"
                                                    class="option-input checkbox micro_architecture"
                                                    name="filter['micro_architecture']" value="Zen+"> <span
                                                    class="ml-10">Zen+ (11) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_micro_architecture {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_micro_architecture(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("micro_architecture");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_micro_architecture")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_micro_architecture");
                                            } else {
                                                tr[i].classList.remove("c_micro_architecture");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_micro_architecture")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_micro_architecture");
                                                } else {
                                                    tr[i].classList.add("c_micro_architecture");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_micro_architecture")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_micro_architecture");
                                                } else {
                                                    tr[i].classList.remove("c_micro_architecture");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        </script>
                        <div class="card-group" id="accordion8" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading8">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion8" href="#collapse8"
                                            aria-expanded="false" aria-controls="collapse1"> Core Family </a> </h4>
                                </div>
                                <div id="collapse8" class="collapse " role="tabpanel" aria-labelledby="heading8">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="All" checked> <span class="ml-10">All </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Broadwell"> <span class="ml-10">Broadwell (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Broadwell-E"> <span class="ml-10">Broadwell-E (4)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Castle Peak"> <span class="ml-10">Castle Peak (3)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Coffee Lake"> <span class="ml-10">Coffee Lake (11)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Coffee Lake Refresh"> <span class="ml-10">Coffee Lake
                                                    Refresh (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Colfax"> <span class="ml-10">Colfax (4) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Comet Lake"> <span class="ml-10">Comet Lake (23)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Haswell-E"> <span class="ml-10">Haswell-E (9)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Kaby Lake"> <span class="ml-10">Kaby Lake (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Kaby Lake-S"> <span class="ml-10">Kaby Lake-S (12)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Kaby Lake-X"> <span class="ml-10">Kaby Lake-X (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Matisse"> <span class="ml-10">Matisse (11)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Picasso"> <span class="ml-10">Picasso (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Pinnacle Ridge"> <span class="ml-10">Pinnacle Ridge (5)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Raven Ridge"> <span class="ml-10">Raven Ridge (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Rocket Lake"> <span class="ml-10">Rocket Lake (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Rocket Lake-S"> <span class="ml-10">Rocket Lake-S (11)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Skylake"> <span class="ml-10">Skylake (5)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Skylake-S"> <span class="ml-10">Skylake-S (9)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Skylake-X"> <span class="ml-10">Skylake-X (14)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Summit Ridge"> <span class="ml-10">Summit Ridge (9)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Vermeer"> <span class="ml-10">Vermeer (4)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_core_family(this.id);"
                                                    class="option-input checkbox core_family" name="filter['core_family']"
                                                    value="Whitehaven"> <span class="ml-10">Whitehaven (3)
                                                </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_core_family {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_core_family(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("core_family");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_core_family")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_core_family");
                                            } else {
                                                tr[i].classList.remove("c_core_family");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_core_family")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_core_family");
                                                } else {
                                                    tr[i].classList.add("c_core_family");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_core_family")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_core_family");
                                                } else {
                                                    tr[i].classList.remove("c_core_family");
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
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Processor....."
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
                                            data-src="https://m.media-amazon.com/images/I/41cAAdXKoeL._SL75_.jpg"
                                            title="AMD Ryzen Threadripper 3990X, 64 Cores & 128-Threads Unlocked Desktop Processor without Cooler"
                                            alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 3990X">
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
                                        href="{{route('processor-details')}}">AMD
                                        Ryzen Threadripper 3990X, 64 Cores & 128-Threads Unlocked Desktop Processor
                                        without Cooler</a></div>
                                <span class="table_span">
                                    <div class="detail">
                                        <div class="detail__name">Brand:</div>
                                        <div class="detail__value f_brand"> AMD </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Model:</div>
                                        <div class="detail__value f_model"> Ryzen Threadripper 3990X </div>
                                    </div>
                                </span>
                                <span class="table_span">

                                    <div class="detail">
                                        <div class="detail__name">Cores:</div>
                                        <div class="detail__value f_cores"> 64 </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Threads:</div>
                                        <div class="detail__value f_threads"> 128 </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Socket Type:</div>
                                        <div class="detail__value f_socket_type"> sTRX4 </div>
                                    </div>
                                </span><span class="table_span">
                                    <div class="detail">
                                        <div class="detail__name">Base Speed:</div>
                                        <div class="detail__value f_maximum_speed"> 2.9 GHz </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Turbo Speed:</div>
                                        <div class="detail__value f_maximum_speed"> 4.3 GHz </div>
                                    </div>
                                </span><span class="table_span view-more-6" style="display: none;">
                                    <div class="detail">
                                        <div class="detail__name">Architechture:</div>
                                        <div class="detail__value f_micro_architecture"> Zen 2 </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Core Family:</div>
                                        <div class="detail__value f_core_family"> Castle Peak </div>
                                    </div>
                                </span><span class="table_span view-more-6" style="display: none;">
                                    <div class="detail">
                                        <div class="detail__name">Integrated Graphics:</div>
                                        <div class="detail__value f_integrated_graphics"> None </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Memory Type:</div>
                                        <div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div>
                                    </div>
                                </span><span style="display: none;">
                                    <div class="detail">
                                        <div class="detail__name">Series:</div>
                                        <div class="detail__value f_series"> Threadripper </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Generation:</div>
                                        <div class="detail__value f_generation"> 3 </div>
                                    </div>
                                </span>

                                <span class="view-more">
                                    <div class="view-More6" onclick="viewMore(6);"><span
                                            class="viewMore6">View More Details</span> <i
                                            class="fas fa-chevron-circle-down"></i></div>
                                </span>
                                <div id="content" class="d-none">
                                    <div>
                                        <div class="circle green">100</div>
                                        <p>PCB Benchmark
                                        <p>
                                    </div>6499.77<div>
                                        <div class="circle red">%</div>
                                        <p>Value for Money
                                        <p>
                                    </div>
                                </div>
                            </td>
                            <td class="price">
                                $6,499.77 </td>
                            <td><a class="btn btn-primary component-btn"
                                    href="https://amazon.com/dp/B0815SBQ9W?tag=pcbuilder00-20" target="_blank"><i
                                        class="fab fa-amazon"></i> View on Amazon</a></td>
                            <td class="remove"><a class="btn btn-danger component-add-btn" id="p_6"
                                    href="javascript:void(0);" onclick="setid(6)"><i class="fa fa-plus"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@endsection
