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
        .td-text-center{
            /* text-align: center !important; */
            vertical-align: inherit !important;
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
        .c_micro_architecture {
            display: none !important;
        }

        .c_brand {
            display: none !important;
        }

        .c_socket_type {
            display: none !important;
        }

        .c_series {
            display: none !important;
        }

        .c_cores {
            display: none !important;
        }

        .c_integrated_graphics {
            display: none !important;
        }

        .c_unlocked {
            display: none !important;
        }

        .c_core_family {
            display: none !important;
        }

        .btn-login {
            background: none;
            text-decoration: none;
            color: rgb(0, 0, 0);
            box-shadow: 0px 0px 0px 2px white;
            border-radius: 3px;
            padding: 5px 2em;
            transition: 0.5s;

            font-weight: 700;
            font-size: 17px;
            white-space: nowrap;
        }

    </style>
@endpush
@section('content')
    <section class="pcb-breadcrumb">
        <h1>Your Cart</h1>
        <span><a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i><a href="{{ route('cart') }}">Cart</a>
        </span>
    </section>
    <section class="system-builder">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-1">
                    <table id="myTable" class="table table-design">
                        <thead>
                            <tr>
                                <th class="d-sm-none" scope="col" width="12%">#</th>
                                <th scope="col" width="15%">Product</th>
                                <th scope="col" width="25%">Name</th>
                                <th scope="col" width="15%">Price</th>
                                <th scope="col" width="35%">Quantity</th>
                                <th scope="col" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Cart::count() > 0)
                                @foreach (\Cart::content() as $item)
                                    <tr class="items" data-href="#">
                                        <td scope="row" class="component d-sm-none">
                                            <a href="index.html">#</a>
                                        </td>
                                        <td class="box">
                                            <div class="logo-name">
                                                <div class="item-logo">
                                                    <?php $images = App\Models\Product::find($item->id)->getMedia('main_image'); ?>
                                                    <img src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
                                                        class="img-responsive lazy img-fluid"
                                                        data-src="{{ count($images) > 0 ? $images[0]->getUrl('main_image') : asset('images/dummy-thumbnail') }}"
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
                                        <td class="comp-details td-text-center">
                                            <div class="table_title"><a
                                                    href="{{ route('processor-details', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                            </div>
                                            {{-- <span class="table_span">
                                                <div class="detail">
                                                    <div class="detail__name">Brand:</div>
                                                    <div class="detail__value f_brand">{{ $item->brand }}</div>
                                                </div>
                                                <div class="detail">
                                                    <div class="detail__name">Model:</div>
                                                    <div class="detail__value f_model">{{ $item->model }}</div>
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
                                            </span> --}}
                                            {{-- <div id="content" class="d-none">
                                                <div>
                                                    <div class="circle green">100</div>
                                                    <p>PCB Benchmark
                                                    <p>
                                                </div>{{ $processor->product->price }}<div>
                                                    <div class="circle red">%</div>
                                                    <p>Value for Money
                                                    <p>
                                                </div>
                                            </div> --}}
                                        </td>

                                        <td class="price td-text-center">
                                            ৳ {{ $item->price }} </td>
                                        <td class="td-text-center">
                                            <div class="form">
                                                <form>
                                                    {{-- <input class="form-control mb-3" /> --}}
                                                    <div class="input-group" style="width: 130px;">
                                                        <span class="input-group-btn mr-1">
                                                            <button class="btn btn-number" onclick="update_qty('{{$loop->index}}','{{ $item->rowId }}',document.getElementById('quantity'+'{{$loop->index}}').value,'minus')" id="decrement_btn" type="button" data-type="minus">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            
                                                        </span>
                                                        <input type="text" id="quantity{{$loop->index}}"
                                                            class="form-control h-auto input-number text-center"
                                                            placeholder="1" value="{{$item->qty}}" min="1" max="10">
                                                        <span class="input-group-btn ml-1" >
                                                            <button class="btn btn-number" onclick="update_qty('{{$loop->index}}','{{ $item->rowId }}',document.getElementById('quantity'+'{{$loop->index}}').value,'plus')" id="increment_btn" type="button" data-type="plus">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>

                                        </td>
                                        <td class="td-text-center"><a class="btn btn-danger component-add-btn"
                                                id="{{ 'p_' . $item->id }}"
                                                href="{{ route('remove-from-cart', ['product_id' => $item->rowId]) }}"><i
                                                    class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="col-md-2">
                    <div class="filter-sidebar FilterParameters" id="FilterParameters">
                        <div style="border-radius: 0.25rem;" class="filters-text">
                            <span class="filter-span">Prices</span>
                            <span style="float:right; color:#ffffff!important;"><i style="color:#ffffff!important;"
                                    class="fa fa-filter"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="text pl-1" id="sub_total_text">Sub Total : {{Cart::subtotal()}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="text pl-1">Tax : {{Cart::tax()}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="text pl-1" id="total_text">Total : {{Cart::total()}}</span>
                            </div>
                        </div>
                        <div class="card-group mt-5" id="accordion1" aria-multiselectable="false">
                            <div class="card panel-default">
                                <button type="button" onclick="window.location.href='/place-order'" <?php if (Cart::count() < 1){ ?> disabled <?php   } ?> class="btn-md btn-login"
                                    id="do-login">Checkout</button>
                            </div>
                        </div>
                        <div class="modal-bottom">
                            <a href="#" title="Close" class="d-md-none modal-close btn btn-primary">Close</a>
                            <a href="#" class="d-md-none modal-close btn btn-primary">Apply Filters</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@push('script')
<script>
    function update_qty(idx,row_id,value,type){
        if(type == 'minus'){
            document.getElementById('quantity'+idx).value = (parseInt(document.getElementById('quantity'+idx).value)-1) >0 ? (parseInt(document.getElementById('quantity'+idx).value)-1) : 1
        }
        else{
            document.getElementById('quantity'+idx).value = parseInt(document.getElementById('quantity'+idx).value)+1
        }
        $.post('{{ route('update_cart_item_quantity') }}', {_token:'{{ @csrf_token() }}',row_id:row_id,qty:type=='minus'?(parseInt(value)-1):(parseInt(value)+1)}, function(data){
            console.log('res',data)
            document.getElementById('sub_total_text').innerText='Sub Total : '+data.subtotal
            document.getElementById('total_text').innerText='Total : '+data.total
        });
    }
    
</script>
@endpush
