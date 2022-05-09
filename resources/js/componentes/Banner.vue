<template>
    <div id="Carousel"  class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div id="banner" class="carousel-item active" v-for="(item, index) in banners" :key="index">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "Banner",
        data: () => {
            return {
                banners : []
            }
        },
        async beforeCreate(){
            await axios.get("/data/banners.json")
                    .then(({data}) => {
                        this.banners = data
                    })
        },
        mounted(){
            $("#Carousel").height($(document).width()/2.289)
            $("#Carousel").carousel()
        }
    }

</script>

<style>

</style>
