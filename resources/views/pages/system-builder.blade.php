@extends('layouts.app')
@section('content')
    <section class="pcb-breadcrumb">
        <h1>System Builder</h1>
        <span><a href="{{route('home')}}">Home</a><i class="fa fa-angle-right"></i><a href="{{route('system-builder')}}">System
                Builder</a></span>
    </section>
    <section class="system-builder">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tool-design">
                        <div class="upper-box">
                            <div data-toggle="tooltip" title="Copy Link!" id="selectable"
                                onclick="selectText('selectable','link')" class="copy-link"><i class="fa fa-link"
                                    aria-hidden="true"></i>
                                <div class="link px-2">https://pcbuilder.net/rigs/zydTX7/</div>
                                <i class="fa fa-clone pl-2" aria-hidden="true"></i>
                            </div>
                            <div class="action-box">
                                <div class="action-box-item ">Markup:</div>
                                <div id="reddit" class="action-box-item" data-toggle="tooltip" title="Copy Reddit Markup!"
                                    onclick="markup('reddit');"><i class="fab fa-reddit-alien" aria-hidden="true"></i></div>
                                <div id="html" class="action-box-item" data-toggle="tooltip" title="Copy Html Markup!"
                                    onclick="markup('html');"><i class="fa fa-code" aria-hidden="true"></i></div>
                                <div id="text" class="action-box-item" data-toggle="tooltip" title="Copy Text Markup!"
                                    onclick="markup('text');"><i class="fa fa-text-width" aria-hidden="true"></i></div>
                                <div id="forum" class="action-box-item" data-toggle="tooltip" title="Copy Forum Markup!"
                                    onclick="markup('forum');"><i class="fa fa-bold" aria-hidden="true"></i></div>
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
                            <div class="compatibility"><i class="inline-icon fa fa-check-circle pr-2"
                                    aria-hidden="true"></i>
                                Compatibility: No issues or incompatibilities found.</div>
                            <div class="estimation"><i class="fa fa-bolt px-2" aria-hidden="true"></i>
                                Estimated Wattage: 0W</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                    </div>
                </div>
            </div>
            <div class="px-0 py-3 col-12">
                <table class="table table-design">
                    <thead>
                        <tr>
                            <th scope="col" width="12%">Component</th>
                            <th scope="col" width="9%">Product</th>
                            <th scope="col" width="47%">Title</th>
                            <th scope="col" width="7%">Price</th>
                            <th scope="col" width="18%">Product Link</th>
                            <th scope="col" width="7%">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="{{route('processor-list')}}">Processor</a>
                            </td>
                            @if (Session::has('system') && Session::get('system')->get_processor() != '')
                                <?php $processor = Session::get('system')->get_processor(); ?>
                                <td>
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $processor->product->getMedia('main_image'); ?>
                                            <img src="{{ $images[0]->getUrl('thumb') }}" title="{{ $processor->name }}"
                                                class="img-responsive" alt="{{ $processor->name }}">
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
                                            href="/component-details/processor/amd-ryzen-threadripper-3990x-100-100000163wof/">{{ $processor->name }}</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value">{{ $processor->brand }}</div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value">{{ $processor->model }}</div>
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
                                                class="viewMore6">View
                                                More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
                                    </span>
                                </td>
                                <td class="price">
                                    ৳ {{$processor->product->price}}</td>
                                <td><a class="btn btn-primary component-btn"
                                        href="https://amazon.com/dp/B0815SBQ9W?tag=pcbuilder00-20" target="_blank">Buy from
                                        System Builder</a></td>
                                <td class="remove"><a class="btn btn-danger component-delete-btn" id="processor0"
                                        href="{{ route('remove-processor-from-system') }}"><i
                                            class="fa fa-trash"></i></a></td>

                            @else
                                <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                        href="{{ route('processor-list') }}"><i class="fa fa-plus"></i> ADD Component
                                    </a>
                                </td>
                            @endif

                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="../product/motherboard/index.html">Motherboard</a>
                            </td>
                            <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                    href="../product/motherboard/index.html"><i class="fa fa-plus"></i> ADD Component
                                </a></td>
                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="../product/cpu-cooler/index.html">CPU Cooler</a>
                            </td>
                            <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                    href="../product/cpu-cooler/index.html"><i class="fa fa-plus"></i> ADD Component
                                </a></td>
                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="../product/case/index.html">Case</a>
                            </td>
                            <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                    href="../product/case/index.html"><i class="fa fa-plus"></i> ADD Component </a>
                            </td>
                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="../product/graphics-card/index.html">Graphics Card</a>
                            </td>
                            <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                    href="../product/graphics-card/index.html"><i class="fa fa-plus"></i> ADD Component
                                </a></td>
                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="{{route('memory-list')}}">RAM</a>
                            </td>
                            @if(Session::has('system') && Session::get('system')->get_memory() != '')
                            <?php $memory = Session::get('system')->get_memory(); ?>
                            <td scope="row" class="component d-sm-none">
                                <a href="index.html">#</a>
                            </td>
                            <td class="box">
                                <div class="logo-name">
                                    <div class="item-logo">
                                        <?php $images = $memory->product->getMedia('main_image'); ?>
                                        <img src="{{$images[0]->getUrl('main_image')}}" class="img-responsive lazy img-fluid"
                                            data-src="{{$images[0]->getUrl('main_image')}}"
                                            title="{{$memory->name}}"
                                            alt="{{$memory->name}}">
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
                                        href="{{route('memory-details',['id'=>$memory->id])}}">{{$memory->name}}</a></div>
                                <span class="table_span">
                                    <div class="detail">
                                        <div class="detail__name">Brand:</div>
                                        <div class="detail__value f_brand"> G.Skill </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Model:</div>
                                        <div class="detail__value f_model"> Trident Z Royal </div>
                                    </div>
                                </span>
                                <span class="table_span">

                                    <div class="detail">
                                        <div class="detail__name">RAM Size:</div>
                                        <div class="detail__value f_ram">{{json_decode($memory->memory_specs,true)['ram_size']==null?'':json_decode($memory->memory_specs,true)['ram_size']}}</div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">Quantity:</div>
                                        <div class="detail__value f_ram_quantity"> 2 x 8 GB </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">RAM Type:</div>
                                        <div class="detail__value f_ram_type"> DDR4 </div>
                                    </div>
                                </span><span class="table_span view-more-185" style="display: none;">
                                    <div class="detail">
                                        <div class="detail__name">RAM Speed:</div>
                                        <div class="detail__value f_ram_speed"> 4800 MHz </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">DIMM Type:</div>
                                        <div class="detail__value f_dimm_type"> 288-Pin </div>
                                    </div>
                                    <div class="detail">
                                        <div class="detail__name">CAS Latency:</div>
                                        <div class="detail__value f_cas_latency"> CL18 </div>
                                    </div>
                                </span>

                                <span class="view-more">
                                    <div class="view-More185" onclick="viewMore(185);"><span
                                            class="viewMore185">View More Details</span> <i
                                            class="fas fa-chevron-circle-down"></i></div>
                                </span>
                            </td>
                            <td class="price">৳{{$memory->product->price}}</td>
                            <td><a class="btn btn-primary component-btn"
                                    href="{{route('memory-details',['id'=>$memory->id])}}" target="_blank">View Details</a></td>
                            <td class="remove"><a class="btn btn-danger component-add-btn" id="p_185"
                                href="{{route('remove-memory-from-system')}}"><i class="fa fa-trash"></i></a>
                            </td>
                            @else
                            <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                href="{{route('memory-list')}}"><i class="fa fa-plus"></i> ADD Component </a></td>
                            @endif
                            
                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="{{route('storage-list')}}">Storage</a>
                            </td>
                            @if (Session::has('system') && Session::get('system')->get_storage() != '')
                                <?php $storage = Session::get('system')->get_storage(); ?>

                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $storage->product->getMedia('main_image'); ?>
                                            <img src="{{ $images[0]->getUrl('main_image') }}"
                                                class="img-responsive lazy img-fluid"
                                                data-src="{{ $images[0]->getUrl('main_image') }}"
                                                title="{{ $storage->name }}" alt="{{ $storage->name }}">
                                            {{-- <div class="stars-rating" title="4.9 out of 5">
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
                                        </div> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="{{ route('storage-details', ['id' => $storage->id]) }}">{{ $storage->name }}</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand">{{ $storage->brand }}</div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model">{{ $storage->model }}</div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Capacity:</div>
                                            <div class="detail__value f_capacity"> 1 TB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_storage_type"> SSD </div>
                                        </div>
                                        <div class="detail d-none">
                                            <div class="detail__name">RPM:</div>
                                            <div class="detail__value f_rpm"> </div>
                                        </div>
                                    </span><span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe 3.0 x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Cache Memory:</div>
                                            <div class="detail__value f_cache_memory"> 1024 MB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Form Factor:</div>
                                            <div class="detail__value f_form_factor"> M.2-2280 </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">৳{{ $storage->product->price }}</td>
                                <td><a class="btn btn-primary component-btn"
                                        href="{{ route('storage-details', ['id' => $storage->id]) }}"
                                        target="_blank">View
                                        details</a></td>
                                
                                <td class="remove"><a class="btn btn-danger component-delete-btn" id="storage0"
                                    href="{{ route('remove-storage-from-system') }}"><i
                                        class="fa fa-trash"></i></a></td>
                                

                            @else
                                <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                        href="{{route('storage-list')}}"><i class="fa fa-plus"></i> ADD Component
                                    </a>
                                </td>
                            @endif
                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="{{route('cpu-coolers-list')}}">CPU Cooler</a>
                            </td>
                            @if (Session::has('system') && Session::get('system')->get_cooler() != '')
                                <?php $cooler = Session::get('system')->get_storage(); ?>

                                <td scope="row" class="component d-sm-none">
                                    <a href="index.html">#</a>
                                </td>
                                <td class="box">
                                    <div class="logo-name">
                                        <div class="item-logo">
                                            <?php $images = $cooler->product->getMedia('main_image'); ?>
                                            <img src="{{ $images[0]->getUrl('main_image') }}"
                                                class="img-responsive lazy img-fluid"
                                                data-src="{{ $images[0]->getUrl('main_image') }}"
                                                title="{{ $cooler->name }}" alt="{{ $cooler->name }}">
                                            {{-- <div class="stars-rating" title="4.9 out of 5">
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
                                        </div> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="comp-details">
                                    <div class="table_title"><a
                                            href="{{ route('cpu-coolers-details', ['id' => $cooler->id]) }}">{{ $cooler->name }}</a>
                                    </div>
                                    <span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Brand:</div>
                                            <div class="detail__value f_brand">{{ $cooler->brand }}</div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Model:</div>
                                            <div class="detail__value f_model">{{ $cooler->model }}</div>
                                        </div>
                                    </span>
                                    <span class="table_span">

                                        <div class="detail">
                                            <div class="detail__name">Capacity:</div>
                                            <div class="detail__value f_capacity"> 1 TB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Type:</div>
                                            <div class="detail__value f_storage_type"> SSD </div>
                                        </div>
                                        <div class="detail d-none">
                                            <div class="detail__name">RPM:</div>
                                            <div class="detail__value f_rpm"> </div>
                                        </div>
                                    </span><span class="table_span">
                                        <div class="detail">
                                            <div class="detail__name">Interface:</div>
                                            <div class="detail__value f_interface"> PCIe 3.0 x4 </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Cache Memory:</div>
                                            <div class="detail__value f_cache_memory"> 1024 MB </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail__name">Form Factor:</div>
                                            <div class="detail__value f_form_factor"> M.2-2280 </div>
                                        </div>
                                    </span>

                                </td>
                                <td class="price">৳{{ $cooler->product->price }}</td>
                                <td><a class="btn btn-primary component-btn"
                                        href="{{ route('cooler-details', ['id' => $cooler->id]) }}"
                                        target="_blank">View
                                        details</a></td>
                                
                                <td class="remove"><a class="btn btn-danger component-delete-btn" id="storage0"
                                    href="{{ route('remove-cooler-from-system') }}"><i
                                        class="fa fa-trash"></i></a></td>
                                

                            @else
                                <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                        href="{{route('cpu-coolers-list')}}"><i class="fa fa-plus"></i> ADD Component
                                    </a>
                                </td>
                            @endif
                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="../product/power-supply/index.html">Power Supply</a>
                            </td>
                            <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                    href="../product/power-supply/index.html"><i class="fa fa-plus"></i> ADD Component
                                </a></td>
                        </tr>
                        <tr class="items">
                            <td scope="row" class="component">
                                <a href="../product/monitor/index.html">Monitor</a>
                            </td>
                            <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                    href="../product/monitor/index.html"><i class="fa fa-plus"></i> ADD Component </a>
                            </td>
                        </tr>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        </td>
                        <tr class="items extra">
                            <td scope="row" class="component">
                                <a>Accessories</a>
                            </td>
                            <td colspan="6" class="comps">
                                <a href="../product/keyboard/index.html">Keyboard</a>, <a
                                    href="../product/mouse/index.html">Mouse</a>, <a
                                    href="../product/thermal-paste/index.html">Thermal Paste</a>, <a
                                    href="../product/speakers/index.html">Speakers</a>, <a
                                    href="../product/ups/index.html">UPS</a>, <a
                                    href="../product/headphone/index.html">Headphone</a>, <a
                                    href="../product/external-hard-drive/index.html">External Hard Drive</a>, <a
                                    href="../product/webcam/index.html">Webcam</a>, <a
                                    href="../product/optical-drive/index.html">Optical Drive</a>
                            </td>
                        </tr>
                        <tr class="items extra">
                            <td scope="row" class="component">
                                <a>Expensions / Networking</a>
                            </td>
                            <td colspan="6" class="comps">
                                <a href="../product/sound-card/index.html">Sound Card</a>, <a
                                    href="../product/wireless-network-adapter/index.html">Wireless Network Adapter</a>,
                                <a href="../product/wired-network-adapter/index.html">Wired Network Adapter</a>
                            </td>
                        </tr>
                        <tr class="items extra">
                            <td scope="row" class="component">
                                <a>Softwares</a>
                            </td>
                            <td colspan="6" class="comps">
                                <a href="../product/softwares/index.html#operating-system">Operating System</a>, <a
                                    href="../product/softwares/index.html#antivirus">Antivirus</a>, <a
                                    href="../product/softwares/index.html#utilities">Utilities</a>
                            </td>
                        </tr>
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
            "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@id": "https://pcbuilder.net/",
                        "name": "PC Builder"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@id": "https://pcbuilder.net/list/",
                        "name": "System Builder"
                    }
                }
            ]
        }
    </script>
@endpush
