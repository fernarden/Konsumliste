<template>
<div class="container-fluid">
  <Waren_dm v-bind:waren="waren" />
  <Adder_dm @adden="update" />
</div>
</template>

<script>
import Waren_dm from '../components/Waren_dm'
import Adder_dm from '../components/Adder_dm'
import axios from 'axios'
export default {
  name: 'dm',
  components: {
    Waren_dm,
    Adder_dm
  },
  data() {
    return {
      waren: []
    }
  },
  created() {
    axios.get('data_dm.php')
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
