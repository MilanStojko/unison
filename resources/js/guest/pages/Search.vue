<template>
  <!-- <div class="select-categories">
    <label for="category">Scegli uno strumento:</label>
    <select name="categories" id="categories">
        <option v-for="(category, index) in categories" :value="category.name" :key="index">{{category.name}}</option>
    </select> -->
    <!-- <h1>{{$ava}}</h1> -->
    <!-- <div v-for="(musician, index) in musicians" :key="index">
      <h1>{{ musician.name }}</h1>
    </div>
    <h1>{{ ava }}</h1>
  </div> -->
  <div class="background">
    <div class="select">
      Cerca:
      <select name="categories" id="categories">
        <option v-for="(category, index) in categories" :value="category.name" :key="index">{{category.name}}</option>
      </select>
    </div>
    <div class="container">
        <div class="container p-4">
            <h1>"Categoria"</h1>
            
            <div class="my_card" v-for="(musician, indice) in musicians" :key="indice">
                    <router-link :to="{ name: 'user-single', params: { slug: musician.slug } }">
                        <div class="top">
                            <div class="info col-lg-5 mb-4">
                                <h3>{{musician.name}} {{musician.surname}}</h3>
                                <img v-if="musician.avatar!=null" :src="`/storage/${musician.avatar}`" alt="">
                                <img v-else src="https://thumbs.dreamstime.com/b/profilo-utente-vettoriale-avatar-predefinito-179376714.jpg" alt="">
                            </div>
                            <div class="request col-lg-7 col-sm-12 mt-4">
                                <div class="events mw-50 col-lg-6 col-sm-6 col-xs-6">
                                    <div>
                                        <h5>Eventi:</h5>
                                        <ul>
                                            <li v-for="(availability, index) in musician.availabilities" :key="index"><strong>{{availability.name}}</strong></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="categories mw-50 col-lg-6 col-sm-6 col-xs-6">
                                    <div>
                                        <h5>Strumenti:</h5>
                                        <ul>
                                            <li v-for="(category, index) in musician.categories" :key="index"><strong>{{category.name}}</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="references">
                                <ul>
                                    <li><i class="fa-solid fa-location-dot"></i> {{musician.address}}</li>
                                    <li id="reviews" style="font-size: 20px">
                                        <p>Recensioni:</p>
                                        <span v-for="nota in 5" :key="'piena'+nota">
                                            <img src="../../../images/music.svg" />
                                        </span>
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </router-link>
            </div>
        </div>
    </div>
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
    // CHIAMATA CATEGORY PER SELECT FILTRO 2
    axios.get('/api/category/index').then((respAll)=>{
            this.categories = respAll.data;
    })
  },
};
</script>

<style scoped>

.select{
  display: flex;
  justify-content: center;
  color: black;
  font-size: 24px;
  font-weight: bold;
}

select{
  margin-left: 10px;
  background:transparent;
  border: 0;
  cursor: pointer;
  max-width: 100px;
  font-size: 18px;
}


.background{
        /* background-image: url("../../../images/pexels-picjumbocom-196652.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover; */
        /* background: #E8EBF8; */
        /* background: #595766ad; */
        padding: 15px 0;
        background: #2a292985;
    }

    .background::-webkit-scrollbar {
        display: none;
    }

    .background {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    h1, .info h3{
        text-align: center;
    }

    .info h3, .request{
        color: white;
        text-transform: capitalize;
    }

    h1{
        font-size: 55px;
    }

    .my_card{
        margin: 50px auto;
        max-width: 60%;
        padding: 10px;
        /* background: rgba(210, 206, 206, 0.861); */
        /* background: #ededed; */
        /* background-image: url('https://i.stack.imgur.com/MkSui.jpg'); */
        background-image: url('https://icbstexas.com/wp-content/uploads/split-color-background.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-radius: 10px;
        /* border: 1px solid black; */
        -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.4);
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.4);
        transition: 1s;
    }

    .my_card:hover{
        cursor: pointer;
        transform: scale(1.03);
    }

    .my_card:hover a{
        text-decoration: none;
    }

    .request{
        display: flex;
        padding: 5px;
        border-radius: 10px;
        background: rgba(28, 28, 28, 0.8);
        max-height: 200px;
    }

    .request ul{
        max-height: 150px;
        overflow: scroll;
    }

    .request ul::-webkit-scrollbar {
        display: none;
    }

    .request ul{
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .categories li, .events li, .references li{
        list-style: none;
        margin-left: 5px;
        font-size: 17px;
    }

    .references ul{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .references li{
        display: inline;
        font-size: 15px;
    }

    .references{
        padding: 0 50px;
        /* margin-top: 20px; */
    }

    .categories li{
        color: rgba(91, 121, 93);
    }

    .events li{
        color: rgba(175, 108, 195);
    }

    .categories div, .events div{
        border-radius: 15px;
        padding: 15px;
    }
    
    .top{
        display: flex;
        flex-wrap: wrap;
        padding: 15px 0;
    }

    /* .container{
        -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 40px;
    }
    */

    .info{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .info img{
        height: 200px;
        width: 200px;
        border-radius: 50%;
    }

    .references img{
        width: 25px;
        height: auto;
        color: #527a5a;
    }

    .references li{
        color: black;
        text-transform: capitalize;
    }

    .references #reviews{
        display: flex;
    }



    @media only screen and (max-width: 700px) {
        .categories, .events{
            padding: 0;
        }

        .categories div, .events div{
            max-width: 80%;
        }

        .my_card{
            max-width: 90%;
        }

        .references{
            padding: 0 30px;
        }
    }


@media only screen and (max-width: 1000px){
    .references p{
        display: none;
    }

    .references #reviews{
        margin-top: 10px;
    }

    .references ul{
        display: flex;
        flex-direction: column;
    }
}
</style>