<template>
<div class="background">
    <div class="container mt-5">
        <h1>I nostri musicisti</h1>
        <div class="my_card" v-for="(user, indice) in users" :key="indice">
            <div class="top">
                <div class="info col-lg-5 mb-4">
                    <h3>{{user.name}} {{user.surname}}</h3>
                    <img class="w-75" :src="user.img" alt="">
                </div>
                <div class="request col-lg-7 col-sm-12">
                    <div class="categories mw-50 col-lg-6 col-sm-6 col-xs-6">
                        <div>
                            <h5>Strumenti:</h5>
                            <ul>
                                <li v-for="(category, index) in user.categories" :key="index"><strong>{{category.cat}}</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="events mw-50 col-lg-6 col-sm-6 col-xs-6">
                        <div>
                            <h5>Eventi:</h5>
                            <ul>
                                <li v-for="(event, index) in user.events" :key="index"><strong>{{event.ev}}</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <p class="bio">
                    {{user.bio}}
                </p>
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
                    bio: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deleniti, nobis eum quam ut consectetur cumque reprehenderit quos mollitia placeat corporis. Aspernatur beatae, molestias illo incidunt ea vitae sit culpa ratione ipsa, aliquam optio pariatur nostrum maxime atque perferendis suscipit quos aliquid, aperiam tenetur illum iusto magnam similique quas dolor. Inventore dolorem quo voluptates perferendis enim consequatur? Adipisci tenetur iste obcaecati commodi modi aspernatur repudiandae ut ad officiis, magni excepturi quaerat harum, numquam fugit atque consectetur quas sunt nemo saepe, sed iusto optio minima culpa eos. Ducimus adipisci iste ab expedita, id tempora repudiandae facilis excepturi amet, sunt non eveniet."
                },
                {
                    name: "Aldo",
                    surname: "Baglio",
                    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIeSp-WHhgKpUti2P1pU8F-OPD0pyWrUz5MQ&usqp=CAU",
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
                    bio: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deleniti, nobis eum quam ut consectetur cumque reprehenderit quos mollitia placeat corporis. Aspernatur beatae, molestias illo incidunt ea vitae sit culpa ratione ipsa, aliquam optio pariatur nostrum maxime atque perferendis suscipit quos aliquid, aperiam tenetur illum iusto magnam similique quas dolor. Inventore dolorem quo voluptates perferendis enim consequatur? Adipisci tenetur iste obcaecati commodi modi aspernatur repudiandae ut ad officiis, magni excepturi quaerat harum, numquam fugit atque consectetur quas sunt nemo saepe, sed iusto optio minima culpa eos. Ducimus adipisci iste ab expedita, id tempora repudiandae facilis excepturi amet, sunt non eveniet."
                },
                {
                    name: "Aldo",
                    surname: "Baglio",
                    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIeSp-WHhgKpUti2P1pU8F-OPD0pyWrUz5MQ&usqp=CAU",
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
                    bio: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deleniti, nobis eum quam ut consectetur cumque reprehenderit quos mollitia placeat corporis. Aspernatur beatae, molestias illo incidunt ea vitae sit culpa ratione ipsa, aliquam optio pariatur nostrum maxime atque perferendis suscipit quos aliquid, aperiam tenetur illum iusto magnam similique quas dolor. Inventore dolorem quo voluptates perferendis enim consequatur? Adipisci tenetur iste obcaecati commodi modi aspernatur repudiandae ut ad officiis, magni excepturi quaerat harum, numquam fugit atque consectetur quas sunt nemo saepe, sed iusto optio minima culpa eos. Ducimus adipisci iste ab expedita, id tempora repudiandae facilis excepturi amet, sunt non eveniet."
                },
                {
                    name: "Aldo",
                    surname: "Baglio",
                    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIeSp-WHhgKpUti2P1pU8F-OPD0pyWrUz5MQ&usqp=CAU",
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
                    bio: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deleniti, nobis eum quam ut consectetur cumque reprehenderit quos mollitia placeat corporis. Aspernatur beatae, molestias illo incidunt ea vitae sit culpa ratione ipsa, aliquam optio pariatur nostrum maxime atque perferendis suscipit quos aliquid, aperiam tenetur illum iusto magnam similique quas dolor. Inventore dolorem quo voluptates perferendis enim consequatur? Adipisci tenetur iste obcaecati commodi modi aspernatur repudiandae ut ad officiis, magni excepturi quaerat harum, numquam fugit atque consectetur quas sunt nemo saepe, sed iusto optio minima culpa eos. Ducimus adipisci iste ab expedita, id tempora repudiandae facilis excepturi amet, sunt non eveniet."
                },
            ]
        }
    }
}
</script>

<style scoped>

    .background{
        background-image: url("../../../images/pexels-picjumbocom-196652.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: calc(100vh - 50px);
        overflow-y: scroll;
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

    h1{
        font-size: 55px;
    }

    .my_card{
        margin: 50px auto;
        max-width: 60%;
        padding: 20px;
        /* background: rgba(210, 206, 206, 0.861); */
        background: rgba(42, 41, 41, 0.9);
        border-radius: 20px;
        border: 1px solid black;
        color: white;
    }

    .bio{
        line-height: 20px;
        font-size: 14px;
        padding: 0 25px;
    }

    .request{
        display: flex;
    }

    .categories li, .events li{
        list-style: none;
        margin-left: 5px;
        font-size: 20px;
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

    .info{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    img{
        /* height: 250px;
        width: 225px; */
        border-radius: 50%;
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
    }
</style>