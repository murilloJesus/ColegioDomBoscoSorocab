<template>
    <formulario :controller="controller" :configs="formConfigs">
        <galeria v-show="component == 'galeria'" :controller="controller"></galeria>
    </formulario>
</template>

<script>
import Galeria from './../classes/galeria.js'
import Base from './base'

export default {
    extends: Base,
    data: () => {
        return {
            controller: new Galeria(),
            formConfigs: {save: false}
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
