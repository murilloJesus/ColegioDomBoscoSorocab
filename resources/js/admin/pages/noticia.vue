<template>
    <tabela v-show="component == 'tabela'" :controller="controller"></tabela>
    <formulario :controller="controller" v-show="component == 'formulario'">
        <div class="form-element-list">
            <div class="basic-tb-hd">
                <h2>{{fieldset.id ? 'Editar Noticia: '+fieldset.title : 'Nova Notícia'}}</h2>
                <p>{{fieldset.id ? 'Vezes acessada: '+fieldset.times_accessed : '' }}</p>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" name="name" v-model="fieldset.title"
                                placeholder="Título">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="nk-int-mk sl-dp-mn">
                        <h2>Status</h2>
                    </div>
                    <switcher :fieldset="fieldset" field="status"  />
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Subtítulo</label>
                            <input type="text" class="form-control" name="name" v-model="fieldset.subtitle"
                                placeholder="Subtítulo">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="nk-int-mk sl-dp-mn">
                        <h2>Categoria</h2>
                    </div>
                    <categorias :fieldset="fieldset" field="categories" for="news" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <uploader path_to="noticias" :fieldset="fieldset" header="Banner da noticia" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cmp-tb-hd ">
                        <h2>Conteudo</h2>
                    </div>
                    <editor :fieldset="fieldset" :value="fieldset.content"></editor>
                </div>
            </div>
        </div>
    </formulario>
</template>

<script>
    import Noticia from './../classes/noticia.js'
    import Base from './base'

    import Categorias from './categorias.vue'

    export default {
        components: {
            Categorias
        },
        extends: Base,
        data: () => {
            return {
                controller: new Noticia()
            }
        },
        computed: {
            fieldset: {
                get() {
                    return this.controller.fieldset
                },
                set(value) {
                    this.controller.fieldset = value
                }
            },
            url() {
                return `${process.env.MIX_APP_DOMAIN}${this.fieldset.alias}`
            }
        }
    }

</script>

<style>

</style>
