<template>
    <div class="chosen-select-act fm-cmp-mg">
        <select ref="select" class="chosen" data-placeholder="Escolha..." v-model="fieldset[field]">
            <option v-if="hasAdd" value="___ADD___"><b>Adicionar</b></option>
            <option v-else value="">Selecione...</option>
            <option v-for="(item, index) in filteredList" :value="item[insertField]" :key="index">{{item.name}}</option>
        </select>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data(){
        return {
            lista: [],
            value: ''
        }
    },
    props: {
        fieldset: Object,
        list: {
            type: [Array, Boolean],
            default: false,
        },
        resource: {
            type: [String, Boolean],
            default: false,
        },
        field: {
            type: String,
            default: "content"
        },
        type: {
            type: String,
            default: 'number'
        },
        hasAdd: Boolean,
        controller: {
            type: Object,
            default: {}
        },
        insertField: {
            type: String,
            default: 'id'
        }
    },
    async mounted(){
        if(this.list){
            this.lista = this.list
        }else if(this.resource){
            this.lista = (await axios.get(this.resource)).data
        }
        window.$(this.$refs.select).on('change', () => {
            if(this.type == 'number'){
                this.value =  this.fieldset[this.field] =  parseInt($(this.$refs.select).val())
            } else if(this.type == 'string'){
                this.value = this.fieldset[this.field] =  $(this.$refs.select).val()
            }
        })
    },
    watch:{
        value: function(newV){
            if(newV == '___ADD___'){
                this.controller.add()
                this.value = this.fieldset[this.field] = ''
            }
        }
    },
    updated(){
        if(this.list){
            this.lista = this.list
        }

        window.$(this.$refs.select).trigger("chosen:updated");
    },
    computed: {
        filteredList(){
            return this.resource ? this.lista.filter(el => el.id != this.fieldset.id) : this.lista
        }
    }
}
</script>

<style>

</style>
