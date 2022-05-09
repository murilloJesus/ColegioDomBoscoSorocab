import Api from './api.js'
import Table from './table.js'

class Depoimento extends Api {
    constructor() {
        super()
        this.resources =  '/depoimentos'
    }

    getObject(instance = {}){
        return {
            id: instance.id ? instance.id : false,
            status: instance.status ? instance.status : 1,
            name: instance.name ? instance.name : '',
            image: instance.image ? instance.image : '',
            testimonial: instance.testimonial ? instance.testimonial : '',
            created: instance.created_at ? instance.created_at : '',
            updated: instance.updated_at ? instance.updated_at : ''
        }
    }

    getTable(){
        return new Table({
            name: {
                name: 'Nome',
                component: 'text'
            },
            image: {
                name: 'Imagem',
                component: 'imagem'
            }
        })
    }
}

export default Depoimento
