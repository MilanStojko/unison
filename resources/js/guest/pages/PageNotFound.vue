<template>
    <div class="Page-not-found">
        <div class="Page-not-found_content">
            <h1>&#119074;</h1>
            <h3>Pagina non trovata</h3>
            <span>Error code: 404</span>

            <router-link :to="{ name: 'home' }"
                >Torna alla Home Page</router-link
            >
        </div>
        <div class="Page-not-found_image">
            <img src="../../../images/404.svg" />
        </div>
    </div>
</template>

<script>
export default {
    name: "PageNotFound",
};
</script>

<style lang="scss" scoped>
.Page-not-found {
    height: 100vh;
    display: flex;
    justify-content: space-around;
    align-items: center;

    @media screen and (max-width: 1100px) {
        flex-direction: column;
        justify-content: center;
    }

    &_image {
        width: 40%;
        height: 100%;
        @media screen and (max-width: 1100px) {
            width: 50%;
            min-width: 400px;
        }
        img {
            width: 100%;
            height: 100%;
        }
    }

    &_content {
        width: 40%;
        text-align: center;
        @media screen and (max-width: 1100px) {
            width: 100%;
        }

        h1 {
            font-size: 200px;
            font-weight: bold;
            color: #bd5db7;
            text-transform: uppercase;

            @media screen and (max-width: 1100px) {
                font-size: 100px;
            }
        }

        h3 {
            font-size: 40px;
            @media screen and (max-width: 1100px) {
                font-size: 30px;
            }
        }

        span {
            font-size: 25px;
            display: block;

            @media screen and (max-width: 1100px) {
                font-size: 20px;
            }
        }

        h3,
        span {
            font-weight: bold;
            color: #00334b;
            margin-bottom: 20px;
        }
        a {
            background-color: #bd5db7;
            color: #fff;
            text-decoration: none;
            padding: 10px 25px;

            &:hover {
              background-color: #db81d5;
                -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
                box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
            }
        }
    }
}
</style>
