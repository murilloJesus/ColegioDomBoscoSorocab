<!-- Header -->
<header id="header">
    <a href="#" class="logo"><strong>NOTÍCIAS</strong> Dom Bosco Sorocaba</a>
    <x-noticia.social />
</header>

<!-- Banner -->
<section id="banner">
    <div class="content">
        <header>
            <h1>{{$header['big'][0]}} {{$header['big'][1]}}<br />
                {{$header['big'][2]}}</h1>
            <p>{{$header['small']}}</p>
        </header>
        <p>{{$header['subtitle']}}
        </p>
        <ul class="actions">
            <li><a href="#" class="button big">Leia Mais</a></li>
        </ul>
    </div>
    <span class="image object">
        <img src="/{{$header['image']}}" alt="" />
    </span>
</section>
