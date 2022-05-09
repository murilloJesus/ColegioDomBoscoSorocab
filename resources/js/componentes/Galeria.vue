<template>
        <!-- Galeria -->
        <div class="row">
            <div class="col-9 col-12-medium">
                <div class="content">

                    <!-- Featured Post -->
                    <article class="box post">
                        <header>
                            <h3><a href="#">Estruturas</a></h3>
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
                                <div class="image-gallery" :style="`background-image: url('${path}/${selected.src}')`">

                                </div>
                            </div>

                            <a class="prev" @click="move(-1)">❮</a>
                            <a class="next" @click="move(1)">❯</a>

                            <div class="caption-container">
                                <p id="caption"> {{selected.name}} </p>
                            </div>

                            <div class="row">
                                <div class="column" v-for="(item, index) in images" :key="index" @click="img_index = index">
                                    <img  class="demo cursor" :class="img_index == index ? 'active' : ''"  :src="`${path}/${item.src}`" style="width:100%" :alt="item.name">
                                </div>
                            </div>
                        </div>
                    </article>

                </div>
            </div>
            <div class="col-3 col-12-medium">
                <div class="sidebar">

                    <!-- Archives -->
                    <!-- <ul class="divided">
                        <li>
                            <article class="box post-summary">
                                <h3><a href="#">A Subheading</a></h3>
                                <ul class="meta">
                                    <li class="icon fa-clock">6 hours ago</li>
                                    <li class="icon fa-comments"><a href="#">34</a></li>
                                </ul>
                            </article>
                        </li>
                        <li>
                            <article class="box post-summary">
                                <h3><a href="#">Another Subheading</a></h3>
                                <ul class="meta">
                                    <li class="icon fa-clock">9 hours ago</li>
                                    <li class="icon fa-comments"><a href="#">27</a></li>
                                </ul>
                            </article>
                        </li>
                        <li>
                            <article class="box post-summary">
                                <h3><a href="#">And Another</a></h3>
                                <ul class="meta">
                                    <li class="icon fa-clock">Yesterday</li>
                                    <li class="icon fa-comments"><a href="#">184</a></li>
                                </ul>
                            </article>
                        </li>
                        <li>
                            <article class="box post-summary">
                                <h3><a href="#">And Another</a></h3>
                                <ul class="meta">
                                    <li class="icon fa-clock">2 days ago</li>
                                    <li class="icon fa-comments"><a href="#">286</a></li>
                                </ul>
                            </article>
                        </li>
                        <li>
                            <article class="box post-summary">
                                <h3><a href="#">And One More</a></h3>
                                <ul class="meta">
                                    <li class="icon fa-clock">3 days ago</li>
                                    <li class="icon fa-comments"><a href="#">8,086</a></li>
                                </ul>
                            </article>
                        </li>
                    </ul>
                    <a href="#" class="button alt">Ver Mais</a> -->

                </div>
            </div>
        </div>
</template>

<script>
    import infraestrutura from './../data/galery/infraestrutura.json'

    export default {
        name: "Galeria",
        data: () => {
          return {
              img_index: 0,
              size_of_galery: 6,
              galeries: [
                  infraestrutura
              ]
          }
        },
        methods: {
            log(varr){
                console.log(varr);
            },
            move(dir){
                let new_position = this.img_index + dir

                if(new_position < 0 ){
                    new_position = 0
                }else if(new_position >= this.paginator.total_images ){
                    new_position = this.paginator.total_images-1
                }

                this.img_index = new_position

                console.log(this.paginator);

            }
        },
        computed: {
            opened() {
                return this.galeries[0]
            },
            images(){
                let inicio = this.paginator.index_atual,
                    fim = inicio + this.size_of_galery

                return this.opened.images.map(el => el).slice(inicio, fim)
            },
            path(){
                return this.opened.path
            },
            selected(){
               return this.opened.images[this.img_index]
            },
            paginator(){
                let total_images = this.opened.images.length,
                    size = this.size_of_galery,
                    index = this.img_index+1,
                    index_atual = index

                if(index+size >= total_images){
                    index_atual = total_images - size
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

.image-gallery{
    width: 100%;
    height: 450px;
    background-color: #152445;
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
  background-color: #152445;
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

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
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

    @media screen and (max-width: 980px) {

        .image-gallery {
            height: 280px;
        }

        .column{
            width: 25%;
        }
    }

</style>
