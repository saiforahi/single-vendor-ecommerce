@extends('layouts.app')

@push('style')
    <style>
        .product-info {
            /*box-shadow: 0 2px 4px #fff, -2px 0 4px #fff;*/
            padding: 10px;
            margin-top: 40px;
        }

        .product-info h4 {
            padding-bottom: .5rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #717184;
            font-size: 20px;
        }



        .product-info .title {
            font-weight: 600;
        }


        .level1 {
            font-size: 17px;
            font-weight: 700;
            border-bottom: 1px solid #717184;
            padding-bottom: 0.4rem;
            margin-bottom: 2rem;
        }

        .product-info .level1>span {}




        .level2 {
            position: relative;
            font-size: 15px;
            font-weight: 400;
            padding-left: 20px;
            border: none;
            border-top: 1px dotted #37374d;
            padding-top: 0.4rem;
            margin-top: 0.4rem;
            padding-bottom: 0.4rem;
            margin-bottom: 0.4rem;
        }

        .level2 .key {
            font-weight: 600;
        }

        .level2:before {
            content: "";
            background: url("../../../assets/images/arrow5e1f.svg?v=2") no-repeat 0 0;
            display: inline-block;
            margin-right: 5px;
            background-size: 100%;

            margin-left: -18px;
            width: 14px;
            height: 14px;
            position: absolute;
            top: 11px;
            left: 16px;

        }

        .level3 {
            font-size: 12px;
            font-weight: 400;
            padding-left: 30px;
            border: none;
            border-top: 1px dotted #37374d;
            padding-bottom: 0.15rem;
            margin-bottom: 0.15rem;
            position: relative;
        }

        .level3:before {

            content: "";
            background: url("../../../assets/images/arrow5e1f.svg?v=2") no-repeat 0 0;
            display: inline-block;
            margin-right: 5px;
            background-size: 100%;

            margin-left: -12px;
            width: 10px;
            height: 10px;
            position: absolute;
            top: 5px;
            left: 22px;
        }

        .product-info .level3>span {}

        .level4 {
            font-size: 10px;
            font-weight: 500;
            padding-left: 35px;
            border: none;
            padding-bottom: 0rem;
            margin-bottom: 0rem;
        }

    </style>
    <style>
        .sticky {
            /*position: sticky!important;
                        top: 80px;*/
        }

    </style>
    <style>
        @media screen and (min-width: 768px) {
            ul {
                padding-right: 100px;
            }
        }

    </style>
     <style>
        .budget-price {
            color: #fff !important;
            font-size: 35px;
            font-weight: 600;
            margin-bottom: 20px;
        }

    </style>
    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
        }


        .btn2 {
            background: linear-gradient(to bottom, #95ffce, #08b18a);
            border: none;
            color: #1d2b36;
            font-weight: 600;
            padding: 15px 30px;
            margin-right: 10px;
        }

        .btn1 {
            background: linear-gradient(to bottom, #f7dfa5, #f0c14b);
            border: none;
            color: #1d2b36;
            font-weight: 600;
            padding: 15px 30px;
        }



        .btn2:hover {
            color: #4a008e;
        }

        .btn1:hover {
            color: #630000;
        }

        @media screen and (max-width: 768px) {
            .btn1 {
                margin-top: 10px;
                width: 100%;
            }

            .btn2 {
                width: 100%;
            }
        }

    </style>
@endpush

@section('content')
    <section class="pcb-breadcrumb">
        <h2>TP-Link TL-N150 (TL-WN725N)</h2>
        <span><a href="../../../index.html">Home</a>
            <i class="fa fa-angle-right"></i><a href="../../../product/wireless-network-adapter/index.html">Wireless Network
                Adapter</a>
            <i class="fa fa-angle-right"></i><a href="index.html">TP-Link TL-N150</a></span>
    </section>
    <div class="container-fluid component-details">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="carousel slide" id="main-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item img-gradient active">
                            <img class="d-block img-fluid big-image lazy"
                                title="TP-Link TL-N150 USB 2.0 based WiFi Adapter for Desktop PC"
                                data-src="https://m.media-amazon.com/images/I/41Tru8oLwtL.jpg"
                                alt="Build My PC, PC Builder, TP-Link TL-N150">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="TP-Link TL-N150 USB 2.0 based WiFi Adapter for Desktop PC"
                                data-src="https://m.media-amazon.com/images/I/418tG3LxNOL.jpg"
                                alt="Build My PC, PC Builder, TP-Link TL-N150">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="TP-Link TL-N150 USB 2.0 based WiFi Adapter for Desktop PC"
                                data-src="https://m.media-amazon.com/images/I/511hDIZ9aLL.jpg"
                                alt="Build My PC, PC Builder, TP-Link TL-N150">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="TP-Link TL-N150 USB 2.0 based WiFi Adapter for Desktop PC"
                                data-src="https://m.media-amazon.com/images/I/41MZsXeyZ1L.jpg"
                                alt="Build My PC, PC Builder, TP-Link TL-N150">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="TP-Link TL-N150 USB 2.0 based WiFi Adapter for Desktop PC"
                                data-src="https://m.media-amazon.com/images/I/31iq250bvBL.jpg"
                                alt="Build My PC, PC Builder, TP-Link TL-N150">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="TP-Link TL-N150 USB 2.0 based WiFi Adapter for Desktop PC"
                                data-src="https://m.media-amazon.com/images/I/51jSg2388kL.jpg"
                                alt="Build My PC, PC Builder, TP-Link TL-N150">
                        </div>
                        <div class="carousel-item img-gradient">
                            <img class="d-block img-fluid big-image lazy"
                                title="TP-Link TL-N150 USB 2.0 based WiFi Adapter for Desktop PC"
                                data-src="https://m.media-amazon.com/images/I/31cOieEh9hL.jpg"
                                alt="Build My PC, PC Builder, TP-Link TL-N150">
                        </div>
                    </div>
                    <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon temp"></span>
                        <span class="sr-only" aria-hidden="true">Prev</span>
                    </a>
                    <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only" aria-hidden="true">Next</span>
                    </a>
                    <ol class="carousel-indicators">
                        <li data-target="#main-carousel" data-slide-to="0" class="active">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="1">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="2">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="3">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="4">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="5">
                        </li>
                        <li data-target="#main-carousel" data-slide-to="6">
                        </li>
                    </ol>
                </div>

            </div>
            
            <div class="col-12 col-md-9 pl-md-5 pr-md-5">
                <h1>TP-Link TL-N150 USB 2.0 based WiFi Adapter for Desktop PC</h1>
                <div class="pcb-product-summary">
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
                    <div>&nbsp;&nbsp;(33289 Total Review)</div>
                    <div class="hot-selling float-right d-none">
                        <i class="fa fa-fire hot" aria-hidden="true"></i> &nbsp;Hot Selling
                    </div>
                </div>
                <hr style="padding:1.5px ; background-color:darkgray">
                <div class="description">
                    <p>Looking for a wireless network adapter? The TP-Link N150 is a USB based network adapter that supports
                        up to 150 MBPS of WiFi speed. It is ideal for online streaming and gaming with lag-free experience.
                    </p>
                    <p>The TP-Link is compatible with Windows (XP/7/8/8. 1/10) Mac OS (10. 9 - 10. 15) Linux Kernel (2. 6.
                        18 - 4. 4. 3) operating system and it comes with 2-year warranty and 2.4 GHz WiFi band.</p>
                </div>
                
                <div class="sticky-top" style="top: 80px">
                    <h4 class="price">Product Features </h4>
                    <ul>
                        <li><span>TP-Link N150 (TL-WN725N) supports WiFi speed up to 150 MBPS for lag free video streaming
                                and online gaming.</span></li>
                        <li><span>It supports the 2.4 GHz of WiFi band and allows you to simply plug it in and use.</span>
                        </li>
                        <li><span>It supports 64/128 WEP, WPA/WPA2, WPA psk/WPA2 psk (TKIP/AES), and IEEE 802. 1x wireless
                                security.</span></li>
                        <li><span>The TP Link N150 comes with 2 years warranty and 24/7 technical support.</span></li>
                        <li><span>The component is compatible with Windows (XP/7/8/8. 1/10) Mac OS (10. 9 - 10. 15) Linux
                                Kernel (2. 6. 18 - 4. 4. 3)</span></li>
                        <li><span>Driver installation may be required, Please go to to Link website for the latest driver
                                for your operating systems</span></li>
                    </ul>

                   
                    <div class="budget-price">$9.89</div>
                    
                    <div class="align-button">
                        <a href="javascript:void(0);" onclick="setid('wireless-network-adapter',1)"
                            class="btn btn-primary btn2 "><i class="fa fa-plus"></i> Add Product to List</a>
                        <a href="https://amazon.com/dp/B008IFXQFU?tag=pcbuilder00-20" target="_blank"
                            class="btn btn-primary btn1 "><i class="fab fa-amazon"></i> View on Amazon </a>
                    </div>
                </div>
            </div>
            <div class="product-info d-md-none">
                <h4><strong>Product Specification</strong></h4>
                <div class="level1"><span class="title">General</span>
                    <div class="level2"><span class="key">Interface</span> : <span>USB 2.0</span></div>
                    <div class="level2"><span class="key">LED</span> : <span>Status</span></div>
                    <div class="level2"><span class="key">Antenna</span> : <span>Internal antenna</span>
                    </div>
                    <div class="level2"><span class="key">Standards</span> : <span>IEEE
                            802.11b/g/n</span></div>
                    <div class="level2"><span class="key">Frequency</span> : <span>2.400-2.4835GHz</span>
                    </div>
                    <div class="level2"><span class="title">Signal Rate</span>
                        <div class="level3"><span class="key"></span><span>11b: Up to 11Mbps
                                (dynamic)</span></div>
                        <div class="level3"><span class="key"></span><span>
                                11g: Up to 54Mbps (dynamic)</span></div>
                        <div class="level3"><span class="key"></span><span>
                                11n: Up to 150Mbps (dynamic)</span></div>
                    </div>
                    <div class="level2"><span class="title">Wireless Sensitivity</span>
                        <div class="level3"><span class="key"></span><span>130M: [email protected]%
                                PER</span></div>
                        <div class="level3"><span class="key"></span><span>
                                108M: [email protected]% PER</span></div>
                        <div class="level3"><span class="key"></span><span>
                                54M: [email protected]% PER</span></div>
                        <div class="level3"><span class="key"></span><span>
                                11M: [email protected]% PER</span></div>
                        <div class="level3"><span class="key"></span><span>
                                6M: [email protected]% PER</span></div>
                        <div class="level3"><span class="key"></span><span>
                                1M: [email protected]% PER</span></div>
                    </div>
                    <div class="level2"><span class="key">Wireless Modes</span> : <span>Ad-Hoc /
                            Infrastructure mode</span></div>
                    <div class="level2"><span class="key">Wireless Security</span> : <span>Supports
                            64/128 WEP, WPA/WPA2, WPA-PSK/WPA2-PSK (TKIP/AES), supports IEEE 802.1X</span></div>
                    <div class="level2"><span class="key">Modulation</span> : <span>DBPSK, DQPSK, CCK,
                            OFDM, 16-QAM, 64-QAM</span></div>
                    <div class="level2"><span class="key">Certifications</span> : <span>CE, FCC, IC,
                            RoHS</span></div>
                    <div class="level2"><span class="key">System Requirements</span> : <span>Windows
                            7(32/64bits), Windows Vista(32/64bits), Windows XP(32/64bits)</span></div>
                    <div class="level2"><span class="title">Environmental Requirements</span>
                        <div class="level3"><span class="key"></span><span>Operating Temperature:
                                32-104°F / 0-40°C</span></div>
                        <div class="level3"><span class="key"></span><span>
                                Storage Temperature: -40-158°F / -40-70°C</span></div>
                        <div class="level3"><span class="key"></span><span>
                                Operating Humidity: 10-90% non-condensing</span></div>
                        <div class="level3"><span class="key"></span><span>
                                Storage Humidity: 5-90% non-condensing</span></div>
                    </div>
                    <div class="level2"><span class="key">Dimensions (W x D x H)</span> : <span>0.73 x
                            0.59 x 0.28" / 18.6 x 15 x 7.1 mm</span></div>
                    <div class="level2"><span class="key">Weight</span> : <span>0.07 ounces / 2.1
                            grams</span></div>
                </div>
                <div class="level1"><span class="title">Packaging Info</span>
                    <div class="level2"><span class="key">Package Weight</span> : <span>0.15 lb</span>
                    </div>
                    <div class="level2"><span class="key">Box Dimensions (LxWxH)</span> : <span>5.9 x
                            5.45 x 1.2"</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
