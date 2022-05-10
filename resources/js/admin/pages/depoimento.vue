<template>
    <tabela v-show="component == 'tabela'" :controller="controller"></tabela>
    <formulario :controller="controller" v-show="component == 'formulario'">
        <div class="form-element-list">
            <div class="basic-tb-hd">
                <h2>{{fieldset.id ? 'Editar Depoimento' : 'Novo Depoimento'}}</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" v-model="fieldset.name" placeholder="Novo Titulo">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="nk-int-mk sl-dp-mn">
                        <h2>Status</h2>
                    </div>
                    <switcher :fieldset="fieldset" field="status" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cmp-tb-hd ">
                        <h2>Conteúdo</h2>
                    </div>
                    <editor path_to="depoimentos" :fieldset="fieldset" :value="fieldset.testimonial"
                        field="testimonial"></editor>
                </div>
            </div>
            <div class="row" style="margin: auto;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <uploader :fieldset="fieldset" header="Foto (800x800)" />
                </div>
            </div>
        </div>
    </formulario>
</template>

<script>
    import Depoimento from './../classes/depoimento.js'
    import Base from './base'

    export default {
        extends: Base,
        data: () => {
            return {
                controller: new Depoimento()
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
