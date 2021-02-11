<template>
<div class="container-fluid">
  <Waren v-bind:waren="waren" />
  <Adder @adden="update" />
</div>
</template>

<script>
import Waren from '../components/Waren'
import Adder from '../components/Adder'
import axios from 'axios'
export default {
  name: 'Home',
  components: {
    Waren,
    Adder
  },
  data() {
    return {
      waren: []
    }
  },
  created() {
    axios.get('data.php')
    .then(res => this.waren = res.data)
    .catch(err => console.log(err));
    console.log("data", process.env.VUE_APP_URL);
  },
  methods: {
    update(item) {
      this.waren.unshift(item.data);
    }
  }
}

</script>
