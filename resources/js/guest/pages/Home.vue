<template>
    <div id="Home">
        <Jumbo />
        <Categories />
        <Service />
    </div>
</template>

<script>
import Jumbo from "../components/sections/Jumbo.vue";
import Categories from "../components/sections/Categories.vue";
import Service from "../components/sections/Service.vue";
export default {
    name: "Home",

    components: {
        Jumbo,
        Categories,
        Service,
    },
};
</script>

<style lang="scss" scoped></style>
