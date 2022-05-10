<div id="sidebar">
    <div class="inner">

        <!-- Search -->
            <section id="search" class="alt">
                <form method="get" action="?">
                    <input type="text" name="pesquisa" id="search" placeholder="Procurar" />
                </form>
            </section>

        <!-- Menu -->
            <nav id="menu">
                <header class="major">
                    <h2>Categorias</h2>
                </header>
                <ul>
                    @foreach ($categorias as $categoria)
                        <li><a href="?categoria={{$categoria->categories}}">{{$categoria->categories}}</a></li>
                    @endforeach
                </ul>
            </nav>

        <!-- Section -->
            <section>
                <header class="major">
                    <h2>Mais Visitados</h2>
                </header>
                <div class="mini-posts">
                    @foreach ($visitados as $post)
                        <article>
                            <a href="#" class="image">
                                <img src="/{{$post->image}}" alt="" />
                            </a>
                            <p>{{$post->title}} ( <small><i>{{$post->times_accessed}} cliques.</i></small>)</p>
                        </article>
                        <ul class="actions">
                            <li><a href="#" class="button">Ver</a></li>
                        </ul>
                    @endforeach
                </div>
            </section>

        <!-- Section -->
            <section>
                <header class="major">
                    <h2>Get in touch</h2>
                </header>
                <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                <ul class="contact">
                    <li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
                    <li class="icon solid fa-phone">(000) 000-0000</li>
                    <li class="icon solid fa-home">1234 Somewhere Road #8254<br />
                    Nashville, TN 00000-0000</li>
                </ul>
            </section>

        <!-- Footer -->
            <footer id="footer">
                <p class="copyright">&copy; Dom Bosco Sorocaba. Todos os direitos reservados.<br>
                    Desenvolvido por: <a href="https://www.starescola.com.br">Star Escola - Identidade visual para escolas.</a>. <br>
                    Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
            </footer>

    </div>
</div>
