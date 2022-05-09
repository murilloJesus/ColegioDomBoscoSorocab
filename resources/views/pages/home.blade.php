@extends('layouts.front')

@section('content')

    <div id="Carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        {{-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#Carousel" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#Carousel" data-bs-slide-to="2" aria-label="Slide 2"></button>
        </div> --}}
        <div class="carousel-inner">
            @foreach ($banners as $index => $banner)
                @if ($banner->action != '')
                    <a href="{{$banner->action}}" target="{{$banner->target}}" id="banner" class="carousel-item {{$index == 0 ? 'active' : ''}}" style="background-image: url(/{{$banner->image}})"></a>
                @else
                    <div id="banner" class="carousel-item {{$index == 0 ? 'active' : ''}}" style="background-image: url(/{{$banner->image}})"></div>
                @endif
            @endforeach
            @if (sizeof($banners) > 1)
                {{-- Resolve o bug do ultimo banner para o primeiro nao esfumacear --}}
                <div id="banner" class="carousel-item"  style="background-image: url(/{{$banners[0]->image}})"></div>
            @endif
        </div>
        @if (sizeof($banners) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#Carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#Carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>

    <!-- Main -->
    <section id="main">
        <div class="container">
            <div class="row gtr-200">

                <!-- DEPOIMENTOS -->
                <depoimentos></depoimentos>

                <!-- COLÉGIO -->
                {{-- <colegio></colegio> --}}

                <!-- CONTEUDO -->
                <conteudo></conteudo>

                {{-- <x-front.news></x-front.news> --}}

            </div>
        </div>
    </section>
@endsection
