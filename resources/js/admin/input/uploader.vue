<template>
        <div class="dropdone-nk mg-t-30">
            <div class="multi-uploader-cs">
                <form  v-show="!fieldset[field]" :action="`/api/${pathTo}/upload`" class="dropzone dropzone-nk needsclick" id="upload">
                    <div class="mg-0 dz-message needsclick download-custom">
                        <slot name="header"></slot>
                        <i class="notika-icon notika-cloud"></i>
                        <h2>Solte o(s) arquivo(s) aqui ou clique para fazer upload.</h2>
                    </div>
                </form>
                <div class="img-uploaded" v-show="fieldset[field]" @click="alterar">
                    <img  :src="`/public/${fieldset[field]}`" :style="imgStyle" >
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
        pathTo: String,
        imgStyle:{
            type: Object,
            default: {}
        }
    },
    beforeCreate(){
        let t = this

        Dropzone.options.upload = {
            acceptedFiles: 'image/*',
            success: function(file, response){
                t.fieldset[t.field] = response
                this.removeAllFiles(true)
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
