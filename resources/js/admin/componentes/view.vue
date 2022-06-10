<template>
    <div v-if="!forModal" class="container">
        <div class="row">
            <div class="gradle col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <slot></slot>
            </div>
        </div>
    </div>
    <div v-else>
        <slot></slot>
    </div>
</template>

<script>

    export default {
        props: {
            controller: Object,
            forModal: {
                type: Boolean,
                defaut: false
            }
        },
        mounted(){
            window.autosize(window.$(".auto-size"));
        }
    }

</script>

<style scoped>
    .gradle {
        background-color: #fff;
        padding: 15px 30px;
    }
</style>
