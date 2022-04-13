<template>
    <nav>
        <div class="logo">
            UNISON
        </div>
        <ul class="my_ul">
            <li><a class="my_a" href="#">Cerca</a></li>
            <li><a class="my_a" href="#">Categorie</a></li>
            <li><a class="my_a" href="#">Eventi</a></li>
            <li>
                <a class="my_a login" href="#">
                    <span class="my_button">Login</span>
                </a>
            </li>
        </ul>
        <ul class="my_ul-icon">
            <li><a class="my_a" href="#">icon</a></li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Header",
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

.my_a:hover{
    color: white;
    text-decoration: underline;
}

.nav-item p{
    color: white;
}

.navbar-toggler-icon, .navbar-toggler{
    color: white;
}

.login{
    margin-left: 40px;
}

.my_button{
    padding: 5px 15px;
    border: 0;
    color: white;
    background: #527A5A;
    border-radius: 20px;
}

.my_button:hover{
    text-decoration: underline;
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