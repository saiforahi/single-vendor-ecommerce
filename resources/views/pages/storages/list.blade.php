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
        }
    </style>
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
@endpush
@section('content')
    <section class="pcb-breadcrumb">
        <h1><span>Select</span> Your Storage</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('home') }}">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('storage-list') }}">Storage</a>
        </span>
    </section>
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
                                            aria-expanded="true" aria-controls="collapse1">
                                            Manufacturer </a> </h4>
                                </div>
                                <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_brand(0);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="All" checked disabled> <span
                                                    class="ml-10">All </span></label> </div>
                                        @foreach ($brands as $brand)
                                            <div class="checkbox"> <label> <input id="{{$loop->index+1}}" type="checkbox"
                                                        onclick="f_brand({{$loop->index+1}});" class="option-input checkbox brand"
                                                        name="filter['brand']" value="{{$brand->brand}}">
                                                    <span class="ml-10">{{$brand->brand}} ({{ \App\Models\Storage::where('brand', $brand->brand)->count() }})
                                                    </span></label>
                                            </div>
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
                                            aria-expanded="false" aria-controls="collapse1">
                                            Storage Type </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="All" checked>
                                                <span class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="HDD"> <span class="ml-10">HDD (503) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="SDD"> <span class="ml-10">SDD (504) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="SSD"> <span class="ml-10">SSD (226) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_storage_type(this.id);"
                                                    class="option-input checkbox storage_type" name="filter['storage_type']"
                                                    value="SSHD"> <span class="ml-10">SSHD (3) </span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_storage_type {
                                display: none !important;
                            }

                        </style>
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
                        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading3">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion3" href="#collapse3"
                                            aria-expanded="false" aria-controls="collapse1">
                                            Capacity </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1.0 TB"> <span
                                                    class="ml-10">1.0 TB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1.2 TB"> <span
                                                    class="ml-10">1.2 TB (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1.5 TB"> <span
                                                    class="ml-10">1.5 TB (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1.55 TB"> <span
                                                    class="ml-10">1.55 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1.6 TB"> <span
                                                    class="ml-10">1.6 TB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1.8 TB"> <span
                                                    class="ml-10">1.8 TB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1.92 TB"> <span
                                                    class="ml-10">1.92 TB (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="10 TB"> <span class="ml-10">10
                                                    TB (23) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="100 GB"> <span
                                                    class="ml-10">100 GB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="12 TB"> <span class="ml-10">12
                                                    TB (15) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="120 GB"> <span
                                                    class="ml-10">120 GB (41) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="128 GB"> <span
                                                    class="ml-10">128 GB (31) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="14 TB"> <span class="ml-10">14
                                                    TB (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="146 GB"> <span
                                                    class="ml-10">146 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="15.3 TB"> <span
                                                    class="ml-10">15.3 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="15.36 TB"> <span
                                                    class="ml-10">15.36 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="150 GB"> <span
                                                    class="ml-10">150 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="16 GB"> <span
                                                    class="ml-10">16 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="16 TB"> <span
                                                    class="ml-10">16 TB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="160 GB"> <span
                                                    class="ml-10">160 GB (20) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="18 TB"> <span
                                                    class="ml-10">18 TB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="180 GB"> <span
                                                    class="ml-10">180 GB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="1 TB"> <span
                                                    class="ml-10">1 TB (205) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="2 TB"> <span class="ml-10">2
                                                    TB (131) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="2.0 TB"> <span
                                                    class="ml-10">2.0 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="2.4 TB"> <span
                                                    class="ml-10">2.4 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="200 GB"> <span
                                                    class="ml-10">200 GB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="240 GB"> <span
                                                    class="ml-10">240 GB (61) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="250 GB"> <span
                                                    class="ml-10">250 GB (56) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="256 GB"> <span
                                                    class="ml-10">256 GB (57) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="3 TB"> <span class="ml-10">3
                                                    TB (22) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="3.0 TB"> <span
                                                    class="ml-10">3.0 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="3.84 TB"> <span
                                                    class="ml-10">3.84 TB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="300 GB"> <span
                                                    class="ml-10">300 GB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="32 GB"> <span
                                                    class="ml-10">32 GB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="320 GB"> <span
                                                    class="ml-10">320 GB (24) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="4 TB"> <span class="ml-10">4
                                                    TB (59) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="4.0 TB"> <span
                                                    class="ml-10">4.0 TB (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="40 GB"> <span
                                                    class="ml-10">40 GB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="400 GB"> <span
                                                    class="ml-10">400 GB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="450 GB"> <span
                                                    class="ml-10">450 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="460 GB"> <span
                                                    class="ml-10">460 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="43" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="480 GB"> <span
                                                    class="ml-10">480 GB (53) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="44" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="4TB"> <span class="ml-10">4TB
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="45" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="5 TB"> <span class="ml-10">5
                                                    TB (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="46" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="500 GB"> <span
                                                    class="ml-10">500 GB (102) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="47" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="512 GB"> <span
                                                    class="ml-10">512 GB (67) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="48" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="512.00 GB"> <span
                                                    class="ml-10">512.00 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="49" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="525 GB"> <span
                                                    class="ml-10">525 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="50" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="6 TB"> <span class="ml-10">6
                                                    TB (34) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="51" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="60 GB"> <span
                                                    class="ml-10">60 GB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="52" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="600 GB"> <span
                                                    class="ml-10">600 GB (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="53" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="64 GB"> <span
                                                    class="ml-10">64 GB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="54" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="640 GB"> <span
                                                    class="ml-10">640 GB (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="55" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="7.68 TB"> <span
                                                    class="ml-10">7.68 TB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="56" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="750 GB"> <span
                                                    class="ml-10">750 GB (18) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="57" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="8 TB"> <span class="ml-10">8
                                                    TB (37) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="58" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="80 GB"> <span
                                                    class="ml-10">80 GB (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="59" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="800 GB"> <span
                                                    class="ml-10">800 GB (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="60" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="900 GB"> <span
                                                    class="ml-10">900 GB (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="61" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="960 GB"> <span
                                                    class="ml-10">960 GB (31) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="62" type="checkbox"
                                                    onclick="f_capacity(this.id);" class="option-input checkbox capacity"
                                                    name="filter['capacity']" value="M.2-2280"> <span
                                                    class="ml-10">M.2-2280 (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_capacity {
                                display: none !important;
                            }

                        </style>
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
                        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading4">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion4" href="#collapse4"
                                            aria-expanded="false" aria-controls="collapse1"> Form
                                            Factor </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="All" checked>
                                                <span class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="2.5&quot;">
                                                <span class="ml-10">2.5" (504) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="3.5&quot;">
                                                <span class="ml-10">3.5" (384) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="M.2"> <span class="ml-10">M.2 (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="M.2 2280"> <span class="ml-10">M.2 2280 (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="M.2-22110">
                                                <span class="ml-10">M.2-22110 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="M.2-2242"> <span class="ml-10">M.2-2242 (6)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="M.2-2260"> <span class="ml-10">M.2-2260 (6)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="M.2-2280"> <span class="ml-10">M.2-2280 (330)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_form_factor(this.id);"
                                                    class="option-input checkbox form_factor" name="filter['form_factor']"
                                                    value="PCI-E"> <span class="ml-10">PCI-E (2) </span></label>
                                        </div>
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
                                            aria-expanded="false" aria-controls="collapse1"> RPM
                                        </a> </h4>
                                </div>
                                <div id="collapse5" class="collapse " role="tabpanel" aria-labelledby="heading5">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="10000 RPM"> <span
                                                    class="ml-10">10000 RPM (15) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="10500 RPM"> <span
                                                    class="ml-10">10500 RPM (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="10520 RPM"> <span
                                                    class="ml-10">10520 RPM (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="15000 RPM"> <span
                                                    class="ml-10">15000 RPM (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="52000 RPM"> <span
                                                    class="ml-10">52000 RPM (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="5400 RPM"> <span
                                                    class="ml-10">5400 RPM (139) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="5400RPM"> <span
                                                    class="ml-10">5400RPM (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="5760 RPM"> <span
                                                    class="ml-10">5760 RPM (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="5900 RPM"> <span
                                                    class="ml-10">5900 RPM (22) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_rpm(this.id);" class="option-input checkbox rpm"
                                                    name="filter['rpm']" value="7200 RPM"> <span
                                                    class="ml-10">7200 RPM (317) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_rpm {
                                display: none !important;
                            }

                        </style>
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
                        <div class="card-group" id="accordion6" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading6">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion6" href="#collapse6"
                                            aria-expanded="false" aria-controls="collapse1">
                                            Interface </a> </h4>
                                </div>
                                <div id="collapse6" class="collapse " role="tabpanel" aria-labelledby="heading6">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="M.2"> <span
                                                    class="ml-10">M.2 (237) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="M.2 (B+M)"> <span
                                                    class="ml-10">M.2 (B+M) (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="M.2 (M)"> <span
                                                    class="ml-10">M.2 (M) (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe 3.0 x4"> <span
                                                    class="ml-10">PCIe 3.0 x4 (50) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe 3.1 x4"> <span
                                                    class="ml-10">PCIe 3.1 x4 (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe 4.0 x4"> <span
                                                    class="ml-10">PCIe 4.0 x4 (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe x4"> <span
                                                    class="ml-10">PCIe x4 (25) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SAS 12 Gb/s"> <span
                                                    class="ml-10">SAS 12 Gb/s (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SAS 3 Gb/s"> <span
                                                    class="ml-10">SAS 3 Gb/s (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SAS 6 Gb/s"> <span
                                                    class="ml-10">SAS 6 Gb/s (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA 1.5 Gb/s">
                                                <span class="ml-10">SATA 1.5 Gb/s (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA 12 Gb/s"> <span
                                                    class="ml-10">SATA 12 Gb/s (18) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA 3 Gb/s"> <span
                                                    class="ml-10">SATA 3 Gb/s (35) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA 6 Gb/s"> <span
                                                    class="ml-10">SATA 6 Gb/s (659) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA III (6 Gb/s)">
                                                <span class="ml-10">SATA III (6 Gb/s) (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA III 6 Gb/s">
                                                <span class="ml-10">SATA III 6 Gb/s (40) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="SATA III Gb/s">
                                                <span class="ml-10">SATA III Gb/s (138) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_interface {
                                display: none !important;
                            }

                        </style>
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
                        <div class="card-group" id="accordion7" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading7">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion7" href="#collapse7"
                                            aria-expanded="false" aria-controls="collapse1"> Cache
                                            Memory </a> </h4>
                                </div>
                                <div id="collapse7" class="collapse " role="tabpanel" aria-labelledby="heading7">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="All" checked>
                                                <span class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="1024 MB">
                                                <span class="ml-10">1024 MB (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="128 MB"> <span
                                                    class="ml-10">128 MB (73) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="131072 MB">
                                                <span class="ml-10">131072 MB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="16 MB"> <span
                                                    class="ml-10">16 MB (71) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="2 MB"> <span
                                                    class="ml-10">2 MB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="2048 MB">
                                                <span class="ml-10">2048 MB (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="24576 MB">
                                                <span class="ml-10">24576 MB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="256 MB"> <span
                                                    class="ml-10">256 MB (116) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="28 GB"> <span
                                                    class="ml-10">28 GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="32 MB"> <span
                                                    class="ml-10">32 MB (55) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="4096 MB">
                                                <span class="ml-10">4096 MB (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="512 MB"> <span
                                                    class="ml-10">512 MB (28) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="64 MB"> <span
                                                    class="ml-10">64 MB (114) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="8 MB"> <span
                                                    class="ml-10">8 MB (64) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_cache_memory(this.id);"
                                                    class="option-input checkbox cache_memory"
                                                    name="filter['cache_memory']" value="8192 MB">
                                                <span class="ml-10">8192 MB (3) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_cache_memory {
                                display: none !important;
                            }

                        </style>
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
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Storage....."
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
                            @foreach ($storages as $storage)
                                <tr class="items" data-href="#">
                                    <td scope="row" class="component d-sm-none">
                                        <a href="index.html">#</a>
                                    </td>
                                    <td class="box">
                                        <div class="logo-name">
                                            <div class="item-logo">
                                                <?php $images = $storage->getMedia('main_image'); ?>
                                                <img src="{{ $images[0]->getUrl('main_image') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ $images[0]->getUrl('main_image') }}"
                                                    title="{{ $storage->name }}" alt="{{ $storage->name }}">
                                                {{-- <div class="stars-rating" title="4.9 out of 5">
                                                <div class="stars-score" style="width: 98%">
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
                                            </div> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="comp-details">
                                        <div class="table_title"><a
                                                href="{{ route('storage-details', ['id' => $storage->id]) }}">{{ $storage->name }}</a>
                                        </div>
                                        <span class="table_span">
                                            <div class="detail">
                                                <div class="detail__name">Brand:</div>
                                                <div class="detail__value f_brand">{{ $storage->brand }}</div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Model:</div>
                                                <div class="detail__value f_model">{{ $storage->model }}</div>
                                            </div>
                                        </span>
                                        <span class="table_span">

                                            <div class="detail">
                                                <div class="detail__name">Capacity:</div>
                                                <div class="detail__value f_capacity"> 1 TB </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Type:</div>
                                                <div class="detail__value f_storage_type"> SSD </div>
                                            </div>
                                            <div class="detail d-none">
                                                <div class="detail__name">RPM:</div>
                                                <div class="detail__value f_rpm"> </div>
                                            </div>
                                        </span><span class="table_span">
                                            <div class="detail">
                                                <div class="detail__name">Interface:</div>
                                                <div class="detail__value f_interface"> PCIe 3.0 x4 </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Cache Memory:</div>
                                                <div class="detail__value f_cache_memory"> 1024 MB </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail__name">Form Factor:</div>
                                                <div class="detail__value f_form_factor"> M.2-2280 </div>
                                            </div>
                                        </span>

                                    </td>
                                    <td class="price">৳ {{ $storage->product->price }}</td>
                                    <td><a class="btn btn-primary component-btn"
                                            href="{{ route('storage-details', ['id' => $storage->id]) }}"
                                            target="_blank">View
                                            details</a></td>
                                    <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                                            href="{{route('add-storage-to-system',['storage_id'=>$storage->id])}}"><i
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
        filter = input.value;
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        if (filter == 'ALL') {
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    td = td.getElementsByClassName("f_brand")['0'];
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.indexOf(filter) > -1) {
                        tr[i].classList.remove("c_brand");
                    } else {
                        tr[i].classList.remove("c_brand");
                    }
                }
            }
        } else {
            // filter = ' ' + filter + ' ';
            if (input.checked) {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_brand")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.indexOf(filter) > -1) {
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
                        if (txtValue.indexOf(filter) > -1) {
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
