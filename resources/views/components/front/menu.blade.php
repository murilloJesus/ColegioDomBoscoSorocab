			<!-- Nav -->
            <nav id="nav">
                <ul>
                    <li {{ $page === 'home' ? 'class=current' : '' }}><a href="/">Home</a></li>
                    <li {{ $page === 'colegio' ? 'class=current' : '' }}>
                        <a href="/colegio" >Colégio</a>
                        <ul>
                            <li><a href="/colegio#historia">História</a></li>
                            <li><a href="/colegio#missao-visao-valores">Missão, Visão e Valores</a></li>
                            <li>
                                <a href="/proposta-pedagogica" >Proposta Pedagógica</a>
                                <ul>
                                    <li><a href="/proposta-pedagogica#infantil">Infantil</a></li>
                                    <li><a href="/proposta-pedagogica#fundamental">Fundamental</a></li>
                                    {{-- <li><a href="#">Material Didático</a></li> --}}
                                </ul>
                            </li>
                            <li><a href="/colegio#premiacoes">Premiações</a></li>
                            <li><a href="/colegio#estrutura">Estrutura</a></li>
                        </ul>
                    </li>
                    <li {{ $page === 'segmentos' ? 'class=current' : '' }}>
                        <a href="/segmentos">Segmentos</a>
                        <ul>
                            <li><a href="/segmentos#infantil">Ensino Infantil</a></li>
                            <li><a href="/segmentos#fundamental-I">Ensino Fundamental I</a></li>
                            <li><a href="/segmentos#fundamental-II">Ensino Fundamental II</a></li>
                            <li><a href="/segmentos#integral-e-bilingue">Integral</a></li>
                                {{-- <ul>
                                    <li><a href="/segmentos#extracurriculares">Ballet</a></li>
                                    <li><a href="/segmentos#extracurriculares">Bi-Bot</a></li>
                                    <li><a href="/segmentos#extracurriculares">Judô</a></li>
                                    <li><a href="/segmentos#extracurriculares">Robótica</a></li>
                                </ul> --}}
                            </li>
                        </ul>
                    </li>
                    <li><a href="/noticias" target="_blank">Notícias</a></li>
                    <li {{ $page === 'galerias' ? 'class=current' : '' }}><a href="/galerias">Galerias</a></li>
                    <li {{ $page === 'contato' ? 'class=current' : '' }}><a href="/contato">Contato</a></li>
                </ul>
            </nav>
