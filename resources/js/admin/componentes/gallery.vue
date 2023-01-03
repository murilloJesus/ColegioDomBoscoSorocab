<template>
    <div class="container">
        <div class="row">
            <template v-for="(item, index) in galeries" :key="item.image.path">
                <div v-if="item.image" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="blog-inner-list notika-shadow mg-t-30">
                        <div class="blog-img img-hover-zoom img-hover-zoom--blur">
                            <img :src="`/public/${item.image.path}`" alt="">
                        </div>
                        <div class="blog-ctn">
                            <div class="blog-hd-sw">
                                <i class="bg-au blog-date" href="#">{{item.image.modified}}</i>
                                <h2>{{ item.name }}</h2>
                            </div>
                            <div class="gallery-actions breadcomb-report">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="Indice"
                                            :value="item.indice"
                                            @blur="event => item.indice = event.target.value">
                                        </div>
                                    </div>
                                </div>
                                <a :href="`${download_link}/${item.id}/edit`" target="_blank" data-toggle="tooltip"
                                    data-placement="top" class="btn waves-effect" data-original-title="Download"><i
                                        class="notika-icon notika-sent"></i></a>
                                <button @click="destroy(item.id)" data-toggle="tooltip" data-placement="top"
                                    class="btn btn-danger danger-icon-notika waves-effect"
                                    data-original-title="Excluir"><i class="notika-icon notika-close"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    import Galeria from '../classes/galeria'

    export default {
        props: {
            controller: {
                type: Galeria
            }
        },
        computed: {
            download_link() {
                return `${this.controller.route}${this.controller.resources}`
            }
        },
        methods: {
            destroy(id) {
                let t = this
                    swal({
                        title: "Tem certeza?",
                        text: "Você está prestes a remover um item!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sim, remova.",
                        cancelButtonText: "Não, cancele!",
                    }).then(async function(isConfirm){
                        if (isConfirm) {
                            let res = await t.controller.sendDestroy(id)
                            if(res){
                                swal("Removido!", null, "success")
                                t.controller.getData()
                            }else{
                                swal("Erro!", "Nao foi possivel concluir a solicitação.", "error")
                            }

                        }
                    });


            }
        },
        computed: {
            galeries : {
                get() {
                    return this.controller.fieldset.sort((val1, val2) => val1.indice > val2.indice)
                },
                set(newV) {
                    this.controller.fieldset = newV
                }
            }
        }
    }

</script>

<style>
    .form-actions{
        z-index: 999;
    }
</style>
