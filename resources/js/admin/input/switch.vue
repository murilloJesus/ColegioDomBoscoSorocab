
<template>
    <div class="toggle-select-act fm-cmp-mg">
        <div class="nk-toggle-switch">
            <input :id="`switch-${uuid}`" type="checkbox"  ref="switch" hidden="hidden">
            <label :for="`switch-${uuid}`" class="ts-helper"></label>
        </div>
    </div>
</template>

<script>

import { v4 as uuid } from 'uuid';

export default {
    data(){
        return {
            uuid: uuid()
        }
    },
    props: {
        fieldset: Object,
        field: {
            type: String,
            default: "status"
        },
        entries: {
            type: Array,
            default: [1, 0]
        }
    },
    async mounted(){
        if(this.fieldset[this.field] === this.entries[0]){
            $(this.$refs.switch).click()
        }

        window.$(this.$refs.switch).on('change', () => {
            this.fieldset[this.field] =  $(this.$refs.switch).is(":checked") ? this.entries[0] : this.entries[1]
        })
    },
    updated(){
        if(this.fieldset[this.field] === this.entries[0] && ( (this.fieldset[this.field] === this.entries[0]) != $(this.$refs.switch).is(":checked") ) ){
            $(this.$refs.switch).click()
        }
    },
}
</script>

<style>

</style>
