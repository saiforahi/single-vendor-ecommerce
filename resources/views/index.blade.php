@extends('layouts.app')
@section('content')
<section class="hero">
    <div class="carousel slide" id="main-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#main-carousel" data-slide-to="1"></li>
            <li data-target="#main-carousel" data-slide-to="2"></li>
            <li data-target="#main-carousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item img-gradient active">
                <div class="left-section">
                    <h2>Experience the New Perspective of <br><span>Building Your Dream PC</span></h2>
                    <p>Building your own PC is a rewarding experience. With our new approach, <br>we'll help you to
                        be sure that the compatibility of your selected PC parts is just right.</p>
                    <div class="">
                        <a class="btn btn-create-now" href="{{route('system-builder')}}">Create Now</a>
                        <a class="btn btn-pre-built" href="builts/index.html">Buy Pre-built PC</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item img-gradient">
                <div class="left-section">
                    <h2>Handling Your Toughest PC Parts <br><span>Compatibility</span> with Ease</h2>
                    <p>We handle the toughest task of PC compatibility with easeand provide <br>you with the best
                        compatibility that's available.</p>
                    <div class="">
                        <a class="btn btn-create-now" href="{{route('system-builder')}}">Create Now</a>
                        <a class="btn btn-pre-built" href="builts/index.html">Buy Pre-built PC</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item img-gradient">
                <div class="left-section">
                    <h2>Performing with Excellence to <span><br>Do More for More</span></h2>
                    <p>We are excellence with the pc parts compatibility to do more for you! <br>With the
                        ever-changing tech, you'll always get the latest and most accurate compatibility.</p>
                    <div class="">
                        <a class="btn btn-create-now" href="list/index.html">Create Now</a>
                        <a class="btn btn-pre-built" href="builts/index.html">Buy Pre-built PC</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item img-gradient">
                <div class="left-section">
                    <h2>Actually, We Breathe Technology, and <br><span>We Love Caring Tech</span></h2>
                    <p>We're a team of PC experts and we're here to help you turn your imagination into reality.
                        <br>We've been managing PC related technologies for years and are best at it.</p>
                    <div class="">
                        <a class="btn btn-create-now" href="list/index.html">Create Now</a>
                        <a class="btn btn-pre-built" href="builts/index.html">Buy Pre-built PC</a>
                    </div>
                </div>
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
    </div>
</section>
    
@endsection