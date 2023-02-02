import axios from 'axios'
import Api from './api.js'
import Table from './table.js'

class Galeria extends Api {
    constructor() {
        super()
        this.resources =  '/galeria'
    }

    getList(list = []){
        return list.map((el, index) => {
          return this.getObject({
              id: index,
              ...el
            })[0]
        })
    }

    store(){
        return {
            method: 'post',
            url: `${this.route}${this.resources}/sort`,
            data: this.getFieldset()
        }
    }

    getFieldset() {
        let data = Object.assign(this.fieldset),
            retorno = {}

        data.forEach((el) => {
          retorno[el.name] = el.indice
        })

        return retorno
    }

    async getData(){
        let res = await axios(this.index())
        return this.fieldset = this.getList(res.data)
    }

    getObject(instance = {}){
        return [{
            id: instance.id,
            path: instance.path ? instance.path : '',
            name: instance.name ? instance.name : '',
            image: instance.image ? instance.image : '',
            indice: instance.indice ? instance.indice : 999
        }]
    }

    getTable(){
        return new Table({
            id: {
                name: '#',
                component: 'text'
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

export default Galeria
