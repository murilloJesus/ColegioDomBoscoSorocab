<template>
    <img
        v-show="fieldset.source"
        :src="fieldset.source"
        @click="$refs.file.click()"
        data-toggle="tooltip" data-placement="top" title="" data-original-title="Clique para alterar."
        >
    <input type="file" v-show="!fieldset.source" ref="file">

</template>

<script>
export default {
    props: ['fieldset', 'set_file'],
    mounted(){
        var t = this
        window.$(this.$refs.file).on("change", () => {
            let file = t.$refs.file.files[0]
            t.set_file(file)
            t.fieldset.source = URL.createObjectURL(file)
        })
    }
}
</script>

<style scoped>
    img {
        cursor: pointer;
    }
</style>
