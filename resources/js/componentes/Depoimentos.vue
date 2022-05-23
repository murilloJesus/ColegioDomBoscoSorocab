<template>
    <section class="box highlight">
        <h2>Depoimentos</h2>

        <ul class="special">
            <li
                v-for="(item, key) in depoimentos"
                :key="key"
                :class="item.name === actived.name ? 'actived' : ''">
                <a
                    href="javascript: void(0);"
                    :style="`background-image: url(/${item.image}); ${item.style ? item.style : ''}`"
                    @click="change(key)"></a>
            </li>
        </ul>
        <header>
            <p>
                {{actived.name}}
            </p>
        </header>
        <div v-html="actived.testimonial">

        </div>
    </section>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "Depoimentos",
        data: () => {
          return {
              index: 0,
              depoimentos: [],
              interval : {
                each: 8000,
                func: null
              }
          }
        },
        async beforeCreate(){
            await axios.get('/public/data/testimonials.json')
                .then(({data}) => {
                    this.depoimentos = data
                });
        },
        mounted() {
            this.setInterval()
        },
        watch: {
            index: function (newV) {
                if(newV > this.depoimentos.length - 1) this.index = 0
            }
        },
        computed: {
            actived() {
                return this.depoimentos.length > 0 ? this.depoimentos[this.index] : {}
            }
        },
        methods:{
            change(index){
                this.index = index
                this.setInterval()
            },
            setInterval(){

                if(this.interval.func){
                    clearInterval(this.interval.func)
                }

                this.interval.func = setInterval(() => {
                    this.index++
                }, this.interval.each);
            }
        }
    }

</script>

<style scoped>

    .special {
        margin-top: 2em;
    }

    a {
        width: 135px;
        height: 135px;
        border-radius: 100%;
        background-position: center;
        background-size: cover;
        opacity: 0.4;
    }

    .actived {
        top: -1em;
    }

    .actived > a {
        opacity: 1 !important;
    }

    .text {
        font-size: 1.3em;
        height: 30px;
    }

    @media screen and (max-width: 736px) {
        a {
            width: 74px;
            height: 74px;
        }
        .text {
            font-size: 1.1em;
        }
    }
</style>
