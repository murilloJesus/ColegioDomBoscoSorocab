import { createApp } from 'vue'

var _ = require("lodash")

import * as Pages from './admin/pages'

window.app = createApp({
    components: {
        ...Pages
    },
    ...window.controller,
}).mount('#app')

const controller = createApp({
    data: () => {
        return {
            app: window.app
        }
    },
    mounted(){
        main();
    }
}).mount('#controller')

require('./bootstrap');
