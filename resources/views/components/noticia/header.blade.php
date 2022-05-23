<!-- Banner -->
<section id="banner">
    <div class="content">
        <header>
            @if ($header['small'])
                <h1>{{$header['big'][0]}} {{$header['big'][1]}}<br />
                    {{$header['big'][2]}}</h1>
                <p>{{$header['small']}}</p>
            @else
                <h1>{{$header['big']}}</h1>
            @endif
        </header>
        <p>{{$header['subtitle']}}
        </p>
        <ul class="actions">
            <li><a href="{{$header['alias']}}/{{$header['id']}}" class="button big">Leia Mais</a></li>
        </ul>
    </div>
    <span class="image object">
        <img src="/public/{{$header['image']}}" alt="" />
    </span>
</section>
