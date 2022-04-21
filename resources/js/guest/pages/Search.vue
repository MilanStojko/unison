<template>
    <div class="select-availabilities">
        <label for="availabilities">Scegli uno strumento:</label>
        <select name="availabilities" id="availabilities">
            <!-- <option v-for="(availability, index) in availabilities" :key="index" value="">{{availability.name}}</option> -->
        </select>
        <!-- <h1>{{$ava}}</h1> -->
        <div v-for="(musician, index) in musicians" :key="index">{{musician.name}}</div>
        <h1>{{ava}}</h1>
    </div>
</template>

<script>
import {bus} from '../front'
export default {
    name: "Search",
    data(){
        return{
            musicians:[],
            ava: ''
        }
    },
    created(){
        bus.$on('saveValue', (data) =>{
            //Dato ricevuto dall'emit in jumbo
            this.ava = data;
            console.log(this.ava);
        })
        axios.get('/api/users').then((respAll)=>{
            this.musicians = respAll.data;
        })
    }
}
</script>

<style>

</style>