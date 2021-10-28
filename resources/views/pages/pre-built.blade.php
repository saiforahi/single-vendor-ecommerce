@extends('layouts.app')
@push('style')
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

    .search {
        flex-grow: 0;
    }

    #myInput:focus {
        outline: none;
    }

    @media screen and (min-width: 767px) {
        .tool-design .upper-box .action-box {
            flex-basis: 33.5%;
        }
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
@endpush
@section('content')
<section class="pcb-breadcrumb">
    <h1>Looking for a Pre-Built PC?</h1>
    <p class="pcb-breadcrumb-p">If you don't want to get into the complexity of building a PC of your own and want a
        pre-built PC instead then here our some of the best picks of PC's for you.</p>
    <hr class="pcb-breadcrumb-hr">
    <span><a href="../index.html">Home</a>
        <i class="fa fa-angle-right"></i>
        <a href="index.html">Builts</a>
    </span>
</section>
<section class="system-builder pre-builts">
    <div class="container">
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
        <div class="row">
            <div class="col-12">
                <div class="nav nav-tabs flex-column text-center flex-md-row bg-white shadow-soft border border-light justify-content-around rounded mb-lg-3"
                    id="nav-tab" role="tablist">
                    <a class="nav-item nav-link rounded active" id="nav-content-research-tab" data-toggle="tab"
                        href="#nav-content-research" role="tab" aria-controls="nav-content-research"
                        aria-selected="true"><span class="d-block"><i class="fas fa-file-alt"></i><span
                                class="font-weight-bold"> Gaming Desktop</span></span></a>
                    <a class="nav-item nav-link rounded" id="nav-rank-track-tab" data-toggle="tab"
                        href="#nav-rank-track" role="tab" aria-controls="nav-rank-track" aria-selected="false"><i
                            class="fas fa-chart-line"></i><span class="font-weight-bold"> Cheap Desktop</span></a>
                    <a class="nav-item nav-link rounded" id="nav-web-monitor-tab" data-toggle="tab"
                        href="#nav-web-monitor" role="tab" aria-controls="nav-web-monitor" aria-selected="false"><i
                            class="far fa-bell"></i><span class="font-weight-bold"> All in One Desktop</span></a>
                </div>
                <div class="tab-content mt-5 mt-lg-6" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-content-research" role="tabpanel"
                        aria-labelledby="nav-content-research-tab">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-5">
                                <h3 class="mb-4">Pre-build Gaming PC</h3>
                                <p>Who isn't a fan of gaming, we all know which game to play from the 100s of
                                    available games as it's an easy choice, but when it comes to select a gaming pc
                                    to play our games, it seems so confusing as each pc look so same with the other
                                    which makes it difficult to make a perfect choice.</p>
                                <p>So, if you are also worried that you didn't end up buying a gaming pc not worth
                                    for your budget, then don't worry, we have made a list of the gaming PCs
                                    available on various eCommerce merchants and listed all the best PCs, so you'll
                                    always end up choosing the best one among the rest.</p>
                            </div>
                            <div class="col-12 col-md-6"><img class="img-fluid shadow rounded"
                                    src="../../images.pcbuilder.dev/assets/images/builds/pc-builds.jpg"
                                    alt="Gaming PC"></div>
                            <a href="gaming-pc/index.html" class="my-4 mb-5 d-block font-weight-bold btn-open"><i
                                    class="fas fa-external-link-alt mr-2"></i>Explore Pre-Built Gaming PC</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-rank-track" role="tabpanel"
                        aria-labelledby="nav-rank-track-tab">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-5">
                                <h3 class="mb-4">Pre-build Cheap PC</h3>
                                <p>Here goes another picky line on why you should have to buy a pre-built cheap PC
                                    when you can build one for you? So the first benefit of choosing the best cheap
                                    desktop is because it's cheap and it will help you to save your money on some
                                    other useful thing.</p>
                                <p>So if you're just looking for a PC which is ideal for daily works like browsing
                                    the internet and managing your office stuff - then here in this section, you can
                                    explore all the cheap PCs which is ideal for doing these works efficiently.</p>
                            </div>
                            <div class="col-12 col-md-6"><img class="img-fluid shadow rounded"
                                    src="../../images.pcbuilder.dev/assets/images/builds/pc-builds.jpg"
                                    alt="Cheap PC"></div>
                            <a href="cheap-pc/index.html" class="my-4 mb-5 d-block font-weight-bold btn-open"><i
                                    class="fas fa-external-link-alt mr-2"></i>Explore Pre-Built Cheap PC</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-web-monitor" role="tabpanel"
                        aria-labelledby="nav-web-monitor-tab">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-5">
                                <h3 class="mb-4">Pre-build AIO PC</h3>
                                <p>AIO or All-in-One Desktops comes pre-equipped with a keyboard, mouse, and
                                    monitor, which reduces your load and tension to search for them manually and is
                                    perfect for people who do usual works and basic gaming.</p>
                                <p>So if you're looking for an AIO laptop for your children to help them do their
                                    school work and projects, then here in this section, you can explore the top PCs
                                    which are exclusively picked by our editorial team for extreme performance.</p>
                            </div>
                            <div class="col-12 col-md-6"><img class="img-fluid shadow rounded"
                                    src="../../images.pcbuilder.dev/assets/images/builds/pc-builds.jpg"
                                    alt="AIO PC"></div>
                            <a href="aio-pc/index.html" class="my-4 mb-5 d-block font-weight-bold btn-open"><i
                                    class="fas fa-external-link-alt mr-2"></i>Explore Pre-Built AIO PC</a>
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
        "@id": "https://pcbuilder.net/builts/",
        "name": "Builts"
        }
      }
        ]
    }
</script>
@endpush