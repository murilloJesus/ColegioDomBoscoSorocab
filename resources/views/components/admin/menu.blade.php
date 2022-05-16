<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li {{ $isPage('home') ? 'class=active' : '' }}><a href="/administrador/"><i class="notika-icon notika-house"></i>Home</a>
                    </li>
                    {{-- <li {{ $isPage('paginas') ? 'class=active' : '' }}><a href="/administrador/paginas"><i class="notika-icon notika-edit"></i> Paginas</a>
                    </li> --}}
                    <li {{ $isPage('banners') ? 'class=active' : '' }}><a href="/administrador/banners"><i class="notika-icon notika-windows"></i> Banners</a>
                    </li>
                    <li {{ $isPage('depoimentos') ? 'class=active' : '' }}><a href="/administrador/depoimentos"><i class="notika-icon notika-support"></i>Depoimentos</a>
                    </li>
                    <li {{ $isPage('galerias') ? 'class=active' : '' }}><a href="/administrador/galerias"><i class="notika-icon notika-app"></i>Galerias</a>
                    </li>
                    <li {{ $isPage('noticias') ? 'class=active' : '' }}><a href="/administrador/noticias"><i class="notika-icon notika-edit"></i> Noticias </a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
