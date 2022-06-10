import Api from './api.js'
import Table from './table.js'

class Mensagem extends Api {
    constructor() {
        super()
        this.resources =  '/message'
    }

    getObject(instance = {}){
        return {
            id: instance.id ? instance.id : false,
            status: instance.status ? instance.status : false,
            name: instance.name ? instance.name : '',
            email: instance.email ? instance.email : '',
            phone: instance.phone ? instance.phone : '',
            reason: instance.reason ? instance.reason : '',
            message: instance.message ? instance.message : '',
            created: instance.created_at ? instance.created_at : '',
            updated: instance.updated_at ? instance.updated_at : ''
        }
    }

    getTable(){
        return new Table({
            name: {
                name: "Nome",
                component: "text"
            },
            reason: {
                name: 'Motivo',
                component: 'text'
            },
            message: {
                name: 'Mensagem',
                component: 'croped-text'
            }
        })
    }

    getActions(){
        return ['see']
    }
}

export default Mensagem
