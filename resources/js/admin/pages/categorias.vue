<template>
    <selector :fieldset="fieldset" :field="field" :list="list" :controller="this" :has-add="true" type="string"  :insert-field="insertField" />
    <modal ref="modal" header="Nova Categoria">
        <template v-slot:header>
            <h2>
                Nova Categoria
            </h2>
        </template>
        <template v-slot:body>
            <formulario ref="formulario" :forModal="true" :controller="controller">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group ">
                            <div class="nk-int-st">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" v-model="myfieldset.name"
                                    placeholder="Novo Titulo">
                            </div>
                        </div>
                    </div>
                </div>
            </formulario>
        </template>
        <template v-slot:footer>
            <button type="button" class="btn btn-default" @click="save">Salvar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </template>
    </modal>
</template>

<script>
    import Base from './base'
    import Categorias from '../classes/categorias.js'
    import Modal from '../componentes/modal.vue'

    export default {
        extends: Base,
        components: {
            Modal
        },
        props: {
            for: String,
            fieldset: Object,
            field: String
        },
        data: (props) => {
            return {
                controller: new Categorias(props.for),
                insertField: 'name'
            }
        },
        computed: {
            myfieldset: {
                get() {
                    return this.controller.fieldset
                },
                set(value) {
                    this.controller.fieldset = value
                }
            },
            list() {
                return this.controller.data
            }
        },
        methods: {
            add() {
                this.$refs.modal.open()
            },
            async save(){
                let isSaved = await this.$refs.formulario.save(false)

                if(isSaved){
                    this.fieldset[this.field] = isSaved[this.insertField]
                    this.controller.getData()
                    this.$refs.modal.close()
                }
            }
        }

    }

</script>

<style>

</style>
