@push('style')
<style>
    .hero .carousel-item-next,
    .hero .carousel-item-prev,
    .hero .carousel-item.active {
        height: 100vh;
        display: flex !important;
    }

    .hero {
        background-image: url('../images.pcbuilder.dev/assets/images/banner/bg-banner.png'), linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    @media screen and (max-width: 767.98px) {

        .hero .carousel-item-next,
        .hero .carousel-item-prev,
        .hero .carousel-item.active {
            height: 550px;
        }
    }

    @media screen and (min-width: 768px) and (max-width: 991.98px) {
        .hero .carousel-item-next,
        .hero .carousel-item-prev,
        .hero .carousel-item.active {
            height: 550px;
        }
    }
</style>
@endpush
@auth
<form method="POST" action="{{route('logout')}}" id="logout_form">
    @csrf
</form>
@endauth
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <header>
        <div class="logo">
            <a href="/">
                <img src="{{asset('images/logo-80.png')}}" alt="PC Builder" height="80" width="80"/>
                <p class="hide-mobile"><span>PC</span>Builder</p>
            </a>
        </div>
        <div class="d-none d-md-flex pbc-border"></div>
        <form method="POST" action="" class="search">
            <div><i class="fa fa-search" aria-hidden="true"></i><input autocomplete="off" name="s" type="text" placeholder="Search..." id="search"></div>
        </form>
        <div class="login">
            <div class="mobile dropdown">
                <a class="access-my-profile"><i class="fa fa-user-circle"></i></a>
            </div>
            <div class="pc">
                @auth
                <span><i class="fa fa-user-circle" style="margin-right: 15px;"></i></span>
                @endauth
                <span>Welcome
                    <div>
                        @auth
                            <a href="#" tabindex="0" html="true" class="example-popover" role="button" data-toggle="popover" title="Menu" template="<a >Logout</a>" data-placement="bottom" >{{Auth::user()->name}}</a>
                        @endauth
                        @guest
                            <a href="{{route('login')}}">Sign In / Register</a>
                        @endguest
                    </div>
                </span>
            </div>
        </div>
        <div class="d-none d-lg-flex cart">
            <a href="{{route('cart')}}"><img class="lazy" src="https://images.pcbuilder.dev/assets/images/icons/cart.svg" height="32" width="32"/></a>
            <div><span>Cart</span></div>
        </div>
        <div class="d-none d-lg-flex mode">
            <label class="switch">
                <input type="checkbox" id="switch" name="theme">
                <span class="slider round"></span>
            </label>
        </div>
        <button class="navbar-toggler menu" type="button">
            <svg width="60" height="60" viewBox="0 0 100 100">
                <path class="line line1"
                    d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058">
                </path>
                <path class="line line2" d="M 20,50 H 80"></path>
                <path class="line line3"
                    d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942">
                </path>
            </svg>
        </button>
        
    </header>


    <div id="my-nav" class="collapse navbar-collapse">
        <ul itemscope itemtype="http://schema.org/SiteNavigationElement" class="navbar-nav mr-auto">
            <li itemprop="name" class="nav-item ">
                <a itemprop="url" class="nav-link" href="{{route('system-builder')}}"><i class="fa fa-tools"></i>System Builder
                </a>
            </li>
            <li itemprop="name" class="nav-item ">
                <a itemprop="url" class="nav-link" href="{{route('pre-built')}}"><i class="fa fa-server"></i>Pre-Build
                    PC</a>
            </li>
            <li itemprop="name" class="nav-item ">
                <a itemprop="url" class="nav-link" href="{{route('laptops')}}"><i class="fa fa-laptop"></i>Laptops</a>
            </li>

            <li class="nav-item dropdown megamenu-li ">
                <a class="nav-link dropdown-toggle d-none d-lg-block" href="#" id="navbarDropdownMenuLink2"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                        class="lazy" src="https://images.pcbuilder.dev/assets/images/icons/cpu.svg" height="24"
                        width="24">
                    Browse Products</a>
                <div class="dropdown-menu megamenu" aria-labelledby="navbarDropdownMenuLink2">
                    <div class="row">
                        <div class="col-12 col-lg-6 ipad">
                            <div class="row">
                                <div itemprop="name" class="col-6 col-sm-4 col-md-3 col-lg-3 pcb-components">
                                    <a itemprop="url" href="{{route('storage-list')}}">
                                        <div class="box">
                                            <img src="https://images.pcbuilder.dev/assets/images/megamenu/storage.png"
                                                class="img-fluid mx-auto d-block mega-image lazy"
                                                alt="storage, pc builder, pc part picker, build my pc">
                                            <p>Storage</p>
                                        </div>
                                    </a>
                                </div>
                                <div itemprop="name" class="col-6 col-sm-4 col-md-3 col-lg-3 pcb-components">
                                    <a itemprop="url" href="{{route('graphics-card-list')}}">
                                        <div class="box">
                                            <img src="https://images.pcbuilder.dev/assets/images/megamenu/graphics-card.png"
                                                class="img-fluid mx-auto d-block mega-image lazy"
                                                alt="graphics card, video card, pc builder, pc part picker, build my pc">
                                            <p>Graphics Card </p>
                                        </div>
                                    </a>
                                </div>
                                <div itemprop="name" class="col-6 col-sm-4 col-md-3 col-lg-3 pcb-components">
                                    <a itemprop="url" href="{{route('power-supply-list')}}">
                                        <div class="box">
                                            <img src="https://images.pcbuilder.dev/assets/images/megamenu/power-supply.png"
                                                class="img-fluid mx-auto d-block mega-image lazy"
                                                alt="power supply, psu, pc builder, pc part picker, build my pc">
                                            <p>Power Supply</p>
                                        </div>
                                    </a>
                                </div>
                                <div itemprop="name" class="col-6 col-sm-4 col-md-3 col-lg-3 pcb-components">
                                    <a itemprop="url" href="{{route('case-list')}}">
                                        <div class="box">
                                            <img src="https://images.pcbuilder.dev/assets/images/megamenu/case.png"
                                                class="img-fluid mx-auto d-block mega-image lazy"
                                                alt="case, cabinet, pc builder, pc part picker, build my pc">
                                            <p>Case</p>
                                        </div>
                                    </a>
                                </div>
                                <div itemprop="name" class="col-6 col-sm-4 col-md-3 col-lg-3 pcb-components">
                                    <a itemprop="url" href="{{route('processor-list')}}">
                                        <div class="box">
                                            <img src="https://images.pcbuilder.dev/assets/images/mega-menu/nav-processor.png"
                                                class="img-fluid mx-auto d-block mega-image lazy"
                                                alt="cpu, processor, pc builder, pc part picker, build my pc">
                                            <p>CPU</p>
                                        </div>
                                    </a>
                                </div>
                                <div itemprop="name" class="col-6 col-sm-4 col-md-3 col-lg-3 pcb-components">
                                    <a itemprop="url" href="{{route('cpu-coolers-list')}}">
                                        <div class="box">
                                            <img src="https://images.pcbuilder.dev/assets/images/megamenu/cpu-cooler.png"
                                                class="img-fluid mx-auto d-block mega-image lazy"
                                                alt="cpu cooler, pc builder, pc part picker, build my pc">
                                            <p>CPU Cooler</p>
                                        </div>
                                    </a>
                                </div>
                                <div itemprop="name" class="col-6 col-md-3 col-lg-3 pcb-components">
                                    <a itemprop="url" href="{{route('motherboard-list')}}">
                                        <div class="box">
                                            <img src="https://images.pcbuilder.dev/assets/images/megamenu/motherboard.png"
                                                class="img-fluid mx-auto d-block mega-image lazy"
                                                alt="motherboard, pc builder, pc part picker, build my pc">
                                            <p>Motherboard</p>
                                        </div>
                                    </a>
                                </div>
                                <div itemprop="name" class="col-6 col-md-3 col-lg-3 pcb-components">
                                    <a itemprop="url" href="{{route('memory-list')}}">
                                        <div class="box">
                                            <img src="https://images.pcbuilder.dev/assets/images/megamenu/memory.png"
                                                class="img-fluid mx-auto d-block mega-image lazy"
                                                alt="memory, ram, pc builder, pc part picker, build my pc">
                                            <p>Memory</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 ipad">
                            <div class="row links">
                                <div class="col-6 col-sm-4">
                                    <ul class="list-unstyled">
                                        <li class="heading top-padding">Cooling</li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="product/case-cooler/index.html">Case Fans</a></li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="{{route('thermalpaste-list')}}">Thermal Compound</a></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li class="heading">Expansion</li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="product/sound-card/index.html">Sound Cards</a></li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="product/wired-network-adapter/index.html">Wired Networking</a>
                                        </li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="product/wireless-network-adapter/index.html">Wireless
                                                Networking</a></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li class="heading">Displays</li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="{{route('monitor-list')}}">Monitors</a></li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="product/webcam/index.html">Webcam</a></li>
                                    </ul>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <ul class="list-unstyled">
                                        <li class="heading top-padding">Peripherals</li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="#">Headphones</a></li>
                                        <li itemprop="name">
                                            <a itemprop="url"
                                                href="{{route('keyboard-list')}}">Keyboards</a></li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="{{route('mouse-list')}}">Mouse</a></li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="{{route('speakers-list')}}">Speakers</a></li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="{{route('ups-list')}}">Uninteraptable Power Supplies</a></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li class="heading">External Storage</li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="#">External Hard
                                                Drives</a></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li class="heading">Drivers</li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="#">Optical Drive</a></li>
                                    </ul>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <ul class="list-unstyled">
                                        <li class="heading top-padding">Software</li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="#">Antivirus</a></li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="#">Utilities</a></li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="#">Operating Systems</a></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li class="heading">Pre-Built PCs</li>
                                        <li itemprop="name"><a itemprop="url"
                                                href="#">Gaming Desktops</a></li>
                                        <li itemprop="name"><a itemprop="url" href="#">Cheap Desktops</a></li>
                                        <li itemprop="name"><a itemprop="url" href="#">AIO
                                                Desktops</a></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li class="heading">Others</li>
                                        <li itemprop="name"><a itemprop="url" href="{{route('laptops')}}">Laptops</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        {{-- <div class="right-section d-none d-lg-flex">
            <ul class="mr-5">
                <div class="">
                    <li class="nav-item">
                        <a class="" onclick="alert('Something is Cooking Here :)');">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://blog.pcbuilder.net/" class="">Blog</a>
                    </li>
                </div>
                <li class="image-li dropdown pcb-country">
                    <a class="country dropdown-toggle" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-fluid change-country lazy" src="https://images.pcbuilder.dev/assets/images/flags/us.svg" alt="pc builder, pc part picker, build my pc"/>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <a class="dropdown-item" onclick="changecountry('US');"><img class="img-fluid dropdown-image lazy" src="https://images.pcbuilder.dev/assets/images/flags/us.svg" alt="pc builder us, pcbuilder us"/>United States</a>
                        <a class="dropdown-item" onclick="changecountry('GB');">
                            <img class="img-fluid dropdown-image lazy" src="https://images.pcbuilder.dev/assets/images/flags/gb.svg" alt="pc builder uk, pcbuilder uk"/>
                            United Kingdom
                        </a>
                        <a class="dropdown-item" onclick="changecountry('CA');">
                            <img class="img-fluid dropdown-image lazy" src="https://images.pcbuilder.dev/assets/images/flags/ca.svg" alt="pc builder ca, pcbuilder ca"/>
                            Canada
                        </a>
                        <a class="dropdown-item" onclick="changecountry('IN');">
                            <img class="img-fluid dropdown-image lazy" src="https://images.pcbuilder.dev/assets/images/flags/in.svg" alt="pc builder in, pcbuilder in"/>
                            India
                        </a>
                        <a class="dropdown-item" onclick="changecountry('AU');">
                            <img class="img-fluid dropdown-image lazy" src="https://images.pcbuilder.dev/assets/images/flags/au.svg" alt="pc builder au, pcbuilder au"/>
                            Australia
                        </a>
                        <a class="dropdown-item" onclick="changecountry('IT');">
                            <img class="img-fluid dropdown-image lazy" src="https://images.pcbuilder.dev/assets/images/flags/it.svg" alt="pc builder it, pcbuilder it"/>
                            Italy
                        </a>
                    </div>
                </li>
            </ul>
        </div> --}}
    </div>
    <div id="my-profile" class="collapse navbar-collapse">
        <div class="mega-profile">
            @auth
                <a class="dropdown-item" href="#" onclick="getElementById('logout_form').submit()">Logout</a>
            @endauth
            @guest
                <a class="dropdown-item" href="{{route('login')}}">Login</a>
                <a class="dropdown-item" href="{{route('register')}}">Sign up</a>
            @endguest
            <a class="dropdown-item d-none" href="#">Forum</a>
            <a class="dropdown-item d-none" href="#">Blog</a>
        </div>
    </div>
    <div id="my-search" class="collapse navbar-collapse">
        <div class="mega-search">
            <a class="search-for">Please Search a Term...</a>
        </div>
    </div>
</nav>