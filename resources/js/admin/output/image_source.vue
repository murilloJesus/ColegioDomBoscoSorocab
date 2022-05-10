<template>
<div>
    <a :href="`/${data}`" target="_blank">
        <img :src="`/${data}`">
    </a>
</div>
</template>

<script>
export default {
    props: ["data"],

}
</script>

<style scoped>
    div{
        width: 100%;
        text-align: center;
    }
    img {
        max-width: 200px;
        max-height: 80px;
    }
</style>
