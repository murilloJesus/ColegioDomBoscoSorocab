<template>
    <tabela v-show="component == 'tabela'" :controller="controller"></tabela>
    <formulario :controller="controller" v-show="component == 'formulario'">
        <div class="form-element-list">
            <div class="basic-tb-hd">
                <h2>{{ fieldset.name ? fieldset.name : 'Nova Pagina'}}</h2>
                <p><a :href="fieldset.alias" target="_blank">{{url}}</a></p>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" name="name" v-model="fieldset.name"
                                placeholder="Nova página">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="nk-int-mk sl-dp-mn">
                        <h2>Pai</h2>
                    </div>
                    <selector :fieldset="fieldset" field="page_id" resource="/api/pages"></selector>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group ">
                        <div class="nk-int-st">
                            <label for="name">Link</label>
                            <alias :fieldset="fieldset" :name="fieldset.name" :page_id="fieldset.page_id"></alias>
                        </div>
                    </div>
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
import Pagina from './../classes/pagina.js'
import Base from './base'

export default {
    props: ['component'],
    extends: Base,
    data: () => {
        return {
            controller: new Pagina()
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
