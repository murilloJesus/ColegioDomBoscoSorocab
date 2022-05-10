<template>
    <tabela v-show="component == 'tabela'" :controller="controller"></tabela>
    <formulario :controller="controller" v-show="component == 'formulario'">
        <div class="form-element-list">
            <div class="basic-tb-hd">
                <h2>{{fieldset.id ? 'Editar Banner' : 'Novo Banner'}}</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Título</label>
                            <input type="text" class="form-control" v-model="fieldset.header"
                                placeholder="Novo Titulo">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="nk-int-mk sl-dp-mn">
                        <h2>Status</h2>
                    </div>
                    <switcher :fieldset="fieldset" field="status"  />
                </div>
            </div>
            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Link</label>
                            <input type="text" class="form-control" v-model="fieldset.action"
                                placeholder="Novo Titulo">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="nk-int-mk sl-dp-mn">
                        <h2>Redirecionar</h2>
                    </div>
                    <selector :fieldset="fieldset" field="target" type="string" :list="actionList"></selector>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <uploader path_to="banners" :fieldset="fieldset" header="Selecione uma imagem: 1900x830" />
                </div>
            </div>
        </div>
    </formulario>
</template>

<script>
import Banner from './../classes/banner.js'
import Base from './base'

export default {
    extends: Base,
    data: () => {
        return {
            controller: new Banner(),
            actionList: [
                {id: '_blank', name: 'Nova Pagina'},
                {id: '_self', name: 'Mesma Pagina'},
            ]
        }
    },
    beforeCreate(){
            let t = this

            Dropzone.options.upload = {
                acceptedFiles: 'image/*',
                success: function(file, response){
                    t.controller.fieldset.image = response
                },
                accept: function(file, done) {
                    done()
                }
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
