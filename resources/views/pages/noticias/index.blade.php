@extends('layouts.noticias')


@section('content')


    @if ($cabecalho)
        <x-noticia.header :cabecalho="$cabecalho" />
    @endif

<!-- Section -->
<section>
    <header class="major">
        <h2>Ultimas Notícias</h2>
    </header>
    <div class="posts">
        @foreach ($noticias as $noticia)
            <article>
                <a href="{{$noticia->alias}}/{{$noticia->id}}" class="image"><img src="/public/{{$noticia->image}}" alt="" /></a>
                <h3>{{$noticia->title}}</h3>
                <p>{{$noticia->subtitle}}</p>
                <ul class="actions">
                    <li><a href="{{$noticia->alias}}/{{$noticia->id}}" class="button">Mais</a></li>
                </ul>
            </article>
        @endforeach
    </div>
</section>
@endsection
