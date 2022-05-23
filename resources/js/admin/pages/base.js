import Tabela from '../componentes/table.vue'
import Formulario from '../componentes/form.vue'
import Galeria from '../componentes/gallery.vue'
import * as Inputs from '../input/index.js'

import $ from 'jquery'

export default {
    props: {
        component: {
            type: String,
            default: 'tabela'
        }
    },
    components: {
        Tabela,
        Formulario,
        Galeria,
        ...Inputs
    },
    async beforeMount(){
        await this.controller.getData()
        $("#app").show()
    },
    provide(){
        return {
            save: async  (reset = true) => {
                let res = await this.controller.saveData()
                if( res ){
                    notificar("success", "Salvo com Sucesso!")
                    if(reset){
                        this.controller.getData()
                        window.app.component = 'tabela'
                    }
                    return res.data
                } else {
                    swal("Erro!", "Nao foi possivel concluir a solicitação.", "error")
                }
            },
            edit: (id) => {
              this.controller.getInstance(id)
              window.app.component = 'formulario'
            },
            destroy: (id) => {
                let t = this
                    swal({
                        title: "Tem certeza?",
                        text: "Você está prestes a remover um item!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sim, remova!",
                        cancelButtonText: "Não, cancele.",
                    }).then(async function(isConfirm){
                        if (isConfirm) {
                            let res = await t.controller.sendDestroy(id)
                            if(res){
                                swal("Removido!", null, "success")
                                t.controller.getData()
                            }else{
                                swal("Erro!", "Nao foi possivel concluir a solicitação.", "error")
                            }

                        }
                    });
            },
            reset: () => {
              this.controller.resetData()
            },
            finish: () => {
                this.controller.finishData()
            }
        }
    }
}
