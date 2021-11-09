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
</style>
<style>
    .row-flex {
        display: flex;
        flex-wrap: wrap;
        font-family: 'Roboto', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
        font-size: 1.6em;
        font-weight: 300;
        letter-spacing: .01em;
        line-height: 1.6;
        padding-top: 20px;
    }

    .content-gap {
        display: flex;
        flex-wrap: wrap;
        flex: 1 1 0px;
        margin-bottom: 50px;
    }

    .content {
        height: 100%;
        padding: 12px;
        box-sizing: border-box;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.30), 0 -1px 2px rgba(0, 0, 0, 0.30);
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .content:hover {
        -ms-transform: scale(1.03);
        /* IE 9 */
        -webkit-transform: scale(1.03);
        /* Safari 3-8 */
        transform: scale(1.01);
        box-shadow: 0 10px 12px rgba(0, 0, 0, 0.30), 0 6px 10px rgba(0, 0, 0, 0.22), 0 -5px 10px rgba(0, 0, 0, 0.30);
        cursor: pointer;
    }


    .colour-1 {
        /*#70AE6E; #82204A #558C8C #483C46 #3C6E71 #917C78 66*/
    }

    .content h3,
    .content p {
        /*color:white;*/
    }

    .product-image {
        position: relative;
        transition: all .3s ease 0s;
        overflow: hidden;
    }

    .product-image img {
        overflow: hidden;
        position: absolute;
        margin: auto;
        right: 0;
        bottom: 0;
        top: 0;
        left: 0;
    }

    .content .product-image {
        height: 150px;
        margin-left: auto;
        margin-right: auto;
    }

    .content .pic-2 {
        display: none;
        position: absolute;
        margin: auto;
        right: 0;
        bottom: 0;
        top: 0;
        left: 0;
        z-index: 99;
    }

    .content:hover .pic-2 {
        height: 150px;
        display: table;
        margin: auto;
    }

    .content-information {
        border-top: 1px solid #a9a9a9;
        position: relative;
        height: auto;
        font-size: 13px;
        color: #2a2a2a;
        border-top: 1px dashed #001119;
        display: flex !important;
        flex-wrap: wrap;
    }

    .content-information .content-detail {
        -ms-flex-align: center !important;
        justify-content: center !important;
        align-items: center !important;
        height: 65px;
        border-bottom: 1px dashed #001119;
        flex: 0 50%;
    }

    .content-information div:nth-child(even) {
        font-weight: 600;
        padding-left: 25px;
    }

    .content-information div:nth-child(odd) {
        border-right: 1px dashed #001119;
        font-weight: 600;
        padding-left: 25px;
    }
</style>
<style>
    .pre-builts {
        background-color: #dae2e5;
        padding-top: 30px;
    }

    .pre-builts .component-btn {
        display: inline-block;
        /* padding: 5px 15px; */
        background-color: #1d3f66;
        border-radius: 5px;
        -webkit-transition: all .3s;
        transition: all .3s;
        color: white;
        font-size: 14px;
        white-space: nowrap;
    }

    h4 {
        font-size: 1.2rem;
        font-weight: 700;
    }

    h3 {
        padding-top: 14px;
        font-size: 1.2rem;
        font-weight: 700;

        font-size: 28px;
        text-transform: capitalize;
        color: #001119;
    }



    @media screen and (min-width: 767px) {
        .tool-design .upper-box .action-box {
            flex-basis: 33.5%;
        }
    }

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
        border-radius: 6px;
        color: #5b5b5b;
    }

    .component-icons {
        position: absolute;
        left: 3px;
        width: 20px;
        height: 20px;
        /* top: 15px; */
}
</style>
<style>
    .pcb-breadcrumb-p {
        color: white;
        margin-top: 0;
        width: 70%;
        margin-bottom: 1rem;
        text-align: center;
        margin: auto;
    }

    .pcb-breadcrumb-hr {
        background-color: #ffffff4a !important;
        margin: auto;
        width: 16%;
        margin-top: 10px;
        margin-bottom: 5px;
    }

    @media screen and (max-width: 767px) {
        .pcb-breadcrumb-p {
            width: 90%;
        }

        .pcb-breadcrumb-hr {
            width: 60%;
        }
    }
</style>
<style>
    .shadow-soft {
        box-shadow: 0 .75rem 1.5rem rgba(18, 38, 63, .03) !important;
    }

    .nav-tabs .nav-link {
        border: 0;
        padding: 1rem;
        background-color: #fff;
    }

    .bg-white {
        background-color: #fff !important;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #1d3f66;
        background-color: #f3f7fa;
        border-color: #f0f3f6 #f0f3f6 #f3f7fa;
    }

    .nav-tabs .nav-link.active {
        color: #fff;
        background-color: #1d3f66;
    }

    .rounded {
        border-radius: .5rem !important;
    }

    .nav-link {
        color: #4a5073;
    }


    .nav-tabs {
        padding: 0.6rem 1rem;
    }

    .pre-builts .nav-item {
        flex-basis: 33%;
        padding: 0.7rem !important;
    }

    .btn-open {
        align-items: center;
        text-align: center;
        margin: 0 auto;
        background-color: #1e3f66;
        padding: 0.8rem 1rem;
        color: white;
        border-radius: 5px;
    }

    .btn-open:hover {
        text-decoration: none;
        outline: none;
        color: white;
        background-color: #1e3f66;
    }
</style>
@endpush
@section('content')
<section class="pcb-breadcrumb">
    <h1>Looking for a Laptop?</h1>
    <p class="pcb-breadcrumb-p">Looking for the best laptop and confused between which one to choose? I know its too
        hard and if you want to buy one, then here are some of the handpicked laptops for you!</p>
    <hr class="pcb-breadcrumb-hr">
    <span><a href="../index.html">Home</a>
        <i class="fa fa-angle-right"></i>
        <a href="index.html">Laptop</a>
    </span>
</section>
<section class="system-builder pre-builts">
    <div class="container">
        
        <div class="row">
            <div class="col-12">
                <div class="nav nav-tabs flex-column text-center flex-md-row bg-white shadow-soft border border-light justify-content-around rounded mb-lg-3"
                    id="nav-tab" role="tablist">
                    <a class="nav-item nav-link rounded active" id="nav-content-research-tab" data-toggle="tab"
                        href="#nav-content-research" role="tab" aria-controls="nav-content-research"
                        aria-selected="true"><span class="d-block"><i class="fas fa-file-alt"></i><span
                                class="font-weight-bold"> Gaming Laptop</span></span></a>
                    <a class="nav-item nav-link rounded" id="nav-rank-track-tab" data-toggle="tab"
                        href="#nav-rank-track" role="tab" aria-controls="nav-rank-track" aria-selected="false"><i
                            class="fas fa-chart-line"></i><span class="font-weight-bold"> Business Laptop</span></a>
                    <a class="nav-item nav-link rounded" id="nav-web-monitor-tab" data-toggle="tab"
                        href="#nav-web-monitor" role="tab" aria-controls="nav-web-monitor" aria-selected="false"><i
                            class="far fa-bell"></i><span class="font-weight-bold"> Cheap Laptop</span></a>
                </div>
                <div class="tab-content mt-5 mt-lg-6" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-content-research" role="tabpanel"
                        aria-labelledby="nav-content-research-tab">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-5">
                                <h3 class="mb-4">Gaming Laptop</h3>
                                <p>Looking for the best gaming laptop and confused between which one to choose from
                                    the tons of available laptops? Don't worry, we're here to help you with choosing
                                    the best laptop according to your budget and needs.</p>
                                <p>And for this, we've handpicked some of the best laptops available in the market
                                    which you can get today and experience the performance.</p>
                            </div>
                            <div class="col-12 col-md-6"><img class="img-fluid shadow rounded"
                                src="{!!asset('images/builds/pc-builds.jpg')!!}"
                                    alt="Gaming PC"></div>
                            <a href="{!!route('laptop-list',['type'=>'gaming'])!!}"
                                class="my-4 mb-5 d-block font-weight-bold btn-open"><i
                                    class="fas fa-external-link-alt mr-2"></i>Explore Gaming Laptop</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-rank-track" role="tabpanel"
                        aria-labelledby="nav-rank-track-tab">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-5">
                                <h3 class="mb-4">Business Laptop</h3>
                                <p>Do you know what makes a business laptop different from other laptops? Its the
                                    way they work and handle the data for you. It should be smaller in size, so you
                                    can carry it easily with you.</p>
                                <p>So if you're here to buy a professional laptop, then here at PC Builder; we've
                                    also picked some of the best laptops which are handy for your work.</p>
                            </div>
                            <div class="col-12 col-md-6"><img class="img-fluid shadow rounded"
                                    src="{!!asset('images/builds/pc-builds.jpg')!!}"
                                    alt="Cheap PC"></div>
                            <a href="{!!route('laptop-list',['type'=>'buisness'])!!}"
                                class="my-4 mb-5 d-block font-weight-bold btn-open"><i
                                    class="fas fa-external-link-alt mr-2"></i>Explore Business Laptop</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-web-monitor" role="tabpanel"
                        aria-labelledby="nav-web-monitor-tab">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-5">
                                <h3 class="mb-4">Cheap Laptop</h3>
                                <p>We know it's hard and time taking process to grab the best laptop under a limited
                                    budget - but with PC Builder; you don't need to worry anymore about finding the
                                    right laptops for your needs in a limited budget.</p>
                                <p>We have picked and arranged some of the best budget laptops for you which are
                                    more than enough for your daily needs, including browsing the internet, doing
                                    work in MS-Office, and a lot more things you could ever imagined.</p>
                            </div>
                            <div class="col-12 col-md-6"><img class="img-fluid shadow rounded"
                                src="{!!asset('images/builds/pc-builds.jpg')!!}"
                                    alt="AIO PC"></div>
                            <a href="{!!route('laptop-list',['type'=>'cheap'])!!}" class="my-4 mb-5 d-block font-weight-bold btn-open"><i
                                    class="fas fa-external-link-alt mr-2"></i>Explore Cheap Laptop</a>
                        </div>
                    </div>
                </div>
            </div>
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
        "@id": "https://pcbuilder.net/laptop/",
        "name": "Laptop"
        }
      }
        ]
    }
</script>
@endpush