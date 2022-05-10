@extends('layouts.noticias')


@section('content')

<header id="header">
    <a href="index.html" class="logo"><strong>{{$search[0]}}</strong> {{$search[1]}}</a>
    <x-noticia.social />
</header>

<!-- Section -->
<section>
    <div class="posts">
        @foreach ($noticias as $noticia)
            <article>
                <a href="#" class="image"><img src="/{{$noticia->image}}" alt="" /></a>
                <h3>{{$noticia->title}}</h3>
                <p>{{$noticia->subtitle}}</p>
                <ul class="actions">
                    <li><a href="#" class="button">Mais</a></li>
                </ul>
            </article>
        @endforeach
    </div>
</section>
@endsection
