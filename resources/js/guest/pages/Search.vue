<template>
  <div class="select-availabilities">
    <label for="availabilities">Scegli uno strumento:</label>
    <select name="availabilities" id="availabilities">
      <!-- <option v-for="(availability, index) in availabilities" :key="index" value="">{{availability.name}}</option> -->
    </select>
    <!-- <h1>{{$ava}}</h1> -->
    <div v-for="(musician, index) in musicians" :key="index">
      <h1>{{ musician.name }}</h1>
    </div>
    <h1>{{ ava }}</h1>
  </div>
</template>

<script>
import { bus } from "../front";
export default {
  name: "Search",
  data() {
    return {
      musicians: [],
      ava: "",
    };
  },
  methods: {
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
    bus.$on("saveValue", (data) => {
      //Dato ricevuto dall'emit in jumbo
      this.ava = data;
      console.log(this.ava);
    });
    this.getAvailability();
  },
};
</script>

<style>
</style>