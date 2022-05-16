<template>
  <input type="text" class="form-control" name="name" readonly :value="fieldset[field]" placeholder="Nova página">
</template>

<script>
import axios from 'axios'
import { normalize_url } from './../../composables/helper.js'

export default {
    props: {
        fieldset: Object,
        field: {
            type: String,
            default: 'alias'
        },
        name: String,
        page_id: {
            type: [Number, null],
            default: null
        },
        page_name: {
            type: [String, null],
            default: null
        }
    },
    data: (props) => {
        return {
            path: props.page_name ? props.page_name : ''
        }
    },
    watch: {
        name: function() {
            this.setField()
        },
        page_id: async function () {
            await this.getPath(this.page_id)
            this.setField()
        },
    },
    methods: {
        async getPath(id){
           this.path = id ? (await axios.get(`/api/pages/${id}`)).data[this.field] : ''
        },
        setField(){
            this.fieldset[this.field] = `${this.path}/${normalize_url(this.name)}`
        }
    }
}
</script>
