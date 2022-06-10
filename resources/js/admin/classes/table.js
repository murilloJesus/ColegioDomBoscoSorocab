import * as Output from './../output/index.js'
import { markRaw } from 'vue'

class Table {
    constructor(fields){
        this.columns = this.getColumns(fields)
        this.no_order = this.getNoOrder(fields)
    }

    getColumns(fields) {
        let columns = []

        Object.entries(fields).forEach((el) => {
            columns.push({
                field: el[0],
                name: el[1].name,
                style: el[1].style ? el[1].style : {},
                component: markRaw(this.prepare(el[1].component))
            })
        })

        return columns
    }

    getNoOrder(fields){
        let i = 0, no_order = []
        Object.entries(fields).forEach((el) => {
            if(el[1].no_order){
                no_order.push(i)
            }
            i++
        })
        no_order.push(i)

        return no_order
    }

    prepare(component){
        switch (component) {
            case 'text':
                return Output.Text
                break;

            case 'croped-text':
                return Output.CropedText
                break;

            case 'image':
                return Output.Image
                break;

            default:
                return Output.Text
                break;
        }
    }
}

export default Table
