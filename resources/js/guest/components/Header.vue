<template>
    <nav>
        <div class="logo">
            UNISON
        </div>
        <ul class="my_ul">
            <li v-for="(voice, index) in link" :key="index"><a class="my_a" href="#"><p>{{voice.name}}</p></a></li>
            <li><a class="my_a login" href="#"><p class="my_button">Login</p></a></li>
        </ul>
        <ul class="my_ul-icon">
            <li><a class="my_a" href="#">icon</a></li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Header",

    data() {
        return {
            link: [
                {
                    name: "Cerca",
                },
                {
                    name: "Categorie",
                },
                {
                    name: "Eventi",
                },
            ],
        };
    },
};
</script>

<style scoped>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.logo{
    font-size: 30px;
}

nav{
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgb(42, 41, 41);
    height: 50px;
    padding: 0px 20px;
    color: white;
}

.my_ul{
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
}

li{
    float: left;
    padding: 0px 15px;
    list-style: none;
}

.my_a{
    text-decoration: none;
    color: white;
}

.my_ul .my_a p{
    transition: 1s;
}

.my_ul .my_a p:hover{
    color: white;
    transform: scale(1.3);
}

.my_ul .my_a:hover .my_button{
    color: white;
    transform: scale(1.1);
}

.navbar-toggler-icon, .navbar-toggler, .nav-item p{
    color: white;
}

.my_button{
    padding: 5px 15px;
    border: 0;
    color: white;
    background: #527A5A;
    border-radius: 20px;
    margin-left: 40px;
}



.my_ul-icon{
    display: none;
    margin: 0;
    padding: 0;
}

@media only screen and (max-width: 700px){
    .my_ul-icon{
        display: block;
    }

    .my_ul{
        display: none;
    }
}
</style>