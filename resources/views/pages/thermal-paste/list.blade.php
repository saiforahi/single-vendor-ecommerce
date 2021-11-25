@extends('layouts.app')

@push('style')
<style>
    .c_brand {
        display: none !important;
    }

</style>
<style>
    .c_amount {
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
        <h1><span>Select</span> Your Thermal Paste</h1>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
            <i class="fa fa-angle-right"></i><a href="thermalpaste-list">Thermal Paste</a>
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
                                                    class="ml-10">ARCTIC (10) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Antec"> <span class="ml-10">Antec
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Arctic Silver"> <span
                                                    class="ml-10">Arctic Silver (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Arctic Silver 5"> <span
                                                    class="ml-10">Arctic Silver 5 (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Cooler Master"> <span
                                                    class="ml-10">Cooler Master (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Coollaboratory"> <span
                                                    class="ml-10">Coollaboratory (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Corsair"> <span
                                                    class="ml-10">Corsair (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Gelid Solutions"> <span
                                                    class="ml-10">Gelid Solutions (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="IC Diamond"> <span
                                                    class="ml-10">IC Diamond (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="LEDGroupBuy"> <span
                                                    class="ml-10">LEDGroupBuy (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="MassCool"> <span
                                                    class="ml-10">MassCool (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Noctua"> <span
                                                    class="ml-10">Noctua (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Prolimatech"> <span
                                                    class="ml-10">Prolimatech (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Shinwa Sangyo"> <span
                                                    class="ml-10">Shinwa Sangyo (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="SunBeamTech"> <span
                                                    class="ml-10">SunBeamTech (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Thermal Grizzly"> <span
                                                    class="ml-10">Thermal Grizzly (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Thermalright"> <span
                                                    class="ml-10">Thermalright (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Thermaltake"> <span
                                                    class="ml-10">Thermaltake (4) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Tuniq"> <span class="ml-10">Tuniq
                                                    (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_brand(this.id);" class="option-input checkbox brand"
                                                    name="filter['brand']" value="Zalman"> <span
                                                    class="ml-10">Zalman (1) </span></label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="card-group" id="accordion2" role="tablist" aria-multiselectable="false">
                            <div class="card panel-default">
                                <div class="card-header" role="tab" id="heading2">
                                    <h4 class="card-title"> <a class="collapsed" role="button"
                                            data-toggle="collapse" data-parent="#accordion2" href="#collapse2"
                                            aria-expanded="false" aria-controls="collapse1"> Amount </a> </h4>
                                </div>
                                <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
                                    <div class="card-body">
                                        <div class="checkbox"> <label> <input id="0" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="All" checked> <span
                                                    class="ml-10">All </span></label> </div>
                                        <div class="checkbox"> <label> <input id="1" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="0.01 Grams"> <span
                                                    class="ml-10">0.01 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="2" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="0.15 Grams"> <span
                                                    class="ml-10">0.15 Grams (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="3" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="0.5 Grams"> <span
                                                    class="ml-10">0.5 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="4" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="1 Grams"> <span class="ml-10">1
                                                    Grams (3) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="5" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="1.5 Grams"> <span
                                                    class="ml-10">1.5 Grams (6) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="6" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="1.75 Grams"> <span
                                                    class="ml-10">1.75 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="7" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="10 Grams"> <span
                                                    class="ml-10">10 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="8" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="12 Grams"> <span
                                                    class="ml-10">12 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="9" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="14 Grams"> <span
                                                    class="ml-10">14 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="10" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="2 Grams"> <span class="ml-10">2
                                                    Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="11" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="20 Grams"> <span
                                                    class="ml-10">20 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="12" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="25 Grams"> <span
                                                    class="ml-10">25 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="13" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="3 Grams"> <span class="ml-10">3
                                                    Grams (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="14" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="3.5 Grams"> <span
                                                    class="ml-10">3.5 Grams (5) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="15" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="3.75 Grams"> <span
                                                    class="ml-10">3.75 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="16" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="3.9 Grams"> <span
                                                    class="ml-10">3.9 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="17" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="30 Grams"> <span
                                                    class="ml-10">30 Grams (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="18" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="300 Grams"> <span
                                                    class="ml-10">300 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="19" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="4 Grams"> <span class="ml-10">4
                                                    Grams (8) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="20" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="5 Grams"> <span class="ml-10">5
                                                    Grams (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="21" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="5.5 Grams"> <span
                                                    class="ml-10">5.5 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="22" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="5.8 Grams"> <span
                                                    class="ml-10">5.8 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="23" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="6.2 Grams"> <span
                                                    class="ml-10">6.2 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="24" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="600 Grams"> <span
                                                    class="ml-10">600 Grams (1) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="25" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="65 Grams"> <span
                                                    class="ml-10">65 Grams (2) </span></label> </div>
                                        <div class="checkbox"> <label> <input id="26" type="checkbox"
                                                    onclick="f_amount(this.id);" class="option-input checkbox amount"
                                                    name="filter['amount']" value="8 Grams"> <span class="ml-10">8
                                                    Grams (2) </span></label> </div>
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
                                <input type="text" id="myInput" onkeyup="myFunction()"
                                    placeholder="Search Thermal Paste....." title="Search....">
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
                        @foreach ($thermalpastes as $thermalpaste )
                        <tbody>
                            <tr class="items" data-href="#">
                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $thermalpaste->product->getMedia('main_image'); ?>
                                            <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                class="img-responsive lazy img-fluid"
                                                data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                title="{{ $thermalpaste->name }}" alt="{{ $thermalpaste->name }}">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-mx-4/index.html">ARCTIC MX-4
                                            - Thermal Compound Paste for Coolers, Composed of Carbon Micro-Particles & High
                                            Durability (4 Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MX-4 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 4 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0795DP124?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31YrBDux0iL._SL75_.jpg"
                                                title="Arctic Silver 5 AS5-3.5G Easy to Apply & Remove Thermal Paste (3.5 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Arctic Silver AS5-3.5G">
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
                                            href="../../component-details/thermal-paste/arctic-silver-as5-3-5g/index.html">Arctic
                                            Silver 5 AS5-3.5G Easy to Apply & Remove Thermal Paste (3.5 Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Arctic Silver </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> AS5-3.5G </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $4.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0087X728K?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41vnUQM54ZL._SL75_.jpg"
                                                title="Thermal Grizzly Kryonaut 1 Grams Thermal Paste"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermal Grizzly Kryonaut">
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
                                            href="../../component-details/thermal-paste/thermal-grizzly-kryonaut-tg-k-001-rs/index.html">Thermal
                                            Grizzly Kryonaut 1 Grams Thermal Paste</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermal Grizzly </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Kryonaut </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $9.19 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B011F7W3LU?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/51xZI+QrRtL._SL75_.jpg"
                                                title="Prolimatech Pk-Zero Nano Aluminum Thermal Compound (600 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Prolimatech PK-ZERO (600G)">
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
                                            href="../../component-details/thermal-paste/prolimatech-pk-zero/index.html">Prolimatech
                                            Pk-Zero Nano Aluminum Thermal Compound (600 Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Prolimatech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PK-ZERO (600G) </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 600 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $258 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00WJ40G8G?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31RBE+9+8+L._SL75_.jpg"
                                                title="Thermal Grizzly Kryonaut (TG-K-015-R) Thermal Paste for Electronics Component (5.5 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermal Grizzly TG-K-015-R">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/thermal-grizzly-tg-k-015-r/index.html">Thermal
                                            Grizzly Kryonaut (TG-K-015-R) Thermal Paste for Electronics Component (5.5
                                            Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermal Grizzly </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TG-K-015-R </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 5.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $18.40 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ZJSF5LM?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/312leTw9RPL._SL75_.jpg"
                                                title="Noctua NT-H1 3.5g, Pro-Grade Thermal Compound Paste (3.5 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Noctua NT-H1">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/noctua-nt-h1/index.html">Noctua
                                            NT-H1 3.5g, Pro-Grade Thermal Compound Paste (3.5 Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Noctua </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> NT-H1 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $4.95 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002CQU14A?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31Fs8ka1lNL._SL75_.jpg"
                                                title="Thermal Grizzly Conductonaut Liquid Metal Thermal Paste (1 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermal Grizzly TG-C-001-R">
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
                                            href="../../component-details/thermal-paste/thermal-grizzly-tg-c-001-r/index.html">Thermal
                                            Grizzly Conductonaut Liquid Metal Thermal Paste (1 Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermal Grizzly </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TG-C-001-R </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $12.45 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B01A9KIGSI?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41sqZVxG4JL._SL75_.jpg"
                                                title="Thermalright TF8 Thermal Compound Paste 13.8 W/mK, Carbon Based High Performance, Heatsink Paste (5.8 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermalright TF8">
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
                                            href="../../component-details/thermal-paste/thermalright-tf8/index.html">Thermalright
                                            TF8 Thermal Compound Paste 13.8 W/mK, Carbon Based High Performance, Heatsink
                                            Paste (5.8 Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermalright </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TF8 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 5.8 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07JN1DMG5?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41zbeymJqPL._SL75_.jpg"
                                                title="Prolimatech Pk-2 Nano Aluminum Thermal Compound (1.5 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Prolimatech PK-2 - 1g">
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
                                            href="../../component-details/thermal-paste/prolimatech-pk-2-1g/index.html">Prolimatech
                                            Pk-2 Nano Aluminum Thermal Compound (1.5 Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Prolimatech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PK-2 - 1g </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $9.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B008M50ZMI?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41OgUyO87NL._SL75_.jpg"
                                                title="CORSAIR TM30 Performance Thermal Paste | Ultra-Low Thermal Impedance CPU/GPU (3 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Corsair TM30">
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
                                            href="../../component-details/thermal-paste/corsair-tm30-ct-9010001-ww/index.html">CORSAIR
                                            TM30 Performance Thermal Paste | Ultra-Low Thermal Impedance CPU/GPU (3
                                            Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Corsair </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TM30 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $7.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07KQ1T158?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31ZnOcDsLQL._SL75_.jpg"
                                                title="GELID GC-Extreme 3.5 Grams with Tooling - Thermal Conductive Paste for Heatsink, Maximum Thermal Conductivity & Not Corrosive"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Gelid Solutions GC-Extreme">
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
                                            href="../../component-details/thermal-paste/gelid-solutions-gc-extreme-tc-gc-03-a/index.html">GELID
                                            GC-Extreme 3.5 Grams with Tooling - Thermal Conductive Paste for Heatsink,
                                            Maximum Thermal Conductivity & Not Corrosive</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Gelid Solutions </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GC-Extreme </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $9.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002P5W4RU?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31TSQ8L1+lL._SL75_.jpg"
                                                title="Antec Nano Diamond Thermal Compound Formula 7 (4 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Antec FORMULA 7">
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
                                            href="../../component-details/thermal-paste/antec-formula-7/index.html">Antec
                                            Nano Diamond Thermal Compound Formula 7 (4 Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Antec </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> FORMULA 7 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 4 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004AGXHDC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41g5osrq9eL._SL75_.jpg"
                                                title="CORSAIR XTM50 High Performance 5 Grams Thermal Compound Paste & Ultra-Low Thermal Impedance CPU/GPU w/applicator"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Corsair XTM50">
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
                                            href="../../component-details/thermal-paste/corsair-xtm50-ct-9010002-ww/index.html">CORSAIR
                                            XTM50 High Performance 5 Grams Thermal Compound Paste & Ultra-Low Thermal
                                            Impedance CPU/GPU w/applicator</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Corsair </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> XTM50 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $14.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07V3GTMCS?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31j37bbFUbL._SL75_.jpg"
                                                title="ARCTIC MX-2 - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste, 65 Grams"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC ORACO-MX20101-BL">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-oraco-mx20101-bl/index.html">ARCTIC
                                            MX-2 - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste, 65
                                            Grams</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ORACO-MX20101-BL </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 65 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004YITI5M?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31JdjLLXxML._SL75_.jpg"
                                                title="ARCTIC MX-2 - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste - 4 Grams"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC MX-2">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-mx-2-or-mx2-ac-01/index.html">ARCTIC
                                            MX-2 - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste - 4
                                            Grams</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MX-2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 4 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000WU2LXC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31s2nRHKb3L._SL75_.jpg"
                                                title="ARCTIC MX-2 (8 Grams) - Thermal Compound Paste, Carbon Based High Performance - 8 Grams"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC MX-2">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-mx-2-oraco-mx20001-bl/index.html">ARCTIC
                                            MX-2 (8 Grams) - Thermal Compound Paste, Carbon Based High Performance - 8
                                            Grams</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MX-2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 8 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004D3TUG0?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41DQCO2c2gL._SL75_.jpg"
                                                title="Noctua NT-H2 3.5g, Pro-Grade Thermal Compound Paste Including 3 Cleaning Wipes (3.5 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Noctua NT-H2 3.5g">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/noctua-nt-h2-3-5g/index.html">Noctua
                                            NT-H2 3.5g, Pro-Grade Thermal Compound Paste Including 3 Cleaning Wipes (3.5
                                            Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Noctua </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> NT-H2 3.5g </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07MXFTNZY?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31XvOchS66L._SL75_.jpg"
                                                title="Tuniq TX-4 High Performance Thermal Grease - 3 Grams"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Tuniq TX-4">
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
                                            href="../../component-details/thermal-paste/tuniq-tx-4/index.html">Tuniq TX-4
                                            High Performance Thermal Grease - 3 Grams</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Tuniq </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TX-4 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $27.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00405DHG0?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31w3iKvrzZL._SL75_.jpg"
                                                title="Arctic Silver Alumina Premium Ceramic Polysynthetic Thermal Cooling Compound - (1.75 Grams)"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Arctic Silver 5 ASAA-1.75G-R">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-silver-fba-asaa-1-75g-r/index.html">Arctic
                                            Silver Alumina Premium Ceramic Polysynthetic Thermal Cooling Compound - (1.75
                                            Grams)</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Arctic Silver 5 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ASAA-1.75G-R </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1.75 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0087X71YA?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41N1deNqjcL._SL75_.jpg"
                                                title="Cooler Master High Performance Thermal Paste"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cooler Master HTK 002 U1">
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
                                            href="../../component-details/thermal-paste/cooler-master-htk-002-u1/index.html">Cooler
                                            Master High Performance Thermal Paste</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cooler Master </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> HTK 002 U1 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 0.01 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $6.49 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0009PTBZ6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31F4dh0X1jL._SL75_.jpg"
                                                title="Arctic Silver 5 High Density Polysynthetic Silver Thermal Compound -12g"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Arctic Silver 5 AS5 12G">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-silver-5-as5-12g/index.html">Arctic
                                            Silver 5 High Density Polysynthetic Silver Thermal Compound -12g</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Arctic Silver 5 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> AS5 12G </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 12 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $14.93 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0087X71ZO?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31+tXLOYdTL._SL75_.jpg"
                                                title="ARCTIC MX-2 (65 Grams) - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste, Thermal Compound CPU for All Coolers, Thermal Interface Material"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC ACTCP00006B">
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
                                            href="../../component-details/thermal-paste/arctic-actcp00006b/index.html">ARCTIC
                                            MX-2 (65 Grams) - Thermal Compound Paste, Carbon Based High Performance,
                                            Heatsink Paste, Thermal Compound CPU for All Coolers, Thermal Interface
                                            Material</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ACTCP00006B </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 65 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $26.49 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07LF1R7T8?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31qBfHLaZCL._SL75_.jpg"
                                                title="ARCTIC MX-4 (8 Grams) - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste, Thermal Compound CPU for All Coolers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC MX-4">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-mx-4-actcp00008b/index.html">ARCTIC
                                            MX-4 (8 Grams) - Thermal Compound Paste, Carbon Based High Performance, Heatsink
                                            Paste, Thermal Compound CPU for All Coolers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MX-4 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 8 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $10.02 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07LF66ZSV?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/315Br21UytL._SL75_.jpg"
                                                title="MasterGel Maker Nano-High performance "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cooler Master MGZ NDSG">

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
                                            href="../../component-details/thermal-paste/cooler-master-mgz-ndsg-mgz-ndsg-n15m-r1/index.html">MasterGel
                                            Maker Nano-High performance </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cooler Master </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MGZ NDSG </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 4 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B019BZENY8?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31XgTBR6oEL._SL75_.jpg"
                                                title="ARCTIC MX-2 (4 Grams) - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste, Thermal Compound CPU for All Coolers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC ACTCP00005B">
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
                                            href="../../component-details/thermal-paste/arctic-actcp00005b/index.html">ARCTIC
                                            MX-2 (4 Grams) - Thermal Compound Paste, Carbon Based High Performance, Heatsink
                                            Paste, Thermal Compound CPU for All Coolers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ACTCP00005B </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 4 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $6.64 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07LDRVFBH?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/21-Fk66vtuL._SL75_.jpg"
                                                title="Arctic Silver AA-14G Alumina 14g Thermal Compound Paste Grease Syringe New"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Arctic Silver AA 14G">
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
                                            href="../../component-details/thermal-paste/arctic-silver-aa-14g/index.html">Arctic
                                            Silver AA-14G Alumina 14g Thermal Compound Paste Grease Syringe New</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Arctic Silver </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> AA 14G </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 14 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B004Z9XG0I?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41cAYUJajaL._SL75_.jpg"
                                                title="Innovation Cooling Diamond 7 Carat Thermal Compound - 1.5 Grams"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, IC Diamond IC Diamond 7 Carat">
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
                                            href="../../component-details/thermal-paste/ic-diamond-ic-diamond-7-carat/index.html">Innovation
                                            Cooling Diamond 7 Carat Thermal Compound - 1.5 Grams</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> IC Diamond </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> IC Diamond 7 Carat </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $6.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0042IEVD8?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/415wsqtdd9L._SL75_.jpg"
                                                title="Prolimatech Pk-Zero Nano Aluminum Thermal Compound - 300g"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Prolimatech PK-ZERO">
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
                                            href="../../component-details/thermal-paste/prolimatech-pk-zero/index.html">Prolimatech
                                            Pk-Zero Nano Aluminum Thermal Compound - 300g</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Prolimatech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PK-ZERO </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 300 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $193 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00WJ3ULXM?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41oyWPenC9L._SL75_.jpg"
                                                title="ARCTIC MX-4 (20 Grams) - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste, Thermal Compound CPU for All Coolers, Thermal Interface Material"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC MX-4 Edition">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-mx-4-edition-actcp00001b/index.html">ARCTIC
                                            MX-4 (20 Grams) - Thermal Compound Paste, Carbon Based High Performance,
                                            Heatsink Paste, Thermal Compound CPU for All Coolers, Thermal Interface
                                            Material</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MX-4 Edition </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 20 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $20.93 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07LDJY4X2?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/411zhGTlRoL._SL75_.jpg"
                                                title="Thermalright TFX Thermal Compound Paste 6.2g 14.3W/mK, Carbon Based High Performance, Heatsink Paste"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermalright TFX - 6.2">
                                            <div class="stars-rating" title="4.9 out of 5">
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
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="../../component-details/thermal-paste/thermalright-tfx-6-2/index.html">Thermalright
                                            TFX Thermal Compound Paste 6.2g 14.3W/mK, Carbon Based High Performance,
                                            Heatsink Paste</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermalright </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TFX - 6.2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 6.2 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07MYJ1X8H?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41CqeTdRNyL._SL75_.jpg"
                                                title="Prolimatech Pk-3 Nano Aluminum Thermal Compound - 5 Grams"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Prolimatech PK-3">
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
                                            href="../../component-details/thermal-paste/prolimatech-pk-3-pk-3-5g/index.html">Prolimatech
                                            Pk-3 Nano Aluminum Thermal Compound - 5 Grams</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Prolimatech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PK-3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $19.85 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B008M5157W?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31RBE+9+8+L._SL75_.jpg"
                                                title="Thermal Grizzly Aeronaut Thermal Grease Paste - 3.9 Grams"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Shinwa Sangyo TG 015">
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
                                            href="../../component-details/thermal-paste/shinwa-sangyo-tg-015-tg-a-015-r/index.html">Thermal
                                            Grizzly Aeronaut Thermal Grease Paste - 3.9 Grams</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Shinwa Sangyo </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TG 015 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3.9 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $8.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00ZJSZM4C?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31fJsSklxSL._SL75_.jpg"
                                                title="Thermaltake TG-7 Extreme Performance CPU GPU Heatsink Cooling Thermal Grease "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermaltake CL O004">
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
                                            href="../../component-details/thermal-paste/thermaltake-cl-o004-cl-o004-grosgm-a/index.html">Thermaltake
                                            TG-7 Extreme Performance CPU GPU Heatsink Cooling Thermal Grease </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermaltake </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CL O004 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 4 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $7.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00O5VX6O2?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/312+xZcC1eL._SL75_.jpg"
                                                title="ARCTIC MX-2 - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste, Thermal Compound CPU for All Coolers, Thermal Interface Material - 30 Grams"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC MX2">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/arctic-mx2-or-mx2-ac-03/index.html">ARCTIC
                                            MX-2 - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste,
                                            Thermal Compound CPU for All Coolers, Thermal Interface Material - 30 Grams</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MX2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 30 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001FOE5CY?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41AqvtxjoqL._SL75_.jpg"
                                                title="Sunbeamtech TS-IB Iceberg Thermal Sheet | Thermal Pad for CPU Coolers"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, SunBeamTech TS-IB">
                                            <div class="stars-rating" title="2.0 out of 5">
                                                <div class="stars-score" style="width: 40%">
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
                                            href="../../component-details/thermal-paste/sunbeamtech-ts-ib/index.html">Sunbeamtech
                                            TS-IB Iceberg Thermal Sheet | Thermal Pad for CPU Coolers</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> SunBeamTech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> TS-IB </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $5.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00EZFPOA2?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41jtbThTozL._SL75_.jpg"
                                                title="MASSCOOL Fanner-420 Thermal Grease Cooling"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, MassCool FANNER-420">
                                            <div class="stars-rating" title="4.8 out of 5">
                                                <div class="stars-score" style="width: 96%">
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
                                            href="../../component-details/thermal-paste/masscool-fanner-420/index.html">MASSCOOL
                                            Fanner-420 Thermal Grease Cooling</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> MassCool </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> FANNER-420 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 2 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000A27VJ6?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31YNqePyVpL._SL75_.jpg"
                                                title="Cooler Master Ic-essential E1 Gray thermal grea"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cooler Master Ic-essential E1">
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
                                            href="../../component-details/thermal-paste/cooler-master-ic-essential-e1-4719512032046/index.html">Cooler
                                            Master Ic-essential E1 Gray thermal grea</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cooler Master </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Ic-essential E1 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3.75 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $6.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B007W82ABK?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31D43kA+wJL._SL75_.jpg"
                                                title="Arctic Silver Ceramique 2-25g"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, LEDGroupBuy Ceramique 2">
                                            <div class="stars-rating" title="3.4 out of 5">
                                                <div class="stars-score" style="width: 68%">
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
                                            href="../../component-details/thermal-paste/ledgroupbuy-ceramique-2-cmq2-25g/index.html">Arctic
                                            Silver Ceramique 2-25g</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> LEDGroupBuy </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Ceramique 2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 25 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $16.92 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0056QHJ8E?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31+VUCSYQbL._SL75_.jpg"
                                                title="Thermaltake TG-2 Thermal Grease -Gray"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermaltake CL O0028">
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
                                            href="../../component-details/thermal-paste/thermaltake-cl-o0028/index.html">Thermaltake
                                            TG-2 Thermal Grease -Gray</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermaltake </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CL O0028 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 4 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0019R2X3A?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41CpBMnGtGL._SL75_.jpg"
                                                title="Cooler Master New Edition MasterGel Maker Ultra-High Performance Nano-tech Diamond Particle Thermal Paste w/Exclusive Flat-Nozzle Syringe Design for CPU and GPU"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Cooler Master New Edition N15M">
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
                                            href="../../component-details/thermal-paste/cooler-master-new-edition-n15m-mgz-ndsg-n15m-r2/index.html">Cooler
                                            Master New Edition MasterGel Maker Ultra-High Performance Nano-tech Diamond
                                            Particle Thermal Paste w/Exclusive Flat-Nozzle Syringe Design for CPU and
                                            GPU</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Cooler Master </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> New Edition N15M </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $14.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07W9KYP32?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41ReGVThnQL._SL75_.jpg"
                                                title="Coollaboratory Liquid Pro Thermal Compound Paste Grease Syringe Style"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Coollaboratory Liquid Pro">
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
                                            href="../../component-details/thermal-paste/coollaboratory-liquid-pro/index.html">Coollaboratory
                                            Liquid Pro Thermal Compound Paste Grease Syringe Style</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Coollaboratory </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Liquid Pro </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 0.15 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $8.43 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B001PE5XAC?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31NPiORQwFL._SL75_.jpg"
                                                title="Coollaboratory Liquid Ultra 100% Metal Thermal Interface Material"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Coollaboratory Liquid Ultra">
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
                                            href="../../component-details/thermal-paste/coollaboratory-liquid-ultra-4260157580152/index.html">Coollaboratory
                                            Liquid Ultra 100% Metal Thermal Interface Material</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Coollaboratory </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> Liquid Ultra </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 0.15 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $11.19 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0039RY3MM?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/216xo1Eam+L._SL75_.jpg"
                                                title="Zalman Thermal Cooling Grease "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Zalman ZM STG2">
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
                                            href="../../component-details/thermal-paste/zalman-zm-stg2/index.html">Zalman
                                            Thermal Cooling Grease </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Zalman </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> ZM STG2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 3.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B002NX7QA4?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/21n3auv2T9L._SL75_.jpg"
                                                title="Prolimatech PK-3 Nano Aluminium Thermal Compound 1.5g"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Prolimatech PK-3 ">
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
                                            href="../../component-details/thermal-paste/prolimatech-pk-3-pk-3-1g/index.html">Prolimatech
                                            PK-3 Nano Aluminium Thermal Compound 1.5g</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Prolimatech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PK-3 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B008M5108Q?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/41j4P3MlJUL._SL75_.jpg"
                                                title="ARCTIC MX-2 (30 Grams) - Thermal Compound Paste, Carbon Based High Performance, Heatsink Paste, Thermal Compound CPU for All Coolers, Thermal Interface Material"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, ARCTIC MX-2">
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
                                            href="../../component-details/thermal-paste/arctic-mx-2-actcp00003b/index.html">ARCTIC
                                            MX-2 (30 Grams) - Thermal Compound Paste, Carbon Based High Performance,
                                            Heatsink Paste, Thermal Compound CPU for All Coolers, Thermal Interface
                                            Material</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> ARCTIC </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> MX-2 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 30 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $15.99 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B07LDRFCK5?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31wTYSDLcFL._SL75_.jpg"
                                                title="MASSCOOL Shin-ETSU Thermal Interface Cooling Material G751"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, MassCool G751">
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
                                            href="../../component-details/thermal-paste/masscool-g751/index.html">MASSCOOL
                                            Shin-ETSU Thermal Interface Cooling Material G751</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> MassCool </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> G751 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 0.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B000S35TB4?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/21IriwP1x4L._SL75_.jpg"
                                                title="Thermaltake CL-O001-GROSGM-A TG-4 Thermal Grease Compound Paste"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermaltake CL O001">
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
                                            href="../../component-details/thermal-paste/thermaltake-cl-o001-cl-o001-grosgm-a/index.html">Thermaltake
                                            CL-O001-GROSGM-A TG-4 Thermal Grease Compound Paste</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermaltake </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CL O001 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $5.78 </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00J0O09T4?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31eM1D1ONiL._SL75_.jpg"
                                                title="Thermaltake TG-3 Extreme Grade Thermal Grease "
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Thermaltake CLZ0022">
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
                                            href="../../component-details/thermal-paste/thermaltake-clz0022/index.html">Thermaltake
                                            TG-3 Extreme Grade Thermal Grease </a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Thermaltake </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> CLZ0022 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 4 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00BJ6UK4A?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/31J-gOfNSTL._SL75_.jpg"
                                                title="Prolimatech Pk-1 Nano Aluminum Thermal Compound - 1.5g"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Prolimatech PK-1 ">
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
                                            href="../../component-details/thermal-paste/prolimatech-pk-1-nano/index.html">Prolimatech
                                            Pk-1 Nano Aluminum Thermal Compound - 1.5g</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Prolimatech </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> PK-1 </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 1.5 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    N/A </td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B00EMNA920?tag=pcbuilder00-20" target="_blank"><i
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
                                                data-src="https://m.media-amazon.com/images/I/3138QeAkkwL._SL75_.jpg"
                                                title="Gelid Solutions GC-Extreme 10g Thermal Paste"
                                                alt="pc builder, custom pc builder, pc part picker, build my pc, Gelid Solutions GC EX10G">
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
                                            href="../../component-details/thermal-paste/gelid-solutions-gc-ex10g/index.html">Gelid
                                            Solutions GC-Extreme 10g Thermal Paste</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> Gelid Solutions </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> GC EX10G </div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Amount:</div>
                                            <div class="detail__value f_amount"> 10 Grams </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">
                                    $19.99 </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B008S1QC0K?tag=pcbuilder00-20" target="_blank"><i
                                            class="fab fa-amazon"></i> View on Amazon</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_50"
                                        href="javascript:void(0);" onclick="setid(50)"><i class="fa fa-plus"></i></a>
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
    function f_amount(id) {

        /*
        $('html, body').animate({
            scrollTop: $("#myTable").offset().top - 100
        }, 2000);
        */

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementsByClassName("amount");
        input = input[id];
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        if (filter == 'ALL') {
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    td = td.getElementsByClassName("f_amount")['0'];
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].classList.remove("c_amount");
                    } else {
                        tr[i].classList.remove("c_amount");
                    }
                }
            }
        } else {
            filter = ' ' + filter + ' ';
            if (input.checked) {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_amount")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_amount");
                        } else {
                            tr[i].classList.add("c_amount");
                        }
                    }
                }
            } else {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_amount")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_amount");
                        } else {
                            tr[i].classList.remove("c_amount");
                        }
                    }
                }
            }
        }
    }
</script>
@endpush
