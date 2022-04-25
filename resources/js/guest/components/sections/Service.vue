<template>
    <section class="service">
        <Gradient />
        <div class="service-heading">
            <h2>Come Funziona Unison</h2>
        </div>

        <div class="container-xl">
            <div class="row">
                <div class="col-12 service-cards">
                    <div class="service-card">
                        <div class="service-card_img">
                            <img src="../../../../images/service-1.svg" />
                        </div>
                        <div class="service-card_text">
                            <h4>Scegli il Musicista</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Aspernatur quibusdam sequi
                                beatae officia, qui expedita aliquam nesciunt
                                cumque illum quae.
                            </p>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-card_img">
                            <img src="../../../../images/service-2.svg" />
                        </div>
                        <div class="service-card_text">
                            <h4>Contatta il Musicista</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Aspernatur quibusdam sequi
                                beatae officia, qui expedita aliquam nesciunt
                                cumque illum quae.
                            </p>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-card_img">
                            <img src="../../../../images/service-3.svg" />
                        </div>
                        <div class="service-card_text">
                            <h4>Goditi la Musica</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Aspernatur quibusdam sequi
                                beatae officia, qui expedita aliquam nesciunt
                                cumque illum quae.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Gradient from "../Gradient.vue";
export default {
    name: "Service",
    components:{
        Gradient
    }

};
</script>

<style lang="scss" scoped>
.service {
    padding: 0px 0px 100px 0px;
    &-heading {
        margin-bottom: 50px;
        h2 {
            font-size: 50px;
            text-align: center;
            font-weight: bold;
            letter-spacing: 3px;
        }
    }

    &-cards {
        display: flex;
        justify-content: space-between;
        align-items: center;

        @media screen and (max-width: 991px) {
            flex-wrap: wrap;
        }
    }

    &-card {
        margin: 15px 5px;
        padding: 5px 10px;
        background: rgba(255, 255, 255, 0.27);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(6.2px);
        -webkit-backdrop-filter: blur(6.2px);
        border: 1px solid rgba(255, 255, 255, 0.26);
    }

    &-card_img {
        height: 350px;

        img {
            width: 100%;
            height: 100%;
        }
    }
    &-card_text {
        h4 {
            text-align: center;
        }
    }
}
</style>
