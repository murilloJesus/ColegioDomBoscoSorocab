<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="table-responsive">
                        <table ref="tabela" class="table table-striped">
                            <thead>
                                <tr>
                                    <th v-for="(item, index) in controller.dataTable.columns" :key="index" :style="item.style">{{item.name}}</th>
                                    <th class="actions">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <row v-for="(item, index) in rows" :key="index" :data="item" :columns="controller.dataTable.columns"></row>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th v-for="(item, index) in controller.dataTable.columns" :key="index" :style="item.style">{{item.name}}</th>
                                    <th class="actions">Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Row from './row.vue'

export default {
    components: {
        Row
    },
    props: {
        controller: {
            type: Object,
            required: true
        }
    },
    data: () => {
        return {
            table: false
        }
    },
    async mounted(){
        await this.controller.getData()
        this.initTable()
    },
    computed: {
        rows(){
            return this.controller.data
        }
    },
    methods: {
        initTable(){
            this.$nextTick(() => {

                this.table = window.$(this.$refs.tabela).DataTable({
                    language: {
                        decimal:        "",
                        emptyTable:     "Nenhum resultado foi encontrado",
                        info:           "Apresentando _START_ de _END_ ( _TOTAL_ totais)",
                        infoEmpty:      "Apresentando 0 de 0.",
                        infoFiltered:   "(filtrados do total de _MAX_)",
                        infoPostFix:    "",
                        thousands:      ",",
                        lengthMenu:     "Mostrar _MENU_ por Página",
                        loadingRecords: "Carregando...",
                        processing:     "Processando...",
                        search:         "Pesquisar:",
                        zeroRecords:    "Nenhum resultado foi encontrado",
                        paginate: {
                            first:      "Primeira",
                            last:       "Última",
                            next:       "Próxima",
                            previous:   "Anterior"
                        },
                        aria: {
                            "sortAscending":  ": ative para organizar pela coluna",
                            "sortDescending": ": ative para organizar pela coluna"
                        }
                    },
                    columnDefs: [
                        { orderable: false, targets: this.controller.dataTable.no_order }
                    ],
                    order: [],
                    initComplete: () => {
                        this.$nextTick(() => {
                            window.$('[data-toggle="tooltip"]').tooltip();

                            window.$('.i-checks').iCheck({
                                    checkboxClass: 'icheckbox_square-green',
                                    radioClass: 'iradio_square-green',
                                });
                        })
                    }
                });
            })
        }
    }
}
</script>

<style scoped>
    .actions {
        width: 130px;
        text-align: center;
    }
</style>
