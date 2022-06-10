<template>
    <tr>
        <td v-for="(item, index) in columns" :key="index" :style="item.style ? item.style : {}">
            <component :is="item.component" :data="data[item.field]" ></component>
        </td>
        <td>
            <div class="fm-checkbox text-center">
                <label><input type="checkbox" class="i-checks" /> <i></i></label>&nbsp;
                <a v-if="can('edit')" @click="edit(data.id)"><i class="notika-icon notika-draft"></i></a>&nbsp;
                <a v-if="can('see')"  @click="see(data.id)"><i class="notika-icon notika-search"></i></a>&nbsp;
                <a v-if="can('remove')"  @click="destroy(data.id)"><i class="notika-icon notika-trash"></i></a>&nbsp;
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: {
        data: Object,
        columns: Object,
        actions: {
            type: Array,
            default: ['edit', 'remove']
        }
    },
    inject:['edit', 'see', 'destroy'],
    methods: {
        can(action){
            return this.actions.includes(action)
        }
    }
}
</script>

<style scoped>
    a {
        cursor: pointer
    }
</style>
