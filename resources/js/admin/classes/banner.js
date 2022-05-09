import Api from './api.js'
import Table from './table.js'

class Banner extends Api {
    constructor() {
        super()
        this.resources =  '/banners'
    }

    getObject(instance = {}){
        return {
            id: instance.id ? instance.id : false,
            status: instance.status ? instance.status : 1,
            header: instance.header ? instance.header : '',
            content: instance.content ? instance.content : '',
            action: instance.action ? instance.action : '',
            target: instance.target ? instance.target : '_self',
            image: instance.image ? instance.image : '',
            created: instance.created_at ? instance.created_at : '',
            updated: instance.updated_at ? instance.updated_at : ''
        }
    }

    getTable(){
        return new Table({
            header: {
                name: "Nome",
                component: "text"
            },
            image: {
                name: 'Imagem',
                component: 'imagem'
            },
            action: {
                name: 'Url',
                component: 'text'
            }
        })
    }
}

export default Banner
