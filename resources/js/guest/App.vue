<template>
    <div>
        <Header v-if="!['page-404'].includes($route.name)" />
        <Main />
        <Footer v-if="!['page-404'].includes($route.name)" />
    </div>
</template>

<script>
import Header from "./components/Header.vue";
import Main from "./components/Main.vue";
import Footer from "./components/Footer.vue";
export default {
    components: {
        Header,
        Main,
        Footer,
    },
};
</script>

<style></style>
