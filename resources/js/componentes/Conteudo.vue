<template>

    <div class="col-3 col-12-medium sidebar-mobile">
        <div class="sidebar">
            <!-- Recent Posts -->
            <section>
                <h2 class="major"><span>Segmentos</span></h2>
                <ul class="divided">
                    <li v-for="(item, index) in segmentos" :key="index">
                        <article class="box post-summary" >
                            <h4><a
                                :class="actived.name == item.name ? 'active' : '' "
                                @click="set_actived(item)"
                                :href="`#${item.href}`">{{item.name}}</a></h4>
                        </article>
                    </li>
                </ul>
            </section>
        </div>
    </div>
    <div class="col-9 col-12-medium">
        <div class="content" ref="content">
            <!-- Content -->
            <div :id="actived.href" class="anchoring"></div>
            <article class="box post">
                <header>
                    <h3><a href="#">{{actived.name}}</a></h3>
                    <p v-if="actived.desc">{{actived.desc}}</p>
                </header>
                <a
                    v-if="actived.classe"
                    href="#"
                    :class="actived.classe"
                    class="image featured"
                ></a>
                <p
                v-for="(text, t_index) in actived.text"
                :key="t_index"
                class="paragraph">
                    {{text}}
                </p>
            </article>
        </div>
    </div>

    <div class="col-3 col-12-medium sidebar-web">
        <div class="sidebar">

            <!-- Sidebar -->

            <!-- Recent Posts -->
            <section>
                <h2 class="major"><span>Segmentos</span></h2>
                <ul class="divided">
                    <li v-for="(item, index) in segmentos" :key="index">
                        <article class="box post-summary" >
                            <h4><a
                                :class="actived.name == item.name ? 'active' : '' "
                                @click="set_actived(item)"
                                :href="`#${item.href}`">{{item.name}}</a></h4>
                        </article>
                    </li>
                </ul>
            </section>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Content",
        data: () => {
            return {
                actived: {},
                segmentos: [
                    {
                        name: "Ensino Infantil",
                        desc: "Despertar, envolver, descobrir.",
                        classe: "image-content image-educacao-infantil",
                        href: 'segmento-infantil',
                        text: [
                            `A Educação Infantil é uma fase muito importante na formação do aluno. Brincar é a principal tarefa dos pequenos, pois é na brincadeira que descobrem o mundo à sua volta, comunicam-se e se conectam em um ambiente social.`,
                            `O nosso Colégio tem um ambiente de  aprendizagem agradável para que seu filho possa desenvolver suas capacidades e estímulos imaginativos, além de ser acolhedor.`
                        ]
                    },
                    {
                        name: "Fundamental I",
                        desc: "Autonomia, observação e desenvolver.",
                        classe: "image-content image-educacao-fundamental-inicial",
                        href: 'segmento-funtamental-I',
                        text: [
                            `Nos Anos Iniciais do Ensino Fundamental (1º ao 5º ano), os estudantes aprendem usando a criatividade e a imaginação. Respeitar o tempo e as características de cada aluno é essencial.`,
                            `Em nosso colégio aplicamos o trabalho em grupo, a solução colaborativa de situações-problema e a promoção da criatividade para, dessa forma, melhorar a capacidade de decisão e a capacidade de desenvolver saberes, considerando seu próprio cotidiano.`
                        ]
                    },
                    {
                        name: "Fundamental II",
                        desc: "Independência, reflexão e raciocínio.",
                        classe: "image-content image-educacao-fundamental-final",
                        href: 'segmento-funtamental-II',
                        text: [
                            `É no período dos Anos Finais em que os alunos passam por grandes mudanças físicas, emocionais e psicológicas.`,
                            `Assim, para que o aprendizado seja significativo e divertido, oferecemos uma extensa variedade de gêneros textuais, distribuídos nas diversas disciplinas. Isso favorece o letramento no ambiente educativo. Com atividades que contemplam métodos para “aprender a aprender”, desenvolvendo a interdisciplinaridade, fortalecendo a qualidade do ensino e concretizando a aprendizagem como um ato de interação entre autor, professor, aluno, família e escola.`
                        ]
                    },
                    {
                        name: "Período Integral e Ensino Bilíngue",
                        desc: false,
                        classe: false,
                        href: 'segmento-integral-bilingue',
                        text: [
                            `Para ampliar a oportunidade de exposição das crianças à língua inglesa, o Período Integral e Bilíngue é a opção que mais se aproxima dos padrões internacionais.`,
                            `O objetivo deste projeto é reduzir as lacunas na educação básica escolar brasileira no que diz respeito à língua inglesa, tornando-a um elemento de formação permanente para os nossos alunos.`
                        ]
                    },
                    {
                        name: "Cursos Extracurriculares",
                        desc: false,
                        classe: "image-content-extra image-educacao-extra",
                        href: 'segmento-extracurriculares',
                        text: [
                            `O aluno podem frequentar os cursos extracurriculares de sua preferência no período inverso à aula, no qual desenvolvem suas capacidades e habilidades, com participação de professores capacitados.`,
                            `As atividades extracurriculares visam produzir conhecimento que contribuam para o desenvolvimento social, cultural e artístico do aluno.`
                        ]
                    },

                ]
            }
        },
        created(){
            this.actived = this.segmentos[0]
        },
        methods: {
            set_actived(item){
                this.actived = item;
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(this.$refs.content).offset().top - this.size_of_menu()
                }, 2000);
            }
        }
    }

</script>

<style scoped>

.parallax {
    min-height: 250px;
    /* retirado a funcionalidade de parallar */
    /* background-attachment: fixed; */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.active {
    color: #0a58ca;
}

.paragraph {
    text-indent: 1em;
    font-size: 1.3em;
    text-align: justify;
}

.sidebar-mobile {
    display: none;
}


.sidebar-web {
    display: block;
}

@media screen and (max-width: 980px) {

    .sidebar-mobile {
        display: block;
    }

    .sidebar-web {
        display: none;
    }

}

@media screen and (max-width: 736px) {
    .text {
        font-size: 1.1em;
    }
}
</style>
