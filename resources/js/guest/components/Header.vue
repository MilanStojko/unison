<template>
<div>
  <nav>
    <div class="logo">UNISON</div>
    <ul class="my_ul">
      <li v-for="(voice, index) in link" :key="index">
        <a class="my_a" href="#"><p>{{ voice.name }}</p></a>
      </li>
      <li>
        <a class="my_a login" href="http://127.0.0.1:8000/login"><p class="my_button">Login</p></a>
      </li>
    </ul>
    <ul class="my_ul-icon">
      <li>
        <input @click="show(click)" type="checkbox" id="menyAvPaa">
        <label id="burger" for="menyAvPaa">
            <div></div>
            <div></div>
            <div></div>
        </label>
      </li>
    </ul>
  </nav>
  <Transition name="slide-fade">
  <div class="listmenu" v-show="click==1">
      <ul>
        <li v-for="(voice, indice) in link" :key="indice">
          <a class="my_a_mobile" href="#"><span>{{ voice.name }}</span></a>
        </li>
        <li class=buttonlogin>
          <a class="my_a login" href="http://127.0.0.1:8000/login"><span class="my_button">Login</span></a>
        </li>
      </ul>
  </div>
  </Transition>
</div>

  
</template>

<script>
export default {
  name: "Header",

  data() {
    return {
      click: 0,
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
  methods:{
    show: function(click){
      this.click=!click;
    },
  }
};
</script>

<style scoped>


.burger-wrapper {
  cursor: pointer;
}
#menyAvPaa {
    display: none;
}
#burger {
    position: absolute;
    cursor: pointer;
    width: 2rem;
    height: 1.5rem;
    right: 1rem;
    top: 1rem;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
}

#burger > div {
    height: 4px;
    background-color: white;
    transition: 0.5s;
    z-index: 999;
}

#menyAvPaa:checked ~ #burger > div {
  background-color: #fff;
}

#menyAvPaa:checked ~ #burger > div:nth-child(1) {
    transform: translateY(10px) rotate(45deg);
}
#menyAvPaa:checked ~ #burger > div:nth-child(2) {
    opacity: 0;
}
#menyAvPaa:checked ~ #burger > div:nth-child(3) {
    transform: translateY(-10px) rotate(-45deg);
}









.slide-fade-enter-active {
  transition: opacity 1.5s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(20px);
  opacity: 0;
}





* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.logo {
  font-size: 30px;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: rgb(42, 41, 41);
  height: 50px;
  padding: 0px 20px;
  color: white;
  position: relative;
}

.my_ul {
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
}

.my_ul li {
  float: left;
  padding: 0px 15px;
  list-style: none;
}

.my_a {
  text-decoration: none;
  color: white;
}

.my_ul .my_a p {
  transition: 1s;
}

.my_ul .my_a p:hover {
  color: white;
  transform: scale(1.3);
}

.my_ul .my_a:hover .my_button {
  color: white;
  transform: scale(1.1);
}

.navbar-toggler-icon,
.navbar-toggler,
.nav-item p {
  color: white;
}

.my_button {
  padding: 5px 15px;
  border: 0;
  color: white;
  background: #527a5a;
  border-radius: 15px;
}

.my_ul-icon {
  display: none;
  margin: 0;
  padding: 0;
}

.my_ul-icon li{
  list-style: none;
}

.listmenu{
  position: absolute;
  right: 0;
  z-index: 999;
  padding: 20px;
  width: 100%;
  height: calc(100vh - 50px);
  text-align: center;
  background: rgb(255, 255, 255, 0.9);
  display: flex;
  flex-direction: column;
}

.listmenu li{
  line-height: 100px;
  font-weight: bold;
  font-size: 40px;
  list-style: none;
}

.listmenu .buttonlogin{
  margin-top: 50px;
}

.my_a_mobile {
  text-decoration: none;
  color: black;
}

@media only screen and (max-width: 700px) {
  .my_ul-icon {
    display: block;
  }

  .my_ul {
    display: none;
  }
}
</style>