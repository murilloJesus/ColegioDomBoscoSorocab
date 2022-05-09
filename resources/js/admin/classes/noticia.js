import Api from './api.js'
import Table from './table.js'

class Noticia extends Api {
    constructor() {
        super()
        this.resources =  '/noticias'
        this.dataTable = this.getTable()
    }

    getObject(instance = {}){
        return {
            id: instance.id ? instance.id : false,
            status: instance.status ? instance.status : 1,
            title: instance.title ? instance.title : '',
            subtitle: instance.subtitle ? instance.subtitle : '',
            image: instance.image ? instance.image : '',
            content: instance.content ? instance.content : '',
            times_accessed: instance.times_accessed ? instance.times_accessed : 0,
            category: instance.category ? instance.category : 0,
            created: instance.created_at ? instance.created_at : '',
            updated: instance.updated_at ? instance.updated_at : ''
        }
    }

    getTable(){
        return new Table({
            title: {
                name: 'Titulo',
                component: 'text'
            },
            subtitle: {
                name: 'Subtitulo',
                component: 'text'
            },
            image: {
                name: 'Imagem',
                component: 'imagem'
            },
            times_accessed: {
                name: 'Acessos',
                component: 'text'

            }
        })
    }
}

export default Noticia
