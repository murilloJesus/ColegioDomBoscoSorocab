<template>
    <button id="btnModalOpen" ref="open" class="btn btn-info" data-toggle="modal" :data-target="`#modal-${uniqueId}`">Modal Default</button>
    <div class="modal fade" :id="`modal-${uniqueId}`" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button ref="close" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <slot name="header"></slot>
                    <slot name="body"></slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer" ></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {v4 as uuid} from 'uuid';

    export default {
        props: {
            header: String
        },
        data: () => {
          return {
              uniqueId: uuid()
          }
        },
        methods: {
            open(){
                $(this.$refs.open).click()
            },
            close(){
                $(this.$refs.close).click()
            }
        }

    }
</script>

<style>
    #btnModalOpen {
        display: none;
    }
</style>
