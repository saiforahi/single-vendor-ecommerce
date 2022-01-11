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
                                                    @foreach ($brands as $brand)
                                                    <div class="checkbox"> <label> <input id="{{ $loop->index + 1 }}"
                                                                type="checkbox" onclick="f_brand({{ $loop->index + 1 }});"
                                                                class="option-input checkbox brand" name="filter['brand']"
                                                                value="{{ $brand->brand }}"> <span
                                                                class="ml-10">{{ $brand->brand }}
                                                                ({{ \App\Models\Speaker::where('brand', $brand->brand)->count() }})
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
                       
                        <tbody>
                            @foreach ($speakers as $speaker )
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
                                            href="{{ route('speakers-details', ['id' => $speaker->id]) }}">{{ $speaker->name }}</a></div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand"> {{ $speaker->brand }} </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model"> {{ $speaker->model }} </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Stock:</div>
                                            <div class="detail__value f_stock"> {{ $speaker->product->stock }} </div>
                                        </div>
                                    </span>
                                    {{-- <span class="table_span">

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
                                    </span> --}}

                                </td>
                                <td class="price">
                                    {{ $speaker->product->price }} </td>

                                <td><a class="btn btn-primary component-btn"
                                        href="{{ route('speakers-details', ['id' => $speaker->id]) }}" target="_blank">View
                                        Details</a></td>
                                <td class="remove"><a class="btn btn-danger component-add-btn" id="p_1"
                                        href="{{ route('add-speaker-to-system', ['speaker_id' => $speaker->id]) }}"><i
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
<script type="application/ld+json">
    {
     "@context": "http://schema.org",
     "@type": "BreadcrumbList",
     "itemListElement":
     [
      {
       "@type": "ListItem",
       "position": 1,
       "item":
       {
        "@id": "https://pcbuilder.net/",
        "name": "PC Builder"
        }
      },
      {
       "@type": "ListItem",
       "position": 2,
       "item":
       {
        "@id": "https://pcbuilder.net/product/",
        "name": "Product"
        }
      },
      {
       "@type": "ListItem",
      "position": 3,
      "item":
       {
         "@id": "https://pcbuilder.net/product/speakers/",
         "name": "Speakers"
       }
      }
     ]
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
@endpush
