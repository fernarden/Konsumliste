<template>
    <b-card no-body class="mb-1">
      <b-card-header header-tag="header" class="p-1" role="tab">
        <b-button block v-b-toggle="'accordion-' + gericht.id" variant="info">{{gericht.name}}</b-button>
      </b-card-header>
      <b-collapse :id="'accordion-' + gericht.id" accordion="my-accordion" role="tabpanel">
        <b-card-body>
            <b-card-text><h5>Zutaten:</h5></b-card-text>
          <b-card-text>
              <ul v-bind:key="zutat.id" v-for="zutat in zutaten">
                <li>
                    {{ zutat.zutat }}
                </li>
              </ul>

          </b-card-text>
                  <div class="col inputBox">
            <div class="input-group">
                <input v-model="addzutat" id="addInput" type="text" class="form-control input-lg eingabe" placeholder="Zutat hinzufügen">
      <span class="input-group-btn">
        <button type="button" id="addBtn" class="btn btn-success btn-lg eingabeknopp" @click="adden()">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 16" width="12" height="16"><path fill-rule="evenodd" d="M12 9H7v5H5V9H0V7h5V2h2v5h5v2z"></path></svg></span>
        </button>
      </span>
            </div>
            <!-- /input-group -->
        </div>
            <button type="button" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                        In Liste eintragen
                    </span>
                </button>
        </b-card-body>
      </b-collapse>
    </b-card>
</template>


<script>
import axios from 'axios'

export default {
    name: "Gericht",
    props: ["gericht"],
    methods: {
        adden() {
            const formdata = new FormData();
            formdata.append('zutat', this.addzutat);
            formdata.append('rezept_id', this.gericht.id);
            formdata.append('action', "add");
            axios.post('gerichte.php', formdata)
            .then(res => console.log(res))
            .catch(err => console.log(err));
            this.ware = '';
        }  
    },
    data() {
    return {
      zutaten: []
    }
    },
            created(){
            const gericht = this.gericht;
            const formdata = new FormData();
            formdata.append('id', gericht.id);
            formdata.append('action', "getZutaten");
            axios.post('gerichte.php', formdata)
            .then(res => this.zutaten = res.data)
            .catch(err => console.log(err));
            console.log("asdasdasd");
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