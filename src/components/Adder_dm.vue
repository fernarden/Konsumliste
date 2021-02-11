<template>
    <div class="row inputBoxRow">
        <div class="col inputBox">
            <div class="input-group">
                <input v-model="ware" id="addInput" type="text" class="form-control input-lg eingabe" placeholder="Ich will mehr..." autocomplete="off">
      <span class="input-group-btn">
        <button type="button" id="addBtn" class="btn btn-success btn-lg eingabeknopp" @click="adden()">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 16" width="12" height="16"><path fill-rule="evenodd" d="M12 9H7v5H5V9H0V7h5V2h2v5h5v2z"></path></svg></span>
        </button>
      </span>
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "Adder",
    data() {
        return {
            ware: ''
        }
    },
    methods: {
        adden() {
            const ware = this.ware;
            const formdata = new FormData();
            formdata.append('item', ware);
            formdata.append('action', "add");
            axios.post('data_dm.php', formdata)
            .then(res => this.$emit('adden', res))
            .catch(err => console.log(err));
            this.ware = '';
  }  
    }
}
</script>

<style  scoped>
.inputBoxRow {
    padding-bottom: 0px;
    position: fixed;
    bottom: 0px;
    left: 0;
    right: 0px;
}

.eingabe {
    height: 60px;
    border: 2px solid rgba(155, 253, 146, 0.863);
}

.eingabeknopp {
    height: 60px;
    width: 60px;
}
</style>