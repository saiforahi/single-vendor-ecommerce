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
@endpush

@section('content')
<section class="pcb-breadcrumb">
    <h1><span>Select</span> Your Processor</h1>
    <span><a href="{{ route('home') }}">Home</a>
    <i class="fa fa-angle-right"></i><a href="../index.html">Product</a>
    <i class="fa fa-angle-right"></i><a href="{{ route('processor-list') }}">Processor</a>
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
        <span style="float:right; color:#ffffff!important;"><i style="color:#ffffff!important;" class="fa fa-filter"></i></span>
        </div>
         <div class="card-group" id="accordion1" role="tablist" aria-multiselectable="false">
        <div class="card panel-default">
        <div class="card-header" role="tab" id="heading1">
        <h4 class="card-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse1" aria-expanded="true" aria-controls="collapse1"> Manufacturer </a> </h4>
        </div>
        <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1">
        <div class="card-body">
        <div class="checkbox"> <label> <input id="0" type="checkbox" onclick="f_brand(this.id);" class="option-input checkbox brand" name="filter['brand']" value="All" checked> <span class="ml-10">All </span></label> </div>
        <div class="checkbox"> <label> <input id="1" type="checkbox" onclick="f_brand(this.id);" class="option-input checkbox brand" name="filter['brand']" value="AMD"> <span class="ml-10">AMD (43) </span></label> </div>
        <div class="checkbox"> <label> <input id="2" type="checkbox" onclick="f_brand(this.id);" class="option-input checkbox brand" name="filter['brand']" value="Intel"> <span class="ml-10">Intel (121) </span></label> </div>
        </div>
        </div>
        </div>
        </div>
        <style>
                              .c_brand {
                                  display:none!important;
                              }
                          </style>
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
                              if(filter == 'ALL')
                              {
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
                              else
                              {
                                  filter = ' '+filter+' ';
                                  if (input.checked) 
                                  {
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
                                  }
                                  else
                                  {
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
        <div class="card-group" id="accordion2" role="tablist" aria-multiselectable="false">
        <div class="card panel-default">
        <div class="card-header" role="tab" id="heading2">
        <h4 class="card-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2" aria-expanded="false" aria-controls="collapse1"> Socket </a> </h4>
        </div>
        <div id="collapse2" class="collapse " role="tabpanel" aria-labelledby="heading2">
        <div class="card-body">
        <div class="checkbox"> <label> <input id="0" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="All" checked> <span class="ml-10">All </span></label> </div>
        <div class="checkbox"> <label> <input id="1" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="AM4"> <span class="ml-10">AM4 (33) </span></label> </div>
        <div class="checkbox"> <label> <input id="2" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="LGA 1150"> <span class="ml-10">LGA 1150 (8) </span></label> </div>
        <div class="checkbox"> <label> <input id="3" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="LGA 1151"> <span class="ml-10">LGA 1151 (55) </span></label> </div>
        <div class="checkbox"> <label> <input id="4" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="LGA 1156"> <span class="ml-10">LGA 1156 (1) </span></label> </div>
        <div class="checkbox"> <label> <input id="5" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="LGA 1200"> <span class="ml-10">LGA 1200 (31) </span></label> </div>
        <div class="checkbox"> <label> <input id="6" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="LGA 2011"> <span class="ml-10">LGA 2011 (6) </span></label> </div>
        <div class="checkbox"> <label> <input id="7" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="LGA 2066"> <span class="ml-10">LGA 2066 (20) </span></label> </div>
        <div class="checkbox"> <label> <input id="8" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="sTR4"> <span class="ml-10">sTR4 (7) </span></label> </div>
        <div class="checkbox"> <label> <input id="9" type="checkbox" onclick="f_socket_type(this.id);" class="option-input checkbox socket_type" name="filter['socket_type']" value="sTRX4"> <span class="ml-10">sTRX4 (3) </span></label> </div>
        </div>
        </div>
        </div>
        </div>
        <style>
                              .c_socket_type {
                                  display:none!important;
                              }
                          </style>
        <script>
                            function f_socket_type(id) {
                              
                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */
                                
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementsByClassName("socket_type");
                              input = input[id];
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");
                              if(filter == 'ALL')
                              {
                                  for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_socket_type")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_socket_type");
                                          } else {
                                            tr[i].classList.remove("c_socket_type");
                                          }
                                        }       
                                      }
                              }
                              else
                              {
                                  filter = ' '+filter+' ';
                                  if (input.checked) 
                                  {
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_socket_type")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_socket_type");
                                          } else {
                                            tr[i].classList.add("c_socket_type");
                                          }
                                        }       
                                      }
                                  }
                                  else
                                  {
                                     for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_socket_type")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_socket_type");
                                          } else {
                                            tr[i].classList.remove("c_socket_type");
                                          }
                                        }       
                                      } 
                                  }
                              }
                            }
                            </script>
        <div class="card-group" id="accordion3" role="tablist" aria-multiselectable="false">
        <div class="card panel-default">
        <div class="card-header" role="tab" id="heading3">
        <h4 class="card-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse3" aria-expanded="false" aria-controls="collapse1"> Series </a> </h4>
        </div>
        <div id="collapse3" class="collapse " role="tabpanel" aria-labelledby="heading3">
        <div class="card-body">
        <div class="checkbox"> <label> <input id="0" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="All" checked> <span class="ml-10">All </span></label> </div>
        <div class="checkbox"> <label> <input id="1" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="3"> <span class="ml-10">3 (7) </span></label> </div>
        <div class="checkbox"> <label> <input id="2" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="5"> <span class="ml-10">5 (12) </span></label> </div>
        <div class="checkbox"> <label> <input id="3" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="7"> <span class="ml-10">7 (9) </span></label> </div>
        <div class="checkbox"> <label> <input id="4" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="9"> <span class="ml-10">9 (5) </span></label> </div>
        <div class="checkbox"> <label> <input id="5" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="Threadripper"> <span class="ml-10">Threadripper (10) </span></label> </div>
        <div class="checkbox"> <label> <input id="6" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="i3"> <span class="ml-10">i3 (19) </span></label> </div>
        <div class="checkbox"> <label> <input id="7" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="i5"> <span class="ml-10">i5 (36) </span></label> </div>
        <div class="checkbox"> <label> <input id="8" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="i7"> <span class="ml-10">i7 (39) </span></label> </div>
        <div class="checkbox"> <label> <input id="9" type="checkbox" onclick="f_series(this.id);" class="option-input checkbox series" name="filter['series']" value="i9"> <span class="ml-10">i9 (27) </span></label> </div>
        </div>
        </div>
        </div>
        </div>
        <style>
                              .c_series {
                                  display:none!important;
                              }
                          </style>
        <script>
                            function f_series(id) {
                              
                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */
                                
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementsByClassName("series");
                              input = input[id];
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");
                              if(filter == 'ALL')
                              {
                                  for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_series")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_series");
                                          } else {
                                            tr[i].classList.remove("c_series");
                                          }
                                        }       
                                      }
                              }
                              else
                              {
                                  filter = ' '+filter+' ';
                                  if (input.checked) 
                                  {
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_series")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_series");
                                          } else {
                                            tr[i].classList.add("c_series");
                                          }
                                        }       
                                      }
                                  }
                                  else
                                  {
                                     for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_series")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_series");
                                          } else {
                                            tr[i].classList.remove("c_series");
                                          }
                                        }       
                                      } 
                                  }
                              }
                            }
                            </script>
        <div class="card-group" id="accordion4" role="tablist" aria-multiselectable="false">
        <div class="card panel-default">
        <div class="card-header" role="tab" id="heading4">
        <h4 class="card-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#collapse4" aria-expanded="false" aria-controls="collapse1"> Cores </a> </h4>
        </div>
        <div id="collapse4" class="collapse " role="tabpanel" aria-labelledby="heading4">
        <div class="card-body">
        <div class="checkbox"> <label> <input id="0" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="All" checked> <span class="ml-10">All </span></label> </div>
        <div class="checkbox"> <label> <input id="1" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="2"> <span class="ml-10">2 (9) </span></label> </div>
        <div class="checkbox"> <label> <input id="2" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="4"> <span class="ml-10">4 (49) </span></label> </div>
        <div class="checkbox"> <label> <input id="3" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="6"> <span class="ml-10">6 (38) </span></label> </div>
        <div class="checkbox"> <label> <input id="4" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="8"> <span class="ml-10">8 (33) </span></label> </div>
        <div class="checkbox"> <label> <input id="5" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="10"> <span class="ml-10">10 (10) </span></label> </div>
        <div class="checkbox"> <label> <input id="6" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="12"> <span class="ml-10">12 (8) </span></label> </div>
        <div class="checkbox"> <label> <input id="7" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="14"> <span class="ml-10">14 (3) </span></label> </div>
        <div class="checkbox"> <label> <input id="8" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="16"> <span class="ml-10">16 (6) </span></label> </div>
        <div class="checkbox"> <label> <input id="9" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="18"> <span class="ml-10">18 (3) </span></label> </div>
        <div class="checkbox"> <label> <input id="10" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="24"> <span class="ml-10">24 (2) </span></label> </div>
        <div class="checkbox"> <label> <input id="11" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="32"> <span class="ml-10">32 (2) </span></label> </div>
        <div class="checkbox"> <label> <input id="12" type="checkbox" onclick="f_cores(this.id);" class="option-input checkbox cores" name="filter['cores']" value="64"> <span class="ml-10">64 (1) </span></label> </div>
        </div>
        </div>
        </div>
        </div>
        <style>
                              .c_cores {
                                  display:none!important;
                              }
                          </style>
        <script>
                            function f_cores(id) {
                              
                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */
                                
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementsByClassName("cores");
                              input = input[id];
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");
                              if(filter == 'ALL')
                              {
                                  for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_cores")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_cores");
                                          } else {
                                            tr[i].classList.remove("c_cores");
                                          }
                                        }       
                                      }
                              }
                              else
                              {
                                  filter = ' '+filter+' ';
                                  if (input.checked) 
                                  {
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_cores")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_cores");
                                          } else {
                                            tr[i].classList.add("c_cores");
                                          }
                                        }       
                                      }
                                  }
                                  else
                                  {
                                     for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_cores")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_cores");
                                          } else {
                                            tr[i].classList.remove("c_cores");
                                          }
                                        }       
                                      } 
                                  }
                              }
                            }
                            </script>
        <div class="card-group" id="accordion5" role="tablist" aria-multiselectable="false">
        <div class="card panel-default">
        <div class="card-header" role="tab" id="heading5">
        <h4 class="card-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapse5" aria-expanded="false" aria-controls="collapse1"> Integrated Graphics </a> </h4>
        </div>
        <div id="collapse5" class="collapse " role="tabpanel" aria-labelledby="heading5">
        <div class="card-body">
        <div class="checkbox"> <label> <input id="0" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="All" checked> <span class="ml-10">All </span></label> </div>
        <div class="checkbox"> <label> <input id="1" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value=" Intel UHD Graphics 750"> <span class="ml-10"> Intel UHD Graphics 750 (1) </span></label> </div>
        <div class="checkbox"> <label> <input id="2" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Intel HD Graphics 4600"> <span class="ml-10">Intel HD Graphics 4600 (7) </span></label> </div>
        <div class="checkbox"> <label> <input id="3" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Intel Iris Pro Graphics 6200"> <span class="ml-10">Intel Iris Pro Graphics 6200 (1) </span></label> </div>
        <div class="checkbox"> <label> <input id="4" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Intel UHD Graphics 630"> <span class="ml-10">Intel UHD Graphics 630 (32) </span></label> </div>
        <div class="checkbox"> <label> <input id="5" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Intel UHD Graphics 730"> <span class="ml-10">Intel UHD Graphics 730 (1) </span></label> </div>
        <div class="checkbox"> <label> <input id="6" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Intel UHD Graphics 750"> <span class="ml-10">Intel UHD Graphics 750 (5) </span></label> </div>
        <div class="checkbox"> <label> <input id="7" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Intel HD Graphics 510"> <span class="ml-10">Intel HD Graphics 510 (3) </span></label> </div>
        <div class="checkbox"> <label> <input id="8" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Intel HD Graphics 530"> <span class="ml-10">Intel HD Graphics 530 (9) </span></label> </div>
        <div class="checkbox"> <label> <input id="9" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Intel HD Graphics 630"> <span class="ml-10">Intel HD Graphics 630 (13) </span></label> </div>
        <div class="checkbox"> <label> <input id="10" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="None"> <span class="ml-10">None (88) </span></label> </div>
        <div class="checkbox"> <label> <input id="11" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Radeon RX Vega 11"> <span class="ml-10">Radeon RX Vega 11 (2) </span></label> </div>
        <div class="checkbox"> <label> <input id="12" type="checkbox" onclick="f_integrated_graphics(this.id);" class="option-input checkbox integrated_graphics" name="filter['integrated_graphics']" value="Radeon Vega 8"> <span class="ml-10">Radeon Vega 8 (2) </span></label> </div>
        </div>
        </div>
        </div>
        </div>
        <style>
                              .c_integrated_graphics {
                                  display:none!important;
                              }
                          </style>
        <script>
                            function f_integrated_graphics(id) {
                              
                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */
                                
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementsByClassName("integrated_graphics");
                              input = input[id];
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");
                              if(filter == 'ALL')
                              {
                                  for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_integrated_graphics")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_integrated_graphics");
                                          } else {
                                            tr[i].classList.remove("c_integrated_graphics");
                                          }
                                        }       
                                      }
                              }
                              else
                              {
                                  filter = ' '+filter+' ';
                                  if (input.checked) 
                                  {
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_integrated_graphics")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_integrated_graphics");
                                          } else {
                                            tr[i].classList.add("c_integrated_graphics");
                                          }
                                        }       
                                      }
                                  }
                                  else
                                  {
                                     for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_integrated_graphics")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_integrated_graphics");
                                          } else {
                                            tr[i].classList.remove("c_integrated_graphics");
                                          }
                                        }       
                                      } 
                                  }
                              }
                            }
                            </script>
        <div class="card-group" id="accordion6" role="tablist" aria-multiselectable="false">
        <div class="card panel-default">
        <div class="card-header" role="tab" id="heading6">
        <h4 class="card-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion6" href="#collapse6" aria-expanded="false" aria-controls="collapse1"> Unlocked </a> </h4>
        </div>
        <div id="collapse6" class="collapse " role="tabpanel" aria-labelledby="heading6">
        <div class="card-body">
        <div class="checkbox"> <label> <input id="0" type="checkbox" onclick="f_unlocked(this.id);" class="option-input checkbox unlocked" name="filter['unlocked']" value="All" checked> <span class="ml-10">All </span></label> </div>
        <div class="checkbox"> <label> <input id="1" type="checkbox" onclick="f_unlocked(this.id);" class="option-input checkbox unlocked" name="filter['unlocked']" value="No"> <span class="ml-10">No (41) </span></label> </div>
        <div class="checkbox"> <label> <input id="2" type="checkbox" onclick="f_unlocked(this.id);" class="option-input checkbox unlocked" name="filter['unlocked']" value="Yes"> <span class="ml-10">Yes (123) </span></label> </div>
        </div>
        </div>
        </div>
        </div>
        <style>
                              .c_unlocked {
                                  display:none!important;
                              }
                          </style>
        <script>
                            function f_unlocked(id) {
                              
                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */
                                
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementsByClassName("unlocked");
                              input = input[id];
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");
                              if(filter == 'ALL')
                              {
                                  for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_unlocked")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_unlocked");
                                          } else {
                                            tr[i].classList.remove("c_unlocked");
                                          }
                                        }       
                                      }
                              }
                              else
                              {
                                  filter = ' '+filter+' ';
                                  if (input.checked) 
                                  {
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_unlocked")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_unlocked");
                                          } else {
                                            tr[i].classList.add("c_unlocked");
                                          }
                                        }       
                                      }
                                  }
                                  else
                                  {
                                     for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_unlocked")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_unlocked");
                                          } else {
                                            tr[i].classList.remove("c_unlocked");
                                          }
                                        }       
                                      } 
                                  }
                              }
                            }
                            </script>
        <div class="card-group" id="accordion7" role="tablist" aria-multiselectable="false">
        <div class="card panel-default">
        <div class="card-header" role="tab" id="heading7">
        <h4 class="card-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion7" href="#collapse7" aria-expanded="false" aria-controls="collapse1"> Micro Architecture </a> </h4>
        </div>
        <div id="collapse7" class="collapse " role="tabpanel" aria-labelledby="heading7">
        <div class="card-body">
        <div class="checkbox"> <label> <input id="0" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="All" checked> <span class="ml-10">All </span></label> </div>
        <div class="checkbox"> <label> <input id="1" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Broadwell"> <span class="ml-10">Broadwell (6) </span></label> </div>
        <div class="checkbox"> <label> <input id="2" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Coffee Lake"> <span class="ml-10">Coffee Lake (10) </span></label> </div>
        <div class="checkbox"> <label> <input id="3" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Coffee Lake Refresh"> <span class="ml-10">Coffee Lake Refresh (18) </span></label> </div>
        <div class="checkbox"> <label> <input id="4" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Comet Lake"> <span class="ml-10">Comet Lake (23) </span></label> </div>
        <div class="checkbox"> <label> <input id="5" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Haswell"> <span class="ml-10">Haswell (9) </span></label> </div>
        <div class="checkbox"> <label> <input id="6" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Kaby Lake"> <span class="ml-10">Kaby Lake (15) </span></label> </div>
        <div class="checkbox"> <label> <input id="7" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Rocket Lake"> <span class="ml-10">Rocket Lake (12) </span></label> </div>
        <div class="checkbox"> <label> <input id="8" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Skylake"> <span class="ml-10">Skylake (28) </span></label> </div>
        <div class="checkbox"> <label> <input id="9" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Zen"> <span class="ml-10">Zen (14) </span></label> </div>
        <div class="checkbox"> <label> <input id="10" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Zen 2"> <span class="ml-10">Zen 2 (14) </span></label> </div>
        <div class="checkbox"> <label> <input id="11" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Zen 3"> <span class="ml-10">Zen 3 (4) </span></label> </div>
        <div class="checkbox"> <label> <input id="12" type="checkbox" onclick="f_micro_architecture(this.id);" class="option-input checkbox micro_architecture" name="filter['micro_architecture']" value="Zen+"> <span class="ml-10">Zen+ (11) </span></label> </div>
        </div>
        </div>
        </div>
        </div>
        <style>
                              .c_micro_architecture {
                                  display:none!important;
                              }
                          </style>
        <script>
                            function f_micro_architecture(id) {
                              
                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */
                                
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementsByClassName("micro_architecture");
                              input = input[id];
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");
                              if(filter == 'ALL')
                              {
                                  for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_micro_architecture")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_micro_architecture");
                                          } else {
                                            tr[i].classList.remove("c_micro_architecture");
                                          }
                                        }       
                                      }
                              }
                              else
                              {
                                  filter = ' '+filter+' ';
                                  if (input.checked) 
                                  {
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_micro_architecture")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_micro_architecture");
                                          } else {
                                            tr[i].classList.add("c_micro_architecture");
                                          }
                                        }       
                                      }
                                  }
                                  else
                                  {
                                     for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_micro_architecture")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_micro_architecture");
                                          } else {
                                            tr[i].classList.remove("c_micro_architecture");
                                          }
                                        }       
                                      } 
                                  }
                              }
                            }
                            </script>
        <div class="card-group" id="accordion8" role="tablist" aria-multiselectable="false">
        <div class="card panel-default">
        <div class="card-header" role="tab" id="heading8">
        <h4 class="card-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion8" href="#collapse8" aria-expanded="false" aria-controls="collapse1"> Core Family </a> </h4>
        </div>
        <div id="collapse8" class="collapse " role="tabpanel" aria-labelledby="heading8">
        <div class="card-body">
        <div class="checkbox"> <label> <input id="0" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="All" checked> <span class="ml-10">All </span></label> </div>
        <div class="checkbox"> <label> <input id="1" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Broadwell"> <span class="ml-10">Broadwell (2) </span></label> </div>
        <div class="checkbox"> <label> <input id="2" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Broadwell-E"> <span class="ml-10">Broadwell-E (4) </span></label> </div>
        <div class="checkbox"> <label> <input id="3" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Castle Peak"> <span class="ml-10">Castle Peak (3) </span></label> </div>
        <div class="checkbox"> <label> <input id="4" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Coffee Lake"> <span class="ml-10">Coffee Lake (11) </span></label> </div>
        <div class="checkbox"> <label> <input id="5" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Coffee Lake Refresh"> <span class="ml-10">Coffee Lake Refresh (17) </span></label> </div>
        <div class="checkbox"> <label> <input id="6" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Colfax"> <span class="ml-10">Colfax (4) </span></label> </div>
        <div class="checkbox"> <label> <input id="7" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Comet Lake"> <span class="ml-10">Comet Lake (23) </span></label> </div>
        <div class="checkbox"> <label> <input id="8" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Haswell-E"> <span class="ml-10">Haswell-E (9) </span></label> </div>
        <div class="checkbox"> <label> <input id="9" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Kaby Lake"> <span class="ml-10">Kaby Lake (1) </span></label> </div>
        <div class="checkbox"> <label> <input id="10" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Kaby Lake-S"> <span class="ml-10">Kaby Lake-S (12) </span></label> </div>
        <div class="checkbox"> <label> <input id="11" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Kaby Lake-X"> <span class="ml-10">Kaby Lake-X (2) </span></label> </div>
        <div class="checkbox"> <label> <input id="12" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Matisse"> <span class="ml-10">Matisse (11) </span></label> </div>
        <div class="checkbox"> <label> <input id="13" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Picasso"> <span class="ml-10">Picasso (2) </span></label> </div>
        <div class="checkbox"> <label> <input id="14" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Pinnacle Ridge"> <span class="ml-10">Pinnacle Ridge (5) </span></label> </div>
        <div class="checkbox"> <label> <input id="15" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Raven Ridge"> <span class="ml-10">Raven Ridge (2) </span></label> </div>
        <div class="checkbox"> <label> <input id="16" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Rocket Lake"> <span class="ml-10">Rocket Lake (1) </span></label> </div>
        <div class="checkbox"> <label> <input id="17" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Rocket Lake-S"> <span class="ml-10">Rocket Lake-S (11) </span></label> </div>
        <div class="checkbox"> <label> <input id="18" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Skylake"> <span class="ml-10">Skylake (5) </span></label> </div>
        <div class="checkbox"> <label> <input id="19" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Skylake-S"> <span class="ml-10">Skylake-S (9) </span></label> </div>
        <div class="checkbox"> <label> <input id="20" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Skylake-X"> <span class="ml-10">Skylake-X (14) </span></label> </div>
        <div class="checkbox"> <label> <input id="21" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Summit Ridge"> <span class="ml-10">Summit Ridge (9) </span></label> </div>
        <div class="checkbox"> <label> <input id="22" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Vermeer"> <span class="ml-10">Vermeer (4) </span></label> </div>
        <div class="checkbox"> <label> <input id="23" type="checkbox" onclick="f_core_family(this.id);" class="option-input checkbox core_family" name="filter['core_family']" value="Whitehaven"> <span class="ml-10">Whitehaven (3) </span></label> </div>
        </div>
        </div>
        </div>
        </div>
        <style>
                              .c_core_family {
                                  display:none!important;
                              }
                          </style>
        <script>
                            function f_core_family(id) {
                              
                                /*
                                $('html, body').animate({
                                    scrollTop: $("#myTable").offset().top - 100
                                }, 2000);
                                */
                                
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementsByClassName("core_family");
                              input = input[id];
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");
                              if(filter == 'ALL')
                              {
                                  for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_core_family")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_core_family");
                                          } else {
                                            tr[i].classList.remove("c_core_family");
                                          }
                                        }       
                                      }
                              }
                              else
                              {
                                  filter = ' '+filter+' ';
                                  if (input.checked) 
                                  {
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_core_family")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_core_family");
                                          } else {
                                            tr[i].classList.add("c_core_family");
                                          }
                                        }       
                                      }
                                  }
                                  else
                                  {
                                     for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[2];
                                        if (td) {
                                          td = td.getElementsByClassName("f_core_family")['0'];
                                          txtValue = td.textContent || td.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].classList.remove("c_core_family");
                                          } else {
                                            tr[i].classList.remove("c_core_family");
                                          }
                                        }       
                                      } 
                                  }
                              }
                            }
                            </script>
        <div class="modal-bottom">
        <a href="#" title="Close" class="d-md-none modal-close btn btn-primary">Close</a>
        <a href="#" class="d-md-none modal-close btn btn-primary">Apply Filters</a>
        </div>
        </div>
        </div>
        <div class="col-12 col-md-10">
        <div class="tool-design">
        <div class="upper-box">
        <div id="selectable" onclick="selectText('selectable','link')" class="copy-link"><i class="fa fa-link" aria-hidden="true"></i>
        <div class="link px-2">https://pcbuilder.net/rigs/AVBdhB/</div>
        <i class="fa fa-clone pl-2" aria-hidden="true"></i>
        </div>
        <div class="action-box">
        <div class="action-box-item search"> Search: </div>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Processor....." title="Search....">
        </div>
        <div class="history-box">
        <div class="action-box-item"><i class="fa fa-plus" aria-hidden="true"></i> <span class="px-2" id="newList" onclick="newList();"> New List
        </span>
        </div>
        </div>
        <div class="selectbox dropup center-block">
        <div class="choose-country px-2"><b>Select Country:</b></div>
        <li class="image-li dropdown pcb-country">
        <a class="country dropdown-toggle" id="navbarDropdownMenuLink3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid change-country lazy" data-src="https://images.pcbuilder.dev/assets/images/flags/us.svg">United States</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
        <a class="dropdown-item" onclick="changecountry('US');"><img class="img-fluid dropdown-image lazy" data-src="https://images.pcbuilder.dev/assets/images/flags/us.svg">United States</a>
        <a class="dropdown-item" onclick="changecountry('GB');"><img class="img-fluid dropdown-image lazy" data-src="https://images.pcbuilder.dev/assets/images/flags/gb.svg">United Kingdom</a>
        <a class="dropdown-item" onclick="changecountry('CA');"><img class="img-fluid dropdown-image lazy" data-src="https://images.pcbuilder.dev/assets/images/flags/ca.svg">Canada</a>
        <a class="dropdown-item" onclick="changecountry('IN');"><img class="img-fluid dropdown-image lazy" data-src="https://images.pcbuilder.dev/assets/images/flags/in.svg">India</a>
        <a class="dropdown-item" onclick="changecountry('AU');"><img class="img-fluid dropdown-image lazy" data-src="https://images.pcbuilder.dev/assets/images/flags/au.svg">Australia</a>
        <a class="dropdown-item" onclick="changecountry('IT');"><img class="img-fluid dropdown-image lazy" data-src="https://images.pcbuilder.dev/assets/images/flags/it.svg">Italy</a>
        </div>
        </li>
        </div>
        </div>
        <div class="bottom-box">
        <div class="compatibility"><i class="fa fa-check-circle pr-2" aria-hidden="true"></i>Compatibility: No
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
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41cAAdXKoeL._SL75_.jpg" title="AMD Ryzen Threadripper 3990X, 64 Cores & 128-Threads Unlocked Desktop Processor without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 3990X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-3990x-100-100000163wof/index.html">AMD Ryzen Threadripper 3990X, 64 Cores & 128-Threads Unlocked Desktop Processor without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 3990X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 64 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 128 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTRX4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-6" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Castle Peak </div></div></span><span class="table_span view-more-6" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More6" onclick="viewMore(6);"><span class="viewMore6">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">100</div>
        <p>PCB Benchmark<p>
        </div>6499.77<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $6,499.77 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0815SBQ9W?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_6" href="javascript:void(0);" onclick="setid(6)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41hzAFLpHnL._SL75_.jpg" title="AMD Ryzen Threadripper 3970X 32-Core, 64-Thread Unlocked Desktop Processor, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 3970X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-3970x-100-100000011wof/index.html">AMD Ryzen Threadripper 3970X 32-Core, 64-Thread Unlocked Desktop Processor, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 3970X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 32 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 64 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTRX4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-7" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Castle Peak </div></div></span><span class="table_span view-more-7" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More7" onclick="viewMore(7);"><span class="viewMore7">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">78.33</div>
        <p>PCB Benchmark<p>
        </div>2562.72<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $2,562.72 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0815JJQQ8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_7" href="javascript:void(0);" onclick="setid(7)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41h23msMVtL._SL75_.jpg" title="AMD Ryzen Threadripper 3960X 24-Core, 48-Thread Unlocked Desktop Processor, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 3960X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-3960x-100-100000010wof/index.html">AMD Ryzen Threadripper 3960X 24-Core, 48-Thread Unlocked Desktop Processor, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 3960X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 24 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 48 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTRX4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-8" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Castle Peak </div></div></span><span class="table_span view-more-8" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More8" onclick="viewMore(8);"><span class="viewMore8">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">69.44</div>
        <p>PCB Benchmark<p>
        </div>1830.02<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,830.02 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0815JGCXP?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_8" href="javascript:void(0);" onclick="setid(8)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41rLUI4FOAL._SL75_.jpg" title="AMD Ryzen 9 5950X, 16 Cores & 32 Threads Unlocked Desktop Processor Without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 9 5950X">
        <div class="stars-rating" title="5 out of 5">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-9-5950x-100-100000059wof/index.html">AMD Ryzen 9 5950X, 16 Cores & 32 Threads Unlocked Desktop Processor Without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 9 5950X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 16 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 32 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.9 GHz </div></div></span><span class="table_span view-more-160" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 3 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Vermeer </div></div></span><span class="table_span view-more-160" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 5 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More160" onclick="viewMore(160);"><span class="viewMore160">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">57.96</div>
        <p>PCB Benchmark<p>
        </div>749.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $749 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0815Y8J9N?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_160" href="javascript:void(0);" onclick="setid(160)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41rLUI4FOAL._SL75_.jpg" title="AMD Ryzen 9 5900X, 12 Cores & 24 Threads Unlocked Desktop Processor Without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 9 5900X">
        <div class="stars-rating" title="4 out of 5">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-9-5900x-100-100000061wof/index.html">AMD Ryzen 9 5900X, 12 Cores & 24 Threads Unlocked Desktop Processor Without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 9 5900X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 12 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 24 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-161" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 3 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Vermeer </div></div></span><span class="table_span view-more-161" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 5 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More161" onclick="viewMore(161);"><span class="viewMore161">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">50.65</div>
        <p>PCB Benchmark<p>
        </div>559.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $559.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08164VTWH?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_161" href="javascript:void(0);" onclick="setid(161)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51S7QN-YF2L._SL75_.jpg" title="AMD Ryzen 9 3950X 16-Core, 32-Thread Unlocked Desktop Processor, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 9 3950X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-9-3950x-100-100000051wof/index.html">AMD Ryzen 9 3950X 16-Core, 32-Thread Unlocked Desktop Processor, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 9 3950X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 16 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 32 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.7 GHz </div></div></span><span class="table_span view-more-26" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-26" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More26" onclick="viewMore(26);"><span class="viewMore26">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">48.92</div>
        <p>PCB Benchmark<p>
        </div>749.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $749.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07ZTYKLZW?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_26" href="javascript:void(0);" onclick="setid(26)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51MmCrGECmL._SL75_.jpg" title="AMD Ryzen 9 3900X 12 Core, 24 Thread Unlocked Desktop Processor with Wraith Prism LED Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 9 3900X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-9-3900x-100-100000023box/index.html">AMD Ryzen 9 3900X 12 Core, 24 Thread Unlocked Desktop Processor with Wraith Prism LED Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 9 3900X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 12 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 24 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-27" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-27" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More27" onclick="viewMore(27);"><span class="viewMore27">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">48.92</div>
        <p>PCB Benchmark<p>
        </div>300.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $300 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07SXMZLP9?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_27" href="javascript:void(0);" onclick="setid(27)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41OrmlW4ItL._SL75_.jpg" title="Intel Core i9-10980XE, 18 Cores & 16 Threads Turbo Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-10980XE">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-10980xe-bx8069510980xe/index.html">Intel Core i9-10980XE, 18 Cores & 16 Threads Turbo Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-10980XE </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 18 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 36 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-90" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-90" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More90" onclick="viewMore(90);"><span class="viewMore90">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">42.23</div>
        <p>PCB Benchmark<p>
        </div>1254.10<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,254.10 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08DG2HRJN?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_90" href="javascript:void(0);" onclick="setid(90)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51S7QN-YF2L._SL75_.jpg" title="AMD Ryzen 9 3900XT, 12 Cores & 24 Threads Unlocked Desktop Processor Without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 9 3900XT">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-9-3900xt-100-100000277wof/index.html">AMD Ryzen 9 3900XT, 12 Cores & 24 Threads Unlocked Desktop Processor Without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 9 3900XT </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 12 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 24 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.7 GHz </div></div></span><span class="table_span view-more-158" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-158" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More158" onclick="viewMore(158);"><span class="viewMore158">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">41.26</div>
        <p>PCB Benchmark<p>
        </div>819.42<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $819.42 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B089WD454D?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_158" href="javascript:void(0);" onclick="setid(158)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41BUy1mVMyL._SL75_.jpg" title="Intel Core i9-9980XE, 18 Cores & 36 Threads Turbo Unlocked Extreme Edition Processor " alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9980XE">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9980xe-bx80673i99980x/index.html">Intel Core i9-9980XE, 18 Cores & 36 Threads Turbo Unlocked Extreme Edition Processor </a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9980XE </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 18 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 36 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-93" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-93" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More93" onclick="viewMore(93);"><span class="viewMore93">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">39.03</div>
        <p>PCB Benchmark<p>
        </div>1749.74<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,749.74 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07JGCMQY8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_93" href="javascript:void(0);" onclick="setid(93)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41-vnHIk0lL._SL75_.jpg" title="AMD Ryzen Threadripper 2990WX Processor 32-Core, 64-Thread Unlocked Desktop Processor, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 2990WX">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-2990wx-yd299xazafwof/index.html">AMD Ryzen Threadripper 2990WX Processor 32-Core, 64-Thread Unlocked Desktop Processor, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 2990WX </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 32 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 64 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTR4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-9" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Colfax </div></div></span><span class="table_span view-more-9" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More9" onclick="viewMore(9);"><span class="viewMore9">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">38.32</div>
        <p>PCB Benchmark<p>
        </div>1254.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,254 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07G25SD1P?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_9" href="javascript:void(0);" onclick="setid(9)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
         <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Bf-kFYvRL._SL75_.jpg" title="Intel Core i9-9960X, 16 Cores & 32 Threads Turbo Unlocked X-Series Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9960X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9960x-bx80673i99960x/index.html">Intel Core i9-9960X, 16 Cores & 32 Threads Turbo Unlocked X-Series Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9960X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 16 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 32 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-94" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-94" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More94" onclick="viewMore(94);"><span class="viewMore94">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">38.12</div>
        <p>PCB Benchmark<p>
        </div>1699.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,699.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07JDV1QDG?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_94" href="javascript:void(0);" onclick="setid(94)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41PpwEHzHOL._SL75_.jpg" title="AMD Ryzen Threadripper 2950X Processor 16 Cores & 32 Processing Threads, with Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 2950X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-2950x-yd295xa8afwof/index.html">AMD Ryzen Threadripper 2950X Processor 16 Cores & 32 Processing Threads, with Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 2950X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 16 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 32 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTR4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-11" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Colfax </div></div></span><span class="table_span view-more-11" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More11" onclick="viewMore(11);"><span class="viewMore11">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">37.53</div>
        <p>PCB Benchmark<p>
        </div>999.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $999.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07GFN6CVF?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_11" href="javascript:void(0);" onclick="setid(11)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41NTcG-1lbL._SL75_.jpg" title="Intel Core i9-7980XE Extreme Edition Processors with 18 Cores & 32 Threads" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-7980XE">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-7980xe-bx80673i97980x/index.html">Intel Core i9-7980XE Extreme Edition Processors with 18 Cores & 32 Threads</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-7980XE </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 18 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 36 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-100" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-100" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More100" onclick="viewMore(100);"><span class="viewMore100">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">36.91</div>
        <p>PCB Benchmark<p>
        </div>1699.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,699 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B075XRYMDR?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_100" href="javascript:void(0);" onclick="setid(100)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41W3FebDGuL._SL75_.jpg" title="Intel Core i9-10940X, 14 Cores & 28 Threads Unlocked X-Series Desktop Processor " alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-10940X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-10940x-bx8069510940x/index.html">Intel Core i9-10940X, 14 Cores & 28 Threads Unlocked X-Series Desktop Processor </a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-10940X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 14 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 28 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-91" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-91" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More91" onclick="viewMore(91);"><span class="viewMore91">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">36.75</div>
        <p>PCB Benchmark<p>
        </div>822.84<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $822.84 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07YP67PFV?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_91" href="javascript:void(0);" onclick="setid(91)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41dfzlmwdNL._SL75_.jpg" title="AMD Ryzen 7 5800X, 8 Cores & 16 Threads Unlocked Desktop Processor Without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 5800X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-5800x-100-100000063wof/index.html">AMD Ryzen 7 5800X, 8 Cores & 16 Threads Unlocked Desktop Processor Without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 5800X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.7 GHz </div></div></span><span class="table_span view-more-162" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 3 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Vermeer </div></div></span><span class="table_span view-more-162" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 5 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More162" onclick="viewMore(162);"><span class="viewMore162">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">35.65</div>
        <p>PCB Benchmark<p>
        </div>392.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $392.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0815XFSGK?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_162" href="javascript:void(0);" onclick="setid(162)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Bf-kFYvRL._SL75_.jpg" title="Intel Core i9-9940X, 14 Cores & 28 Threads Turbo Unlocked X-Series Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9940X">
        <div class="stars-rating" title="4.2 out of 5">
        <div class="stars-score" style="width: 84%">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9940x-bx80673i99940x/index.html">Intel Core i9-9940X, 14 Cores & 28 Threads Turbo Unlocked X-Series Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9940X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 14 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 28 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-95" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-95" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More95" onclick="viewMore(95);"><span class="viewMore95">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">34.82</div>
        <p>PCB Benchmark<p>
        </div>788.91<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $788.91 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07JFH771Y?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_95" href="javascript:void(0);" onclick="setid(95)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51V2PWtMutL._SL75_.jpg" title="Intel Core i9-7960X, 16 Cores & 32 Threads Turbo Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-7960X">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-7960x-bx80673i97960x/index.html">Intel Core i9-7960X, 16 Cores & 32 Threads Turbo Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-7960X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 16 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 32 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-119" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-119" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More119" onclick="viewMore(119);"><span class="viewMore119">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">33.89</div>
        <p>PCB Benchmark<p>
        </div>1350.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,350 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B075XRYMDS?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_119" href="javascript:void(0);" onclick="setid(119)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51hzN4DjiDL._SL75_.jpg" title="AMD Ryzen Threadripper 1950X (16-core/32-thread) Desktop Processor, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 1950X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-1950x-yd195xa8aewof/index.html">AMD Ryzen Threadripper 1950X (16-core/32-thread) Desktop Processor, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 1950X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 16 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 32 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTR4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-13" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Whitehaven </div></div></span><span class="table_span view-more-13" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More13" onclick="viewMore(13);"><span class="viewMore13">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">33.42</div>
        <p>PCB Benchmark<p>
        </div>569.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $569 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B074CBH3R4?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_13" href="javascript:void(0);" onclick="setid(13)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51jVF96A0XL._SL75_.jpg" title="Intel Core i9-7940X, 14 Cores & 28 Threads Turbo Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-7940X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-7940x-bx80673i97940x/index.html">Intel Core i9-7940X, 14 Cores & 28 Threads Turbo Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-7940X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 14 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 28 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-118" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-118" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More118" onclick="viewMore(118);"><span class="viewMore118">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">33.17</div>
        <p>PCB Benchmark<p>
        </div>660.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $660 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B076KXLR6K?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_118" href="javascript:void(0);" onclick="setid(118)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Czg9goFbL._SL75_.jpg" title="AMD Ryzen Threadripper 2970WX 24 Core, 48 Thread Processor, Unlocked, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 2970WX">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-2970wx-yd297xazafwof/index.html">AMD Ryzen Threadripper 2970WX 24 Core, 48 Thread Processor, Unlocked, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 2970WX </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 24 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 48 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTR4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-10" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Colfax </div></div></span><span class="table_span view-more-10" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More10" onclick="viewMore(10);"><span class="viewMore10">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">32.94</div>
        <p>PCB Benchmark<p>
        </div>667.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $667.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07JBQJ1D9?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_10" href="javascript:void(0);" onclick="setid(10)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41QrE16ESEL._SL75_.jpg" title="Intel Core i9-10920X,  12 Cores & 24 Threads Turbo Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-10920X">
        <div class="stars-rating" title="2.9 out of 5">
        <div class="stars-score" style="width: 58%">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i9-10920x-bx8069510920x/index.html">Intel Core i9-10920X, 12 Cores & 24 Threads Turbo Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-10920X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 12 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 24 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-103" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-103" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More103" onclick="viewMore(103);"><span class="viewMore103">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">32.44</div>
        <p>PCB Benchmark<p>
        </div>674.29<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $674.29 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07YP6Y9VY?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_103" href="javascript:void(0);" onclick="setid(103)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41vTd42zgEL._SL75_.jpg" title="Intel Core i9-11900K Desktop Processor 8 Cores up to 5.3 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i9-11900K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i9-11900k/index.html">Intel Core i9-11900K Desktop Processor 8 Cores up to 5.3 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i9-11900K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.3 GHz </div></div></span><span class="table_span view-more-181" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-181" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 750 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More181" onclick="viewMore(181);"><span class="viewMore181">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">32.08</div>
        <p>PCB Benchmark<p>
        </div>544.89<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $544.89 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6PPTTH?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_181" href="javascript:void(0);" onclick="setid(181)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Bf-kFYvRL._SL75_.jpg" title="Intel Core i9-9920X, 12 Cores & 24 Threads Turbo Unlocked X-Series Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9920X">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9920x-999ac6/index.html">Intel Core i9-9920X, 12 Cores & 24 Threads Turbo Unlocked X-Series Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9920X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 12 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 24 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-96" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-96" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More96" onclick="viewMore(96);"><span class="viewMore96">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">31.62</div>
        <p>PCB Benchmark<p>
        </div>879.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $879.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07JGCV5KN?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_96" href="javascript:void(0);" onclick="setid(96)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/412uGs8dJhL._SL75_.jpg" title="AMD Ryzen Threadripper 2920X (12-Core/24-Thread) Processor 4.3 GHz Max Boost 38MB Cache, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 2920X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-2920x-yd292xa8afwof/index.html">AMD Ryzen Threadripper 2920X (12-Core/24-Thread) Processor 4.3 GHz Max Boost 38MB Cache, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 2920X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 12 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 24 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTR4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-12" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Colfax </div></div></span><span class="table_span view-more-12" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More12" onclick="viewMore(12);"><span class="viewMore12">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">31.5</div>
        <p>PCB Benchmark<p>
        </div>699.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $699.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07JDF4QP2?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_12" href="javascript:void(0);" onclick="setid(12)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41ssEaIeMyL._SL75_.jpg" title="Intel Core i7-11700K Desktop Processor 8 Cores up to 5.0 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i7-11700K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i7-11700k/index.html">Intel Core i7-11700K Desktop Processor 8 Cores up to 5.0 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i7-11700K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.0 GHz </div></div></span><span class="table_span view-more-178" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-178" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 750 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More178" onclick="viewMore(178);"><span class="viewMore178">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">31.46</div>
        <p>PCB Benchmark<p>
        </div>394.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $394.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6ND3WP?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_178" href="javascript:void(0);" onclick="setid(178)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41J8zxAQgeL._SL75_.jpg" title="Intel Core i9-11900KF Desktop Processor 8 Cores up to 5.3 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i9-11900KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i9-11900kf/index.html">Intel Core i9-11900KF Desktop Processor 8 Cores up to 5.3 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i9-11900KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.3 GHz </div></div></span><span class="table_span view-more-180" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-180" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More180" onclick="viewMore(180);"><span class="viewMore180">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">30.82</div>
        <p>PCB Benchmark<p>
        </div>779.31<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $779.31 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6KQSZ1?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_180" href="javascript:void(0);" onclick="setid(180)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41DJovMgc3L._SL75_.jpg" title="AMD Ryzen 7 3800XT, 8 Cores & 16 Threads Unlocked Desktop Processor Without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 3800XT">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-3800xt-100-100000279wof/index.html">AMD Ryzen 7 3800XT, 8 Cores & 16 Threads Unlocked Desktop Processor Without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 3800XT </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.7 GHz </div></div></span><span class="table_span view-more-159" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-159" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More159" onclick="viewMore(159);"><span class="viewMore159">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">29.91</div>
        <p>PCB Benchmark<p>
        </div>390.76<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $390.76 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B089WCXZJC?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_159" href="javascript:void(0);" onclick="setid(159)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41MI611RvgL._SL75_.jpg" title="Intel Core i9-10900K Desktop Processor 10 Cores up to 5.3 GHz Unlocked  LGA1200 (Intel 400 Series Chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i9-10900K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i9-10900k-bx8070110900k/index.html">Intel Core i9-10900K Desktop Processor 10 Cores up to 5.3 GHz Unlocked  LGA1200 (Intel 400 Series Chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i9-10900K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.3 GHz </div></div></span><span class="table_span view-more-166" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-166" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More166" onclick="viewMore(166);"><span class="viewMore166">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">29.78</div>
        <p>PCB Benchmark<p>
        </div>499.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $499.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MHSTVD?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_166" href="javascript:void(0);" onclick="setid(166)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41lmdWG4IHL._SL75_.jpg" title="Intel Core i7-11700KF Desktop Processor 8 Cores up to 5.0 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i7-11700KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i7-11700kf/index.html">Intel Core i7-11700KF Desktop Processor 8 Cores up to 5.0 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i7-11700KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.0 GHz </div></div></span><span class="table_span view-more-176" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-176" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More176" onclick="viewMore(176);"><span class="viewMore176">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">29.62</div>
        <p>PCB Benchmark<p>
        </div>459.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $459.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6NXNX7?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_176" href="javascript:void(0);" onclick="setid(176)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41grpwhp8hL._SL75_.jpg" title="Intel Core i9-10900KF Processor, 10 Cores & 20 Threads , Unlocked Without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-10900KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-10900kf-bx8070110900kf/index.html">Intel Core i9-10900KF Processor, 10 Cores & 20 Threads , Unlocked Without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-10900KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.3 GHz </div></div></span><span class="table_span view-more-47" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-47" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More47" onclick="viewMore(47);"><span class="viewMore47">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">29.18</div>
        <p>PCB Benchmark<p>
        </div>454.82<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $454.82 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MG1C7D?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_47" href="javascript:void(0);" onclick="setid(47)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51KFxNGHrAL._SL75_.jpg" title="Intel Core i9-7920X, 12 Cores & 24 Threads Turbo Unlocked  X-Series Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-7920X">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-7920x-bx80673i97920x/index.html">Intel Core i9-7920X, 12 Cores & 24 Threads Turbo Unlocked X-Series Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-7920X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 12 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 24 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-117" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-117" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More117" onclick="viewMore(117);"><span class="viewMore117">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">29.1</div>
        <p>PCB Benchmark<p>
        </div>778.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $778 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0756L5T93?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_117" href="javascript:void(0);" onclick="setid(117)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51-si8jdlbL._SL75_.jpg" title="Intel Core i9-10850K Desktop Processor 10 Cores up to 5.2 GHz Unlocked LGA1200 (Intel 400 Series chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i9-10850K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i9-10850k-bx8070110850k/index.html">Intel Core i9-10850K Desktop Processor 10 Cores up to 5.2 GHz Unlocked LGA1200 (Intel 400 Series chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i9-10850K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.2 GHz </div></div></span><span class="table_span view-more-164" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-164" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More164" onclick="viewMore(164);"><span class="viewMore164">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">29.03</div>
        <p>PCB Benchmark<p>
        </div>399.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $399 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08DHRG2X9?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_164" href="javascript:void(0);" onclick="setid(164)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Sy0u20cuL._SL75_.jpg" title="AMD Ryzen 7 3800X 8-Core, 16-Thread Unlocked Desktop Processor with Wraith Prism LED Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 3800X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-3800x-100-100000025box/index.html">AMD Ryzen 7 3800X 8-Core, 16-Thread Unlocked Desktop Processor with Wraith Prism LED Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 3800X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-28" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-28" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More28" onclick="viewMore(28);"><span class="viewMore28">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">28.97</div>
        <p>PCB Benchmark<p>
        </div>339.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $339 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07SXMZLPJ?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_28" href="javascript:void(0);" onclick="setid(28)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41W3FebDGuL._SL75_.jpg" title="Intel Core i9-10900X, 10 Cores & 20 Threads Turbo Unlocked X-Series Desktop Processor " alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-10900X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-10900x-bx8069510900x/index.html">Intel Core i9-10900X, 10 Cores & 20 Threads Turbo Unlocked X-Series Desktop Processor </a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-10900X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.7 GHz </div></div></span><span class="table_span view-more-92" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-92" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More92" onclick="viewMore(92);"><span class="viewMore92">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">28.69</div>
        <p>PCB Benchmark<p>
        </div>589.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $589.99 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07YP69HTM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_92" href="javascript:void(0);" onclick="setid(92)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41JujFtTONL._SL75_.jpg" title="Intel Core i9-11900 Desktop Processor 8 Cores up to 5.2 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i9-11900">
        <div class="stars-rating" title="3.0 out of 5">
        <div class="stars-score" style="width: 60%">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i9-11900/index.html">Intel Core i9-11900 Desktop Processor 8 Cores up to 5.2 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i9-11900 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.50 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.20 GHz </div></div></span><span class="table_span view-more-179" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake </div></div></span><span class="table_span view-more-179" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 750 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More179" onclick="viewMore(179);"><span class="viewMore179">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">28.32</div>
        <p>PCB Benchmark<p>
        </div>499.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $499.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X5XVLL9?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_179" href="javascript:void(0);" onclick="setid(179)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/5149290vQyL._SL75_.jpg" title="AMD Ryzen Threadripper 1920X with 12-Core, 24-Thread Unlocked Desktop Processor, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 1920X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-1920x-yd192xa8aewof/index.html">AMD Ryzen Threadripper 1920X with 12-Core, 24-Thread Unlocked Desktop Processor, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 1920X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 12 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 24 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTR4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-14" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Whitehaven </div></div></span><span class="table_span view-more-14" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More14" onclick="viewMore(14);"><span class="viewMore14">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">28.3</div>
        <p>PCB Benchmark<p>
        </div>239.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $239.99 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B074CBJHCT?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_14" href="javascript:void(0);" onclick="setid(14)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51wpN1SESrL._SL75_.jpg" title="AMD Ryzen 7 3700X 8-Core, 16-Thread Unlocked Desktop Processor with Wraith Prism LED Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 3700X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-3700x-100-100000071box/index.html">AMD Ryzen 7 3700X 8-Core, 16-Thread Unlocked Desktop Processor with Wraith Prism LED Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 3700X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-29" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-29" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More29" onclick="viewMore(29);"><span class="viewMore29">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">28.23</div>
        <p>PCB Benchmark<p>
        </div>307.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $307 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07SXMZLPK?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_29" href="javascript:void(0);" onclick="setid(29)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41C9K91sLhL._SL75_.jpg" title="AMD Ryzen 5 5600X, 6 Cores & 12 Threads Unlocked Desktop Processor with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 5600X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-5600x-100-100000065box/index.html">AMD Ryzen 5 5600X, 6 Cores & 12 Threads Unlocked Desktop Processor with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 5600X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-163" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 3 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Vermeer </div></div></span><span class="table_span view-more-163" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 5 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More163" onclick="viewMore(163);"><span class="viewMore163">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">27.64</div>
        <p>PCB Benchmark<p>
        </div>289.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $289.99 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08166SLDF?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_163" href="javascript:void(0);" onclick="setid(163)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Bf-kFYvRL._SL75_.jpg" title="Intel Core i9-9900X, 10 Cores & 20 Threads Turbo Unlocked X-Series Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9900X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9900x-bx80673i99900x/index.html">Intel Core i9-9900X, 10 Cores & 20 Threads Turbo Unlocked X-Series Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9900X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-97" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-97" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More97" onclick="viewMore(97);"><span class="viewMore97">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">27.04</div>
        <p>PCB Benchmark<p>
        </div>786.29<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $786.29 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07JDV1MMR?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_97" href="javascript:void(0);" onclick="setid(97)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51-ce8HWCLL._SL75_.jpg" title="Intel Core i9-7900X, 10 Cores & 20 Threads Turbo Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-7900X">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-bx80673i97900x-bx80673i97900x/index.html">Intel Core i9-7900X, 10 Cores & 20 Threads Turbo Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-7900X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-116" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-116" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More116" onclick="viewMore(116);"><span class="viewMore116">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">26.58</div>
        <p>PCB Benchmark<p>
        </div>698.83<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $698.83 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B072KTSCCS?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_116" href="javascript:void(0);" onclick="setid(116)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41+om7ejntL._SL75_.jpg" title="Intel Core i7-11700F Desktop Processor 8 Cores up to 4.9 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i7-11700F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i7-11700f/index.html">Intel Core i7-11700F Desktop Processor 8 Cores up to 4.9 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i7-11700F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.9 GHz </div></div></span><span class="table_span view-more-175" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-175" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More175" onclick="viewMore(175);"><span class="viewMore175">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">26.14</div>
        <p>PCB Benchmark<p>
        </div>484.75<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $484.75 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6V4WTF?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_175" href="javascript:void(0);" onclick="setid(175)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/412EyTzSLpL._SL75_.jpg" title="Intel Core i7-11700 Desktop Processor 8 Cores up to 4.9 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i7-11700">
        <div class="stars-rating" title="4.2 out of 5">
        <div class="stars-score" style="width: 84%">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i7-11700/index.html">Intel Core i7-11700 Desktop Processor 8 Cores up to 4.9 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i7-11700 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.9 GHz </div></div></span><span class="table_span view-more-177" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-177" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 750 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More177" onclick="viewMore(177);"><span class="viewMore177">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">26.09</div>
        <p>PCB Benchmark<p>
        </div>349.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $349.99 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6QHYDL?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_177" href="javascript:void(0);" onclick="setid(177)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41ckT1AzbYL._SL75_.jpg" title="Intel Core i9-10900F Desktop Processor 10 Cores up to 5.2 GHz Without Processor Graphics LGA 1200 (Intel 400 Series chipset) 65W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i9-10900F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i9-10900f-bx8070110900f/index.html">Intel Core i9-10900F Desktop Processor 10 Cores up to 5.2 GHz Without Processor Graphics LGA 1200 (Intel 400 Series chipset) 65W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i9-10900F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.80 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.20 GHz </div></div></span><span class="table_span view-more-165" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-165" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More165" onclick="viewMore(165);"><span class="viewMore165">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">25.98</div>
        <p>PCB Benchmark<p>
        </div>423.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $423 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MHTK5C?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_165" href="javascript:void(0);" onclick="setid(165)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Y3oA9UHnL._SL75_.jpg" title="Intel Core i9-10900 Desktop Processor 10 Cores up to 5.2 GHz LGA 1200 (Intel 400 Series Chipset) 65W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i9-10900">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i9-10900-bx8070110900/index.html">Intel Core i9-10900 Desktop Processor 10 Cores up to 5.2 GHz LGA 1200 (Intel 400 Series Chipset) 65W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i9-10900 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.80 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.20 GHz </div></div></span><span class="table_span view-more-167" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-167" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More167" onclick="viewMore(167);"><span class="viewMore167">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">25.92</div>
        <p>PCB Benchmark<p>
        </div>399.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $399.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086ML4XSD?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_167" href="javascript:void(0);" onclick="setid(167)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Bf-kFYvRL._SL75_.jpg" title="Intel Core i9-9820X, 10 Cores & 20 Threads Turbo Unlocked X-Series Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9820X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9820x-bx80673i99820x/index.html">Intel Core i9-9820X, 10 Cores & 20 Threads Turbo Unlocked X-Series Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9820X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-98" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-98" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More98" onclick="viewMore(98);"><span class="viewMore98">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">25.74</div>
        <p>PCB Benchmark<p>
        </div>676.84<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $676.84 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07KCCH7JL?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_98" href="javascript:void(0);" onclick="setid(98)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41AJtg10kAL._SL75_.jpg" title="Intel Core i5-11600KF Desktop Processor 6 Cores up to 4.9 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i5-11600KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i5-11600kf/index.html">Intel Core i5-11600KF Desktop Processor 6 Cores up to 4.9 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i5-11600KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.9 GHz </div></div></span><span class="table_span view-more-170" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-170" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More170" onclick="viewMore(170);"><span class="viewMore170">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">25.03</div>
        <p>PCB Benchmark<p>
        </div>265.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $265.99 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X62BTJD?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_170" href="javascript:void(0);" onclick="setid(170)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41cGF0yoN+L._SL75_.jpg" title="Intel Core i5-11600K Desktop Processor 6 Cores up to 4.9 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i5-11600K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i5-11600k/index.html">Intel Core i5-11600K Desktop Processor 6 Cores up to 4.9 GHz Unlocked LGA1200 (Intel 500 Series & Select 400 Series Chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i5-11600K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.9 GHz </div></div></span><span class="table_span view-more-172" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-172" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 750 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More172" onclick="viewMore(172);"><span class="viewMore172">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">24.71</div>
        <p>PCB Benchmark<p>
        </div>259.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $259.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X67YZBL?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_172" href="javascript:void(0);" onclick="setid(172)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41AG-t5KLoL._SL75_.jpg" title="Intel Core i7-10700K, 8 Cores & 16 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-10700K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-10700k-bx8070110700k/index.html">Intel Core i7-10700K, 8 Cores & 16 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-10700K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.1 GHz </div></div></span><span class="table_span view-more-57" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-57" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More57" onclick="viewMore(57);"><span class="viewMore57">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">24.49</div>
        <p>PCB Benchmark<p>
        </div>318.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $318 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086ML4XSB?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_57" href="javascript:void(0);" onclick="setid(57)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41hseec4jjL._SL75_.jpg" title="Intel Core i9-9900KS, 8 Cores & 16 Threads Turbo Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9900KS">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9900ks-bx80684i99900ks/index.html">Intel Core i9-9900KS, 8 Cores & 16 Threads Turbo Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9900KS </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.0 GHz </div></div></span><span class="table_span view-more-148" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-148" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More148" onclick="viewMore(148);"><span class="viewMore148">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">24.18</div>
        <p>PCB Benchmark<p>
        </div>1965.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,965 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07YP3J7ZM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_148" href="javascript:void(0);" onclick="setid(148)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41upmDfRlzL._SL75_.jpg" title="Intel Core i7-10700KF, 8 Cores & 16 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-10700KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-10700kf-bx8070110700kf/index.html">Intel Core i7-10700KF, 8 Cores & 16 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-10700KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.1 GHz </div></div></span><span class="table_span view-more-144" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-144" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More144" onclick="viewMore(144);"><span class="viewMore144">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">24.14</div>
        <p>PCB Benchmark<p>
        </div>308.94<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $308.94 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0883NG13L?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_144" href="javascript:void(0);" onclick="setid(144)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41BgNBildJL._SL75_.jpg" title="AMD Ryzen 5 3600XT, 6Core & 12 Threads Unlocked Desktop Processor with Wraith Spire Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 3600XT">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-3600xt-100-100000281box/index.html">AMD Ryzen 5 3600XT, 6Core & 12 Threads Unlocked Desktop Processor with Wraith Spire Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 3600XT </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-35" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-35" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More35" onclick="viewMore(35);"><span class="viewMore35">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">23.71</div>
        <p>PCB Benchmark<p>
        </div>320.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $320 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B089WC4VWF?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_35" href="javascript:void(0);" onclick="setid(35)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51pSm7LQLML._SL75_.jpg" title="Intel Core i9-9900K, Unlocked Desktop Processor with 8 Cores & 16 Threads" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9900K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9900k-bx80684i99900k/index.html">Intel Core i9-9900K, Unlocked Desktop Processor with 8 Cores & 16 Threads</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9900K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.0 GHz </div></div></span><span class="table_span view-more-55" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-55" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More55" onclick="viewMore(55);"><span class="viewMore55">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">23.48</div>
        <p>PCB Benchmark<p>
        </div>359.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $359.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B005404P9I?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_55" href="javascript:void(0);" onclick="setid(55)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41asvsykHwL._SL75_.jpg" title="Intel Core i9-9900KF, 8 Cores & 16 Threads Unlocked Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9900KF">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9900kf-bx80684i99900kf/index.html">Intel Core i9-9900KF, 8 Cores & 16 Threads Unlocked Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9900KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.0 GHz </div></div></span><span class="table_span view-more-54" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-54" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More54" onclick="viewMore(54);"><span class="viewMore54">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">23.46</div>
        <p>PCB Benchmark<p>
        </div>343.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $343 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07MGBZWDZ?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_54" href="javascript:void(0);" onclick="setid(54)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41pp9uuzuJL._SL75_.jpg" title="AMD Ryzen 5 3600X 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Spire Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 3600X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-3600x-100-100000022box/index.html">AMD Ryzen 5 3600X 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Spire Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 3600X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-36" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-36" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More36" onclick="viewMore(36);"><span class="viewMore36">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">22.77</div>
        <p>PCB Benchmark<p>
        </div>306.85<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $306.85 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07SQBFN2D?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_36" href="javascript:void(0);" onclick="setid(36)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/415yuU6DjDL._SL75_.jpg" title="Intel Core i7-9800X, 8 Cores & 16 Threads Turbo Unlocked X-Series Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-9800X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-9800x-999ac3/index.html">Intel Core i7-9800X, 8 Cores & 16 Threads Turbo Unlocked X-Series Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-9800X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-99" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-99" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More99" onclick="viewMore(99);"><span class="viewMore99">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">22.65</div>
        <p>PCB Benchmark<p>
        </div>549.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $549.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07JGCSMJX?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_99" href="javascript:void(0);" onclick="setid(99)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41cGF0yoN+L._SL75_.jpg" title="Intel Core i5-11400F Desktop Processor 6 Cores up to 4.4 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i5-11400F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i5-11400f/index.html">Intel Core i5-11400F Desktop Processor 6 Cores up to 4.4 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i5-11400F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-173" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-173" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More173" onclick="viewMore(173);"><span class="viewMore173">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">22.24</div>
        <p>PCB Benchmark<p>
        </div>279.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $279 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6SZ184?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_173" href="javascript:void(0);" onclick="setid(173)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41m+krxXiBL._SL75_.jpg" title="AMD Ryzen 5 3600, 6-Cores and 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 3600">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-3600-100-100000031box/index.html">AMD Ryzen 5 3600, 6-Cores and 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 3600 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-37" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-37" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More37" onclick="viewMore(37);"><span class="viewMore37">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">22.17</div>
        <p>PCB Benchmark<p>
        </div>286.49<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $286.49 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07STGGQ18?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_37" href="javascript:void(0);" onclick="setid(37)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41cGF0yoN+L._SL75_.jpg" title="Intel Core i5-11400 Desktop Processor 6 Cores up to 4.4 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i5-11400">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i5-11400/index.html">Intel Core i5-11400 Desktop Processor 6 Cores up to 4.4 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i5-11400 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-174" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-174" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 730 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More174" onclick="viewMore(174);"><span class="viewMore174">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">22.05</div>
        <p>PCB Benchmark<p>
        </div>272.49<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $272.49 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6JPK4K?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_174" href="javascript:void(0);" onclick="setid(174)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41zr9nI5lJL._SL75_.jpg" title="Intel Core i5-11500 Desktop Processor 6 Cores up to 4.6 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i5-11500">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i5-11500/index.html">Intel Core i5-11500 Desktop Processor 6 Cores up to 4.6 GHz LGA1200 (Intel 500 Series & Select 400 Series Chipset) 65W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i5-11500 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-171" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Rocket Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Rocket Lake-S </div></div></span><span class="table_span view-more-171" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 750 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 11 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More171" onclick="viewMore(171);"><span class="viewMore171">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">22</div>
        <p>PCB Benchmark<p>
        </div>319.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $319 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08X6BCPGD?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_171" href="javascript:void(0);" onclick="setid(171)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/31972ZrX21L._SL75_.jpg" title="AMD Ryzen 7 2700X, 8 Cores and 16 Threads Unlocked Processor with Wraith Prism LED Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 2700X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-2700x-yd270xbgafbox/index.html">AMD Ryzen 7 2700X, 8 Cores and 16 Threads Unlocked Processor with Wraith Prism LED Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 2700X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-30" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Pinnacle Ridge </div></div></span><span class="table_span view-more-30" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More30" onclick="viewMore(30);"><span class="viewMore30">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">21.87</div>
        <p>PCB Benchmark<p>
        </div>419.95<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $419.95 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07B428M7F?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_30" href="javascript:void(0);" onclick="setid(30)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
         </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41gUkbr3eLL._SL75_.jpg" title="Intel Core i7-10700, 8 Cores & 16 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-10700">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-10700-bx8070110700/index.html">Intel Core i7-10700, 8 Cores & 16 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-10700 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-59" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-59" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More59" onclick="viewMore(59);"><span class="viewMore59">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">21.87</div>
        <p>PCB Benchmark<p>
        </div>289.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $289.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MG1C7C?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_59" href="javascript:void(0);" onclick="setid(59)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51EV6ZfSXnL._SL75_.jpg" title="Intel Core i7-7820X, 8 Cores & 16 Threads Turbo Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-7820X">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-7820x-bx80673i77820x/index.html">Intel Core i7-7820X, 8 Cores & 16 Threads Turbo Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-7820X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-115" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-115" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More115" onclick="viewMore(115);"><span class="viewMore115">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">21.85</div>
        <p>PCB Benchmark<p>
        </div>1249.95<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,249.95 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B072NF4BY3?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_115" href="javascript:void(0);" onclick="setid(115)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41P4d+8jqLL._SL75_.jpg" title="Intel Core i7-10700F, 8 Cores & 16 Threads Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-10700F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-10700f-bx8070110700f/index.html">Intel Core i7-10700F, 8 Cores & 16 Threads Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-10700F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-149" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-149" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More149" onclick="viewMore(149);"><span class="viewMore149">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">21.57</div>
        <p>PCB Benchmark<p>
        </div>403.64<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $403.64 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0883MBXZ7?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_149" href="javascript:void(0);" onclick="setid(149)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51MHsgeKLvL._SL75_.jpg" title="Intel Core i9-9900, 8 Cores & 16 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i9-9900">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i9-9900-bx80684i99900/index.html">Intel Core i9-9900, 8 Cores & 16 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i9-9900 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.0 GHz </div></div></span><span class="table_span view-more-56" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-56" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i9 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More56" onclick="viewMore(56);"><span class="viewMore56">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">21.41</div>
        <p>PCB Benchmark<p>
        </div>309.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $309.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07RXX3Y2T?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_56" href="javascript:void(0);" onclick="setid(56)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51xql2lzYgL._SL75_.jpg" title="Intel Core i7-6950X, 10 Cores & 20 Threads Turbo Unlocked Extreme Edition X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-6950X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-6950x-bx80671i76950x/index.html">Intel Core i7-6950X, 10 Cores & 20 Threads Turbo Unlocked Extreme Edition X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-6950X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 10 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 20 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2011 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-111" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Broadwell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Broadwell-E </div></div></span><span class="table_span view-more-111" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More111" onclick="viewMore(111);"><span class="viewMore111">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">21.41</div>
        <p>PCB Benchmark<p>
        </div>1288.88<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $1,288.88 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01FJLA9IM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_111" href="javascript:void(0);" onclick="setid(111)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51MAMyC6GzL._SL75_.jpg" title="AMD Ryzen Threadripper 1900X (8-core/16-thread) Desktop Processor, without Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen Threadripper 1900X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-threadripper-1900x-yd190xa8u8qae/index.html">AMD Ryzen Threadripper 1900X (8-core/16-thread) Desktop Processor, without Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen Threadripper 1900X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> sTR4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-25" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Whitehaven </div></div></span><span class="table_span view-more-25" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> Threadripper </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More25" onclick="viewMore(25);"><span class="viewMore25">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">21.34</div>
        <p>PCB Benchmark<p>
        </div>115.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $115.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0754JNQBP?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_25" href="javascript:void(0);" onclick="setid(25)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41lmPSEZKpL._SL75_.jpg" title="AMD Ryzen 7 1800X Processor, 8 Cores and 16 Processing Threads Unlocked Processor without any Thermal Solution" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 1800X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-1800x-yd180xbcaewof/index.html">AMD Ryzen 7 1800X Processor, 8 Cores and 16 Processing Threads Unlocked Processor without any Thermal Solution</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 1800X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-32" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-32" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More32" onclick="viewMore(32);"><span class="viewMore32">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">20.24</div>
        <p>PCB Benchmark<p>
        </div>423.54<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $423.54 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B06W9JXK4G?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_32" href="javascript:void(0);" onclick="setid(32)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41IIPxvjgnL._SL75_.jpg" title="AMD Ryzen 7 2700, 8 Cores and 16 Processing Threads Unlocked Processor with Wraith Spire LED Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 2700">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-2700-yd2700bbafbox/index.html">AMD Ryzen 7 2700, 8 Cores and 16 Processing Threads Unlocked Processor with Wraith Spire LED Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 2700 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.1 GHz </div></div></span><span class="table_span view-more-31" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Pinnacle Ridge </div></div></span><span class="table_span view-more-31" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More31" onclick="viewMore(31);"><span class="viewMore31">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">19.61</div>
        <p>PCB Benchmark<p>
        </div>310.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $310 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07B41717Z?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_31" href="javascript:void(0);" onclick="setid(31)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51AIgO8y9fL._SL75_.jpg" title="AMD Ryzen 7 1700X, 8 Cores & 16 Processing Threads without any Thermal Solution" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 1700X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-1700x-yd170xbcaewof/index.html">AMD Ryzen 7 1700X, 8 Cores & 16 Processing Threads without any Thermal Solution</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 1700X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div></span><span class="table_span view-more-33" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-33" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More33" onclick="viewMore(33);"><span class="viewMore33">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">19.38</div>
        <p>PCB Benchmark<p>
        </div>410.34<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $410.34 </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07PHD73V6?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_33" href="javascript:void(0);" onclick="setid(33)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41uyqXSUMtL._SL75_.jpg" title="Intel Core i5-10600K, 6 Cores & 12 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-10600K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-10600k-bx8070110600k/index.html">Intel Core i5-10600K, 6 Cores & 12 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-10600K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-66" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-66" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More66" onclick="viewMore(66);"><span class="viewMore66">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">18.52</div>
        <p>PCB Benchmark<p>
        </div>229.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $229.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MHSH2C?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_66" href="javascript:void(0);" onclick="setid(66)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/414IBufWyyL._SL75_.jpg" title="Intel Core i7-8086K, 6 Cores & 12 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-8086K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-8086k-bx80684i78086k/index.html">Intel Core i7-8086K, 6 Cores & 12 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-8086K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5 GHz </div></div></span><span class="table_span view-more-143" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-143" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More143" onclick="viewMore(143);"><span class="viewMore143">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">18.25</div>
        <p>PCB Benchmark<p>
        </div>629.02<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $629.02 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07DGDWJ3P?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_143" href="javascript:void(0);" onclick="setid(143)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41bcJWJLZ1L._SL75_.jpg" title="Intel Core i7-9700KF, 8 Cores & 8 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-9700KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-9700kf-bx80684i79700kf/index.html">Intel Core i7-9700KF, 8 Cores & 8 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-9700KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.9 GHz </div></div></span><span class="table_span view-more-60" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-60" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More60" onclick="viewMore(60);"><span class="viewMore60">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">18.24</div>
        <p>PCB Benchmark<p>
        </div>274.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $274.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07MJXYX62?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_60" href="javascript:void(0);" onclick="setid(60)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41i6RHrHrGL._SL75_.jpg" title="Intel Core i7-9700K, 8 Cores & 8 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-9700K ">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-9700k-bx80684i79700k/index.html">Intel Core i7-9700K, 8 Cores & 8 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-9700K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.9 GHz </div></div></span><span class="table_span view-more-61" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-61" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More61" onclick="viewMore(61);"><span class="viewMore61">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">18.21</div>
        <p>PCB Benchmark<p>
        </div>270.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $270 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07HHN6KBZ?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_61" href="javascript:void(0);" onclick="setid(61)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41EEzb8fIjL._SL75_.jpg" title="Intel Core i5-10600KF Desktop Processor 6 Cores up to 4.8 GHz Unlocked Without Processor Graphics LGA 1200 (Intel 400 Series chipset) 125W" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i5-10600KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i5-10600kf-bx8070110600kf/index.html">Intel Core i5-10600KF Desktop Processor 6 Cores up to 4.8 GHz Unlocked Without Processor Graphics LGA 1200 (Intel 400 Series chipset) 125W</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i5-10600KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-168" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-168" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More168" onclick="viewMore(168);"><span class="viewMore168">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">18.13</div>
        <p>PCB Benchmark<p>
        </div>199.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $199.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086M8441R?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_168" href="javascript:void(0);" onclick="setid(168)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41WU+432f+L._SL75_.jpg" title="AMD Ryzen 7 1700 Processor, 8 Cores and 16 Threads with Wraith Spire LED Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 7 1700">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-7-1700-yd1700bbaebox/index.html">AMD Ryzen 7 1700 Processor, 8 Cores and 16 Threads with Wraith Spire LED Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 7 1700 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div></span><span class="table_span view-more-34" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-34" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More34" onclick="viewMore(34);"><span class="viewMore34">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">18.1</div>
        <p>PCB Benchmark<p>
        </div>400.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $400 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B06WP5YCX6?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_34" href="javascript:void(0);" onclick="setid(34)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41F53BqjpJL._SL75_.jpg" title="Intel Core i5-10600, 6 Cores & 12 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-10600">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-10600-bx8070110600/index.html">Intel Core i5-10600, 6 Cores & 12 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-10600 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.8 GHz </div></div></span><span class="table_span view-more-67" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-67" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More67" onclick="viewMore(67);"><span class="viewMore67">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">17.69</div>
        <p>PCB Benchmark<p>
        </div>280.44<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $280.44 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0883PYCB7?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_67" href="javascript:void(0);" onclick="setid(67)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41OZu6uDTCL._SL75_.jpg" title="AMD Ryzen 5 2600X Processor, 6 Cores and 12 Threads with Wraith Spire Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 2600X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-2600x-yd260xbcafbox/index.html">AMD Ryzen 5 2600X Processor, 6 Cores and 12 Threads with Wraith Spire Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 2600X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-38" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Pinnacle Ridge </div></div></span><span class="table_span view-more-38" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More38" onclick="viewMore(38);"><span class="viewMore38">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">17.49</div>
        <p>PCB Benchmark<p>
        </div>234.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $234.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07B428V2L?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_38" href="javascript:void(0);" onclick="setid(38)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41WTiL+nHjL._SL75_.jpg" title="Intel Core i7-8700K, 6 Cores & 12 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-8700K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-8700k-bx80684i78700k/index.html">Intel Core i7-8700K, 6 Cores & 12 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-8700K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.7 GHz </div></div></span><span class="table_span view-more-63" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-63" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More63" onclick="viewMore(63);"><span class="viewMore63">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">17.23</div>
        <p>PCB Benchmark<p>
        </div>365.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $365 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07598VZR8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_63" href="javascript:void(0);" onclick="setid(63)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41LRAIJDFuL._SL75_.jpg" title="Intel Core i7-9700F, 8 Cores & 8 Threads Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-9700F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-9700f-bx80684i79700f/index.html">Intel Core i7-9700F, 8 Cores & 8 Threads Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-9700F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.7 GHz </div></div></span><span class="table_span view-more-58" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-58" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More58" onclick="viewMore(58);"><span class="viewMore58">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">17.18</div>
        <p>PCB Benchmark<p>
        </div>255.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $255 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07S8DWXT3?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_58" href="javascript:void(0);" onclick="setid(58)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41xf428iwSL._SL75_.jpg" title="Intel Core i7-9700, 8 Cores & 8 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-9700">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-9700-bx80684i79700/index.html">Intel Core i7-9700, 8 Cores & 8 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-9700 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.7 GHz </div></div></span><span class="table_span view-more-62" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-62" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More62" onclick="viewMore(62);"><span class="viewMore62">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">17</div>
        <p>PCB Benchmark<p>
        </div>289.79<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $289.79 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07S6CRLVD?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_62" href="javascript:void(0);" onclick="setid(62)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41F53BqjpJL._SL75_.jpg" title="Intel Core i5-10500, 6 Cores & 12 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-10500 ">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-10500-bx8070110500/index.html">Intel Core i5-10500, 6 Cores & 12 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-10500 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-68" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-68" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More68" onclick="viewMore(68);"><span class="viewMore68">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">16.65</div>
        <p>PCB Benchmark<p>
        </div>245.94<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $245.94 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MW76DW?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_68" href="javascript:void(0);" onclick="setid(68)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51WL82WyKKL._SL75_.jpg" title="AMD Ryzen 5 2600, 6 Cores & 12 Threads Unlocked Processor with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 2600">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-2600-yd2600bbafbox/index.html">AMD Ryzen 5 2600, 6 Cores & 12 Threads Unlocked Processor with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 2600 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-39" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Pinnacle Ridge </div></div></span><span class="table_span view-more-39" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More39" onclick="viewMore(39);"><span class="viewMore39">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">16.43</div>
        <p>PCB Benchmark<p>
        </div>219.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $219.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07B41WS48?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_39" href="javascript:void(0);" onclick="setid(39)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/414fbCWZOpL._SL75_.jpg" title="Intel Core i7-8700, 6 Cores & 12 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-8700">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-8700-bx80684i78700/index.html">Intel Core i7-8700, 6 Cores & 12 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-8700 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-64" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-64" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More64" onclick="viewMore(64);"><span class="viewMore64">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">16.33</div>
        <p>PCB Benchmark<p>
        </div>312.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $312 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07598HLB4?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_64" href="javascript:void(0);" onclick="setid(64)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Rx5OADsKL._SL75_.jpg" title="AMD Ryzen 5 1600X, 6 Cores & 12 Processing Threads Unlocked Processor without Thermal Solution" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 1600X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-1600x-yd160xbcaewof/index.html">AMD Ryzen 5 1600X, 6 Cores & 12 Processing Threads Unlocked Processor without Thermal Solution</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 1600X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-40" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-40" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More40" onclick="viewMore(40);"><span class="viewMore40">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">16.24</div>
        <p>PCB Benchmark<p>
        </div>212.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $212.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B06XKWT7GD?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_40" href="javascript:void(0);" onclick="setid(40)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41xhN2i6bbL._SL75_.jpg" title="Intel Core i5-10400, 6 Cores & 12 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-10400 ">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-10400-bx8070110400/index.html">Intel Core i5-10400, 6 Cores & 12 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-10400 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-70" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-70" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More70" onclick="viewMore(70);"><span class="viewMore70">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">15.98</div>
        <p>PCB Benchmark<p>
        </div>184.83<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $184.83 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MN38Q2?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_70" href="javascript:void(0);" onclick="setid(70)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41S3kMzWthL._SL75_.jpg" title="AMD Ryzen 3 3300X 4-Core & 8-Thread Unlocked Desktop Processor with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 3 3300X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-3-3300x-100-100000159box/index.html">AMD Ryzen 3 3300X 4-Core & 8-Thread Unlocked Desktop Processor with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 3 3300X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-46" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-46" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More46" onclick="viewMore(46);"><span class="viewMore46">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">15.92</div>
        <p>PCB Benchmark<p>
        </div>264.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $264.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0876YS2T4?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_46" href="javascript:void(0);" onclick="setid(46)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51mqGhiQdgL._SL75_.jpg" title="Intel Core i7-5960X, 8 Cores & 16 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-5960X">
        <div class="stars-rating" title="4.2 out of 5">
        <div class="stars-score" style="width: 84%">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-5960x-bx80648i75960x/index.html">Intel Core i7-5960X, 8 Cores & 16 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-5960X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2011 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.00 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.50 GHz </div></div></span><span class="table_span view-more-107" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Broadwell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Broadwell </div></div></span><span class="table_span view-more-107" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More107" onclick="viewMore(107);"><span class="viewMore107">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">15.73</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00MMLXIHM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_107" href="javascript:void(0);" onclick="setid(107)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41p6bICWzBL._SL75_.jpg" title="Intel Core i5-10400F, 6 Cores & 12 Threads Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-10400F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-10400f-bx8070110400f/index.html">Intel Core i5-10400F, 6 Cores & 12 Threads Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-10400F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-69" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-69" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More69" onclick="viewMore(69);"><span class="viewMore69">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">15.72</div>
        <p>PCB Benchmark<p>
        </div>172.05<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $172.05 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MHSTWN?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_69" href="javascript:void(0);" onclick="setid(69)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51RBZAup9fL._SL75_.jpg" title="Intel Core i7-7800X, 6 Cores & 12 Threads Turbo Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-7800X">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-7800x-bx80673i77800x/index.html">Intel Core i7-7800X, 6 Cores & 12 Threads Turbo Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-7800X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-114" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-X </div></div></span><span class="table_span view-more-114" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More114" onclick="viewMore(114);"><span class="viewMore114">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">15.57</div>
        <p>PCB Benchmark<p>
        </div>407.77<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $407.77 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B071H1B3Z1?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_114" href="javascript:void(0);" onclick="setid(114)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41bRPzv9FkL._SL75_.jpg" title="AMD Ryzen 5 1600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 1600">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-1600-yd1600bbafbox/index.html">AMD Ryzen 5 1600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 1600 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div></span><span class="table_span view-more-41" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-41" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More41" onclick="viewMore(41);"><span class="viewMore41">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">15.52</div>
        <p>PCB Benchmark<p>
        </div>149.49<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $149.49 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07XTQZJ28?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_41" href="javascript:void(0);" onclick="setid(41)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41S3kMzWthL._SL75_.jpg" title="AMD Ryzen 3 3100, 4-Core & 8-Thread Unlocked Desktop Processor with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 3 3100">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-3-3100-100-100000284box/index.html">AMD Ryzen 3 3100, 4-Core & 8-Thread Unlocked Desktop Processor with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 3 3100 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-48" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen 2 </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Matisse </div></div></span><span class="table_span view-more-48" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 3200 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 3 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More48" onclick="viewMore(48);"><span class="viewMore48">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">14.51</div>
        <p>PCB Benchmark<p>
        </div>329.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $329 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0876Y2TMZ?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_48" href="javascript:void(0);" onclick="setid(48)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/518PebG+kzL._SL75_.jpg" title="Intel Core i7-6850K, 6 Cores & 12 Threads Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-6850K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-6850k-bx80671i76850k/index.html">Intel Core i7-6850K, 6 Cores & 12 Threads Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-6850K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2011 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-109" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Broadwell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Broadwell-E </div></div></span><span class="table_span view-more-109" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More109" onclick="viewMore(109);"><span class="viewMore109">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">14.09</div>
        <p>PCB Benchmark<p>
        </div>421.78<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $421.78 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01FJLAITC?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_109" href="javascript:void(0);" onclick="setid(109)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/518PebG+kzL._SL75_.jpg" title="Intel Core i7-6900K, 8 Cores & 16 Threads Turbo Unlocked X-Series Desktop Processor " alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-6900K">
        <div class="stars-rating" title="3.9 out of 5">
        <div class="stars-score" style="width: 78%">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-6900k-bx80671i76900k/index.html">Intel Core i7-6900K, 8 Cores & 16 Threads Turbo Unlocked X-Series Desktop Processor </a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-6900K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 8 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 16 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2011 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-110" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Broadwell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Broadwell-E </div></div></span><span class="table_span view-more-110" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More110" onclick="viewMore(110);"><span class="viewMore110">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">14.09</div>
        <p>PCB Benchmark<p>
        </div>555.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $555 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01FJLAIG0?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_110" href="javascript:void(0);" onclick="setid(110)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/416kzzc2KiL._SL75_.jpg" title="Intel Core i5-9600, 6 Cores & 6 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-9600">
        <div class="stars-rating" title="3.5 out of 5">
        <div class="stars-score" style="width: 70%">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-9600-bx80684i59600/index.html">Intel Core i5-9600, 6 Cores & 6 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-9600 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-132" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-132" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More132" onclick="viewMore(132);"><span class="viewMore132">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">13.59</div>
        <p>PCB Benchmark<p>
        </div>293.55<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $293.55 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07S1Q396F?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_132" href="javascript:void(0);" onclick="setid(132)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51OPrlQL-9L._SL75_.jpg" title="Intel Core i5-9600KF, 6 Cores & 6 Threads Turbo Unlocked Desktop Processor Without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-9600KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-9600kf-bx80684i59600kf/index.html">Intel Core i5-9600KF, 6 Cores & 6 Threads Turbo Unlocked Desktop Processor Without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-9600KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-72" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-72" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
         <span class="view-more">
        <div class="view-More72" onclick="viewMore(72);"><span class="viewMore72">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">13.59</div>
        <p>PCB Benchmark<p>
        </div>179.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $179 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07MQP5LNM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_72" href="javascript:void(0);" onclick="setid(72)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41ZUZb8cZ5L._SL75_.jpg" title="Intel Core i5-9600K, 6 Cores & 6 Threads Turbo Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-9600K ">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-9600k-bx80684i59600k/index.html">Intel Core i5-9600K, 6 Cores & 6 Threads Turbo Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-9600K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-71" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-71" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More71" onclick="viewMore(71);"><span class="viewMore71">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">13.55</div>
        <p>PCB Benchmark<p>
        </div>208.97<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $208.97 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07HHLX1R8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_71" href="javascript:void(0);" onclick="setid(71)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/518PebG+kzL._SL75_.jpg" title="Intel Core i7-6800K, 6 Cores & 12 Threads Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-6800K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-6800k-bx80671i76800k/index.html">Intel Core i7-6800K, 6 Cores & 12 Threads Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-6800K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2011 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div></span><span class="table_span view-more-108" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Broadwell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Broadwell-E </div></div></span><span class="table_span view-more-108" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More108" onclick="viewMore(108);"><span class="viewMore108">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">13.07</div>
        <p>PCB Benchmark<p>
        </div>321.26<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $321.26 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01FJLA8NI?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_108" href="javascript:void(0);" onclick="setid(108)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41yMMdh5G5L._SL75_.jpg" title="Intel Core i5-9500F, 6 Cores & 6 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-9500F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-9500f-bx80684i59500f/index.html">Intel Core i5-9500F, 6 Cores & 6 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-9500F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-131" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-131" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More131" onclick="viewMore(131);"><span class="viewMore131">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">12.91</div>
        <p>PCB Benchmark<p>
        </div>187.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $187 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07S6CRJML?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_131" href="javascript:void(0);" onclick="setid(131)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/419h1NMeqvL._SL75_.jpg" title="Intel Core i3-10320,  4 Cores & 8 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-10320">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-10320-bx8070110320/index.html">Intel Core i3-10320, 4 Cores & 8 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-10320 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-81" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-81" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More81" onclick="viewMore(81);"><span class="viewMore81">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">12.8</div>
        <p>PCB Benchmark<p>
        </div>209.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $209.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086M4KSMW?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_81" href="javascript:void(0);" onclick="setid(81)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51o1Zcb6uOL._SL75_.jpg" title="Intel Core i5-8600K, 6 Cores & 6 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-8600K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-8600k-bx80684i58600k/index.html">Intel Core i5-8600K, 6 Cores & 6 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-8600K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-75" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-75" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More75" onclick="viewMore(75);"><span class="viewMore75">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">12.77</div>
        <p>PCB Benchmark<p>
        </div>275.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $275 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0759FKH8K?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_75" href="javascript:void(0);" onclick="setid(75)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41tUoL1SfrL._SL75_.jpg" title="Intel Core i7-5930K, 6 Cores & 12 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-5930K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-5930k-bx80648i75930k/index.html">Intel Core i7-5930K, 6 Cores & 12 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-5930K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2011 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div></span><span class="table_span view-more-105" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-105" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More105" onclick="viewMore(105);"><span class="viewMore105">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">12.71</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00MMLXMM8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_105" href="javascript:void(0);" onclick="setid(105)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51VTdkBIXgL._SL75_.jpg" title="Intel Core i7-7740X, 4 Cores & 8 Threads Turbo Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-7740X">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-7740x-bx80677i77740x/index.html">Intel Core i7-7740X, 4 Cores & 8 Threads Turbo Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
         <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-7740X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-113" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-X </div></div></span><span class="table_span view-more-113" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More113" onclick="viewMore(113);"><span class="viewMore113">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">12.36</div>
        <p>PCB Benchmark<p>
        </div>229.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $229 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B072KTRQ9G?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_113" href="javascript:void(0);" onclick="setid(113)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51hEWfqmLaL._SL75_.jpg" title="Intel Core i5-8600, 6 Cores & 6 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-8600">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-8600-bx80684i58600/index.html">Intel Core i5-8600, 6 Cores & 6 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-8600 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-77" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-77" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More77" onclick="viewMore(77);"><span class="viewMore77">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">12.13</div>
        <p>PCB Benchmark<p>
        </div>306.79<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $306.79 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0793CD3V2?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_77" href="javascript:void(0);" onclick="setid(77)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/513AOqGIczL._SL75_.jpg" title="Intel Core i7-7700K, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-7700K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-7700k-bx80677i77700k/index.html">Intel Core i7-7700K, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-7700K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.5 GHz </div></div></span><span class="table_span view-more-65" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-65" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More65" onclick="viewMore(65);"><span class="viewMore65">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">12.12</div>
        <p>PCB Benchmark<p>
        </div>420.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $420 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01MXSI216?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_65" href="javascript:void(0);" onclick="setid(65)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51pPTqeTiRL._SL75_.jpg" title="Intel Core i7-5820K, 6 Cores & 12 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-5820K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-5820k-bx80648i75820k/index.html">Intel Core i7-5820K, 6 Cores & 12 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-5820K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 12 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1156 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.30 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.60 GHz </div></div></span><span class="table_span view-more-106" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-106" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More106" onclick="viewMore(106);"><span class="viewMore106">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">12.09</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00MMLXIKY?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_106" href="javascript:void(0);" onclick="setid(106)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51yvYnX3lHL._SL75_.jpg" title="Intel Core i5-9400,6 Cores & 6 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-9400">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-9400-bx80684i59400/index.html">Intel Core i5-9400,6 Cores & 6 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-9400 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.1 GHz </div></div></span><span class="table_span view-more-74" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-74" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More74" onclick="viewMore(74);"><span class="viewMore74">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.95</div>
        <p>PCB Benchmark<p>
        </div>213.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $213.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07MGZ9FJZ?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_74" href="javascript:void(0);" onclick="setid(74)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41pQDyOIbNL._SL75_.jpg" title="Intel Core i5-9400F, 6 Cores & 6 Threads Desktop Processor Without Graphics Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-9400F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-9400f-bx80684i59400f/index.html">Intel Core i5-9400F, 6 Cores & 6 Threads Desktop Processor Without Graphics Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-9400F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.1 GHz </div></div></span><span class="table_span view-more-73" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-73" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More73" onclick="viewMore(73);"><span class="viewMore73">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.93</div>
        <p>PCB Benchmark<p>
        </div>169.98<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $169.98 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07MRCGQQ4?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_73" href="javascript:void(0);" onclick="setid(73)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51twvulvWdL._SL75_.jpg" title="Intel Core i5-8500, 6 Cores & 6 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-8500">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-8500-bx80684i58500/index.html">Intel Core i5-8500, 6 Cores & 6 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-8500 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.1 GHz </div></div></span><span class="table_span view-more-76" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-76" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More76" onclick="viewMore(76);"><span class="viewMore76">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.74</div>
        <p>PCB Benchmark<p>
        </div>248.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $248.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07938SNBB?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_76" href="javascript:void(0);" onclick="setid(76)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/31SW+KVa+ML._SL75_.jpg" title="AMD Ryzen 5 3400G 4-core, 8-Thread Unlocked Desktop Processor with Radeon RX Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 3400G">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-3400g-yd3400c5fhbox/index.html">AMD Ryzen 5 3400G 4-core, 8-Thread Unlocked Desktop Processor with Radeon RX Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 3400G </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-44" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Picasso </div></div></span><span class="table_span view-more-44" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Radeon RX Vega 11 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More44" onclick="viewMore(44);"><span class="viewMore44">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.71</div>
        <p>PCB Benchmark<p>
        </div>307.98<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $307.98 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07SXNDKNM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_44" href="javascript:void(0);" onclick="setid(44)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/419h1NMeqvL._SL75_.jpg" title="Intel Core i3-10300, 4 Cores & 8. Threads Turbo Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-10300">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-10300-bx8070110300/index.html">Intel Core i3-10300, 4 Cores & 8. Threads Turbo Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-10300 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-146" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-146" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More146" onclick="viewMore(146);"><span class="viewMore146">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.66</div>
        <p>PCB Benchmark<p>
        </div>201.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $201.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086M8V695?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_146" href="javascript:void(0);" onclick="setid(146)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41yEI4sSivL._SL75_.jpg" title="Intel Core i5-9500, 6 Cores & 6 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-9500">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-9500-bx80684i59500/index.html">Intel Core i5-9500, 6 Cores & 6 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-9500 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-130" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-130" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More130" onclick="viewMore(130);"><span class="viewMore130">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.46</div>
        <p>PCB Benchmark<p>
        </div>228.98<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $228.98 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07S4MSXJL?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_130" href="javascript:void(0);" onclick="setid(130)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51hEWfqmLaL._SL75_.jpg" title="Intel Core i5-8400, 6 Cores & 6 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-8400">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-8400-bx80684i58400/index.html">Intel Core i5-8400, 6 Cores & 6 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-8400 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 6 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 6 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-78" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-78" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More78" onclick="viewMore(78);"><span class="viewMore78">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.43</div>
        <p>PCB Benchmark<p>
        </div>230.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $230 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0759FGJ3Q?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_78" href="javascript:void(0);" onclick="setid(78)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/31ksTAEdwdL._SL75_.jpg" title="AMD Ryzen 5 1500X, 6 Cores & 12 Threads Unlocked Processor with Wraith Spire Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 1500X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-1500x-yd150xbbaebox/index.html">AMD Ryzen 5 1500X, 6 Cores & 12 Threads Unlocked Processor with Wraith Spire Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 1500X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div></span><span class="table_span view-more-42" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-42" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More42" onclick="viewMore(42);"><span class="viewMore42">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.26</div>
        <p>PCB Benchmark<p>
        </div>180.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $180 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B06XKVNRSM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_42" href="javascript:void(0);" onclick="setid(42)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41UFsdk1ogL._SL75_.jpg" title="Intel Core i3-10100, 4 Cores & 8 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-10100">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-10100-bx8070110100/index.html">Intel Core i3-10100, 4 Cores & 8 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-10100 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-82" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-82" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More82" onclick="viewMore(82);"><span class="viewMore82">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.21</div>
        <p>PCB Benchmark<p>
        </div>174.49<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $174.49 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B086MMRW87?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_82" href="javascript:void(0);" onclick="setid(82)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51A-JynzGML._SL75_.jpg" title="Intel Core i7-6700K, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-6700K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-6700k-bx80662i76700k/index.html">Intel Core i7-6700K, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-6700K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-140" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake </div></div></span><span class="table_span view-more-140" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More140" onclick="viewMore(140);"><span class="viewMore140">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">11.13</div>
        <p>PCB Benchmark<p>
        </div>325.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $325 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B010T6DQTQ?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_140" href="javascript:void(0);" onclick="setid(140)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/31WytK+BGRL._SL75_.jpg" title="AMD Ryzen 5 2400G 4 Cores 8 Threads Unlocked Processor with Radeon RX Vega 11 Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 2400G">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-2400g-yd2400c5fbbox/index.html">AMD Ryzen 5 2400G 4 Cores 8 Threads Unlocked Processor with Radeon RX Vega 11 Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 2400G </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-45" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Raven Ridge </div></div></span><span class="table_span view-more-45" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Radeon RX Vega 11 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More45" onclick="viewMore(45);"><span class="viewMore45">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">10.94</div>
        <p>PCB Benchmark<p>
        </div>623.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $623 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B079D8FD28?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_45" href="javascript:void(0);" onclick="setid(45)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41FTf1HR7jL._SL75_.jpg" title="Intel CPU Core i3-10100F / 3.6GHz / 6MB LGA1200 4C / 8T" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel i3-10100F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-i3-10100f-bx8070110100f/index.html">Intel CPU Core i3-10100F / 3.6GHz / 6MB LGA1200 4C / 8T</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> i3-10100F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1200 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.3 GHz </div></div></span><span class="table_span view-more-169" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Comet Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Comet Lake </div></div></span><span class="table_span view-more-169" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 10 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More169" onclick="viewMore(169);"><span class="viewMore169">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">10.85</div>
        <p>PCB Benchmark<p>
        </div>98.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $98 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B08LKJPR5X?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_169" href="javascript:void(0);" onclick="setid(169)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41GKAuFuNGL._SL75_.jpg" title="Intel Core i7-7700, 4 Cores & 8 Threads Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-7700">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-7700-bx80677i77700/index.html">Intel Core i7-7700, 4 Cores & 8 Threads Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-7700 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-141" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-141" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More141" onclick="viewMore(141);"><span class="viewMore141">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">10.76</div>
        <p>PCB Benchmark<p>
        </div>430.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $430 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01N0L41N7?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_141" href="javascript:void(0);" onclick="setid(141)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51O4fyuOiUL._SL75_.jpg" title="Intel® Core i7-4790K, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-4790K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-4790k-bx80646i74790k/index.html">Intel® Core i7-4790K, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-4790K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1150 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.4 GHz </div></div></span><span class="table_span view-more-138" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-138" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 4600 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 4 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More138" onclick="viewMore(138);"><span class="viewMore138">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">10.03</div>
        <p>PCB Benchmark<p>
        </div>270.98<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $270.98 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00KPRWAX8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_138" href="javascript:void(0);" onclick="setid(138)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/411v0MvpCaL._SL75_.jpg" title="Intel Core I7-6700, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-6700">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-6700-bx80662i76700/index.html">Intel Core I7-6700, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-6700 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-139" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-139" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More139" onclick="viewMore(139);"><span class="viewMore139">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">10</div>
        <p>PCB Benchmark<p>
        </div>345.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $345 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0136JONG8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_139" href="javascript:void(0);" onclick="setid(139)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/31YLAELiLZL._SL75_.jpg" title="AMD Ryzen 5 1400 Processor, 4 Cores & 8 Threads Unlocked with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 5 1400">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-5-1400-yd1400bbaebox/index.html">AMD Ryzen 5 1400 Processor, 4 Cores & 8 Threads Unlocked with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 5 1400 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div></span><span class="table_span view-more-43" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-43" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More43" onclick="viewMore(43);"><span class="viewMore43">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">9.91</div>
        <p>PCB Benchmark<p>
        </div>189.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $189.99 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B06XKWT8J4?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_43" href="javascript:void(0);" onclick="setid(43)"><i class="fa fa-plus"></i></a></td>
        </tr>
        
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41e+NaxZC8L._SL75_.jpg" title="Intel Core i3-9350KF, 4 Cores & 4 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-9350KF">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-9350kf-bx80684i39350kf/index.html">Intel Core i3-9350KF, 4 Cores & 4 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-9350KF </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.6 GHz </div></div></span><span class="table_span view-more-83" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-83" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More83" onclick="viewMore(83);"><span class="viewMore83">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">9.84</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07NC419VF?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_83" href="javascript:void(0);" onclick="setid(83)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51uuXsOGLGL._SL75_.jpg" title="Intel Core i7-7700T, 4 Cores & 8 Threads Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-7700T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-7700t-bx80677i77700t/index.html">Intel Core i7-7700T, 4 Cores & 8 Threads Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-7700T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div></span><span class="table_span view-more-142" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-142" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More142" onclick="viewMore(142);"><span class="viewMore142">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">9.78</div>
        <p>PCB Benchmark<p>
        </div>305.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $305 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01MS73UK2?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_142" href="javascript:void(0);" onclick="setid(142)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/31AnHF4xwAL._SL75_.jpg" title="AMD Ryzen 3 2300X, 4-Cores & 4-Threads Unlocked Desktop Processor without Thermal Solution" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 3 2300X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-3-2300x-yd230xbbafmpk/index.html">AMD Ryzen 3 2300X, 4-Cores & 4-Threads Unlocked Desktop Processor without Thermal Solution</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 3 2300X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-49" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Pinnacle Ridge </div></div></span><span class="table_span view-more-49" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More49" onclick="viewMore(49);"><span class="viewMore49">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">9.76</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07XF3WQ67?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_49" href="javascript:void(0);" onclick="setid(49)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51GwIh1sfwL._SL75_.jpg" title="Intel Core i7-5775C, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel Iris Pro Graphics 6200" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-5775C">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-5775c-bx80658i75775c/index.html">Intel Core i7-5775C, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel Iris Pro Graphics 6200</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-5775C </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1150 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div></span><span class="table_span view-more-150" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Broadwell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Broadwell </div></div></span><span class="table_span view-more-150" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel Iris Pro Graphics 6200 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 5 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More150" onclick="viewMore(150);"><span class="viewMore150">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">9.7</div>
        <p>PCB Benchmark<p>
        </div>468.68<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $468.68 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00YAEA0U2?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_150" href="javascript:void(0);" onclick="setid(150)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41Jfg+T6pNL._SL75_.jpg" title="Intel Core i3-9100, 4 Cores & 4 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-9100">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-9100-bx80684i39100/index.html">Intel Core i3-9100, 4 Cores & 4 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-9100 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-84" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-84" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More84" onclick="viewMore(84);"><span class="viewMore84">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">9.03</div>
        <p>PCB Benchmark<p>
        </div>142.50<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $142.50 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07RXW4Y2K?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_84" href="javascript:void(0);" onclick="setid(84)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/415J2TBbcyL._SL75_.jpg" title="AMD Ryzen 3 3200G, 4-Core & 4-Threads Unlocked Desktop Processor with Radeon Vega 8 Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 3 3200G">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-3-3200g-yd3200c5fhbox/index.html">AMD Ryzen 3 3200G, 4-Core & 4-Threads Unlocked Desktop Processor with Radeon Vega 8 Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 3 3200G </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-52" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen+ </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Picasso </div></div></span><span class="table_span view-more-52" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Radeon Vega 8 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 2 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More52" onclick="viewMore(52);"><span class="viewMore52">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">9.01</div>
        <p>PCB Benchmark<p>
        </div>229.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $229 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07STGHZK8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_52" href="javascript:void(0);" onclick="setid(52)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41MisTuStbL._SL75_.jpg" title="Intel Core I7-4770K, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-4770K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-4770k-bxf80646i74770k/index.html">Intel Core I7-4770K, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-4770K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1150 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-137" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-137" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 4600 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 4 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More137" onclick="viewMore(137);"><span class="viewMore137">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.76</div>
        <p>PCB Benchmark<p>
        </div>329.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $329.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00DT5WV6E?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_137" href="javascript:void(0);" onclick="setid(137)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/31FDfi+LaML._SL75_.jpg" title="AMD Ryzen 3 1300X, 4 Cores & 4 Threads Unlocked Desktop Processor with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 3 1300X">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-3-1300x-yd130xbbaebox/index.html">AMD Ryzen 3 1300X, 4 Cores & 4 Threads Unlocked Desktop Processor with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 3 1300X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div></span><span class="table_span view-more-50" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-50" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More50" onclick="viewMore(50);"><span class="viewMore50">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.72</div>
        <p>PCB Benchmark<p>
        </div>325.66<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $325.66 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0741DLVL7?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_50" href="javascript:void(0);" onclick="setid(50)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51k9DlVz1QL._SL75_.jpg" title="Intel Core i7-4790S, 4 Cores & 8 Threads Desktop Processor with Intel HD Graphics 4600" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-4790S">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-4790S/index.html">Intel Core i7-4790S, 4 Cores & 8 Threads Desktop Processor with Intel HD Graphics 4600</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-4790S </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1150 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-133" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-133" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 4600 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 4 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More133" onclick="viewMore(133);"><span class="viewMore133">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.67</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00KY2VXG4?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_133" href="javascript:void(0);" onclick="setid(133)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51xoe6LRoXL._SL75_.jpg" title="Intel Core i7-4771, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-4771">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-4771-bx80646i74771-cr/index.html">Intel Core i7-4771, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-4771 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1150 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-134" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-134" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 4600 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 4 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More134" onclick="viewMore(134);"><span class="viewMore134">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.65</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0842Z3J25?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_134" href="javascript:void(0);" onclick="setid(134)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/514kjb0pTqL._SL75_.jpg" title="Intel Core i3-8350K, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-8350K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-8350k-bx80684i38350k/index.html">Intel Core i3-8350K, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-8350K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.20 GHz </div></div></span><span class="table_span view-more-86" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-86" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More86" onclick="viewMore(86);"><span class="viewMore86">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.57</div>
        <p>PCB Benchmark<p>
        </div>351.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $351 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0759FWJDK?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_86" href="javascript:void(0);" onclick="setid(86)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41kqgR8oZ4L._SL75_.jpg" title="Intel Core i3-9100F, 4 Cores & 4 Threads Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-9100F">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-9100f-bx80684i39100f/index.html">Intel Core i3-9100F, 4 Cores & 4 Threads Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-9100F </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-85" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake Refresh </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake Refresh </div></div></span><span class="table_span view-more-85" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 9 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More85" onclick="viewMore(85);"><span class="viewMore85">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.5</div>
        <p>PCB Benchmark<p>
        </div>145.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $145.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07R7Q3JZH?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_85" href="javascript:void(0);" onclick="setid(85)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41w7sj2ZcZL._SL75_.jpg" title="Intel Core i5-7600K, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-7600K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-7600k-bx80677i57600k/index.html">Intel Core i5-7600K, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-7600K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-79" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-79" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More79" onclick="viewMore(79);"><span class="viewMore79">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.47</div>
        <p>PCB Benchmark<p>
        </div>198.40<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $198.40 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01MRRPPQS?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_79" href="javascript:void(0);" onclick="setid(79)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41uDBMBVYWL._SL75_.jpg" title="Intel Core i7-4770S, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-4770S">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-4770s-bx80646i74770s/index.html">Intel Core i7-4770S, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-4770S </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1150 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-135" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-135" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 4600 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 4 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More135" onclick="viewMore(135);"><span class="viewMore135">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.41</div>
        <p>PCB Benchmark<p>
        </div>900.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $900 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00CO8T9VM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_135" href="javascript:void(0);" onclick="setid(135)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41eeWxnCoyL._SL75_.jpg" title="AMD Ryzen 3 2200G, 4 Cores & 4 Threads Unlocked Processor with Radeon Vega 8 Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 3 2200G">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-3-2200g-yd2200c5fbbox/index.html">AMD Ryzen 3 2200G, 4 Cores & 4 Threads Unlocked Processor with Radeon Vega 8 Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 3 2200G </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div></span><span class="table_span view-more-53" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Raven Ridge </div></div></span><span class="table_span view-more-53" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Radeon Vega 8 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2933 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More53" onclick="viewMore(53);"><span class="viewMore53">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.36</div>
        <p>PCB Benchmark<p>
        </div>260.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $260.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B079D3DBNM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_53" href="javascript:void(0);" onclick="setid(53)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/419UCbDQlgL._SL75_.jpg" title="Intel Core i5-7600, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630 (OEM Pack-Tray Packaging)" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-7600">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-7600-cm8067702868011/index.html">Intel Core i5-7600, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630 (OEM Pack-Tray Packaging)</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-7600 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.1 GHz </div></div></span><span class="table_span view-more-80" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-80" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More80" onclick="viewMore(80);"><span class="viewMore80">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">8.22</div>
        <p>PCB Benchmark<p>
        </div>176.95<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $176.95 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B06XQ4KP9J?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_80" href="javascript:void(0);" onclick="setid(80)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51ZH6c38uvL._SL75_.jpg" title="Intel Core i5-7640X, 4 Cores & 4 Threads Turbo Unlocked X-Series Desktop Processor" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-7640X">
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
        </div>
        </div>
        </td>
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-7640x-bx80677i57640x/index.html">Intel Core i5-7640X, 4 Cores & 4 Threads Turbo Unlocked X-Series Desktop Processor</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-7640X </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 2066 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-112" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-X </div></div></span><span class="table_span view-more-112" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2666 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> X </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More112" onclick="viewMore(112);"><span class="viewMore112">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.93</div>
        <p>PCB Benchmark<p>
        </div>299.88<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $299.88 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B071KMBHS8?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_112" href="javascript:void(0);" onclick="setid(112)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41WzqcY5tgL._SL75_.jpg" title="AMD Ryzen 3 1200, 4 CPU Cores & 4 Threads Unlocked Desktop Processor with Wraith Stealth Cooler" alt="pc builder, custom pc builder, pc part picker, build my pc, AMD Ryzen 3 1200">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/amd-ryzen-3-1200-yd1200bbaebox/index.html">AMD Ryzen 3 1200, 4 CPU Cores & 4 Threads Unlocked Desktop Processor with Wraith Stealth Cooler</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> AMD </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Ryzen 3 1200 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> AM4 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div></span><span class="table_span view-more-51" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Zen </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Summit Ridge </div></div></span><span class="table_span view-more-51" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2667 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> 3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 1 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More51" onclick="viewMore(51);"><span class="viewMore51">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.91</div>
        <p>PCB Benchmark<p>
        </div>109.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $109.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0741DN383?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_51" href="javascript:void(0);" onclick="setid(51)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51LZYv9nzvL._SL75_.jpg" title="Intel Core i3-8300, 4 Cores & 4 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-8300">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-8300-bx80684i38300/index.html">Intel Core i3-8300, 4 Cores & 4 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-8300 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 5.0 Ghz </div></div></span><span class="table_span view-more-87" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-87" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More87" onclick="viewMore(87);"><span class="viewMore87">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.79</div>
        <p>PCB Benchmark<p>
        </div>236.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $236 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07CBN3C8G?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_87" href="javascript:void(0);" onclick="setid(87)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41-DDKwErFL._SL75_.jpg" title="Intel Core i3-8100, 4 Cores & 4 Threads Turbo Unlocked Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-8100">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-8100-bx80684i38100/index.html">Intel Core i3-8100, 4 Cores & 4 Threads Turbo Unlocked Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-8100 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> N/A </div></div></span><span class="table_span view-more-88" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Coffee Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Coffee Lake </div></div></span><span class="table_span view-more-88" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel UHD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 8 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More88" onclick="viewMore(88);"><span class="viewMore88">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.67</div>
        <p>PCB Benchmark<p>
        </div>205.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $205 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0759FTRZL?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_88" href="javascript:void(0);" onclick="setid(88)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51XrkNI7q+L._SL75_.jpg" title="Intel Core i5-7500, 4 Cores & 4 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-7500">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-7500-bx80677i57500/index.html">Intel Core i5-7500, 4 Cores & 4 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-7500 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div></span><span class="table_span view-more-129" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-129" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More129" onclick="viewMore(129);"><span class="viewMore129">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.63</div>
        <p>PCB Benchmark<p>
        </div>235.95<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $235.95 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01MZZJ1P0?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_129" href="javascript:void(0);" onclick="setid(129)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51GvhU1oiVL._SL75_.jpg" title="Intel Core I5-6600, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-6600">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-6600-bx80662i56600/index.html">Intel Core I5-6600, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-6600 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-102" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-102" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More102" onclick="viewMore(102);"><span class="viewMore102">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.49</div>
        <p>PCB Benchmark<p>
        </div>235.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $235 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B010T6D39O?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_102" href="javascript:void(0);" onclick="setid(102)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51hZGk9fNsL._SL75_.jpg" title="Intel Core i7-4770T, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-4770T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-4770t-cm8064601465902/index.html">Intel Core i7-4770T, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-4770T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1150 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div></span><span class="table_span view-more-151" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-151" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 4600 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 4 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More151" onclick="viewMore(151);"><span class="viewMore151">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.39</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00DVDSQ0O?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_151" href="javascript:void(0);" onclick="setid(151)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41ufQ46KkbL._SL75_.jpg" title="Intel Core i5-7600T, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-7600T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-7600t-bx80677i57600t/index.html">Intel Core i5-7600T, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-7600T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.80 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.70 GHz </div></div></span><span class="table_span view-more-104" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-104" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More104" onclick="viewMore(104);"><span class="viewMore104">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.28</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01N10KQWM?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_104" href="javascript:void(0);" onclick="setid(104)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51lryxL3rzL._SL75_.jpg" title="Intel Core i5-6402P, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel HD Graphics 510" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-6402P">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-6402p-bx80662i56402p/index.html">Intel Core i5-6402P, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel HD Graphics 510</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-6402P </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div></span><span class="table_span view-more-145" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-145" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 510 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More145" onclick="viewMore(145);"><span class="viewMore145">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.11</div>
        <p>PCB Benchmark<p>
        </div>426.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $426 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01ALBJHG0?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_145" href="javascript:void(0);" onclick="setid(145)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41ufQ46KkbL._SL75_.jpg" title="Intel Core i5 6402P, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 510" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-6402P">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-6402p-bx80662i56402p/index.html">Intel Core i5 6402P, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 510</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-6402P </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.4 GHz </div></div></span><span class="table_span view-more-153" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-153" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 510 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More153" onclick="viewMore(153);"><span class="viewMore153">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.11</div>
        <p>PCB Benchmark<p>
        </div>228.68<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $228.68 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01B2PJRN2?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_153" href="javascript:void(0);" onclick="setid(153)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51Gq81DIpEL._SL75_.jpg" title="Intel Core i5 6500, 4 Cores & 4 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-6500">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-6500-1357826/index.html">Intel Core i5 6500, 4 Cores & 4 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-6500 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div></span><span class="table_span view-more-101" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-101" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More101" onclick="viewMore(101);"><span class="viewMore101">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">7.03</div>
        <p>PCB Benchmark<p>
        </div>235.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $235 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B010T6CWI2?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_101" href="javascript:void(0);" onclick="setid(101)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51syQ3w0JQL._SL75_.jpg" title="Intel Core i5-7400, 4 Cores & 4 Threads Desktop Processor with Intel UHD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-7400">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-7400-bx80677i57400/index.html">Intel Core i5-7400, 4 Cores & 4 Threads Desktop Processor with Intel UHD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-7400 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div></span><span class="table_span view-more-128" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-128" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More128" onclick="viewMore(128);"><span class="viewMore128">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">6.83</div>
        <p>PCB Benchmark<p>
        </div>225.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $225 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01MSTDS3N?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_128" href="javascript:void(0);" onclick="setid(128)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51zmO3KxhzL._SL75_.jpg" title="Intel Core i5-7500T, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-7500T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-7500t-bx80677i57500t/index.html">Intel Core i5-7500T, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-7500T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div></span><span class="table_span view-more-152" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-152" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More152" onclick="viewMore(152);"><span class="viewMore152">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">6.64</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07C7HQTQR?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_152" href="javascript:void(0);" onclick="setid(152)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41PnQ4D3G0L._SL75_.jpg" title="Intel Core I5-6400, 4 Cores & 4 Threads Unlocked Desktop Processor without Processor Graphics" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-6400">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-6400-bx80662i56400-cr/index.html">Intel Core I5-6400, 4 Cores & 4 Threads Unlocked Desktop Processor without Processor Graphics</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-6400 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.3 GHz </div></div></span><span class="table_span view-more-127" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-127" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> None </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More127" onclick="viewMore(127);"><span class="viewMore127">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">6.39</div>
        <p>PCB Benchmark<p>
        </div>185.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $185 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B07PF18XJF?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_127" href="javascript:void(0);" onclick="setid(127)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/5145Ls5+zYL._SL75_.jpg" title="Intel Core i5-6500T, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-6500T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-6500t-cm8066201920600/index.html">Intel Core i5-6500T, 4 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-6500T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.1 GHz </div></div></span><span class="table_span view-more-154" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake </div></div></span><span class="table_span view-more-154" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More154" onclick="viewMore(154);"><span class="viewMore154">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">6.18</div>
        <p>PCB Benchmark<p>
        </div>259.95<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $259.95 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B077NHL5LH?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_154" href="javascript:void(0);" onclick="setid(154)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51zz2iDOkEL._SL75_.jpg" title="Intel Core i3-7350K, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-7350K">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-7350k-bx80677i37350k/index.html">Intel Core i3-7350K, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-7350K </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.2 GHz </div></div></span><span class="table_span view-more-124" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake </div></div></span><span class="table_span view-more-124" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More124" onclick="viewMore(124);"><span class="viewMore124">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.97</div>
        <p>PCB Benchmark<p>
        </div>239.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $239.99 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01NCEJN24?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_124" href="javascript:void(0);" onclick="setid(124)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51M5Z-1S+2L._SL75_.jpg" title="Intel Core i7-4765T, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i7-4765T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i7-4765t-cm8064601466200/index.html">Intel Core i7-4765T, 4 Cores & 8 Threads Unlocked Desktop Processor with Intel HD Graphics 4600</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i7-4765T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 8 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1150 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.0 GHz </div></div></span><span class="table_span view-more-136" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Haswell </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Haswell-E </div></div></span><span class="table_span view-more-136" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 4600 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i7 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 4 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More136" onclick="viewMore(136);"><span class="viewMore136">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.94</div>
        <p>PCB Benchmark<p>
        </div>498.95<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $498.95 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B00J5915DI?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_136" href="javascript:void(0);" onclick="setid(136)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51tWMpEmdOL._SL75_.jpg" title="Intel Core i3-7300, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-7300">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-7300-1358335/index.html">Intel Core i3-7300, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-7300 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 4.0 GHz </div></div></span><span class="table_span view-more-155" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-155" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More155" onclick="viewMore(155);"><span class="viewMore155">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.94</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01LTI1JF6?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_155" href="javascript:void(0);" onclick="setid(155)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/417RwYnaFrL._SL75_.jpg" title="Intel Core i3-6300, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-6300">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-6300-bx80662i36300/index.html">Intel Core i3-6300, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-6300 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.8 GHz </div></div></span><span class="table_span view-more-156" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake </div></div></span><span class="table_span view-more-156" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More156" onclick="viewMore(156);"><span class="viewMore156">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.55</div>
        <p>PCB Benchmark<p>
        </div>114.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $114.99 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B015VPX3G6?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_156" href="javascript:void(0);" onclick="setid(156)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51sdONGxrpL._SL75_.jpg" title="Intel Core I3-6300T, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-6300T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-6300t-322009850-01/index.html">Intel Core I3-6300T, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-6300T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-122" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake </div></div></span><span class="table_span view-more-122" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More122" onclick="viewMore(122);"><span class="viewMore122">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.49</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0868M96R6?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_122" href="javascript:void(0);" onclick="setid(122)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51EZ9LjV6JL._SL75_.jpg" title="Intel Core i5-6400T, 4 Cores & 4 Threads Unlocked Desktop Processor with  Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i5-6400T">
        <div class="stars-rating" title="3.1 out of 5">
        <div class="stars-score" style="width: 62%">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i5-6400t-cm8066201920000/index.html">Intel Core i5-6400T, 4 Cores & 4 Threads Unlocked Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i5-6400T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 4 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 2.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 2.8 GHz </div></div></span><span class="table_span view-more-126" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-126" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i5 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More126" onclick="viewMore(126);"><span class="viewMore126">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.45</div>
        <p>PCB Benchmark<p>
        </div>190.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $190 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B0161UZV42?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_126" href="javascript:void(0);" onclick="setid(126)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41SsYfZm49L._SL75_.jpg" title="Intel Core i3-7100, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-7100">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-7100-bx80677i37100/index.html">Intel Core i3-7100, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-7100 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.9 GHz </div></div></span><span class="table_span view-more-123" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-123" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More123" onclick="viewMore(123);"><span class="viewMore123">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.31</div>
        <p>PCB Benchmark<p>
        </div>220.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $220 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01NCESRJX?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_123" href="javascript:void(0);" onclick="setid(123)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51m7931xzhL._SL75_.jpg" title="Intel Core i3-6100, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-6100">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-6100-bx80662i36100/index.html">Intel Core i3-6100, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-6100 </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.7 GHz </div></div></span><span class="table_span view-more-121" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-121" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More121" onclick="viewMore(121);"><span class="viewMore121">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.16</div>
        <p>PCB Benchmark<p>
        </div>168.54<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $168.54 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B015VPX2EO?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_121" href="javascript:void(0);" onclick="setid(121)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/518i5ZmWGEL._SL75_.jpg" title="Intel Core i3-7300T, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-7300T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-7300t-bx80677i37300t/index.html">Intel Core i3-7300T, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 630</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-7300T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.5 GHz </div></div></span><span class="table_span view-more-147" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Kaby Lake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Kaby Lake-S </div></div></span><span class="table_span view-more-147" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 630 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2400 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 7 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More147" onclick="viewMore(147);"><span class="viewMore147">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.16</div>
        <p>PCB Benchmark<p>
        </div>
        </td>
        <td class="price">
        N/A </td>
        
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01N1SH0IU?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_147" href="javascript:void(0);" onclick="setid(147)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/41FnPLTR8PL._SL75_.jpg" title="Intel Core i3-6098P, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 510" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-6098P">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-6098p-bx80662i36098p/index.html">Intel Core i3-6098P, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 510</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-6098P </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.6 GHz </div></div></span><span class="table_span view-more-157" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake </div></div></span><span class="table_span view-more-157" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 510 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 1600 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More157" onclick="viewMore(157);"><span class="viewMore157">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">5.13</div>
        <p>PCB Benchmark<p>
        </div>325.00<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $325 </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B01A3N74YS?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_157" href="javascript:void(0);" onclick="setid(157)"><i class="fa fa-plus"></i></a></td>
        </tr>
        <tr class="items" data-href="#">
        <td scope="row" class="component d-sm-none">
        <a href="index.html">#</a>
        </td>
        <td class="box">
        <div class="logo-name">
        <div class="item-logo">
        <img src="../../assets/images/blank.jpg" class="img-responsive lazy img-fluid" data-src="https://m.media-amazon.com/images/I/51CZRcIXxfL._SL75_.jpg" title="Intel Core i3 6100T, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530" alt="pc builder, custom pc builder, pc part picker, build my pc, Intel Core i3-6100T">
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
        <td class="comp-details"><div class="table_title"><a href="../../component-details/processor/intel-core-i3-6100t-bx80662i36100t/index.html">Intel Core i3 6100T, 2 Cores & 4 Threads Desktop Processor with Intel HD Graphics 530</a></div>
        <span class="table_span">
        <div class="detail">
        <div class="detail__name">Brand:</div>
        <div class="detail__value f_brand"> Intel </div>
        </div>
        <div class="detail">
        <div class="detail__name">Model:</div>
        <div class="detail__value f_model"> Core i3-6100T </div>
        </div>
        </span>
        <span class="table_span">
        
        <div class="detail"><div class="detail__name">Cores:</div><div class="detail__value f_cores"> 2 </div></div><div class="detail"><div class="detail__name">Threads:</div><div class="detail__value f_threads"> 4 </div></div><div class="detail"><div class="detail__name">Socket Type:</div><div class="detail__value f_socket_type"> LGA 1151 </div></div></span><span class="table_span"><div class="detail"><div class="detail__name">Base Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div><div class="detail"><div class="detail__name">Turbo Speed:</div><div class="detail__value f_maximum_speed"> 3.2 GHz </div></div></span><span class="table_span view-more-120" style="display: none;"><div class="detail"><div class="detail__name">Architechture:</div><div class="detail__value f_micro_architecture"> Skylake </div></div><div class="detail"><div class="detail__name">Core Family:</div><div class="detail__value f_core_family"> Skylake-S </div></div></span><span class="table_span view-more-120" style="display: none;"><div class="detail"><div class="detail__name">Integrated Graphics:</div><div class="detail__value f_integrated_graphics"> Intel HD Graphics 530 </div></div><div class="detail"><div class="detail__name">Memory Type:</div><div class="detail__value f_memory_type"> DDR4 - 2133 MHz </div></div></span><span style="display: none;"><div class="detail"><div class="detail__name">Series:</div><div class="detail__value f_series"> i3 </div></div><div class="detail"><div class="detail__name">Generation:</div><div class="detail__value f_generation"> 6 </div></div>
        </span>
        
        <span class="view-more">
        <div class="view-More120" onclick="viewMore(120);"><span class="viewMore120">View More Details</span> <i class="fas fa-chevron-circle-down"></i></div>
        </span>
        <div id="content" class="d-none">
        <div>
        <div class="circle green">4.6</div>
        <p>PCB Benchmark<p>
        </div>99.99<div>
        <div class="circle red">%</div>
        <p>Value for Money<p>
        </div>
        </div>
        </td>
        <td class="price">
        $99.99 (Used) </td>
        <td><a class="btn btn-primary component-btn" href="https://amazon.com/dp/B015XEXILK?tag=pcbuilder00-20" target="_blank"><i class="fab fa-amazon"></i> View on Amazon</a></td>
        <td class="remove"><a class="btn btn-danger component-add-btn" id="p_120" href="javascript:void(0);" onclick="setid(120)"><i class="fa fa-plus"></i></a></td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        </section>
@endsection