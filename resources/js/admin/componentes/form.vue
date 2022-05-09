<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-actions button-icon-btn button-icon-btn-cl sm-res-mg-t-30">
                    <button
                        @click="reset"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Resetar"
                        class="btn btn-gray gray-icon-notika btn-reco-mg btn-button-mg waves-effect"
                    ><i class="notika-icon notika-close"></i></button>
                    <button
                        v-show="hasUnsavedData"
                        @click="save"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Salvar"
                        class="btn btn-gray gray-icon-notika btn-reco-mg btn-button-mg waves-effect"
                    ><i class="notika-icon notika-up-arrow"></i></button>
                    <button
                        v-show="!(hasUnsavedData)"
                        @click="finish"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Finalizar"
                        class="btn btn-success notika-btn-success waves-effect"
                    ><i class="notika-icon notika-checked"></i></button>
                </div>
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['controller'],
        inject: ['save', 'reset', 'finish'],
        mounted(){
            window.$('[data-toggle="tooltip"]').tooltip();
            window.autosize(window.$(".auto-size"));
        },
        computed: {
            hasUnsavedData(){
                return !(_.isEqual(this.controller.fieldset, this.controller.instance))
            }
        },
    }

</script>

<style>
    .form-actions {
        position: absolute;
        top: 10px;
        right: 30px;
    }

    button {
        margin-right: 10px;
    }
</style>
