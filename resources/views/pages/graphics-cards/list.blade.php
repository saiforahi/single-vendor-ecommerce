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
        <h1><span>Select</span> Your Graphics Card</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('graphics-card-list') }}">Graphics Card</a>
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
                                            aria-expanded="true" aria-controls="collapse1">
                                            Manufacturer </a> </h4>
                                </div>
                                <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="AMD"> <span class="ml-10">AMD (1)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ASRock"> <span
                                                    class="ml-10">ASRock (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ASUS"> <span class="ml-10">ASUS
                                                    (37) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Diamond Multimedia"> <span
                                                    class="ml-10">Diamond Multimedia (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="EVGA"> <span class="ml-10">EVGA
                                                    (25) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Gigabyte"> <span
                                                    class="ml-10">Gigabyte (27) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="HIS"> <span class="ml-10">HIS (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Inno 3D"> <span
                                                    class="ml-10">Inno 3D (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="MSI"> <span class="ml-10">MSI
                                                    (50) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="NVIDIA"> <span
                                                    class="ml-10">NVIDIA (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="NekidCow"> <span
                                                    class="ml-10">NekidCow (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="PNY"> <span class="ml-10">PNY (5)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="PowerColor"> <span
                                                    class="ml-10">PowerColor (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SAPPHIRE"> <span
                                                    class="ml-10">SAPPHIRE (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Sapphire Technology"> <span
                                                    class="ml-10">Sapphire Technology (13) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="VisionTek"> <span
                                                    class="ml-10">VisionTek (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="XFX"> <span class="ml-10">XFX
                                                    (15) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ZOTAC"> <span class="ml-10">ZOTAC
                                                    (14) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="ZOTAC GAMING"> <span
                                                    class="ml-10">ZOTAC GAMING (1) </span></label> </div>
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
                                            aria-expanded="false" aria-controls="collapse1">
                                            Memory Size </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="0.5 GB"> <span class="ml-10">0.5
                                                    GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="10 GB"> <span class="ml-10">10
                                                    GB (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="11 GB"> <span class="ml-10">11
                                                    GB (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="12 GB"> <span class="ml-10">12
                                                    GB (30) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="16 GB"> <span class="ml-10">16
                                                    GB (24) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="1 GB"> <span class="ml-10">1 GB
                                                    (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="2 GB"> <span class="ml-10">2 GB
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="24 GB"> <span class="ml-10">24
                                                    GB (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="3 GB"> <span class="ml-10">3 GB
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="4 GB"> <span class="ml-10">4 GB
                                                    (27) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="48 GB"> <span class="ml-10">48
                                                    GB (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="6 GB"> <span class="ml-10">6 GB
                                                    (28) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_memory(this.id);" class="option-input checkbox memory"
                                                    name="filter['memory']" value="8 GB"> <span class="ml-10">8 GB
                                                    (75) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .c_memory {
                                display: none !important;
                            }

                        </style>
                        <script>
                            function f_memory(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("memory");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_memory")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_memory");
                                            } else {
                                                tr[i].classList.remove("c_memory");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_memory")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_memory");
                                                } else {
                                                    tr[i].classList.add("c_memory");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_memory")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_memory");
                                                } else {
                                                    tr[i].classList.remove("c_memory");
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
                                            Chipset </a> </h4>
                                </div>
                                <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GT 1030"> <span
                                                    class="ml-10">GeForce GT 1030 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1060"> <span
                                                    class="ml-10">GeForce GTX 1060 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1070"> <span
                                                    class="ml-10">GeForce GTX 1070 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1080 Ti">
                                                <span class="ml-10">GeForce GTX 1080 Ti (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1650"> <span
                                                    class="ml-10">GeForce GTX 1650 (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1650 SUPER">
                                                <span class="ml-10">GeForce GTX 1650 SUPER (7) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1660 SUPER">
                                                <span class="ml-10">GeForce GTX 1660 SUPER (10) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1660 Ti">
                                                <span class="ml-10">GeForce GTX 1660 Ti (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 2060"> <span
                                                    class="ml-10">GeForce RTX 2060 (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 2060 SUPER">
                                                <span class="ml-10">GeForce RTX 2060 SUPER (7) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 2070"> <span
                                                    class="ml-10">GeForce RTX 2070 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 2070 SUPER">
                                                <span class="ml-10">GeForce RTX 2070 SUPER (13) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 2080 SUPER">
                                                <span class="ml-10">GeForce RTX 2080 SUPER (10) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 2080 Ti">
                                                <span class="ml-10">GeForce RTX 2080 Ti (10) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 3060"> <span
                                                    class="ml-10">GeForce RTX 3060 (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 3070"> <span
                                                    class="ml-10">GeForce RTX 3070 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 3070 Ti">
                                                <span class="ml-10">GeForce RTX 3070 Ti (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 3080"> <span
                                                    class="ml-10">GeForce RTX 3080 (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 3080 Ti">
                                                <span class="ml-10">GeForce RTX 3080 Ti (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce RTX 3090"> <span
                                                    class="ml-10">GeForce RTX 3090 (11) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1050 Ti">
                                                <span class="ml-10">GeForce GTX 1050 Ti (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GTX 1660"> <span
                                                    class="ml-10">GeForce GTX 1660 (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="GeForce GT 710"> <span
                                                    class="ml-10">GeForce GT 710 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Quadro RTX 8000"> <span
                                                    class="ml-10">Quadro RTX 8000 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon HD 5450"> <span
                                                    class="ml-10">Radeon HD 5450 (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon HD 5750"> <span
                                                    class="ml-10">Radeon HD 5750 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon HD 5770"> <span
                                                    class="ml-10">Radeon HD 5770 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="28" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon HD 6750"> <span
                                                    class="ml-10">Radeon HD 6750 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="29" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon HD 6770"> <span
                                                    class="ml-10">Radeon HD 6770 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="30" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon HD 6850"> <span
                                                    class="ml-10">Radeon HD 6850 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="31" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon HD 6870"> <span
                                                    class="ml-10">Radeon HD 6870 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="32" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 550"> <span
                                                    class="ml-10">Radeon RX 550 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="33" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 5500 XT">
                                                <span class="ml-10">Radeon RX 5500 XT (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="34" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 5600 XT">
                                                <span class="ml-10">Radeon RX 5600 XT (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="35" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 570"> <span
                                                    class="ml-10">Radeon RX 570 (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="36" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 5700 XT">
                                                <span class="ml-10">Radeon RX 5700 XT (12) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="37" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 6700 XT">
                                                <span class="ml-10">Radeon RX 6700 XT (15) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="38" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 6800"> <span
                                                    class="ml-10">Radeon RX 6800 (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="39" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 6800 XT">
                                                <span class="ml-10">Radeon RX 6800 XT (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="40" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 6900 XT">
                                                <span class="ml-10">Radeon RX 6900 XT (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="41" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX VEGA 56">
                                                <span class="ml-10">Radeon RX VEGA 56 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="42" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Radeon RX 580"> <span
                                                    class="ml-10">Radeon RX 580 (17) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="43" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="TITAN RTX"> <span
                                                    class="ml-10">TITAN RTX (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="44" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Titan V"> <span
                                                    class="ml-10">Titan V (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="45" type="checkbox"
                                                    onclick="f_chipset(this.id);" class="option-input checkbox chipset"
                                                    name="filter['chipset']" value="Vega Frontier Edition">
                                                <span class="ml-10">Vega Frontier Edition (1) </span></label>
                                        </div>
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
                        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading4">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion4" href="#collapse4"
                                            aria-expanded="false" aria-controls="collapse1">
                                            Interface </a> </h4>
                                </div>
                                <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCI Express 3.0 x16"> <span
                                                    class="ml-10">PCI Express 3.0 x16 (22) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCI Express 4.0 x16"> <span
                                                    class="ml-10">PCI Express 4.0 x16 (7) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCI Express 2.0 x16"> <span
                                                    class="ml-10">PCI Express 2.0 x16 (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCI Express 3.0 ">
                                                <span class="ml-10">PCI Express 3.0  (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCI-Express 4.0 x16"> <span
                                                    class="ml-10">PCI-Express 4.0 x16 (1) </span></label>
                                        </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe 4.0 x16"> <span
                                                    class="ml-10">PCIe 4.0 x16 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe 4.0x16"> <span
                                                    class="ml-10">PCIe 4.0x16 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe x1"> <span
                                                    class="ml-10">PCIe x1 (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_interface(this.id);" class="option-input checkbox interface"
                                                    name="filter['interface']" value="PCIe x16"> <span
                                                    class="ml-10">PCIe x16 (195) </span></label> </div>
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
                                <input type="text" id="myInput" onkeyup="myFunction()"
                                    placeholder="Search Graphics Card....." title="Search....">
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
                                                data-src="https://m.media-amazon.com/images/I/41t1VU+qlYL._SL75_.jpg"
                                                title="MSI Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere Architecture OC Graphics Card (RTX 3090 GAMING X TRIO 24G)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, MSI RTX 3090 GAMING X TRIO 24G">
                                            <div class="stars-rating" title="4.3 out of 5">
                                                <div class="stars-score" style="width: 86%">
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
                                            href="../../component-details/graphics-card/msi-rtx-3090-gaming-x-trio-24g-3090gamingxtrio24g/index.html">MSI
                                            Gaming GeForce RTX 3090 24GB GDRR6X 384-Bit HDMI/DP Nvlink Tri-Frozr 2 Ampere
                                            Architecture OC
                                            Graphics Card (RTX 3090 GAMING X TRIO 24G)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> MSI </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> RTX 3090 GAMING X TRIO 24G </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Memory:</div>
                                            <div class="detail__value f_memory"> 24 GB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Memory Interface:</div>
                                            <div class="detail__value f_memory_interface"> GDRR6X </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Length:</div>
                                            <div class="detail__value f_length"> 335 mm </div>
                                        </div>
                                    </span><span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe x16 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Chipset:</div>
                                            <div class="detail__value f_chipset"> GeForce RTX 3090 </div>
                                        </div>
                                    </span><span class="table_span view-more-108" style="display: none;">
                                        <div class="detail">
                                            <div class="detail__name">Base Clock:</div>
                                            <div class="detail__value f_base_clock"> 1395 MHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Clock Speed:</div>
                                            <div class="detail__value f_clock_speed"> 1785 MHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frame Sync:</div>
                                            <div class="detail__value f_frame_sync"> G-Sync </div>
                                        </div>
                                    </span>

                                    <span class="view-more">
                                        <div class="view-More108" onclick="viewMore(108);"><span
                                                class="viewMore108">View More
                                                Details</span> <i class="fas fa-chevron-circle-down"></i></div>
                                    </span>
                                </td>
                                <td class="price">
                                    $3,299 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B08HRBW6VB?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_108"
                                        href="javascript:void(0);" onclick="setid(108)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>  
                        </tbody>
                        
                    </table>
                </div>
            </div>
    </section>
@endsection

