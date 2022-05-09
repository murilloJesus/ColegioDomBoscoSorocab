import { createApp } from 'vue'
import Banner from './componentes/Banner.vue';
import Depoimentos from './componentes/Depoimentos.vue';
import Conteudo from './componentes/Conteudo.vue';
import Colegio from './componentes/Colegio.vue';
import Estrutura from './componentes/Estrutura.vue';
import Galeria from './componentes/Galeria.vue';

const app = createApp({
    components: {
        Banner,
        Depoimentos,
        Colegio,
        Conteudo,
        Galeria,
        Estrutura
    },
    mounted(){
        util()
        main()
    }
}).mount('#app');

require('./bootstrap');
