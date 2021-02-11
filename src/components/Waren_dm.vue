<template>
    <div>
        <div v-bind:key="ware.id" v-for="ware in waren">
            <Ware_dm v-bind:ware="ware" />
        </div>
        <div class="bottomspacer"></div>
    </div>   
</template>

<script>
import Ware_dm from './Ware_dm'
export default {
    name: "Waren_dm",
    components: {
        Ware_dm
    },
    props: ["waren"]
}
</script>

<style scoped>
.bottomspacer {
    height: 70px;
}
</style>