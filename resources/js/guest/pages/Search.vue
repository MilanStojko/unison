<template>
  <div class="select-categories">
    <label for="category">Scegli uno strumento:</label>
    <select name="categories" id="categories">
        <option v-for="(category, index) in categories" :value="category.name" :key="index">{{category.name}}</option>
    </select>
    <ul v-for="(musician, index) in musicians" :key="index">
      <li>{{ musician.name }}</li>
    </ul>
    <h1>Hai cercato per: <span>{{ ava }}</span></h1>
  </div>
</template>

<script>
import { bus } from "../front";
export default {
  name: "Search",
  data() {
    return {
      categories:[],
      musicians: [],
      ava: "",
    };
  },
  methods: {
    //Tutte le prestazioni
    getAvailability() {
      axios
        .get(`/api/filtered/getAvailability/${this.$route.params.query}`, {
          paramas: {
            query: this.ava,
          },
        })
        .then((response) => {
          this.musicians = response.data.results;
        })
        .catch(function (error) {
          console.log(error.response.data);
        });
    },
  },
  created() {
    // Ricezione dato 
    bus.$on("saveValue", (data) => {
      //Dato ricevuto dall'emit in jumbo
      this.ava = data;
      console.log(this.ava);
    });

    this.getAvailability();
    // CHIAMATA CATEGORY PER SELECT FILTRO 2
    // axios.get('/api/category/index').then((respAll)=>{
    //         this.categories = respAll.data;
    // })


  },
};
</script>

<style>
</style>