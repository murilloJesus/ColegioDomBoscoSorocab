<template>
    <tabela v-show="component == 'tabela'" :controller="controller"></tabela>
    <formulario :controller="controller" v-show="component == 'formulario'">
        <div class="form-element-list">
            <div class="basic-tb-hd">
                <h2>{{fieldset.id ? 'Editar Imagem' : 'Nova Imagem'}}</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" v-model="fieldset.name"
                                placeholder="Novo Titulo">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Caminho</label>
                            <text :data="fieldset.source"></text>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Texto Alternativo</label>
                            <input type="text" class="form-control" v-model="fieldset.alt">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Descrição</label>
                            <textarea class="form-control auto-size" rows="2" v-model="fieldset.description" placeholder="Inserir a descrição"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <imagem :set_file="setFile" :fieldset="fieldset"></imagem>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </formulario>
</template>

<script>
import Image from './../classes/image.js'
import Base from './base'

export default {
    props: ['component'],
    extends: Base,
    data: () => {
        return {
            controller: new Image()
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
        }
    },
    methods: {
        setFile(file){
            this.controller.file = file
        }
    }
}
</script>

<style>

</style>
