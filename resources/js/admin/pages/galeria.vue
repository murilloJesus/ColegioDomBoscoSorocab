<template>
    <formulario :controller="controller">
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
            controller: new Galeria()
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
