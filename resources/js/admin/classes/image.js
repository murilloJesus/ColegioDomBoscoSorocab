import Api from './api.js'
import Table from './table.js'

class Image extends Api {
    constructor() {
        super()
        this.resources =  '/images'
        this.file = false
    }

    getObject(instance = {}){
        return {
            id: instance.id ? instance.id : false,
            name: instance.name ? instance.name : '',
            source: instance.source ? `${this.file_path}/${instance.source}` : '',
            alt: instance.alt ? instance.alt : '',
            description: instance.description ? instance.description : '',
            created: instance.created_at ? instance.created_at : '',
            updated: instance.updated_at ? instance.updated_at : ''
        }
    }

    getTable(){
        return new Table({
            source: {
                name: '#',
                component: 'image_source',
                no_order: true,
                style: {
                    width: `80px`
                }
            },
            name: {
                name: 'Nome',
                component: 'text'
            },
            description: {
                name: 'Descrição',
                component: 'text'
            }
        })
    }

    getFieldset(){

        let data = super.getFieldset()

        if(this.file){
            data.append("file", this.file)
        }

        return data
    }

}

export default Image
