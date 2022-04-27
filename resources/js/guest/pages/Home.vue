<template>
    <div id="Home">
        <Jumbo />
        <RandomMusicians />
        <Categories />
        <Instruments />
        <Service />
    </div>
</template>

<script>
import Jumbo from "../components/sections/Jumbo.vue";
import RandomMusicians from "../components/sections/RandomMusicians.vue";
import Categories from "../components/sections/Categories.vue";
import Instruments from '../components/sections/Instruments.vue';
import Service from "../components/sections/Service.vue";
export default {
    name: "Home",

    components: {
        Jumbo,
        RandomMusicians,
        Categories,
        Instruments,
        Service,
    },
};
</script>

<style lang="scss" scoped></style>
