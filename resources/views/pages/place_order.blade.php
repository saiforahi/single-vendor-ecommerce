@extends('layouts.app')
@push('style')
    <style>
        .pre-built .content .image {
            width: 100%;
        }


        .disabled {
            pointer-events: none;
        }

        .page-content {
            background-color: #f6f7f9;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .page-content h2 {
            font-weight: 700;
            font-size: 30px;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .page-content p {
            font-size: 18px;
            color: black;
            font-weigt: 400;
            padding: 2px 0;
            line-height: 30px;
        }

        .page-content .content {
            background-color: #ffffff;
            padding: 40px;
            border: 2px solid #e7f2f7;
        }

        .page-content .notice-box {
            padding: 1em;
            border-width: 1px;
            border-style: solid;
            background-color: #001119ca;
            border-color: #001119ca;
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
        }

        .page-content .notice-box p {
            font-size: 16px;
            color: #ffffff;
        }



        @media screen and (max-width: 767px) {
            nav .navbar-nav li:first-child {
                padding-left: 0;
                padding-right: 0;
            }
        }

        @media screen and (min-width: 992px) {
            #my-search {
                display: none !important;
            }
        }

        #my-search {
            border-top: 1px solid var(--headerBorderColor);
            border-bottom: 1px solid var(--headerBorderColor);
        }

        #my-search .mega-search {
            position: static;
            height: 100vh;
            padding-top: 30px;
        }


        .search-result a {
            padding: 7px;
            color: white;
            font-weight: 600;
            text-decoration: none;
        }

        .search-result a:hover {
            color: #18AE91;
            background-color: transparent;
        }

        .search-for {
            color: white;
            padding: 5px 20px;
        }

        div.search-result {
            color: white;
            font-weight: 600;
            border-bottom: 1px solid var(--headerBorderColor);
            display: flex;
            flex-wrap: wrap;
            padding: 12px 5px;
            justify-content: center;
        }

        .search-image {
            margin: auto;
            flex: 0 0 18%;
            width: 85px;
            height: 85px;
            padding: 3px 0;

        }

        .search-link {
            flex: 0 0 72%;
        }

        .search-buttons {
            flex: 0 0 100%;
            display: flex;
            justify-content: space-between;
        }

        .search-buttons .btn-amazon {
            flex: 0 0 49%;
            background-color: #E18E2E;
            color: #fff;
        }

        .search-buttons .btn-amazon:hover {
            background-color: #E18E2E;
            color: #fff;
        }

        .search-buttons .btn-view {
            flex: 0 0 49%;
            background-color: #4D71A3;
            color: #fff;
        }

        .search-buttons .btn-view:hover {
            background-color: #4D71A3;
            color: #fff;
        }



        /* search page coding */
        .pcb-search {
            color: white;
            background-color: #001119;
        }

        @media only screen and (min-width: 768px) {

            .pcb-search {
                padding: 20px 150px;
            }

            .search-image {
                flex: 0 0 10% !important;
                padding: 3px 0;
                margin: auto;
            }

            .search-link {
                flex: 0 0 55% !important;
                justify-content: center;
                margin: auto;
            }

            .search-buttons {
                flex: 0 0 30% !important;
                display: flex;
                justify-content: space-between;
            }

            .search-buttons .btn-amazon {
                margin: auto;
                padding: 7px;
            }

            .search-buttons .btn-view {
                margin: auto;
                padding: 7px;
            }

        }

    </style>
    <style>
        html,
        * {
            touch-action: manipulation;
        }

        .carousel.pointer-event {
            touch-action: pan-y pinch-zoom;
        }

        .copy-link {
            cursor: pointer;
        }

        header {
            justify-content: space-between;
        }

        .search {
            flex-grow: 1;
        }

        .change-country {
            width: auto;
            height: 35px;
            border-radius: 0% !important;
        }

        .pcb-country .dropdown-menu {
            top: 50px !important;
            left: -50px !important;
        }

        .pcb-country .dropdown-item {
            color: #001119 !important;
            font-size: 12px;
            padding-left: 12px;
            cursor: pointer;
        }

        .pcb-country .dropdown-image {
            height: 20px;
            padding-right: 10px;
        }

        .selectbox li {
            list-style-type: none;
        }


        .selectbox .pcb-country .dropdown-menu {
            top: 17px !important;
            right: 0;
            margin-left: 34px;
        }

        @media screen and (max-width: 768px) {
            .selectbox .pcb-country .dropdown-menu {
                margin: 0;
            }

            .pcb-country .dropdown-menu {
                top: 50px !important;
                left: -27px !important;
            }
        }

        .selectbox .change-country {
            padding-right: 7px;
            height: 22px;
        }

        .selectbox .country {
            font-size: 12px;
        }

        .tool-design .upper-box>* {
            padding: 0 12px !important;
        }

        .selectbox {
            margin: 0 auto;
        }

    </style>
    <style>
        .modal-content {
            background-color: #3d4144 !important;
            color: #ffffff !important;
        }

        #exampleModal [type="radio"]:checked+label,
        #exampleModal [type="radio"]:not(:checked)+label {
            color: #ffffff !important;
        }

    </style>
    <style>
        @media only screen and (max-width: 768px) {
            .items>td:nth-child(3)>* {
                margin-bottom: 0px !important;
            }

            .items>td:nth-child(5),
            .items>td:nth-child(6) {
                margin-top: 12px !important;
            }
        }

        .system-builder table tbody .comp-details .table_span .detail {
            padding-top: 10px !important;
        }


        .view-more {
            margin-top: -6px !important;
        }

        .view-more span,
        .view-more i {
            cursor: pointer;
        }

        .stars-rating {
            color: #d0e8f0;
            position: relative;
            display: inline-block;

        }

        .stars-rating .stars-score {
            color: #80c1d5;
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden;
            width: 20%;
            white-space: nowrap;
        }

        .stars-scale {
            white-space: nowrap;
        }

        .pcb-breadcrumb {
            padding-left: 10px;
            padding-right: 10px;
        }

        .pcb-breadcrumb h1 {
            color: white;
            font-weight: 600;
            -webkit-column-break-after: always;
            break-after: always;
            font-size: 2rem;
        }

    </style>
    <style>
        body {
            background: #ABCDEF;
        }

        .login-page {
            color: white;
            background: background: #001119;
            background:
                -webkit-linear-gradient(to right, #001119, #3b426e);
            background:
                linear-gradient(to right, #001119, #3b426e);
            margin: auto;
            box-shadow:
                0px 2px 10px rgba(0, 0, 0, 0.2),
                0px 10px 20px rgba(0, 0, 0, 0.3),
                0px 30px 60px 1px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            padding: 60px;
        }

        .login-page .head {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-page .head .company {
            font-size: 2.2em;
        }

        .login-page .msg {
            color: white;
            text-align: center;
        }

        .login-page .form input[type=text].text {
            border: none;
            background: none;
            box-shadow: 0px 2px 0px 0px white;
            width: 100%;
            color: white;
            font-size: 1em;
            outline: none;
        }

        .login-page .form .text::placeholder {
            color: #D3D3D3;
        }

        .login-page .form input[type=password].password {
            border: none;
            background: none;
            box-shadow: 0px 2px 0px 0px white;
            width: 100%;
            color: white;
            font-size: 1em;
            outline: none;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .login-page .form .password::placeholder {
            color: #D3D3D3;
        }

        .login-page .form .btn-login {
            background: none;
            text-decoration: none;
            color: white;
            box-shadow: 0px 0px 0px 2px white;
            border-radius: 3px;
            padding: 5px 2em;
            transition: 0.5s;
        }

        .login-page .form .btn-login:hover {
            background: white;
            color: dimgray;
            transition: 0.5s;
        }

        .login-page .forgot {
            text-decoration: none;
            color: white;
            float: right;
        }

        @media screen and (max-width: 768px) {

            form {
                margin-bottom: 20px;
            }

            .btn-login {
                margin-bottom: 10px;
            }

            .login-page .forgot {
                padding-top: 3px;
                float: none;
                text-align: center;
            }

            .login-page {
                padding: 60px 30px;
            }
        }

    </style>
@endpush
@section('content')
    <section class="pcb-breadcrumb">
        <h1>Place Your Order</h1>
        <span>
            <a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{ route('place_order') }}">Place Your Order</a>
        </span>
    </section>
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-12 col-md-8 content">
                    <section class="login-page" id="login-page">
                        <div class='head'>
                            <img src="{{ asset('images/logo-80.png') }}">
                            <h1 class='company'>Shipping information</h1>
                        </div>
                        {{-- <p class='msg'>Create Your Account</p> --}}
                        <div class='form'>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <form method="POST" action="{{ route('place_order') }}" id="idForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control mb-3" placeholder="Name" name="name" id="name"
                                            value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="email" class="form-control mb-3" placeholder="Email" name="email"
                                            value="{{ Auth::user()->email }}" autocomplete="email" readonly>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control mb-3" placeholder="Phone" name="phone"
                                            value="{{ Auth::user()->phone }}" required>
                                    </div>

                                </div>
                                {{-- <div class="row">
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control mb-3" placeholder="Username"
                                        name="username" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="email" class="form-control mb-3" placeholder="Email" name="email"
                                        required>
                                </div>
                            </div> --}}
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <textarea type="text" class="form-control mb-3" placeholder="Shipping Address"
                                            name="shipping_address" required></textarea>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                        value="option1" required>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Cash On Delivery *
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                        value="option1" disabled>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Bkash
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                        value="option1" disabled>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Nagad
                                    </label>
                                </div>
                                <br>
                                <button type="submit" value="submit" name="login" class="btn-md btn-login"
                                    id="do-login">Place Your Order</button>
                            </form>
                            <a href="{{ route('cart') }}" class="forgot">Forgot something?</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
