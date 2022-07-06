@extends('layouts.front')

@section('content')
    <header id="header">
        <div class="logo container">
            <div>
                <p>SEGMENTOS</p>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content">

                        <!-- Content -->

                            <article class="box page-content">

                                <div id="infantil" class="anchoring"></div>

                                <header>
                                    <h3>Ensino Infantil</h3>
                                    <p>Despertar, envolver, descobrir.</p>
                                </header>

                                <a
                                    href="#"
                                    class="image featured ease-image-content image-educacao-infantil"
                                ></a>

                                <section>
                                    <p>
                                        A Educação Infantil é uma fase muito importante na formação do aluno. Brincar é a principal tarefa dos pequenos, pois é na brincadeira que descobrem o mundo à sua volta, comunicam-se e se conectam em um ambiente social.
                                    </p>
                                    <p>
                                        O nosso Colégio tem um ambiente de  aprendizagem agradável para que seu filho possa desenvolver suas capacidades e estímulos imaginativos, além de ser acolhedor.
                                    </p>
                                </section>

                                <div id="fundamental-I" class="anchoring"></div>

                                <header>
                                    <h3>Fundamental I</h3>
                                    <p>Autonomia, observação e desenvolver.</p>
                                </header>

                                <a
                                    href="#"
                                    class="image featured ease-image-content image-educacao-fundamental-inicial"
                                ></a>

                                <section>
                                    <p>
                                        Nos Anos Iniciais do Ensino Fundamental (1º ao 5º ano), os estudantes aprendem usando a criatividade e a imaginação. Respeitar o tempo e as características de cada aluno é essencial.
                                    </p>
                                    <p>
                                        Em nosso colégio aplicamos o trabalho em grupo, a solução colaborativa de situações-problema e a promoção da criatividade para, dessa forma, melhorar a capacidade de decisão e a capacidade de desenvolver saberes, considerando seu próprio cotidiano.
                                    </p>
                                </section>

                                <div id="fundamental-II" class="anchoring"></div>

                                <header>
                                    <h3>Fundamental II</h3>
                                    <p>Independência, reflexão e raciocínio.</p>
                                </header>

                                <a
                                    href="#"
                                    class="image featured ease-image-content image-educacao-fundamental-final"
                                ></a>

                                <section>
                                    <p>
                                        É no período dos Anos Finais em que os alunos passam por grandes mudanças físicas, emocionais e psicológicas.
                                    </p>
                                    <p>
                                        Assim, para que o aprendizado seja significativo e divertido, oferecemos uma extensa variedade de gêneros textuais, distribuídos nas diversas disciplinas. Isso favorece o letramento no ambiente educativo. Com atividades que contemplam métodos para “aprender a aprender”, desenvolvendo a interdisciplinaridade, fortalecendo a qualidade do ensino e concretizando a aprendizagem como um ato de interação entre autor, professor, aluno, família e escola.
                                    </p>
                                </section>

                                <div id="integral-e-bilingue" class="anchoring"></div>

                                <header>
                                    <h3>Período Integral</h3>
                                </header>

                                <section>
                                    <p>O período Integral é uma opção, para os pais que trabalham o dia todo. </p>
                                    <p>Nesse segmento os alunos cursam as disciplinas curriculares em um período e no outro realizam atividades complementares através de Oficinas (como dança, teatro, música, iniciação científica, artes manuais, culinária) além de um momento para realizar as Atividades de Revisão e Reforço dos conteúdos aprendidos.</p>
                                    <p>O Colégio tem o objetivo de tornar-se Bilingue e para tanto inseriu o Inglês desde o 1º ano do Fundamental I, e no decorrer da formação os alunos são inseridos na Cultura Inglesa para,  posteriormente, ingressarem na conversação do Inglês.</p>
                                </section>

                            </article>

                    </div>
                </div>
                <div class="col-12">

                    {{-- ULTIMAS NOTICIAS --}}

                    {{-- <x-front.news></x-front.news> --}}

                </div>
            </div>
        </div>
    </section>

@endsection
