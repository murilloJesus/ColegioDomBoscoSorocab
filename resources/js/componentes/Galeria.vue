<template>
    <!-- Galeria -->
    <div class="row">
        <div v-for="(item, index) in galeries" :key="index" class="col-2 col-4-medium col-6-small">
            <!-- Feature -->
            <section class="box feature" @click="changeGalery(index)">
                <div class="image featured"><img :src="`/${item.background.path}`" alt="" /></div>
                <h4>{{item.name}}</h4>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-12-medium">
            <div class="content">

                <!-- Featured Post -->
                <article class="box post">
                    <header>
                        <h3><a href="#">{{opened.name}}</a></h3>
                        <!-- <p>With a smaller subtitle that attempts to elaborate</p> -->
                        <!-- <ul class="meta">
                                <li class="icon fa-clock">15 minutes ago</li>
                                <li class="icon fa-comments"><a href="#">8</a></li>
                            </ul> -->
                    </header>

                    <div class="container">
                        <div class="caption-container">

                        </div>

                        <div class="mySlides">
                            <div class="numbertext">{{img_index + 1}} / {{paginator.total_images}}</div>
                            <div class="image-gallery" :style="`background-image: url('/${selected.source}')`">

                            </div>
                        </div>

                        <a class="prev" @click="move(-1)">❮</a>
                        <a class="next" @click="move(1)">❯</a>

                        <div class="caption-container">
                            <p id="caption"> {{selected.name}} </p>
                        </div>

                        <div class="column-container">
                            <div
                                class="column"
                                v-for="(item, index) in images"
                                :key="index"
                                @click="moveTo(item)"
                                :class="img_index == paginator.index_atual + index ? 'active' : ''"
                                :alt="item.name"
                                :style="{backgroundImage: `url(/${item.source})`}">
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>

</template>

<script>
    import axios from 'axios'
    import infraestrutura from './../data/galery/infraestrutura.json'

    export default {
        name: "Galeria",
        data: () => {
            return {
                gallery_index: 0,
                img_index: 0,
                size_of_galery: $(document).width() > 980 ? 6 : 4,
                galeries: [
                    infraestrutura
                ]
            }
        },
        async mounted() {
            await axios.get('/public/data/galerias.json')
                .then(({
                    data
                }) => {
                    this.galeries = [
                        infraestrutura,
                        ...data
                    ]
                })
        },
        methods: {
            move(dir) {
                let new_position = this.img_index + dir

                if (new_position < 0) {
                    new_position = 0
                } else if (new_position >= this.paginator.total_images) {
                    new_position = this.paginator.total_images - 1
                }

                this.img_index = new_position
            },
            moveTo(item) {

                this.img_index = this.opened.images.findIndex((el, index) => {
                    return el == item ? index : false
                })
            },
            changeGalery(index) {
                this.gallery_index = index
                this.img_index = 0
            }
        },
        computed: {
            opened() {
                return this.galeries[this.gallery_index]
            },
            images() {
                let inicio = this.paginator.index_atual,
                    fim = inicio + this.size_of_galery

                return this.opened.images.map(el => el).slice(inicio, fim)
            },
            path() {
                return this.opened.path
            },
            selected() {
                return this.opened.images[this.img_index]
            },
            paginator() {
                let total_images = this.opened.images.length,
                    size = this.size_of_galery,
                    index = this.img_index + 1,
                    index_atual = index

                if (index + size > total_images) {
                    index_atual = total_images - size + 1
                }

                index_atual--

                return {
                    total_images,
                    index_atual
                }

            }
        }
    }

</script>

<style scoped>
    .image-gallery {
        width: 100%;
        height: 450px;
        background-color: #04070e;
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
    }

    /* FROM W3SCHOOL */
    /* Position the image container (needed to position the left and right arrows) */
    .container {
        position: relative;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 30px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
        text-decoration: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 25px;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container {
        min-height: 10px;
        text-align: center;
        background-color: #04070e;
        padding: 2px 16px;
        color: white;
    }

    .caption-container p {
        margin-bottom: 5px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column-container {
        margin: 0 auto;
        display: flex;
    }

    /* Six columns side by side */
    .column {
        float: left;
        height: 120px;
        background-size: cover;
        margin: 10px 5px 0px 5px;
        flex-grow: 1;
        opacity: 0.6;
        cursor: pointer;
    }

    .column:hover{
        opacity: 1;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
        border: 2px solid #F71;
    }

    section.box{
        padding: 0 0 2em 0 !important;
    }

    .image.featured {
        margin: 0 0 10px 0 !important;
    }

    div.image {
        height: 160px;
        overflow: hidden;
        text-align: center;
        background-color: black;
    }

    div.image img {
        transition: transform 1s, opacity 1s ease-in-out;
        opacity: 0.6;
        transform: scale(1.0);
    }

    div.image:hover img {
        transform: scale(1.1);
        opacity: 1;
    }

    section.box {
        cursor: pointer;
    }

    @media screen and (max-width: 980px) {

        .image-gallery {
            height: 280px;
        }

        .column {
            width: 25%;
        }
    }

</style>
