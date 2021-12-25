@extends('layouts.app')

@push('style')
    <style>
        .c_brand {
            display: none !important;
        }

    </style>
    <style>
        .c_capacity_w {
            display: none !important;
        }

    </style>
    <style>
        .c_capacity_v {
            display: none !important;
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
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h1><span></span> Your Dashboard</h1>
        <span><a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i><a href="../index.html">Dashboard</a>
           
        </span>
    </section>
    <a href="#open-modal" class="float">
        <i class="fa fa-filter my-float"></i>
    </a>
    <section class="system-builder">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 modal-window" id="open-modal">
                    
                </div>
                <div class="col-12 col-md-10">
                    
                    
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
         "@id": "https://pcbuilder.net/product/ups/",
         "name": "UPS"
       }
      }
     ]
    }
    </script>
<script>
    function f_capacity_w(id) {

        /*
        $('html, body').animate({
            scrollTop: $("#myTable").offset().top - 100
        }, 2000);
        */

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementsByClassName("capacity_w");
        input = input[id];
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        if (filter == 'ALL') {
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    td = td.getElementsByClassName("f_capacity_w")['0'];
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].classList.remove("c_capacity_w");
                    } else {
                        tr[i].classList.remove("c_capacity_w");
                    }
                }
            }
        } else {
            filter = ' ' + filter + ' ';
            if (input.checked) {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity_w")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity_w");
                        } else {
                            tr[i].classList.add("c_capacity_w");
                        }
                    }
                }
            } else {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity_w")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity_w");
                        } else {
                            tr[i].classList.remove("c_capacity_w");
                        }
                    }
                }
            }
        }
    }
</script>
<script>
    function f_capacity_v(id) {

        /*
        $('html, body').animate({
            scrollTop: $("#myTable").offset().top - 100
        }, 2000);
        */

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementsByClassName("capacity_v");
        input = input[id];
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        if (filter == 'ALL') {
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    td = td.getElementsByClassName("f_capacity_v")['0'];
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].classList.remove("c_capacity_v");
                    } else {
                        tr[i].classList.remove("c_capacity_v");
                    }
                }
            }
        } else {
            filter = ' ' + filter + ' ';
            if (input.checked) {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity_v")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity_v");
                        } else {
                            tr[i].classList.add("c_capacity_v");
                        }
                    }
                }
            } else {
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        td = td.getElementsByClassName("f_capacity_v")['0'];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("c_capacity_v");
                        } else {
                            tr[i].classList.remove("c_capacity_v");
                        }
                    }
                }
            }
        }
    }
</script>

@endpush
