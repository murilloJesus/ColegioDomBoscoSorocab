@extends('layouts.noticias')

@section('content')
<!-- Content -->
<section>
    <header class="main">
        <h1>{{$noticia->title}}</h1>
        <p>{{$noticia->subtitle}}</p>
    </header>

    <span class="image main"><img src="/public/{{$noticia->image}}" alt="" /></span>

    <div class="notice-content">
        {!! $noticia->content !!}
    </div>

</section>
@endsection
