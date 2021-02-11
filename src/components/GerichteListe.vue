<template>
<div role="tablist" >
    <div v-bind:key="gericht.id" v-for="gericht in gerichte">
            <Gericht v-bind:gericht="gericht" />
            
    </div>
    <div class="bottomspacer"></div>
  </div>
</template>

<script>
import Gericht from './Gericht'
export default {
    name: "GerichteListe",
    components: {
        Gericht
    },
    props: ["gerichte"]
}
</script>

<style scoped>
.bottomspacer {
    height: 70px;
}
</style>