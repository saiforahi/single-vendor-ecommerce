<div class="carousel slide" id="main-carousel" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($product->getMedia('main_image') as $image)
            <div class="{{ $loop->index == 0 ? 'carousel-item img-gradient active':'carousel-item img-gradient' }}">
                <img class="d-block img-fluid big-image lazy"
                    title="G.SKILL Trident Z Royal Series, 16GB (2 x 8GB) 288-Pin DDR4-4800MHz Desktop Memory Model with CL18"
                    data-src="{{$image->getUrl('main_image')}}"
                    alt="Build My PC, System Builder, G.Skill Trident Z Royal">
            </div>
        @endforeach
    </div>
    @if(count($product->getMedia('main_image'))>1)
    <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon temp"></span>
        <span class="sr-only" aria-hidden="true">Prev</span>
    </a>
    <a href="#main-carousel" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only" aria-hidden="true">Next</span>
    </a>
    @endif
    <ol>
        @foreach ($product->getMedia('main_image') as $image)
            <li data-target="#main-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}">
            </li>
        @endforeach

    </ol>

</div>