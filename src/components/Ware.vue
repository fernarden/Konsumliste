<template>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col warenbox" ref="warenbox" v-bind:class="{'is-gekauft':ware.gekauft==1}">
        <div class="row">
            <div class="col-3">
                    <button type="button" class="delete" :id=ware.id @click="deleteWare(ware.id)">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"><svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </span>
                </button>
            </div>

            <div class="col-6">{{ware.item}}</div>

            <div class="col-3 checky">
                <label class="containerind">
                <input type="checkbox" v-on:change="markGekauft(ware.id)" :checked="ware.gekauft==1" >
                <span class="checkmark"></span>
                </label>
            </div>
        </div>            
    </div>
    <div class="col-sm-3"></div>
</div>
</template>

<script>
import axios from 'axios'

export default {
    name: "Ware",
    props: ["ware"],
    methods: {
        markGekauft(id) {
            this.ware.gekauft = this.ware.gekauft==1 ? 0 : 1
            const formdata = new FormData();
            formdata.append('action', "kaufen");
            formdata.append('id', id);
            formdata.append('gekauft', this.ware.gekauft);
            axios.post('data.php', formdata)
            .then(res => console.log(res))
            .catch(err => console.log(err));
        },
        addWare() {
            const ware = this.ware
            const formdata = new FormData();
            formdata.append('action', "add");
            formdata.append('item', ware);
            axios.post('data.php', formdata)
            .then(res => console.log(res))
            .catch(err => console.log(err));
        },
        deleteWare(id) {
            this.$refs.warenbox.style.display = "none";
            const formdata = new FormData();
            formdata.append('id', id);
            formdata.append('action', "delete");
            axios.post('data.php', formdata)
            .then(res => console.log(res))
            .catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>
.warenbox {
    background: #fffafa;
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 0;
    box-shadow: 0 0 1px #009262;
    font: 20px Georgia, "Times New Roman", Times, serif;
    
}

.is-gekauft {
    text-decoration: line-through;
    background: #f3fff1;
    opacity: 0.3;
}

.wareneintrag {
    padding: 10px;
}

.delete {
    background: rgb(255, 153, 85);
    padding: 15px;
    border: 2px solid #ff4800;
    text-decoration:none;
    border-radius: 30%;
}

.checky {
    float: left;
    padding: 0;
}
.containerind {

  position: relative;
  padding-left: 5px;
  padding-right: 5px;
  margin-left: 0px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.containerind input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 50px;
  width: 50px;
  border: 2px solid #8cad2d;
  border-radius: 30%;
  background-color: #f4f4f4;
}

.containerind input:checked ~ .checkmark {
  background-color: #2aff00;
}

.checkmark:after {
  content: "";
  position: absolute;
  /* display: none; */
  opacity: 0.6;
}

.containerind input:checked ~ .checkmark:after {
  display: block;
  opacity: 1;
}

.containerind .checkmark:after {
  left: 17px;
  top: 5px;
  width: 15px;
  height: 30px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
} 


button::-moz-focus-inner {
  border: 0;
}

input::-moz-focus-inner { 
  border: 0; 
}
</style>