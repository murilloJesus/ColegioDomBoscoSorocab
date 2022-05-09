<template>
    <tr>
        <td v-for="(item, index) in columns" :key="index" :style="item.style ? item.style : {}">
            <component :is="item.component" :data="data[item.field]" ></component>
        </td>
        <td>
            <div class="fm-checkbox text-center">
                <label><input type="checkbox" class="i-checks" /> <i></i></label>&nbsp;
                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar" @click="edit(data.id)"><i class="notika-icon notika-draft"></i></a>&nbsp;
                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir" @click="destroy(data.id)"><i class="notika-icon notika-trash"></i></a>&nbsp;
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: {
        data: Object,
        columns: Object
    },
    inject:['edit', 'destroy']
}
</script>

<style scoped>
    a {
        cursor: pointer
    }
</style>
