@extends('layouts.noticias')


@section('content')
<h2 class="searcher-identification"><strong>{{$search[0]}}</strong> `{{$search[1]}}`</h2>
<section>
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
