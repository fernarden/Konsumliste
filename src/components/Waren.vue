<template>
    <div>
        <div v-bind:key="ware.id" v-for="ware in waren">
            <Ware v-bind:ware="ware" />
        </div>
        <div class="bottomspacer"></div>
    </div>   
</template>

<script>
import Ware from './Ware'
export default {
    name: "Waren",
    components: {
        Ware
    },
    props: ["waren"]
}
</script>

<style scoped>
.bottomspacer {
    height: 70px;
}
</style>