import Api from './api.js'
import Table from './table.js'

class Pagina extends Api {
    constructor() {
        super()
        this.resources =  '/pages'
        this.dataTable = this.getTable()
    }

    getObject(instance = {}){
        return {
            id: instance.id ? instance.id : false,
            name: instance.name ? instance.name : '',
            alias: instance.alias ? instance.alias : '/',
            page_id: instance.page_id ? parseInt(instance.page_id) : 0,
            content: instance.content ? instance.content : '',
            times_accessed: instance.times_accessed ? instance.times_accessed : 0,
            created: instance.created_at ? instance.created_at : '',
            updated: instance.updated_at ? instance.updated_at : ''
        }
    }

    getTable(){
        return new Table({
            id: {
                name: '#',
                component: 'text'
            },
            name: {
                name: 'Nome',
                component: 'text'
            },
            alias: {
                name: 'Caminho',
                component: 'text'
            }
        })
    }
}

export default Pagina
