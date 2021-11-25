@extends('layouts.app')

@push('style')
<style>
    .c_brand {
        display: none !important;
    }

</style>
<style>
    .c_configuration {
        display: none !important;
    }

</style>
<style>
    .c_color {
        display: none !important;
    }

</style>
<style>

    .float{
        display: none;  
    }
    @media screen and (max-width: 767px) {
        .float{
            display: block;
             
            position:fixed;
            width:60px;
            height:60px;
            bottom:20px;
            right:20px;
            background-color:#001119;
            color:#FFF!important;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }
        
        .my-float{
            margin-top:16px;
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
        
        .modal-window > div {
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
            display:flex;
            justify-content: space-around;
            padding: 15px 0;
            background-color: #fbfbfb;
        }
        .modal-bottom > * {
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
          border-radius: 50%; /* the magic */
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
                margin-right:-15px;
            }
        }
        .filter-sidebar .card-header {
            padding: 0;
            border: 0;
            font-size: 16px;
            padding: 9px 3px !important;
            background-color:#43AA8B;
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        
        .filter-sidebar .card-body {
            padding: 10px 19px!important;
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
        .checkbox label, .radio label {
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
            margin-bottom: 0!important;
            font-weight: 900;
        }
        .card-group {
            margin-bottom: 12px;
        }
        </style>
        <style>
            #FilterParameters.show,
            #FilterParameters.collapsing {
                display: block!important;
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
                padding-top:12px;
                padding-bottom:12px;
                margin-bottom:20px;
                font-weight:700;
            }
            
            
            
        .modal-close {
            background-color: #001119;
            border-color: #fff;
            padding: 9px!important;
            font-size: 18px!important;
            font-weight: 700;
            border-radius: 5px!important;
        }
        
        .modal-close:hover {
            background-color: #001119;
        }
        
        </style>
        <style>
        .loadingg {
            width: 34px!important;
            height: 34px!important;
            background: transparent!important;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-radius: 100%;
            animation: spin 0.6s ease-out infinite;
        }
        @keyframes spin {
            100% {transform: rotate(360deg)}
        }
        </style>
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h1><span>Select</span> Your Speakers</h1>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="speakers-list">Speakers</a>
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
                                                    name="filter['brand']" value="AmazonBasics"> <span
                                                    class="ml-10">AmazonBasics (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Audioengine"> <span
                                                    class="ml-10">Audioengine (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Bose"> <span class="ml-10">Bose
                                                    (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Creative"> <span
                                                    class="ml-10">Creative (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Creative Labs"> <span
                                                    class="ml-10">Creative Labs (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Cyber Acoustics"> <span
                                                    class="ml-10">Cyber Acoustics (9) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="DOLBY"> <span class="ml-10">DOLBY
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Edifier"> <span
                                                    class="ml-10">Edifier (7) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Fluance"> <span
                                                    class="ml-10">Fluance (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Gear Head"> <span
                                                    class="ml-10">Gear Head (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Harman Kardon"> <span
                                                    class="ml-10">Harman Kardon (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="IK Multimedia"> <span
                                                    class="ml-10">IK Multimedia (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="JBL Professional"> <span
                                                    class="ml-10">JBL Professional (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Jaybird"> <span
                                                    class="ml-10">Jaybird (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="KEF"> <span class="ml-10">KEF (2)
                                                </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Kanto"> <span class="ml-10">Kanto
                                                    (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Klipsch"> <span
                                                    class="ml-10">Klipsch (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Lenovo"> <span
                                                    class="ml-10">Lenovo (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Logitech"> <span
                                                    class="ml-10">Logitech (19) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="M-Audio"> <span
                                                    class="ml-10">M-Audio (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Mackie"> <span
                                                    class="ml-10">Mackie (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Micca"> <span class="ml-10">Micca
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="PreSonus"> <span
                                                    class="ml-10">PreSonus (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Razer"> <span class="ml-10">Razer
                                                    (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Sony"> <span class="ml-10">Sony
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Swan Speakers"> <span
                                                    class="ml-10">Swan Speakers (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="27" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="YAMAHA"> <span
                                                    class="ml-10">YAMAHA (4) </span></label> </div>
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
                                            aria-expanded="false" aria-controls="collapse1"> Config </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_configuration(this.id);"
                                                    class="option-input checkbox configuration"
                                                    name="filter['configuration']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_configuration(this.id);"
                                                    class="option-input checkbox configuration"
                                                    name="filter['configuration']" value="1.0"> <span
                                                    class="ml-10">1.0 (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_configuration(this.id);"
                                                    class="option-input checkbox configuration"
                                                    name="filter['configuration']" value="2.0"> <span
                                                    class="ml-10">2.0 (49) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_configuration(this.id);"
                                                    class="option-input checkbox configuration"
                                                    name="filter['configuration']" value="2.1"> <span
                                                    class="ml-10">2.1 (24) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_configuration(this.id);"
                                                    class="option-input checkbox configuration"
                                                    name="filter['configuration']" value="5.1"> <span
                                                    class="ml-10">5.1 (5) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <script>
                            function f_configuration(id) {

                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */

                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementsByClassName("configuration");
                                input = input[id];
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable");
                                tr = table.getElementsByTagName("tr");
                                if (filter == 'ALL') {
                                    for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                            td = td.getElementsByClassName("f_configuration")['0'];
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].classList.remove("c_configuration");
                                            } else {
                                                tr[i].classList.remove("c_configuration");
                                            }
                                        }
                                    }
                                } else {
                                    filter = ' ' + filter + ' ';
                                    if (input.checked) {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_configuration")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_configuration");
                                                } else {
                                                    tr[i].classList.add("c_configuration");
                                                }
                                            }
                                        }
                                    } else {
                                        for (i = 0; i < tr.length; i++) {
                                            td = tr[i].getElementsByTagName("td")[2];
                                            if (td) {
                                                td = td.getElementsByClassName("f_configuration")['0'];
                                                txtValue = td.textContent || td.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].classList.remove("c_configuration");
                                                } else {
                                                    tr[i].classList.remove("c_configuration");
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
                                                    name="filter['color']" value="Black"> <span
                                                    class="ml-10">Black (58) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Brown"> <span
                                                    class="ml-10">Black / Brown (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / Red"> <span
                                                    class="ml-10">Black / Red (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black / White"> <span
                                                    class="ml-10">Black / White (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Black and White"> <span
                                                    class="ml-10">Black and White (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Blue"> <span class="ml-10">Blue
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Brown"> <span
                                                    class="ml-10">Brown (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Brown / Black"> <span
                                                    class="ml-10">Brown / Black (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="RGB"> <span class="ml-10">RGB
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Red"> <span class="ml-10">Red
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver"> <span
                                                    class="ml-10">Silver (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Silver / Black"> <span
                                                    class="ml-10">Silver / Black (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="Transparent"> <span
                                                    class="ml-10">Transparent (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White"> <span
                                                    class="ml-10">White (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Black"> <span
                                                    class="ml-10">White / Black (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_color(this.id);" class="option-input checkbox color"
                                                    name="filter['color']" value="White / Brown"> <span
                                                    class="ml-10">White / Brown (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Speakers....."
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
                        @foreach ($speakers as $speaker )
                        <tbody>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $speaker->product->getMedia('main_image'); ?>
                                                <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    class="img-responsive lazy img-fluid"
                                                    data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                    title="{{ $speaker->name }}" alt="{{ $speaker->name }}">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/audioengine-a5-plus-classic-fba-a5plusn/index.html">Audioengine
                                            A5 Plus Classic 150W Powered Bookshelf Speakers with Remote Control, Built in
                                            Analog Amplifier - Bamboo</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Audioengine </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> A5 Plus Classic </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 100 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 50 Hz - 22 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Brown </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $469 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005SE6QBU?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                                        href="javascript:void(0);" onclick="setid(1)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/312Ql0MVNKL._SL75_.jpg"
                                                title="Logitech G560 LIGHTSYNC PC Gaming Speakers with Game Driven RGB Lighting"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech G560 RGB">
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
                                            href="../../component-details/speakers/logitech-g560-rgb-980-001300/index.html">Logitech
                                            G560 LIGHTSYNC PC Gaming Speakers with Game Driven RGB Lighting</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> G560 RGB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 60 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 40 Hz - 18 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> RGB </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $192.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07B2WLS17?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_2"
                                        href="javascript:void(0);" onclick="setid(2)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41B4OATKG+L._SL75_.jpg"
                                                title="Razer Nommo Chroma: Custom Woven 3" Glass Fiber Drivers - Rear-Facing
                                                Bass Ports - Bass Knob w Automatic Gain Control " alt=" pc builder, custom
                                                pc builder, pc part picker, build my pc, Razer Nommo Chroma RZ05">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/razer-nommo-chroma-rz05-rz05-02460100-r3u1/index.html">Razer
                                            Nommo Chroma: Custom Woven 3" Glass Fiber Drivers - Rear-Facing Bass Ports -
                                            Bass Knob w/ Automatic Gain Control </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Razer </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Nommo Chroma RZ05 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 60 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 20 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $129.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B078H1T9YD?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_3"
                                        href="javascript:void(0);" onclick="setid(3)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31edTkZyG8L._SL75_.jpg"
                                                title="Logitech Z906 5.1 Surround Sound Speaker System - THX, Dolby Digital and DTS Digital Certified - Black"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z906">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/logitech-z906-980-000467/index.html">Logitech
                                            Z906 5.1 Surround Sound Speaker System - THX, Dolby Digital and DTS Digital
                                            Certified - Black</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z906 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 500 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 35 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $299.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004M18O60?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_4"
                                        href="javascript:void(0);" onclick="setid(4)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31+FOAV2CKL._SL75_.jpg"
                                                title="Logitech Multimedia 2.1 Speakers Z213 for PC and Mobile Devices"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z213">
                                            <div class="stars-rating" title="4.1 out of 5">
                                                <div class="stars-score" style="width: 82%">
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
                                            href="../../component-details/speakers/logitech-z213-980-000941/index.html">Logitech
                                            Multimedia 2.1 Speakers Z213 for PC and Mobile Devices</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z213 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 7 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 65 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $29.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00KK9481I?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_5"
                                        href="javascript:void(0);" onclick="setid(5)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/310+dPIhW6L._SL75_.jpg"
                                                title="Logitech Z333 2.1 Speakers – Easy-access Volume Control, Headphone Jack – PC, Mobile Device, TV, DVD/Blueray Player, and Game Console Compatible"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z333 ">
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
                                            href="../../component-details/speakers/logitech-z333-980-001203/index.html">Logitech
                                            Z333 2.1 Speakers – Easy-access Volume Control, Headphone Jack – PC, Mobile
                                            Device, TV, DVD/Blueray Player, and Game Console Compatible</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z333 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 40 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 55 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $59.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0151K2AB0?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_6"
                                        href="javascript:void(0);" onclick="setid(6)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41JxAsJquTL._SL75_.jpg"
                                                title="Logitech Z623 400 Watt Home Speaker System, 2.1 Speaker System - Black"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z623">
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
                                            href="../../component-details/speakers/logitech-z623-980-000402/index.html">Logitech
                                            Z623 400 Watt Home Speaker System, 2.1 Speaker System - Black</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z623 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 200 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 35 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $119.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B003VAHYTG?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_7"
                                        href="javascript:void(0);" onclick="setid(7)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/414PsJUv91L._SL75_.jpg"
                                                title="Logitech S120 2.0 Stereo Speakers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech S120">
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
                                            href="../../component-details/speakers/logitech-s120-log980000012/index.html">Logitech
                                            S120 2.0 Stereo Speakers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> S120 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 2.3 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 50 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $11.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000R9AAJA?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_8"
                                        href="javascript:void(0);" onclick="setid(8)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41-x0K55ZTL._SL75_.jpg"
                                                title="Logitech Z-5300e THX-Certified  280-Watt 5.1 Surround Sound PC and Gaming Speaker System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z-5300e">
                                            <div class="stars-rating" title="4.1 out of 5">
                                                <div class="stars-score" style="width: 82%">
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
                                            href="../../component-details/speakers/logitech-z-5300e-970102-1403/index.html">Logitech
                                            Z-5300e THX-Certified 280-Watt 5.1 Surround Sound PC and Gaming Speaker
                                            System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z-5300e </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 280 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 35 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0002SQ0AE?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_9"
                                        href="javascript:void(0);" onclick="setid(9)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31kSYnPj53L._SL75_.jpg"
                                                title="Razer Leviathan: Dolby 5.1 Suround Sound - Bluetooth aptX Technology - Dedicated Powerful Subwoofer for Deep Immersive Bass - PC Gaming and Music Sound Bar"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Razer Leviathan Dolby">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/razer-leviathan-dolby-rz05-01260100-r3u1/index.html">Razer
                                            Leviathan: Dolby 5.1 Suround Sound - Bluetooth aptX Technology - Dedicated
                                            Powerful Subwoofer for Deep Immersive Bass - PC Gaming and Music Sound Bar</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Razer </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Leviathan Dolby </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 60 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 180 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $183.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00PK2POOU?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_10"
                                        href="javascript:void(0);" onclick="setid(10)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41ZtRSRUtJL._SL75_.jpg"
                                                title="Klipsch R-51PM Powered Bluetooth Speaker"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Klipsch R 51PM">
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
                                            href="../../component-details/speakers/klipsch-r-51pm/index.html">Klipsch R-51PM
                                            Powered Bluetooth Speaker</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Klipsch </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> R 51PM </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 120 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 68 Hz - 21 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $413 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07FKCP7PZ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_11"
                                        href="javascript:void(0);" onclick="setid(11)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41ayic-F8mL._SL75_.jpg"
                                                title="Logitech Speaker System Z323 with Subwoofer"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z323">
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
                                            href="../../component-details/speakers/logitech-z323-980-000354/index.html">Logitech
                                            Speaker System Z323 with Subwoofer</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z323 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 30 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 55 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $58.67 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002FU5QM0?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_12"
                                        href="javascript:void(0);" onclick="setid(12)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31Z6ZgChfGL._SL75_.jpg"
                                                title="Klipsch ProMedia 2.1 THX Certified Computer Speaker System (Black)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Klipsch  ProMedia 2.1">
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
                                            href="../../component-details/speakers/klipsch-promedia-2-1-1011400/index.html">Klipsch
                                            ProMedia 2.1 THX Certified Computer Speaker System (Black)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Klipsch </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ProMedia 2.1 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 120 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 31 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $65 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000062VUO?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_13"
                                        href="javascript:void(0);" onclick="setid(13)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41fDs1tXFhL._SL75_.jpg"
                                                title="Logitech S150 USB Speakers with Digital Sound"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech S150">
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
                                            href="../../component-details/speakers/logitech-s150-log980000028/index.html">Logitech
                                            S150 USB Speakers with Digital Sound</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> S150 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 1.2 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 90 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $11.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000ZH98LU?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_14"
                                        href="javascript:void(0);" onclick="setid(14)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41+tZ1SqwNL._SL75_.jpg"
                                                title="Audioengine A5 Plus Classic 150W Powered Bookshelf Speakers with Remote Control, Built in Analog Amplifier - Black"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Audioengine A5+ Black">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/audioengine-a5-black-a5plusb/index.html">Audioengine
                                            A5 Plus Classic 150W Powered Bookshelf Speakers with Remote Control, Built in
                                            Analog Amplifier - Black</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Audioengine </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> A5+ Black </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 100 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 50 Hz - 22 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $399 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005OA3BSY?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_15"
                                        href="javascript:void(0);" onclick="setid(15)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51t8qYn08UL._SL75_.jpg"
                                                title="Creative Labs GigaWorks T20 Series II 2.0 Multimedia Speaker System with BasXPort Technology"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative  GigaWorks T20 Series II">
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
                                            href="../../component-details/speakers/creative-gigaworks-t20-series-ii-51mf1610aa002/index.html">Creative
                                            Labs GigaWorks T20 Series II 2.0 Multimedia Speaker System with BasXPort
                                            Technology</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GigaWorks T20 Series II </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 28 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 50 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $73.97 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001RNOHDU?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_16"
                                        href="javascript:void(0);" onclick="setid(16)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51b92Zx6FcL._SL75_.jpg"
                                                title="CYBER ACOUSTICS, Cyber Acoustics CA-2016WB Computer Speaker System (Catalog Category: Consumer Electronics / Audio Electronics)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics CA 2016WB">
                                            <div class="stars-rating" title="3.1 out of 5">
                                                <div class="stars-score" style="width: 62%">
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
                                            href="../../component-details/speakers/cyber-acoustics-ca-2016wb-ite-cbaca-2016w-sdi/index.html">CYBER
                                            ACOUSTICS, Cyber Acoustics CA-2016WB Computer Speaker System (Catalog Category:
                                            Consumer Electronics / Audio Electronics)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CA 2016WB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 3 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 260 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $13.85 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004ZXNNIE?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_17"
                                        href="javascript:void(0);" onclick="setid(17)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41JBfVNqSqL._SL75_.jpg"
                                                title="Audioengine HD3 60W Wireless Powered Desktop Speakers, Bluetooth aptX HD, USB 24-Bit DAC & Analog Amplifier (Cherry Wood)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Audioengine HD3">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/audioengine-hd3-hd3-chr/index.html">Audioengine
                                            HD3 60W Wireless Powered Desktop Speakers, Bluetooth aptX HD, USB 24-Bit DAC &
                                            Analog Amplifier (Cherry Wood)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Audioengine </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HD3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 60 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 65 Hz - 22 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Red </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $1,250 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01M2A46ML?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_18"
                                        href="javascript:void(0);" onclick="setid(18)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41mFiH-L8dL._SL75_.jpg"
                                                title="Audioengine A5 Plus Classic 150W Powered Bookshelf Speakers with Remote Control, Built-in Analog Amplifier (White)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Audioengine A5 Plus">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/audioengine-a5-plus-a5plusw/index.html">Audioengine
                                            A5 Plus Classic 150W Powered Bookshelf Speakers with Remote Control, Built-in
                                            Analog Amplifier (White)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Audioengine </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> A5 Plus </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 100 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 50 Hz - 22 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $399 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005OSR1C8?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_19"
                                        href="javascript:void(0);" onclick="setid(19)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/410P0hXk5JL._SL75_.jpg"
                                                title="Edifier R1700BT Bluetooth Bookshelf Speakers - Active Near-Field Studio Monitors - Powered Speakers 2.0 Setup Wooden Enclosure"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edifier R1700BT ">
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
                                            href="../../component-details/speakers/edifier-r1700bt-fba-r1700bt/index.html">Edifier
                                            R1700BT Bluetooth Bookshelf Speakers - Active Near-Field Studio Monitors -
                                            Powered Speakers 2.0 Setup Wooden Enclosure</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edifier </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> R1700BT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 66 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 60 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Brown / Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $159.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B016PATXSI?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_20"
                                        href="javascript:void(0);" onclick="setid(20)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31uLIPLF3ML._SL75_.jpg"
                                                title="Logitech Multimedia Speaker System Z533 - Black"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z533">
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
                                            href="../../component-details/speakers/logitech-z533-980-001053/index.html">Logitech
                                            Multimedia Speaker System Z533 - Black</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z533 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 60 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 55 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $89.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B011O613W2?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_21"
                                        href="javascript:void(0);" onclick="setid(21)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41WrBdCDRjL._SL75_.jpg"
                                                title="Logitech X-540 5.1 Surround Sound Speaker System with Subwoofer"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech X-540">
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
                                            href="../../component-details/speakers/logitech-x-540-970223-0403/index.html">Logitech
                                            X-540 5.1 Surround Sound Speaker System with Subwoofer</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> X-540 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 70 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 40 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $499.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000JJM8XE?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_22"
                                        href="javascript:void(0);" onclick="setid(22)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41mrpb4FNKL._SL75_.jpg"
                                                title="Yamaha HS7W 7-Inch Powered Studio Monitor Speaker, White"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, YAMAHA HS7 W">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/yamaha-hs7-w/index.html">Yamaha HS7W
                                            7-Inch Powered Studio Monitor Speaker, White</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> YAMAHA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HS7 W </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 1.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 95 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 43 Hz - 30 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $329.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ILALQ0Y?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_23"
                                        href="javascript:void(0);" onclick="setid(23)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51gld7tY35L._SL75_.jpg"
                                                title="Creative GigaWorks T40 Series II 2.0 Multimedia Speaker System with BasXPort Technology, Black"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative GigaWorks T40 Series II">
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
                                            href="../../component-details/speakers/creative-gigaworks-t40-series-ii-51mf1615aa002/index.html">Creative
                                            GigaWorks T40 Series II 2.0 Multimedia Speaker System with BasXPort Technology,
                                            Black</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GigaWorks T40 Series II </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 32 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 50 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $109.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001S14DYO?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_24"
                                        href="javascript:void(0);" onclick="setid(24)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/4156F+qaUJL._SL75_.jpg"
                                                title="Cyber Acoustics 2.1 Subwoofer Speaker System with 18W of Power – Great for Music, Movies, Gaming, and Multimedia Computer Laptops"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics CA 3090">
                                            <div class="stars-rating" title="3.8 out of 5">
                                                <div class="stars-score" style="width: 76%">
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
                                            href="../../component-details/speakers/cyber-acoustics-ca-3090/index.html">Cyber
                                            Acoustics 2.1 Subwoofer Speaker System with 18W of Power – Great for Music,
                                            Movies, Gaming, and Multimedia Computer Laptops</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CA 3090 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 10 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 160 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $29.22 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00006B9W1?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_25"
                                        href="javascript:void(0);" onclick="setid(25)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51Quvj0qh6L._SL75_.jpg"
                                                title="Creative Inspire T10 2.0 Multimedia Speaker System with BasXPort Technology"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Inspire T10">
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
                                            href="../../component-details/speakers/creative-inspire-t10-51mf1601aa000/index.html">Creative
                                            Inspire T10 2.0 Multimedia Speaker System with BasXPort Technology</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Inspire T10 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 10 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 80 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $47.37 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00113PUJQ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_26"
                                        href="javascript:void(0);" onclick="setid(26)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41pifSw42JL._SL75_.jpg"
                                                title="Yamaha HS5 W 5-Inch Powered Studio Monitor Speaker, White"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, YAMAHA HS5 W">
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
                                            href="../../component-details/speakers/yamaha-hs5-w/index.html">Yamaha HS5 W
                                            5-Inch Powered Studio Monitor Speaker, White</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> YAMAHA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HS5 W </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 1.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 70 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 54 Hz - 30 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $199.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ILALQZO?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_27"
                                        href="javascript:void(0);" onclick="setid(27)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41Z7xDhlbOL._SL75_.jpg"
                                                title="Harman Kardon SoundSticks Wireless Bluetooth Speaker System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Harman Kardon Soundsticks Wireless">
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
                                            href="../../component-details/speakers/harman-kardon-soundsticks-wireless-soundsticks-iii-wireless/index.html">Harman
                                            Kardon SoundSticks Wireless Bluetooth Speaker System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Harman Kardon </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Soundsticks Wireless </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 40 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 44 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Transparent </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $690.08 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B008YFD5G4?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_28"
                                        href="javascript:void(0);" onclick="setid(28)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41PZVK9bpwL._SL75_.jpg"
                                                title="Cyber Acoustics OEM 3 Pc Subwoofer System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics OEM 3">
                                            <div class="stars-rating" title="3.7 out of 5">
                                                <div class="stars-score" style="width: 74%">
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
                                            href="../../component-details/speakers/cyber-acoustics-oem-3-ca-3001wb/index.html">Cyber
                                            Acoustics OEM 3 Pc Subwoofer System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> OEM 3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 14 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 38 Hz - 18 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $22.84 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0006G2M8Q?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_29"
                                        href="javascript:void(0);" onclick="setid(29)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41CeLu2LxhL._SL75_.jpg"
                                                title="Audioengine HD3 60W Wireless Powered Desktop Speakers, Bluetooth aptX HD, USB 24-Bit DAC & Analog Amplifier (Black)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Audioengine HD3">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/audioengine-hd3-hd3-blk/index.html">Audioengine
                                            HD3 60W Wireless Powered Desktop Speakers, Bluetooth aptX HD, USB 24-Bit DAC &
                                            Analog Amplifier (Black)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Audioengine </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HD3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 60 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 65 Hz - 22 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $349 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01M8NUP1A?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_30"
                                        href="javascript:void(0);" onclick="setid(30)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41I1TETMiIL._SL75_.jpg"
                                                title="AmazonBasics Computer Speakers for Desktop or Laptop PC | USB-Powered"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, AmazonBasics U213">
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
                                            href="../../component-details/speakers/amazonbasics-u213/index.html">AmazonBasics
                                            Computer Speakers for Desktop or Laptop PC | USB-Powered</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> AmazonBasics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> U213 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 2.2 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 103 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $17.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07D7TV5J3?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_31"
                                        href="javascript:void(0);" onclick="setid(31)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/514KBGY6YtL._SL75_.jpg"
                                                title="Cyber Acoustics CA-2014 multimedia desktop computer speakers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics CA 2014 RB">
                                            <div class="stars-rating" title="4.1 out of 5">
                                                <div class="stars-score" style="width: 82%">
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
                                            href="../../component-details/speakers/cyber-acoustics-ca-2014-rb-ca-2014rb/index.html">Cyber
                                            Acoustics CA-2014 multimedia desktop computer speakers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CA 2014 RB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 4 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 85 Hz - 18 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $12.41 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00008MN45?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_32"
                                        href="javascript:void(0);" onclick="setid(32)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41JMChrUZPL._SL75_.jpg"
                                                title="Yamaha HS8 W 8-Inch Powered Studio Monitor Speaker, White"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, YAMAHA HS8 ">
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
                                            href="../../component-details/speakers/yamaha-hs8-hs8-w/index.html">Yamaha HS8 W
                                            8-Inch Powered Studio Monitor Speaker, White</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> YAMAHA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HS8 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 1.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 120 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 38 Hz - 30 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $369.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ILALQ4K?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_33"
                                        href="javascript:void(0);" onclick="setid(33)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41WBa+pCJjL._SL75_.jpg"
                                                title="Edifier S1000DB Audiophile Active Bookshelf Speakers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edifier S1000DB">
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
                                            href="../../component-details/speakers/edifier-s1000db/index.html">Edifier
                                            S1000DB Audiophile Active Bookshelf Speakers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edifier </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> S1000DB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 120 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 48 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Brown / Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $349.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01CDIS6M0?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_34"
                                        href="javascript:void(0);" onclick="setid(34)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41zxjll8cCL._SL75_.jpg"
                                                title="Edifier USA 2.0 USB Computer Speakers "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edifier R19U">
                                            <div class="stars-rating" title="4.0 out of 5">
                                                <div class="stars-score" style="width: 80%">
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
                                            href="../../component-details/speakers/edifier-r19u/index.html">Edifier USA 2.0
                                            USB Computer Speakers </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edifier </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> R19U </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 4 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 150 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $29.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00VQSKCW6?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_35"
                                        href="javascript:void(0);" onclick="setid(35)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41-MULbHU8L._SL75_.jpg"
                                                title="Micca MB42X Bookshelf Speakers with 4-Inch Carbon Fiber Woofer and Silk Dome Tweeter (Black, Pair)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Micca Bookshelf MB42X">
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
                                            href="../../component-details/speakers/micca-bookshelf-mb42x-mb42x/index.html">Micca
                                            MB42X Bookshelf Speakers with 4-Inch Carbon Fiber Woofer and Silk Dome Tweeter
                                            (Black, Pair)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Micca </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Bookshelf MB42X </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 150 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 60 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $89.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00E7H8GG2?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_36"
                                        href="javascript:void(0);" onclick="setid(36)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41qW6ENBTEL._SL75_.jpg"
                                                title="Edifier S880DB Bluetooth Optical Coaxial Active Powered Bookshelf Speakers Near-Field Monitors Great for Gaming, Computers, and TV"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edifier S880DB">
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
                                            href="../../component-details/speakers/edifier-s880db/index.html">Edifier S880DB
                                            Bluetooth Optical Coaxial Active Powered Bookshelf Speakers Near-Field Monitors
                                            Great for Gaming, Computers, and TV</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edifier </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> S880DB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 20 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 55 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White / Brown </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $259.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07D41XN1F?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_37"
                                        href="javascript:void(0);" onclick="setid(37)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41tzACbH6HL._SL75_.jpg"
                                                title="Logitech - LS21 2.1 Stereo Speaker System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech LS21">
                                            <div class="stars-rating" title="3.9 out of 5">
                                                <div class="stars-score" style="width: 78%">
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
                                            href="../../component-details/speakers/logitech-ls21-980-000058/index.html">Logitech
                                            - LS21 2.1 Stereo Speaker System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LS21 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 7 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 40 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $138 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0015C30J0?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_38"
                                        href="javascript:void(0);" onclick="setid(38)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51RQDUKIinL._SL75_.jpg"
                                                title="AmazonBasics Computer Speakers for Desktop or Laptop PC | AC-Powered (US Version)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, AmazonBasics V216US">
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
                                            href="../../component-details/speakers/amazonbasics-v216us/index.html">AmazonBasics
                                            Computer Speakers for Desktop or Laptop PC | AC-Powered (US Version)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> AmazonBasics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> V216US </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 4.6 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 68 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07D7TL9KM?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_39"
                                        href="javascript:void(0);" onclick="setid(39)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51Rz9un8L2L._SL75_.jpg"
                                                title="Harman Kardon SoundSticks III 2.1 Speaker System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Harman Kardon  SoundSticks III">
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
                                            href="../../component-details/speakers/harman-kardon-soundsticks-iii-soundsticks3am-a/index.html">Harman
                                            Kardon SoundSticks III 2.1 Speaker System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Harman Kardon </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SoundSticks III </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 40 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 44 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Transparent </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $199.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0042F3K9W?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_40"
                                        href="javascript:void(0);" onclick="setid(40)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51GZIHSREoL._SL75_.jpg"
                                                title="JBL Professional C2PS Control 2P Compact Powered Monitor, Master and Extension Speakers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, JBL Professional C2PS">
                                            <div class="stars-rating" title="3.8 out of 5">
                                                <div class="stars-score" style="width: 76%">
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
                                            href="../../component-details/speakers/jbl-professional-c2ps/index.html">JBL
                                            Professional C2PS Control 2P Compact Powered Monitor, Master and Extension
                                            Speakers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> JBL Professional </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> C2PS </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 70 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 80 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $399.90 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001EDVB14?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_41"
                                        href="javascript:void(0);" onclick="setid(41)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41jOKBII3FL._SL75_.jpg"
                                                title="Logitech Speaker System Z553 with 40 Watts RMS Power and 3 Device Inputs"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z553">
                                            <div class="stars-rating" title="4.1 out of 5">
                                                <div class="stars-score" style="width: 82%">
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
                                            href="../../component-details/speakers/logitech-z553-980-000649/index.html">Logitech
                                            Speaker System Z553 with 40 Watts RMS Power and 3 Device Inputs</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z553 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 40 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 55 Hz - 17 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $179.45 (Used) </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B008X1BVH4?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_42"
                                        href="javascript:void(0);" onclick="setid(42)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51nkkUBZiwL._SL75_.jpg"
                                                title="CYBER ACOUSTICs CA-2014WB 2pcs speaker system (black)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics CA 2014WB">
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
                                            href="../../component-details/speakers/cyber-acoustics-ca-2014wb-cyber-acou-ca-2014wb/index.html">CYBER
                                            ACOUSTICs CA-2014WB 2pcs speaker system (black)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CA 2014WB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 1.5 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 85 Hz - 18 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001DPWY46?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_43"
                                        href="javascript:void(0);" onclick="setid(43)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41yrdpCwhfL._SL75_.jpg"
                                                title="Mackie MR824 8" 2-Way Powered Studio Monitor with Wireless Earbuds"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Mackie MR824">
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
                                            href="../../component-details/speakers/mackie-mr824-2048440-00/index.html">Mackie
                                            MR824 8" 2-Way Powered Studio Monitor with Wireless Earbuds</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Mackie </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MR824 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 1.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 85 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 35 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $269.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07RYWL5NL?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_44"
                                        href="javascript:void(0);" onclick="setid(44)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41CTkuEiu0L._SL75_.jpg"
                                                title="Cyber Acoustics 2.1 Powered Speaker System (CA-3001RB),Black"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics CA 3001RB">
                                            <div class="stars-rating" title="3.8 out of 5">
                                                <div class="stars-score" style="width: 76%">
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
                                            href="../../component-details/speakers/cyber-acoustics-ca-3001rb/index.html">Cyber
                                            Acoustics 2.1 Powered Speaker System (CA-3001RB),Black</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CA 3001RB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 14 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 38 Hz - 18 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $36.30 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00006L3C6?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_45"
                                        href="javascript:void(0);" onclick="setid(45)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41T30pFQWDL._SL75_.jpg"
                                                title="IK Multimedia iLoud Micro Monitors Ultra-Compact 3" Studio Monitors
                                                with Bluetooth - IP-ILOUD-MM-in"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, IK Multimedia IP ILOUD">
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
                                            href="../../component-details/speakers/ik-multimedia-ip-iloud-148242/index.html">IK
                                            Multimedia iLoud Micro Monitors Ultra-Compact 3" Studio Monitors with Bluetooth
                                            - IP-ILOUD-MM-in</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> IK Multimedia </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IP ILOUD </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 70 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 45 Hz - 22 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $299.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01C5RZWCQ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_46"
                                        href="javascript:void(0);" onclick="setid(46)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/418XtvcMt+L._SL75_.jpg"
                                                title="Audioengine HD3 60W Wireless Powered Desktop Speakers, Bluetooth aptX HD, USB 24-Bit DAC & Analog Amplifier "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Audioengine HD3 walnuss">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/audioengine-hd3-walnuss-hd3walnuss/index.html">Audioengine
                                            HD3 60W Wireless Powered Desktop Speakers, Bluetooth aptX HD, USB 24-Bit DAC &
                                            Analog Amplifier </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Audioengine </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HD3 walnuss </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 60 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 65 Hz - 22 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Brown </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $349 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01MFD7N5T?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_47"
                                        href="javascript:void(0);" onclick="setid(47)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41GxTRSe+9L._SL75_.jpg"
                                                title="Fluance SX6-BK High Definition 2-Way Bookshelf Loudspeakers-Black Ash"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Fluance SX6-BK">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/fluance-sx6-bk/index.html">Fluance SX6-BK
                                            High Definition 2-Way Bookshelf Loudspeakers-Black Ash</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Fluance </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SX6-BK </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 100 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 50 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $149.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00IEDL8EM?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_48"
                                        href="javascript:void(0);" onclick="setid(48)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41tNfylxeoL._SL75_.jpg"
                                                title="Lenovo Speaker M0520, Black"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Lenovo M0520">
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
                                            href="../../component-details/speakers/lenovo-m0520-888010120/index.html">Lenovo
                                            Speaker M0520, Black</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Lenovo </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> M0520 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 2 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 90 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $20.15 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0053YJLL2?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_49"
                                        href="javascript:void(0);" onclick="setid(49)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41IT-XaRi0L._SL75_.jpg"
                                                title="Logitech Speaker System Z523 with Subwoofer"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z523">
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
                                            href="../../component-details/speakers/logitech-z523-980-000319/index.html">Logitech
                                            Speaker System Z523 with Subwoofer</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z523 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 40 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 48 Hz - 20 kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002FU5QMK?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_50"
                                        href="javascript:void(0);" onclick="setid(50)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41HAIS3fUTL._SL75_.jpg"
                                                title="Micca COVO-S Compact 2-Way Bookshelf Speakers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Micca COVO-S">
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
                                            href="../../component-details/speakers/micca-covo-s/index.html">Micca COVO-S
                                            Compact 2-Way Bookshelf Speakers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Micca </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> COVO-S </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 100 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 90 Hz - 20Hz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $49.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00N8265I8?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_51"
                                        href="javascript:void(0);" onclick="setid(51)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41THcoxaQrL._SL75_.jpg"
                                                title="Gear Head Magic 8-Ball Speakers, USB 2.0, Black with Red Accents (SP2000URED)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Gear Head SP2000URED">
                                            <div class="stars-rating" title="3.6 out of 5">
                                                <div class="stars-score" style="width: 72%">
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
                                            href="../../component-details/speakers/gear-head-sp2000ured/index.html">Gear
                                            Head Magic 8-Ball Speakers, USB 2.0, Black with Red Accents (SP2000URED)</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Gear Head </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SP2000URED </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 3 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 200 Hz - 20Hz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black / Red </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $19.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B009K0O31I?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_52"
                                        href="javascript:void(0);" onclick="setid(52)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41osuRTuflL._SL75_.jpg"
                                                title="Cyber Acoustics Surround Powered Speaker System Bookshelf Home Speaker, Set of 2"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics CA-2027">
                                            <div class="stars-rating" title="3.8 out of 5">
                                                <div class="stars-score" style="width: 76%">
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
                                            href="../../component-details/speakers/cyber-acoustics-ca-2027/index.html">Cyber
                                            Acoustics Surround Powered Speaker System Bookshelf Home Speaker, Set of 2</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CA-2027 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 5 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 20 Hz - 20Hz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $39 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B019IHR5LW?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_53"
                                        href="javascript:void(0);" onclick="setid(53)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41rihoLPayL._SL75_.jpg"
                                                title="KEF LSX Wireless Music System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, KEF SP3994BX">
                                            <div class="stars-rating" title="4.1 out of 5">
                                                <div class="stars-score" style="width: 82%">
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
                                            href="../../component-details/speakers/kef-sp3994bx/index.html">KEF LSX Wireless
                                            Music System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> KEF </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> SP3994BX </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 200 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 49 Hz - 47 Hz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $1,249.98 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07JFK339D?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_54"
                                        href="javascript:void(0);" onclick="setid(54)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51VxCb56DRL._SL75_.jpg"
                                                title="Cyber Acoustics CA-3602a 62W Desktop Computer Speaker with Subwoofer - Perfect 2.1 Gaming and Multimedia PC speakers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics CA-3602a">
                                            <div class="stars-rating" title="4.1 out of 5">
                                                <div class="stars-score" style="width: 82%">
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
                                            href="../../component-details/speakers/cyber-acoustics-ca-3602a/index.html">Cyber
                                            Acoustics CA-3602a 62W Desktop Computer Speaker with Subwoofer - Perfect 2.1
                                            Gaming and Multimedia PC speakers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CA-3602a </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 30 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 50 Hz - 20 Hz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $58.69 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0027VT6V4?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_55"
                                        href="javascript:void(0);" onclick="setid(55)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/4176TyqHGCL._SL75_.jpg"
                                                title="Creative Inspire T3100 2.1 Speakers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Creative Labs Inspire T3100">
                                            <div class="stars-rating" title="3.6 out of 5">
                                                <div class="stars-score" style="width: 72%">
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
                                            href="../../component-details/speakers/creative-labs-inspire-t3100-51mf0336aa000/index.html">Creative
                                            Inspire T3100 2.1 Speakers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Creative Labs </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Inspire T3100 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 29 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 40Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000IVL3DE?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_56"
                                        href="javascript:void(0);" onclick="setid(56)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41rvn3k5KgL._SL75_.jpg"
                                                title="Logitech LS11 2.0 Stereo Speaker System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Jaybird LS11">
                                            <div class="stars-rating" title="3.7 out of 5">
                                                <div class="stars-score" style="width: 74%">
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
                                            href="../../component-details/speakers/jaybird-ls11-980-000048/index.html">Logitech
                                            LS11 2.0 Stereo Speaker System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Jaybird </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LS11 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 3 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 70Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Silver / Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $64.89 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0015BYQJE?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_57"
                                        href="javascript:void(0);" onclick="setid(57)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41Ec+WEbL8L._SL75_.jpg"
                                                title="Kanto 2 Channel Powered PC Gaming Desktop Speakers – 3" Composite
                                                Drivers 3 4" Silk Dome Tweeter – Class D Amplifier - 100 Watts"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Kanto YU2GB">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/kanto-yu2gb/index.html">Kanto 2 Channel
                                            Powered PC Gaming Desktop Speakers – 3" Composite Drivers 3/4" Silk Dome Tweeter
                                            – Class D Amplifier - 100 Watts</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Kanto </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> YU2GB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 50 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 80Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $239.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00GMPDAAO?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_58"
                                        href="javascript:void(0);" onclick="setid(58)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41TYvPmCHeL._SL75_.jpg"
                                                title="Micca MB42 Bookshelf Speakers for Home Theater Surround Sound, Stereo, and Passive Near Field Monitor, 2-Way"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Micca MB42">
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
                                            href="../../component-details/speakers/micca-mb42/index.html">Micca MB42
                                            Bookshelf Speakers for Home Theater Surround Sound, Stereo, and Passive Near
                                            Field Monitor, 2-Way</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Micca </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MB42 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 150 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 60Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Brown </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $64.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B009IUIV4A?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_59"
                                        href="javascript:void(0);" onclick="setid(59)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41iiovikcDL._SL75_.jpg"
                                                title="Edifier R980T 4" Active Bookshelf Speakers - 2.0 Computer Speaker -
                                                Powered Studio Monitor (Pair)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edifier R980T">
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
                                            href="../../component-details/speakers/edifier-r980t-edifier-r980t/index.html">Edifier
                                            R980T 4" Active Bookshelf Speakers - 2.0 Computer Speaker - Powered Studio
                                            Monitor (Pair)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edifier </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> R980T </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 24 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 70Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $74.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01LXDZ8WB?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_60"
                                        href="javascript:void(0);" onclick="setid(60)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41HtDPIa19L._SL75_.jpg"
                                                title="M-Audio BX5 D2 5" Active 2-Way Studio Monitor Speakers (Pair)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, M-Audio BX5 D2">
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
                                            href="../../component-details/speakers/m-audio-bx5-d2-bx5-d2---pair/index.html">M-Audio
                                            BX5 D2 5" Active 2-Way Studio Monitor Speakers (Pair)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> M-Audio </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BX5 D2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 140 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 56Hz - 22kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $499.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B005F3H6Q8?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_61"
                                        href="javascript:void(0);" onclick="setid(61)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31xglnuHZFS._SL75_.jpg"
                                                title="Logitech Z337 Discontinued by Logitech"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z337">
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
                                            href="../../component-details/speakers/logitech-z337-980-001260/index.html">Logitech
                                            Z337 Discontinued by Logitech</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z337 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 40 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $87.78 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01M0FZU8T?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_62"
                                        href="javascript:void(0);" onclick="setid(62)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41s6IOBj1uL._SL75_.jpg"
                                                title="PreSonus Eris E3.5 BT-3.5" Near Field Studio Monitors with Bluetooth"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, PreSonus Eris E3.5">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/presonus-eris-e3-5-b07z6p19y9/index.html">PreSonus
                                            Eris E3.5 BT-3.5" Near Field Studio Monitors with Bluetooth</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> PreSonus </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Eris E3.5 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 50 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 80Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $139.95 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07Z6P19Y9?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_63"
                                        href="javascript:void(0);" onclick="setid(63)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41fBSvqnBnL._SL75_.jpg"
                                                title="Kanto 2 Channel Powered PC Gaming Desktop Speakers – 3" Composite
                                                Drivers 3 4" Silk Dome Tweeter – Class D Amplifier - 100 Watts " alt=" pc
                                                builder, custom pc builder, pc part picker, build my pc, Kanto YU2MB">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/kanto-yu2mb/index.html">Kanto 2 Channel
                                            Powered PC Gaming Desktop Speakers – 3" Composite Drivers 3/4" Silk Dome Tweeter
                                            – Class D Amplifier - 100 Watts </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Kanto </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> YU2MB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 50 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 80Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $205 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00GMPDAHM?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_64"
                                        href="javascript:void(0);" onclick="setid(64)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41hao0sDyAL._SL75_.jpg"
                                                title="Logitech Z 120 Notebook Speaker USB bla"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z120">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/logitech-z120-2227777/index.html">Logitech
                                            Z 120 Notebook Speaker USB bla</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z120 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 1.2 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black and White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $26.63 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00544XKK4?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_65"
                                        href="javascript:void(0);" onclick="setid(65)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41hfOcfLSFL._SL75_.jpg"
                                                title="Bose Companion 20 Multimedia Speaker System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Bose 329509-1300">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/bose-329509-1300/index.html">Bose
                                            Companion 20 Multimedia Speaker System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Bose </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> 329509-1300 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Silver </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $249 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0053T4PHC?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_66"
                                        href="javascript:void(0);" onclick="setid(66)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41fsXfS0f0L._SL75_.jpg"
                                                title="Edifier S350DB Bookshelf Speaker and Subwoofer 2.1 Speaker System Bluetooth v4.1 aptX Wireless Sound for Computer Rooms, Living Rooms and Dens"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edifier S350DB">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/edifier-s350db/index.html">Edifier S350DB
                                            Bookshelf Speaker and Subwoofer 2.1 Speaker System Bluetooth v4.1 aptX Wireless
                                            Sound for Computer Rooms, Living Rooms and Dens</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edifier </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> S350DB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 150 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 40Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black / Brown </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $342.13 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B077Y6PHKQ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_67"
                                        href="javascript:void(0);" onclick="setid(67)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41WonlIj2+L._SL75_.jpg"
                                                title="Logitech Z207 2.0 Multi Device Stereo Speaker"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z207">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/logitech-z207-980-001294/index.html">Logitech
                                            Z207 2.0 Multi Device Stereo Speaker</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z207 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 0.01 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $49.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B074KJ6JQW?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_68"
                                        href="javascript:void(0);" onclick="setid(68)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41VkYFY7BUL._SL75_.jpg"
                                                title="Kanto 2 Channel Powered PC Gaming Desktop Speakers – 3" Composite
                                                Drivers 3 4" Silk Dome Tweeter – Class D Amplifier - 100 Watts - Built-in
                                                USB DAC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Kanto YU2MW">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/kanto-yu2mw/index.html">Kanto 2 Channel
                                            Powered PC Gaming Desktop Speakers – 3" Composite Drivers 3/4" Silk Dome Tweeter
                                            – Class D Amplifier - 100 Watts - Built-in USB DAC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Kanto </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> YU2MW </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 50 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 80Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White / Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $239.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00GMPDAGS?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_69"
                                        href="javascript:void(0);" onclick="setid(69)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41inrzDQqNL._SL75_.jpg"
                                                title="Bose Companion 2 Series III Multimedia Speakers - for PC (with 3.5mm AUX & PC Input) "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Bose Companion 2">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/bose-companion-2-354495-1100/index.html">Bose
                                            Companion 2 Series III Multimedia Speakers - for PC (with 3.5mm AUX & PC Input)
                                        </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Bose </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Companion 2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $149 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00CD1PTF0?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_70"
                                        href="javascript:void(0);" onclick="setid(70)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41LCGHTgBgL._SL75_.jpg"
                                                title="Razer Nommo Pro: THX Certified Premium Audio - Dolby Virtual Surround Sound - LED Illuminated Control Pod - Downward Firing Subwoofer"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Razer NOMMO PRO">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/razer-nommo-pro-rz05-02470100-r3u1/index.html">Razer
                                            Nommo Pro: THX Certified Premium Audio - Dolby Virtual Surround Sound - LED
                                            Illuminated Control Pod - Downward Firing Subwoofer</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Razer </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> NOMMO PRO </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 35Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $490.59 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07DNSLL24?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_71"
                                        href="javascript:void(0);" onclick="setid(71)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41a3staM4fL._SL75_.jpg"
                                                title="YAMAHA Pair (2) Yamaha HS8 Active Studio Monitor Speakers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, YAMAHA HS8">
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
                                            href="../../component-details/speakers/yamaha-hs8/index.html">YAMAHA Pair (2)
                                            Yamaha HS8 Active Studio Monitor Speakers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> YAMAHA </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HS8 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 120 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 38Hz - 30kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black / White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $749.98 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ESPMZZQ?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_72"
                                        href="javascript:void(0);" onclick="setid(72)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41ehNiYkSnL._SL75_.jpg"
                                                title="Edifier S760D 5.1 Home Speaker System"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Edifier S760D">
                                            <div class="stars-rating" title="3.7 out of 5">
                                                <div class="stars-score" style="width: 74%">
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
                                            href="../../component-details/speakers/edifier-s760d/index.html">Edifier S760D
                                            5.1 Home Speaker System</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Edifier </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> S760D </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 5.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 540 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 42Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $899.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00PMDYEHK?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_73"
                                        href="javascript:void(0);" onclick="setid(73)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31EaMiaYdbL._SL75_.jpg"
                                                title="Sound BlasterX Katana Multi-Channel Surround Gaming and Entertainment Soundbar - Hardware Processing, Supports Dolby Digital 5.1 Decoding"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, DOLBY BlasterX Katana">
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
                                            href="../../component-details/speakers/dolby-blasterx-katana-51mf8245aa000/index.html">Sound
                                            BlasterX Katana Multi-Channel Surround Gaming and Entertainment Soundbar -
                                            Hardware Processing, Supports Dolby Digital 5.1 Decoding</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> DOLBY </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> BlasterX Katana </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $242.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01M5G07KF?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_74"
                                        href="javascript:void(0);" onclick="setid(74)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41xKwCZZsCS._SL75_.jpg"
                                                title="Logitech Z625 Powerful THX Certified 2.1 Speaker System with Optical Input"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z625">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/logitech-z625-980-001258/index.html">Logitech
                                            Z625 Powerful THX Certified 2.1 Speaker System with Optical Input</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z625 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 200 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $143.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01JPOLLKE?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_75"
                                        href="javascript:void(0);" onclick="setid(75)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/31sppRLJdgL._SL75_.jpg"
                                                title="Logitech Multimedia Speakers Z150 with Stereo Sound for Multiple Devices"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Logitech Z150">
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
                                            href="../../component-details/speakers/logitech-z150-980-000802/index.html">Logitech
                                            Multimedia Speakers Z150 with Stereo Sound for Multiple Devices</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Logitech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Z150 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $20.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00EZ9XLEY?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_76"
                                        href="javascript:void(0);" onclick="setid(76)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41l4slct5CL._SL75_.jpg"
                                                title="KEF LSX Wireless Music System "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, KEF LSXWH">
                                            <div class="stars-rating" title="3.9 out of 5">
                                                <div class="stars-score" style="width: 78%">
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
                                            href="../../component-details/speakers/kef-lsxwh-sp3994ax/index.html">KEF LSX
                                            Wireless Music System </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> KEF </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> LSXWH </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 200 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 49Hz - 47kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $1,187.68 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07JDX5Q15?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_77"
                                        href="javascript:void(0);" onclick="setid(77)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/414DltF0E0L._SL75_.jpg"
                                                title="Fluance Ai60 High Performance Powered Two-Way 6.5" 2.0 Bookshelf
                                                Speakers with 100W Class D Amplifier for Turntable, PC, HDTV " alt=" pc
                                                builder, custom pc builder, pc part picker, build my pc, Fluance Ai60">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/fluance-ai60-ai60ww/index.html">Fluance
                                            Ai60 High Performance Powered Two-Way 6.5" 2.0 Bookshelf Speakers with 100W
                                            Class D Amplifier for Turntable, PC, HDTV </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Fluance </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Ai60 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 100 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 35Hz - 30kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black / Brown </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07MKP345F?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_78"
                                        href="javascript:void(0);" onclick="setid(78)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/419ErNRMDfL._SL75_.jpg"
                                                title="Kanto 2 Channel Powered PC Gaming Desktop Speakers – 3" Composite
                                                Drivers 3 4" Silk Dome Tweeter – Class D Amplifier - 100 Watts - Built-in
                                                USB DAC"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Kanto YU2GT">
                                            <div class="stars-rating" title="4.7 out of 5">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/speakers/kanto-yu2gt/index.html">Kanto 2 Channel
                                            Powered PC Gaming Desktop Speakers – 3" Composite Drivers 3/4" Silk Dome Tweeter
                                            – Class D Amplifier - 100 Watts - Built-in USB DAC</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Kanto </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> YU2GT </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 50 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 80Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Blue </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00GMPDB1W?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_79"
                                        href="javascript:void(0);" onclick="setid(79)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41r+C2tESBL._SL75_.jpg"
                                                title="Fluance Ai60 High Performance Powered Two-Way 6.5" 2.0 Bookshelf
                                                Speakers with 100W Class D Amplifier for Turntable, PC, HDTV"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Fluance Ai60">
                                            <div class="stars-rating" title="4.5 out of 5">
                                                <div class="stars-score" style="width: 90%">
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
                                            href="../../component-details/speakers/fluance-ai60/index.html">Fluance Ai60
                                            High Performance Powered Two-Way 6.5" 2.0 Bookshelf Speakers with 100W Class D
                                            Amplifier for Turntable, PC, HDTV</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Fluance </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Ai60 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 100 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 35Hz - 30kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07MDH5PRS?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_80"
                                        href="javascript:void(0);" onclick="setid(80)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41rUxS+vfAL._SL75_.jpg"
                                                title="Cyber Acoustics Powerful Curve Series Storm 44W Speaker System with Control Pod "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cyber Acoustics CA-3350">
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
                                            href="../../component-details/speakers/cyber-acoustics-ca-3350/index.html">Cyber
                                            Acoustics Powerful Curve Series Storm 44W Speaker System with Control Pod </a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cyber Acoustics </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CA-3350 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 22 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $41.26 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0145MTZBI?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_81"
                                        href="javascript:void(0);" onclick="setid(81)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/41DzwcxCicL._SL75_.jpg"
                                                title="Swans Speakers - M10 - Powered 2.1 Computer Speakers - Surround Sound - Near-Field Speakers - Bookshelf Speakers "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Swan Speakers M10">
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
                                            href="../../component-details/speakers/swan-speakers-m10/index.html">Swans
                                            Speakers - M10 - Powered 2.1 Computer Speakers - Surround Sound - Near-Field
                                            Speakers - Bookshelf Speakers </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Swan Speakers </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> M10 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 2.1 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> 100Hz - 20kHz </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> White / Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00OKUAFYC?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_82"
                                        href="javascript:void(0);" onclick="setid(82)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid"
                                                data-src="https://m.media-amazon.com/images/I/51+zuonSuEL._SL75_.jpg"
                                                title="Sony 1287-2374 Box Wireless Audio System Adapter"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Sony 1287-2374">
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
                                            href="../../component-details/speakers/sony-1287-2374/index.html">Sony 1287-2374
                                            Box Wireless Audio System Adapter</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Sony </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> 1287-2374 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Config:</div>
                                            <div class="detail__value f_configuration"> 1.0 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Watt:</div>
                                            <div class="detail__value f_wattage"> 20 W </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Frequency:</div>
                                            <div class="detail__value f_frequency"> N/A </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Color:</div>
                                            <div class="detail__value f_color"> Black </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $64.95 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00N9QU2X2?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_83"
                                        href="javascript:void(0);" onclick="setid(83)"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                        </tbody>  
                        @endforeach
                        
                    </table>
                </div>
            </div>
    </section>
@endsection

@push('script')

@endpush
