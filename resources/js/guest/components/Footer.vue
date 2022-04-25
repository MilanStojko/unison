<template>
    <footer>
        <div class="pre">
            <div class="container">
                <div class="profiles">
                    <div class="card col-lg-3 col-md-6 col-sm-6">
                        <h4>Francesco Abritta</h4>
                        <div class="social">
                            <a href="https://github.com/francesco-abritta">
                                <img src="../../../images/github.svg" alt="">
                            </a>
                            <a href="https://linkedin.com/in/francesco-abritta-040988197">
                                <img src="../../../images/linkedin.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="card col-lg-3 col-md-6 col-sm-6">
                        <h4>Milan Stojkovic</h4>
                        <div class="social">
                            <a href="https://github.com/MilanStojko">
                                <img src="../../../images/github.svg" alt="">
                            </a>
                            <a href="https://linkedin.com/in/milan-stojkovicjobs">
                                <img src="../../../images/linkedin.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="card col-lg-3 col-md-6 col-sm-6">
                        <h4>Hamza Bouzid</h4>
                        <div class="social">
                            <a href="https://github.com/Hamza-bouzid">
                                <img src="../../../images/github.svg" alt="">
                            </a>
                            <a href="https://linkedin.com/in/hamza-bouzid">
                                <img src="../../../images/linkedin.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="card col-lg-3 col-md-6 col-sm-6">
                        <h4>Simone Massaro</h4>
                        <div class="social">
                            <a href="https://github.com/SimoMassaro52">
                                <img src="../../../images/github.svg" alt="">
                            </a>
                            <a href="https://linkedin.com/in/simone-massaro-95ba2a140">
                                <img src="../../../images/linkedin.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="container">
                <div class="squares">
                    <div class="square col-lg-3 col-md-6 col-sm-12">
                        <h4>Contattaci</h4>
                        <ul>
                            <li v-for="(voce, indice) in Contattaci" :key="indice+'contattaci'"> <a href="#">{{voce.name}}</a> </li>
                        </ul>
                    </div>
                    <div class="square col-lg-3 col-md-6 col-sm-12">
                        <h4>Note Legali</h4>
                        <ul>
                            <li v-for="(voce, indice) in Note" :key="indice+'note'"> <a href="#">{{voce.name}}</a> </li>
                        </ul>
                    </div>
                    <div class="square col-lg-3 col-md-6 col-sm-12">
                        <h4>Conosciamoci Meglio</h4>
                        <ul>
                            <li v-for="(voce, indice) in Conosciamoci" :key="indice+'conosciamoci'"> <a href="#">{{voce.name}}</a> </li>
                        </ul>
                    </div>
                    <div class="square col-lg-3 col-md-6 col-sm-12">
                        <ul>
                            <li> <a href="#"><img src="../../../images/googleplay.png" alt="Scarica dal Play Store"/></a> </li>
                            <li> <a href="#"><img src="../../../images/app-store.png" alt="Scarica dall'App Store"/></a> </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name:"Footer",

    data() {
        return {
            Contattaci: [
                {
                    name: "FAQ",
                },
                {
                    name: "Assistenza clienti",
                },
                {
                    name: "Newsletter",
                },
                {
                    name: "Area personale",
                },
            ],
            Note: [
                {
                    name: "Privacy",
                },
                {
                    name: "Cookies",
                },
                {
                    name: "Avvertenza legale",
                },
                {
                    name: "Informativa",
                },
            ],
            Conosciamoci: [
                {
                    name: "Chi siamo",
                },
                {
                    name: "Lavora con noi",
                },
                {
                    name: "UNISON",
                },
            ],
        };
    },
}
</script>

<style scoped>

    .pre{
        background: rgb(59, 104, 151);
        padding: 30px;
        color: white;
    }

    .profiles{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    
    .card{
        border: 0;
        background: transparent;
        padding: 0px;
        margin: 40px 0;
    }

    .card h4{
        text-align: center;
    }

    .social{
        margin-top: 15px;
        display: flex;
        justify-content: center;
    }

    .social a{
        padding: 0 15px;
    }

    .bottom{
        background: black;
        padding: 60px 30px;
    }

    .squares{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        /* row-gap: 20px; */
    }

    .square{
        padding: 20px;
        color: white;
    }

    .square li{
        list-style: none;
        margin-left: 10px;
    }

    .pre img{
        width: 30px;
    }

    .bottom img{
        width: 80%;
    }

    .pre a{
        color: black;
    }

    a{
        text-decoration: none;
        color: white;
        opacity: 0.5;
    }

    a:hover{
        opacity: 1;
    }
</style>