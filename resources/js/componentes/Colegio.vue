<template>

    <div class="col-3 col-12-medium">
        <div class="sidebar">
            <!-- Recent Posts -->
            <section>
                <h2 class="major"><span>Colégio</span></h2>
                <ul class="divided">
                    <li v-for="(item, index) in segmentos" :key="index">
                        <article class="box post-summary">
                            <h4><a :class="actived.name == item.name ? 'active' : '' " @click="set_actived(item)"
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
            <component v-if="actived.component" :is="actived.component">

            </component>
            <article v-else class="box post">
                <header>
                    <h3><a href="#">{{actived.name}}</a></h3>
                    <p v-if="actived.desc">{{actived.desc}}</p>
                    <!-- <ul class="meta">
                        <li class="icon fa-clock">15 minutes ago</li>
                        <li class="icon fa-comments"><a href="#">8</a></li>
                    </ul> -->
                </header>
                <a v-if="actived.classImage" href="#" :class="actived.classImage" class="image featured parallax"></a>
                <p v-for="(text, t_index) in actived.text" :key="t_index" v-html="text" class="paragraph"></p>
                <a :href="actived.see_more" v-if="actived.see_more" class="button alt">Continue Lendo</a>
            </article>
        </div>
    </div>

</template>

<script>
    import EstruturaVue from './Estrutura.vue';
    export default {
        name: "Content",
        data: () => {
            return {
                actived: {},
                segmentos: [{
                        name: "História",
                        desc: false,
                        href: 'historia',
                        classImage: "image-historia",
                        text: [
                            `O Colégio DOM BOSCO nasce em 2009 com a denominação “Múltiplo Educação Infantil”, atendendo ao segmento da Educação Infantil, tendo o afeto e a educação humanizada como principais pilares em sua prática, conquistando uma ascensão constante e surpreendente, o que nada mais foi do que o resultado e um excelente trabalho desenvolvido.`,
                        ],
                        see_more: "/colegio#historia"
                    },
                    {
                        name: "Missão, Visão e Valores",
                        desc: false,
                        href: 'missao-visao-valores',
                        classImage: 'image-missao-visao-valores',
                        text: [
                            `<b>VISÃO</b> Ser uma instituição educacional de referência, promovendo a excelência humana e acadêmica de uma sociedade.`,
                            `<b>MISSÃO</b> Através de uma educação de qualidade, íntegra e inovadora,  promover a formação de cidadãos autônomos, criativos, cooperativos, resilientes e com competência para gerar transformações sociais, tecnológicas e ecológicas.`,
                            `<b>VALORES</b>
                                Respeito,
                                Comprometimento,
                                Pertencimento,
                                Empatia,
                                Criatividade.
                                `
                        ]
                    },
                    {
                        name: "Premiações",
                        desc: false,
                        href: 'premiacoes',
                        classImage: "image-premiacoes",
                        text: [
                            `O Programa de Excelência - PEX do Sistema de Ensino Dom Bosco é uma plataforma de reconhecimento, que a partir de
                            um manual de gerenciamento contém orientações que possibilitam a condução das instituições de ensino com sucesso,
                            com base nos resultados alcançados, destaca-se os colégios que alcançam os padrões de excelência estabelecidos pelo Programa.`,
                        ],
                        see_more: "/colegio#premiacoes"
                    },
                    {
                        name: "Proposta Pedagógica",
                        desc: "Educação Infantil",
                        href: 'proposta-pedagogica-infantil',
                        classImage: "image-educacao-infantil",
                        text: [
                            `A Educação Infantil do Colégio Dom Bosco busca incentivar nas crianças, por meio de brincadeiras e de interações, o gosto pela descoberta, além de valorizar suas experiências individuais e coletivas.`,
                        ],
                        see_more: "/proposta-pedagogica"
                    },
                    {
                        name: "Estrutura",
                        href: 'estrutura',
                        desc: false,
                        source: false,
                        text: false,
                        component: EstruturaVue
                    }
                ]
            }
        },
        created() {
            this.actived = this.segmentos[0]
        },
        methods: {
            set_actived(item) {
                this.actived = item;
            }
        }
    }

</script>

<style scoped>
    .parallax {
        min-height: 250px;
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

    @media screen and (max-width: 736px) {
        .text {
            font-size: 1.1em;
        }
    }

</style>
