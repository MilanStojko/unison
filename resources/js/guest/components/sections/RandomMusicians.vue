<template>
<div>
    <h1 class="mt-3 pl-3">Scopri i profili in evidenza...</h1>
    <div class="container-xl d-flex justify-content-between">
        <!-- <div class="row"> -->
            <div class="my_card col-lg-4 col-md-5 col-xs-12" v-for="random in randoms" :key="random.id">
                <span v-if="checkSponsorized(random)"><i class="fa-solid fa-star"></i></span>
                    <router-link :to="{ name: 'user-single', params: { slug: random.slug } }">
                        <div class="top">
                            <div class="info col-lg-12">
                                <h3>{{random.name}} {{random.surname}} </h3>
                                <img v-if="random.avatar!=null" :src="`/storage/${random.avatar}`" alt="">
                                <img v-else src="https://thumbs.dreamstime.com/b/profilo-utente-vettoriale-avatar-predefinito-179376714.jpg" alt="">
                            </div>
                            <div class="request col-lg-12 col-sm-12 mt-4">
                                <div class="events mw-50 col-lg-6 col-sm-6 col-xs-6">
                                    <div>
                                        <h5>Eventi:</h5>
                                        <ul>
                                            <li v-for="(availability, index) in random.availabilities" :key="index"><strong>{{availability.name}}</strong></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="categories mw-50 col-lg-6 col-sm-6 col-xs-6">
                                    <div>
                                        <h5>Strumenti:</h5>
                                        <ul>
                                            <li v-for="(category, index) in random.categories" :key="index"><strong>{{category.name}}</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="references">
                                <ul>
                                    <li><i class="fa-solid fa-location-dot"></i> {{random.address}}</li>
                                    <li id="reviews" style="font-size: 20px">
                                        <div class="text">
                                            <p>Recensioni: <span>({{random.reviews.length}})</span></p>
                                            
                                        </div>
                                        <div v-if="random.reviews.length > 0">
                                                <!-- <img src="../../../images/music.svg" /> -->
                                            <div class="notes big-notes">
                                            <div
                                                class="notes_inner"
                                                :class="starsWidth(random.reviews)"
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
            <!-- </div> -->
        
    </div>
</div>
    
</template>

<script>
export default {
    name: "RandomMusicians",

    data() {
    return {
      musicians: [],
      randoms:[]
    };
  },
  created() {
    axios.get("/api/users").then((apirisp) => {
      this.musicians = apirisp.data;
      this.getSponsorized();
      this.shuffleArray(this.musicians);
      this.random();
      console.log(this.musicians);
    });

  },

  methods: {

    shuffleArray(inputArray){
        inputArray.sort(()=> Math.random() - 0.5);
    },

    random() {
        for(let i=0; i<3; i++){
            this.randoms.push(this.musicians[i]);
        }
    },
    getSponsorized() {
      let musicianSponsorized = [];
      let musicianNotSponsorized = [];

      const today = new Date();

      this.musicians.forEach((element) => {
        let sponsors = element.sponsorships.length;
        let found = true;
        console.log(element);
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
      this.musicians = musicianSponsorized.concat(musicianNotSponsorized);
    },

    checkSponsorized(musician) {
      const today = new Date();

      this.get = false;

      musician.sponsorships.forEach((element) => {
        if (Date.parse(element.pivot.expiration) >= Date.parse(today)) {
          this.get = true;
        }
      });
      return this.get;
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

      console.log(boh);
      return Math.round(boh);
    },
  },

}
</script>

<style scoped>

/* .container{
    max-width: 95%;
} */
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

.info h3{
    width: 250px;
    max-height: 50px;
    overflow: hidden;
}

.info h3,
.request {
  color: white;
  text-transform: capitalize;
}

h1 {
  font-size: 55px;
}

.fa-star{
    font-size: 35px;
    color: yellow;
    position: absolute;
    right: 10px;
}

    .my_card{
        position: relative;
        margin: 50px 10px 50px 0px;
        height: 450px;
        padding: 10px;
        /* background: rgba(210, 206, 206, 0.861); */
        /* background: #ededed; */
        /* background-image: url('https://i.stack.imgur.com/MkSui.jpg'); */
        background-image: url('../../../../images/card.jpeg');
        background-repeat: no-repeat;
        background-position: center;
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
        background-image: url('../../../../images/rotate.jpeg');
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
        height: 150px;
    }

.request ul {
  height: 70px;
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
  /* margin-left: 5px; */
  font-size: 15px;
}

/* .w30{
    width: 30% !important;
} */

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
  padding-bottom: 15px;
}

/* .container{
        -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 40px;
    }
    */

.info {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.info img {
  height: 120px;
  width: 120px;
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

  .categories,
  .events {
    padding: 0;
  }

  .categories div,
  .events div {
    /* max-width: 80%; */
  }

  .references {
    padding: 0 30px;
  }

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

    @media only screen and (max-width: 1000px) {
      .container-xl{
          justify-content: center !important;
          flex-wrap: wrap;
      }

      .my_card{
          margin-right: 10px;
      }
    }
</style>