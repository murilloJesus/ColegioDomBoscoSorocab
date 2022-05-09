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
                                    class="image featured image-content image-educacao-infantil"
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
                                    class="image featured image-content image-educacao-fundamental-inicial"
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
                                    class="image featured image-content image-educacao-fundamental-final"
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
                                    <h3>Período Integral e Ensino Bilíngue</h3>
                                    {{-- <p>False.</p> --}}
                                </header>

                                {{-- <a
                                    style="background-image: url('/public/images/segmentos/segmento_fundamental_2.png')"
                                    href="#"
                                    class="image featured image-content"
                                ></a> --}}

                                <section>
                                    <p>
                                        Para ampliar a oportunidade de exposição das crianças à língua inglesa, o Período Integral e Bilíngue é a opção que mais se aproxima dos padrões internacionais.
                                    </p>
                                    <p>
                                        O objetivo deste projeto é reduzir as lacunas na educação básica escolar brasileira no que diz respeito à língua inglesa, tornando-a um elemento de formação permanente para os nossos alunos.
                                    </p>
                                </section>

                                <div id="extracurriculares" class="anchoring"></div>

                                <a
                                    href="#"
                                    class="image featured image-content-extra image-educacao-extra"
                                ></a>

                                <header>
                                    <h3>Cursos Extracurriculares</h3>
                                    {{-- <p>False.</p> --}}
                                </header>

                                {{-- <a
                                    style="background-image: url('/public/images/segmentos/segmento_fundamental_2.png')"
                                    href="#"
                                    class="image featured image-content"
                                ></a> --}}

                                <section>
                                    <p>
                                        O aluno podem frequentar os cursos extracurriculares de sua preferência no período inverso à aula, no qual desenvolvem suas capacidades e habilidades, com participação de professores capacitados.
                                    </p>
                                    <p>
                                        As atividades extracurriculares visam produzir conhecimento que contribuam para o desenvolvimento social, cultural e artístico do aluno.
                                    </p>
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
