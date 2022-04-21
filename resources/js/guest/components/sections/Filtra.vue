<template>
    <div class="d-flex flex-column align-items-center w-100">
        <button @click="show(click)">Filtra <i class="fas fa-chevron-down"></i></button>
        <div class="filtra col-12" :class="{ show: res }">
            <div class="eventi col-lg-6 col-md-12 col-sm-12">
                <label for="events">Scegli un evento:</label>
                
                <select name="events" id="events">
                    <option v-for="(event, index) in events" :key="index" value="">{{event.name}}</option>
                </select>
            </div>
            <div class="strumenti col-lg-6 col-md-12 col-sm-12">
                <label for="instruments">Scegli uno strumento:</label>

                <select name="instruments" id="instruments">
                    <option v-for="(instrument, index) in instruments" :key="index" value="">{{instrument.name}}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Filtra",

    data(){
        return{
            click: 1,
            res: false,
            events: [
                {
                    name: "Addio al nubilato / celibato",
                },
                {
                    name: "Cerimonia / Celebrazione",
                },
                {
                    name: "Festa Bambini",
                },
                {
                    name: "Funerale",
                },
                {
                    name: "Locale / Club / Bar",
                },
                {
                    name: "Chiesa / Comunione",
                },
                {
                    name: "Ristorante",
                },
                {
                    name: "Aperitivo / Banchetto",
                },
                {
                    name: "Compleanno / Anniversario",
                },
                {
                    name: "Matrimonio",
                },
                {
                    name: "Capodanno",
                },
                {
                    name: "Natale",
                },
                {
                    name: "Festa Privata",
                },
            ],
            instruments: [
                {
                    name: "Cantante",
                },
                {
                    name: "Chitarrista",
                },
                {
                    name: "Sassofonista",
                },
                {
                    name: "Bassista",
                },
                {
                    name: "Batterista",
                },
                {
                    name: "Pianista",
                },
                {
                    name: "Trombettista",
                },
                {
                    name: "Violinista",
                },
                {
                    name: "DJ",
                },
                {
                    name: "Clavicembalista",
                },
                {
                    name: "Organista",
                },
            ],
        }
    },
    methods:{
        show: function(click){
            this.click=!click;
            if(this.click==1){
                this.res='true';
            }
            else{
                this.res='false';
            }
        },
    }
}
</script>

<style scoped>

    select{
        max-width: 180px;
        border: 0;
        padding: 5px 10px;
        border-radius: 10px;
        cursor: pointer;
    }
    button{
        padding: 10px 15px;
        border: 0;
        border-radius: 10px;
        color: white;
        background: #527A5A;
    }
    .filtra{
        margin-top: 10px;
        background: rgb(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        display: flex;
        flex-wrap: wrap;
        opacity: 0;
    }
    .eventi, .strumenti{
        color: black;
    }

    .show{
        opacity: 1;
    }

    
</style>