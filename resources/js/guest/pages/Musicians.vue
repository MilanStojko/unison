<template>
<div class="background">
    <div class="container">
        <div class="container p-4">
            <h1>I nostri musicisti</h1>
                                        <span @click=getAvgVote()>Prova</span>

            
            <div class="my_card" v-for="(musician, indiceSingle) in musicians" :key="indiceSingle">
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
    </div>
</div>
    
</template>

<script>
export default {
    name: "Musicians",

    data() {
      return {
        musicians: [],
        reviewVotes: [],
        avarageVote: "",
        user: {},
        id_user: null,
      };
    },
    created(){
        axios
        .get("/api/users")
        .then((apirisp)=>{
            this.musicians= apirisp.data;
            // this.id_user= apirisp.data.id;
            console.log(this.musicians);
        });
    },

    // methods: {
    //     ciao: function(){
    //         this.musicians.forEach(element => {
    //             console.log(element.reviews);
    //         });
    //     }
    // }

    methods:{
        // getAverage: function(array){
        //     let somma=0;
        //     // this.musicians.forEach(element => {
        //     //  console.log(element.reviews);
        //     // });
        //     for(let i=0; i<array.length; i++){
        //         somma = somma + array[i].vote;
        //     };
        //     return Math.ceil(somma/this.i);
        // },

        starsWidth: function (numero) {
            return "starFill" + this.getAvgVote(numero);
        },


        getAvgVote(array){
            let somma=0;
            let count=0;
            let boh;       
            array.forEach(singleRev => {
                // console.log(singleRev.vote);
                somma = somma + singleRev.vote;
                count=count + 1;
            });
                // console.log("ciao"+somma);
            
            if (count!=0) {
                boh=somma/count;
            };
            
            console.log(boh)
            return Math.round(boh);
        }
        
    },

    
    // methods:{
    //     // checkUserIdReview: function () {
    //     //     return (this.reviewData.user_id = this.user.id);
    //     // },
    //     GetVote: function () {
    //         for(let i=0; i<this.musicians.length; i++){
    //         axios
    //             .get(`/api/review/vote/`, {
    //                 params: {
    //                     userid: i,
    //                 },
    //             })
    //             .then((response) => {
    //                 this.reviewVotes = response.data;
    //         console.log(this.reviewVotes);
    //                 // if (this.reviewVotes.length <= 0) {
    //                 //     this.avarageVote = 0;
    //                 // } else {
    //                     // const votes = this.reviewVotes.map((vote) => {
    //                     //     return vote.vote;
    //                     // });
    //                     // console.log(votes);

    //                     // const average = (arr) =>
    //                     //     arr.reduce((a, b) => a + b, 0) / arr.length;

    //                     // this.avarageVote = average(votes).toFixed();
    //                     // console.log("Avarage" + " " + this.avarageVote);
    //                     // console.log("Musicista id" + " " + this.id_user);
    //                 // }
    //             })
    //             .catch(function (error) {
    //                 console.log(error.response.data);
    //             });
    //         }
            
    //     },
    // },
    // updated() {
    //     this.GetVote();
    // },
}
</script>

<style lang="scss" scoped>

    .background{
        /* background-image: url("../../../images/pexels-picjumbocom-196652.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover; */
        /* background: #E8EBF8; */
        /* background: #595766ad; */
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
        object-fit: cover;
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