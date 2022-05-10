<template>
        <div class="dropdone-nk mg-t-30">
            <div class="multi-uploader-cs">
                <form  v-show="!fieldset[field]" :action="`/api/${path_to}/upload`" class="dropzone dropzone-nk needsclick" id="upload">
                    <div class="mg-0 dz-message needsclick download-custom">
                        <h2 v-if="header">{{header}}</h2>
                        <i class="notika-icon notika-cloud"></i>
                        <h2>Solte os arquivos aqui ou clique para fazer upload.</h2>
                    </div>
                </form>
                <div class="img-uploaded" v-show="fieldset[field]" @click="alterar">
                    <h3>{{header}}</h3>
                    <img  :src="`/${fieldset[field]}`" >
                    <div></div>
                    <i>Click para alterar</i>
                </div>

            </div>
        </div>
</template>

<script>
export default {
    props: {
        fieldset: Object,
        field: {
            type: String,
            default: "image"
        },
        header: {
            type: String,
            default: 'Imagem'
        },
        path_to: String
    },
    beforeCreate(){
        let t = this

        Dropzone.options.upload = {
            acceptedFiles: 'image/*',
            success: function(file, response){
                t.fieldset[t.field] = response
            },
            accept: function(file, done) {
                done()
            }
        }
    },
    methods: {
        alterar(){
            $("#upload").click()
        }
    }
}
</script>

<style>

</style>
