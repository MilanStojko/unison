<template>
<div class="background">
    <div class="container mt-5">
        <div class="container">
            <h1>I nostri musicisti</h1>
            <div class="my_card" v-for="(user, indice) in users" :key="indice">
                <div class="top">
                    <div class="info col-lg-5 mb-4">
                        <h3>{{user.name}} {{user.surname}}</h3>
                        <img class="w-75" :src="user.img" alt="">
                    </div>
                    <div class="request col-lg-7 col-sm-12">
                        <div class="events mw-50 col-lg-6 col-sm-6 col-xs-6">
                            <div>
                                <h5>Eventi:</h5>
                                <ul>
                                    <li v-for="(event, index) in user.events" :key="index"><strong>{{event.ev}}</strong></li>
                                </ul>
                            </div>
                        </div>
                        <div class="categories mw-50 col-lg-6 col-sm-6 col-xs-6">
                            <div>
                                <h5>Strumenti:</h5>
                                <ul>
                                    <li v-for="(category, index) in user.categories" :key="index"><strong>{{category.cat}}</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="references">
                        <ul>
                            <li><i class="fa-solid fa-location-dot"></i> {{user.address}}</li>
                            <li style="font-size: 20px">
                                Recensioni:
                                <span v-for="nota in user.reviews" :key="'piena'+nota">
                                    <img src="../../../images/music.svg" />
                                </span>
                            </li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    
</template>

<script>
export default {
    name: "Musicians",

    data() {
        return{
            users: [
                {
                    name: "Aldo",
                    surname: "Baglio",
                    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIeSp-WHhgKpUti2P1pU8F-OPD0pyWrUz5MQ&usqp=CAU",
                    address: "Via Laurentina 3",
                    categories: [
                        {
                            cat:"jazz"
                        },
                        {
                            cat:"violino"
                        },
                        {
                            cat:"chitarra"
                        },
                        {
                            cat:"voce"
                        },
                        
                    ],
                    events :[
                        {
                            ev:"festival"
                        },
                        {
                            ev:"matrimonio"
                        },
                        {
                            ev:"compleanno"
                        }
                    ],
                    reviews: 5,
                },
                {
                    name: "Aldo",
                    surname: "Baglio",
                    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIeSp-WHhgKpUti2P1pU8F-OPD0pyWrUz5MQ&usqp=CAU",
                    address: "Via Laurentina 3",
                    categories: [
                        {
                            cat:"jazz"
                        },
                        {
                            cat:"violino"
                        },
                        {
                            cat:"chitarra"
                        },
                        {
                            cat:"voce"
                        },
                    ],
                    events :[
                        {
                            ev:"festival"
                        },
                        {
                            ev:"matrimonio"
                        },
                        {
                            ev:"compleanno"
                        }
                    ],
                    reviews: 5,
                },
                {
                    name: "Aldo",
                    surname: "Baglio",
                    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIeSp-WHhgKpUti2P1pU8F-OPD0pyWrUz5MQ&usqp=CAU",
                    address: "Via Laurentina 3",
                    categories: [
                        {
                            cat:"jazz"
                        },
                        {
                            cat:"violino"
                        },
                        {
                            cat:"chitarra"
                        },
                        {
                            cat:"voce"
                        },
                        
                    ],
                    events :[
                        {
                            ev:"festival"
                        },
                        {
                            ev:"matrimonio"
                        },
                        {
                            ev:"compleanno"
                        }
                    ],
                    reviews: 5,
                },
                {
                    name: "Aldo",
                    surname: "Baglio",
                    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIeSp-WHhgKpUti2P1pU8F-OPD0pyWrUz5MQ&usqp=CAU",
                    address: "Via Laurentina 3",
                    categories: [
                        {
                            cat:"jazz"
                        },
                        {
                            cat:"violino"
                        },
                        {
                            cat:"chitarra"
                        },
                        {
                            cat:"voce"
                        },
                        
                    ],
                    events :[
                        {
                            ev:"festival"
                        },
                        {
                            ev:"matrimonio"
                        },
                        {
                            ev:"compleanno"
                        }
                    ],
                    reviews: 5,
                },
            ]
        }
    }
}
</script>

<style scoped>

    .background{
        /* background-image: url("../../../images/pexels-picjumbocom-196652.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover; */
        height: calc(100vh - 50px);
        overflow-y: scroll;
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

    .request{
        display: flex;
        /* background: ; */
    }

    .categories li, .events li, .references li{
        list-style: none;
        margin-left: 5px;
        font-size: 20px;
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
        margin-top: 20px;
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
        /* height: 250px;
        width: 225px; */
        border-radius: 50%;
    }

    .references img{
        width: 25px;
        height: auto;
        color: #527a5a;
    }



    @media only screen and (max-width: 700px) {
        .categories, .events{
            padding: 0;
        }

        .categories div, .events div{
            max-width: 80%;
        }

        .request{
            padding: 0 25px;
        }

        .my_card{
            max-width: 90%;
        }

        .references{
            padding: 0 30px;
        }
    }
</style>