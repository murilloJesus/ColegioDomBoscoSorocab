import Api from './api.js'

class Categorias extends Api {
    constructor() {
        super()
        this.resources =  '/categories'
    }

    getObject(instance = {}){
        return {
            id: instance.id ? instance.id : false,
            for: instance.for ? instance.for : '',
            name: instance.name ? instance.name : '',
            created: instance.created_at ? instance.created_at : '',
            updated: instance.updated_at ? instance.updated_at : ''
        }
    }
}

export default Categorias
