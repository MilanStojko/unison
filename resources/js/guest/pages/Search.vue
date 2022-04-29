<template>
   <!-- </select>
    <h1>{{$ava}}</h1> -->
    <!-- <div v-for="(musician, index) in musicians" :key="index">
      <h1>{{ musician.name }}</h1>
    </div>
    <h1>{{ ava }}</h1>
  </div> -->
    <!-- <div class="select">
      Cerca:
      <select v-model="selectedAvailability" @change="getAvailability" name="categories" id="categories">
        <option  v-for="(category, index) in categories" :value="category.name" :key="index">{{category.name}}</option>
      </select>
    </div> -->
        <div class="container-xl p-md-4">
          <div class="search-filters">
                <div class="change-avaliability">
                    <select
                        name="availabilities"
                        id="availabilities"
                        v-model="valore"
                    >
                        <option value="" disabled selected>Seleziona la prestazione che ti interessa</option>
                        <option
                            v-for="(availability, index) in availabilities"
                            :value="availability.name"
                            :key="index"
                        >
                            {{ availability.name }}
                        </option>
                    </select>
                    <button @click="changeAvailability()">Cerca</button>
                 </div>
                 <div class="filters">
                    <div>
                      <h3>Ordina per:</h3>
                      <button @click="changeOrderReviews()"><i class="fa-solid fa-arrow-up"></i> Recensioni</button>
                    </div>  
                    <div class="d-flex clacFileter">
                         <!--Emoji Rating-->
                        <div class="full-stars-example">
                            <div class="rating-group">
                                <input class="rating__input rating__input--none"
                                 name="rating"
                                  id="rating-none"
                                   value="0"
                                    type="radio"
                                    v-model="selectVote"
                                >
                                <label aria-label="No rating"
                                 class="rating__label"
                                  for="rating-none">
                                  <i class="rating__icon rating__icon--none fa fa-ban"></i>
                                </label>
                                <label
                                    aria-label="1 star"
                                    class="rating__label"
                                    for="rating-1"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-1"
                                    value="1"
                                    v-model="selectVote"
                                    type="radio"
                                />
                                <label
                                    aria-label="2 stars"
                                    class="rating__label"
                                    for="rating-2"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-2"
                                    value="2"
                                    v-model="selectVote"
                                    type="radio"
                                />
                                <label
                                    aria-label="3 stars"
                                    class="rating__label"
                                    for="rating-3"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-3"
                                    value="3"
                                    v-model="selectVote"
                                    type="radio"
                                />
                                <label
                                    aria-label="4 stars"
                                    class="rating__label"
                                    for="rating-4"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-4"
                                    value="4"
                                    v-model="selectVote"
                                    type="radio"
                                    checked
                                />
                                <label
                                    aria-label="5 stars"
                                    class="rating__label"
                                    for="rating-5"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-5"
                                    value="5"
                                    v-model="selectVote"
                                    type="radio"
                                />
                            </div>
                        </div>
                        <!--Emoji Rating Ends-->
                        <button @click="changeOrderVotes()">Voto</button>
                  </div>
                </div>
 
            </div>
            
            <!-- <div v-show="musicians.length <= 0">Non ci sono Musicisti</div> -->
            <div class="my_card" v-for="musician in startMusicians" :key="musician.id">
                <span v-if="checkSponsorized(musician)"><i class="fa-solid fa-star right"></i></span>
                <span v-if="checkSponsorized(musician)"><i class="fa-solid fa-star left"></i></span>
                    <router-link :to="{ name: 'user-single', params: { slug: musician.slug } }">
                        <div class="top">
                            <div class="info col-lg-5 mb-4">
                                <h3>{{musician.name}} {{musician.surname}} </h3>
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
                                        <h5>Generi:</h5>
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
                                        <div class="text">
                                            <p>Recensioni: <span>({{musician.reviews.length}})</span></p>
                                            
                                        </div>
                                        <div v-if="musician.reviews.length > 0">
                                                <!-- <img src="../../../images/music.svg" /> -->
                                            <div class="notes big-notes">
                                            <div
                                                class="notes_inner"
                                                :class="starsWidth(musician.reviews)"
                                            ></div>
                                            </div>
                                            
                                        </div>
                                        <div v-else>
                                            <div class="notes big-notes">
                                            <div
                                                class="notes_inner starFill0"
                                            ></div>
                                            </div>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </router-link>
             </div>
            

            <div class="my_card" v-for="musician in musicians" :key="musician.id">
                <span v-if="checkSponsorized(musician)"><i class="fa-solid fa-star right"></i></span>
                <span v-if="checkSponsorized(musician)"><i class="fa-solid fa-star left"></i></span>
                    <router-link :to="{ name: 'user-single', params: { slug: musician.slug } }">
                        <div class="top">
                            <div class="info col-lg-5 mb-4">
                                <h3>{{musician.name}} {{musician.surname}} </h3>
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
                                        <h5>Generi:</h5>
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
                                        <div class="text">
                                            <p>Recensioni: <span>({{musician.reviews.length}})</span></p>
                                            
                                        </div>
                                        <div v-if="musician.reviews.length > 0">
                                                <!-- <img src="../../../images/music.svg" /> -->
                                            <div class="notes big-notes">
                                            <div
                                                class="notes_inner"
                                                :class="starsWidth(musician.reviews)"
                                            ></div>
                                            </div>
                                            
                                        </div>
                                        <div v-else>
                                            <div class="notes big-notes">
                                            <div
                                                class="notes_inner starFill0"
                                            ></div>
                                            </div>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </router-link>
            </div>
  </div>
</template>

<script>
import { bus } from "../front";
export default {
  name: "Search",
  data() {
    return {
      startMusicians: [],
      newMusicians: [],
      musicians: [],
      selectVote: null,
      availabilities: [],
      valore: "",
      check: "Seleziona una specializzazione",
    };
  },
  methods: {
      getMusicians(){
        axios.get("/api/users").then((apirisp) => {
        this.startMusicians = apirisp.data;
        this.getSponsorizedNew();
    })
    },
    //Tutte le prestazioni
    getAvailability() {
      axios
        .get(`/api/filtered/getavailability${this.$route.fullPath}`)
        .then((response) => {
          
          this.musicians = response.data;
          if(this.musicians.length > 0 ){
              this.startMusicians = [];
          };
          this.getSponsorized();
          console.log(this.musicians)
        })
        .catch(function (error) {
          console.log(error.response.data);
        });
    },

    changeAvailability() {
      axios
        .get(`/api/filtered/getavailability/search`, {
          params: {
            name: this.valore,
          },
        })
        .then((response) => {
          this.startMusicians = [];
          this.musicians = response.data;
          this.getSponsorized();
          
        })
        .catch(function (error) {
          console.log(error.response.data);
        });

        this.$router.push({ path: "search", query: { name: this.valore } });
    },

    starsWidth: function (numero) {
      return "starFill" + this.getAvgVote(numero);
    },

    getAvgVote(array) {
      let somma = 0;
      let count = 0;
      let boh;
      array.forEach((singleRev) => {
        // console.log(singleRev.vote);
        somma = somma + singleRev.vote;
        count = count + 1;
      });
      // console.log("ciao"+somma);

      if (count != 0) {
        boh = somma / count;
      }
      return Math.floor(boh);
    },

    changeOrderReviews: function () {
      this.musicians.sort(function (a, b) {
        return b.reviews.length - a.reviews.length;
      });

      this.startMusicians.sort(function (a, b) {
        return b.reviews.length - a.reviews.length;
      });
    },
    changeOrderVotes: function () {
      if(this.selectVote == 0) {
        this.changeAvailability() 

      }else {
        axios
        .get(`/api/filtered/getavailability${this.$route.fullPath}`, {
          params: {
            vote: this.selectVote,
          },
        })
        .then((response) => {
          this.musicians = response.data;
        })
        .catch(function (error) {
          console.log(error.response.data);
        });
      //this.$router.push({ name: "search", query: { name: this.ava, vote: this.selectVote} });
      }
      
    },

    getSponsorizedNew() {
      let musicianSponsorized = [];
      let musicianNotSponsorized = [];

      const today = new Date();

         this.startMusicians.forEach((element) => {
        let sponsors = element.sponsorships.length;
        let found = true;
        element.sponsorships.forEach((plan) => {
          if (Date.parse(plan.pivot.expiration) >= Date.parse(today) && found) {
            found = false;
            musicianSponsorized.push(element);
          } else {
            sponsors--;
          }
        });
        if (sponsors == 0) {
          musicianNotSponsorized.push(element);
        }
      });
      console.log(musicianSponsorized);
      this.startMusicians = musicianSponsorized.reverse().concat(musicianNotSponsorized);
    },

    getSponsorized() {
      let musicianSponsorized = [];
      let musicianNotSponsorized = [];

      const today = new Date();

         this.musicians.forEach((element) => {
         let sponsors = element.sponsorships.length;
        let found = true;
          element.sponsorships.forEach((plan) => {
            if (Date.parse(plan.pivot.expiration) >= Date.parse(today) && found) {
              found = false;
              musicianSponsorized.push(element);
            } else {
              sponsors--;
            }
          });
          if (sponsors == 0) {
            musicianNotSponsorized.push(element);
          }
      });
      this.musicians = musicianSponsorized.reverse().concat(musicianNotSponsorized);
    },

    checkSponsorized(musician) {
      const today = new Date();

      let get = false;


      musician.sponsorships.forEach((element) => {
        if (Date.parse(element.pivot.expiration) >= Date.parse(today)) {
          get = true;
        }
      });
      return get;
    },

    
  },
  created() {
      this.getMusicians();
      this.getAvailability();
     

    //Api con tutte le prestazioni
    axios.get("/api/availability/index").then((respAll) => {
      this.availabilities = respAll.data;
    });
  },
};
</script>

<style lang="scss" scoped>
.select {
  display: flex;
  justify-content: center;
  color: black;
  font-size: 24px;
  font-weight: bold;
}

select {
  margin-left: 10px;
  background: transparent;
  border: 0;
  cursor: pointer;
  max-width: 100px;
  font-size: 18px;
}

.background {
  /* background-image: url("../../../images/pexels-picjumbocom-196652.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover; */
  /* background: #E8EBF8; */
  /* background: #595766ad; */
  padding: 15px 0;
  background: #fff;
}

.background::-webkit-scrollbar {
  display: none;
}

.background {
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}

h1,
.info h3 {
  text-align: center;
}

.info h3,
.request {
  color: white;
  text-transform: capitalize;
}

.info h3{
  max-height: 90px;
  overflow: hidden;
}

h1 {
  font-size: 55px;
}

.fa-star{
    font-size: 25px;
    color: yellow;
}

.right{
  position: absolute;
  right: 10px;
}

.left{
  position: absolute;
  left: 10px;
}

    .my_card{
        position: relative;
        margin: 50px auto;
        max-width: 60%;
        padding: 10px;
        /* background: rgba(210, 206, 206, 0.861); */
        /* background: #ededed; */
        /* background-image: url('https://i.stack.imgur.com/MkSui.jpg'); */
        background-image: url('../../../images/card.jpeg');
        background-repeat: no-repeat;
        // background-position: center;
        background-size: cover;
        border-radius: 10px;
        /* border: 1px solid black; */
        -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.4);
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.4);
        transition: 0.5s;
    }

    .my_card:hover{
        cursor: pointer;
        transform: scale(1.03);
        background-image: url('../../../images/rotate.jpeg');
        background-position: bottom;
    }

.my_card:hover a {
  text-decoration: none;
}

.my_card:hover .fa-star {
    color: #527A5A;
}

    .my_card:hover h3{
        color: black;
    }

    .my_card:hover .references *{
        color: white;
    }

    .my_card:hover span{
        color: white !important;
    }

    .my_card:hover .request{
        background: rgba(28, 28, 28, 0.9);
    }

    .request{
        display: flex;
        padding: 5px;
        border-radius: 10px;
        background: rgba(28, 28, 28, 0.8);
        max-height: 200px;
    }

.request ul {
  max-height: 150px;
  overflow: scroll;
}

.request ul::-webkit-scrollbar {
  display: none;
}

.request ul {
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}

.categories li,
.events li,
.references li {
  list-style: none;
  margin-left: 5px;
  font-size: 17px;
}

.references ul {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.references li {
  display: inline;
  font-size: 15px;
}

.references {
  padding: 0 50px;
  /* margin-top: 20px; */
}

.categories li {
  color: rgba(91, 121, 93);
}

.events li {
  color: rgba(175, 108, 195);
}

.categories div,
.events div {
  border-radius: 15px;
  padding: 15px;
}

.top {
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

.container-xl{
  min-height: calc(100vh - 50px);
}

.info {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.info img {
  height: 200px;
  width: 200px;
  border-radius: 50%;
}

.references img {
  width: 25px;
  height: auto;
  color: #527a5a;
}

.references li {
  color: black;
  text-transform: capitalize;
}

.references #reviews {
  display: flex;
}

//Search Filters
.search-filters {
  background-color: #ededed;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 10px 0px;
    -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);

  @media only screen and (max-width: 1000px) {
    flex-direction: column;
  }

  h3 {
    margin-right: 10px;
    margin-bottom: 0px;
    color: #5b5b5b;
  }

  button {
    background-color: #ccc;
    border: none;
    padding: 5px 10px;
    margin: 0px 10px;

    &:hover {
      text-decoration: none;
      background-color: #6aa275;
      -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
      box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
      color: #fff;
    }
  }
}

.filters {
  display: flex;
  justify-content: center;
  align-items: center;

  div:first-child {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  @media only screen and (max-width: 1000px) {
    width: 90%;
    justify-content: space-around;
  }

  @media only screen and (max-width: 600px) {
    flex-direction: column;
  }
}

.clacFileter {
  background-color: rgb(221, 221, 221);
  padding-left: 5px;

  @media only screen and (max-width: 600px) {
       margin-top: 10px;
       justify-content: center;
       align-items: center;
  }

  button {
    margin-right: 0px;
  }
}

.rating__label {
  cursor: pointer;
  padding: 0 0.1em;
  font-size: 1.5rem;
}

.change-avaliability {
  margin-right: 20px;
  border-right: 1px solid rgb(188, 188, 188);

  @media only screen and (max-width: 1000px) {
    margin-right: 0px;
    width: 90%;
    border-right: none;
    margin-bottom: 20px;
    margin-right: 0px;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  select {
    min-width: 400px;

    @media only screen and (max-width: 1000px) {
      min-width: 70%;
    }
  }
}

@media only screen and (max-width: 700px) {
  .categories,
  .events {
    padding: 0;
  }

  .categories div,
  .events div {
    max-width: 80%;
  }

  .my_card {
    max-width: 100%;
  }

  .references {
    padding: 0 30px;
  }
}

@media only screen and (max-width: 1000px) {
  .references p {
    display: none;
  }

  .references #reviews {
    margin-top: 10px;
  }

  .references ul {
    display: flex;
    flex-direction: column;
  }

  .right, .left{
    top: 30%;
    font-size: 50px;
  }
}
</style>