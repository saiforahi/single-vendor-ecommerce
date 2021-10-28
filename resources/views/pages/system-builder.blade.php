@extends('layouts.app')
@section('content')
<section class="pcb-breadcrumb">
    <h1>System Builder</h1>
    <span><a href="../index.html">Home</a><i class="fa fa-angle-right"></i><a href="index.html">System
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
                            <div id="reddit" class="action-box-item" data-toggle="tooltip"
                                title="Copy Reddit Markup!" onclick="markup('reddit');"><i
                                    class="fab fa-reddit-alien" aria-hidden="true"></i></div>
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
                            <a href="../product/processor/index.html">Processor</a>
                        </td>
                        <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                href="../product/processor/index.html"><i class="fa fa-plus"></i> ADD Component </a>
                        </td>
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
                                href="../product/case/index.html"><i class="fa fa-plus"></i> ADD Component </a></td>
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
                            <a href="../product/ram/index.html">RAM</a>
                        </td>
                        <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                href="../product/ram/index.html"><i class="fa fa-plus"></i> ADD Component </a></td>
                    </tr>
                    <tr class="items">
                        <td scope="row" class="component">
                            <a href="../product/storage/index.html">Storage</a>
                        </td>
                        <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                href="../product/storage/index.html"><i class="fa fa-plus"></i> ADD Component </a>
                        </td>
                    </tr>
                    <tr class="items">
                        <td scope="row" class="component">
                            <a href="../product/case-cooler/index.html">Case Cooler</a>
                        </td>
                        <td class="select-comp" colspan=6><a class="btn btn-primary component-btn"
                                href="../product/case-cooler/index.html"><i class="fa fa-plus"></i> ADD Component
                            </a></td>
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
        "@id": "https://pcbuilder.net/list/",
        "name": "System Builder"
        }
      }
     ]
    }
    </script>
@endpush