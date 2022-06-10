<template>
    <tabela v-show="component == 'tabela'" :controller="controller" ></tabela>
    <visualizacao v-show="component == 'ver'">
        <div class="row">
            <div class="col12">
                <h3>
                    {{fieldset.reason}}
                </h3>
            </div>
            <div class="col-12">
                <h4>
                    Nome
                </h4>
                <p>{{fieldset.name}}</p>
            </div>
            <div class="col-12">
                <h4>
                    Email
                </h4>
                <p>{{fieldset.email}}</p>
            </div>
            <div class="col-12">
                <h4>
                    Telefone
                </h4>
                <p>{{fieldset.phone}}</p>
            </div>
            <div class="col-12">
                <h4>
                    Mensagem
                </h4>
                <p class="mensagem">{{fieldset.message}}</p>
            </div>
        </div>
    </visualizacao>
</template>

<script>
import Mensagem from './../classes/mensagem.js'
import Base from './base'

export default {
    extends: Base,
    data: () => {
        return {
            controller: new Mensagem(),
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

<style>
    p {
        margin-left: 2em;
    }

    p.mensagem{
        font-size: 20px;
    }
</style>
