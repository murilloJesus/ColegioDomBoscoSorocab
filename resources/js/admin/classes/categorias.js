import Api from './api.js'

class Categorias extends Api {
    constructor(forTable = 'general') {
        super()
        this.forTable = forTable
        this.resources =  '/categories'
        this.fieldset = this.getObject()
        this.instance = this.getObject()
    }

    getObject(instance = {}){
        return {
            id: instance.id ? instance.id : false,
            for: instance.for ? instance.for : this.forTable,
            name: instance.name ? instance.name : '',
            created: instance.created_at ? instance.created_at : '',
            updated: instance.updated_at ? instance.updated_at : ''
        }
    }
}

export default Categorias
