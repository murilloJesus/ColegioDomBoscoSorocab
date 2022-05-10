import axios from "axios"
import { reactive } from "vue"
import Table from './table.js'

class Api {
    constructor(){
        this.route = '/api'
        this.resources = '/'
        this.file_path = '/public'
        this.fieldset = this.getObject()
        this.instance = this.getObject()
        this.dataTable = this.getTable()
        this.lastInstanceData = this.getObject()
        this.data = []
    }


    //CONFIGS
    getList(list = []){
        return list.map((el) => {
          return this.getObject(el)
        })
    }

    getObject(instance){
        return {
            id: instance.id ? instance.id : null,
            name: instance.name ? instance.name : '',
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
            }
        })
    }

    getFieldset(remove = ['created', 'updated']) {
        let data = Object.assign(this.fieldset)

        remove.forEach((el) => {
          delete data[el]
        })

        return data
    }

    // PATH's
    index(){
        return {
            method: 'get',
            url: `${this.route}${this.resources}`
        }
    }

    show(id){
        return {
            method: 'get',
            url: `${this.route}${this.resources}/${id}`
        }
    }

    store(){
        return {
            method: 'post',
            url: `${this.route}${this.resources}`,
            data: this.getFieldset()
        }
    }

    update(id){
        return {
            method: 'put',
            url: `${this.route}${this.resources}/${id}?_metod=PUT`,
            data: this.getFieldset()
        }
    }

    destroy(id){
        return {
            method: 'delete',
            url: `${this.route}${this.resources}/${id}`
        }
    }

    //ACTION's
    async getData(){
        let res = await axios(this.index())
        return this.data = this.getList(res.data)
    }

    async getInstance(id){
        let res = await axios(this.show(id))

        this.lastInstanceData = res.data
        this.fieldset = reactive(this.getObject(Object.assign(res.data)))
        this.instance = reactive(this.getObject(Object.assign(res.data)))
    }

    async saveData(id = this.fieldset.id){
        let res = false
        if(id){
            res = await axios(this.update(id))
        }else{
            res = await axios(this.store())
        }

        if(res) {
            this.finishData()
        }

        return res
    }

    resetData(){
        this.fieldset = reactive(this.getObject(Object.assign(this.lastInstanceData)))
    }

    finishData(){
        this.fieldset = reactive(this.getObject())
    }


    async sendDestroy(id){
        let res = await axios(this.destroy(id))
        if(res.data) return true
        else return false
    }
}

export default Api
