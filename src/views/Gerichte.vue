<template>
<div class="container-fluid">
  <GerichteListe v-bind:gerichte="gerichte" />
</div>
</template>

<script>
// @ is an alias to /src
import GerichteListe from '../components/GerichteListe'
import axios from 'axios'
export default {
  name: 'Gerichte',
  components: {
    GerichteListe,
  },
  data() {
    return {
      gerichte: []
    }
  },
  created() {
    axios.get('gerichte.php')
    .then(res => this.gerichte = res.data)
    .catch(err => console.log(err));
    console.log(this.gerichte);
  },
  methods: {
    update(item) {
      this.gerichte.unshift(item.data);
    }
  }
}

</script>