<template>
    <div class="jumbo">
        <div class="jumbo-overlay"></div>
        <div class="container">
            <div class="row jumbo-content">
                <div class="col-lg-6 col-sm-12 jumbo-text">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard
                    </p>
                </div>
                <div class="col-lg-6 col-md-12 jumbo-form">
                    <input type="text" placeholder="Cerca Musicista" />
                    <button>Cerca</button>
                </div>
            </div>
            <div class="jumbo-social">
                <a href="#"
                    ><img
                        src="../../../../images/app-store.png"
                        alt="Scarica dall'App Store"
                /></a>
                <a href="#"
                    ><img
                        src="../../../../images/googleplay.png"
                        alt="Scarica dal Play Store"
                /></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Jumbo",
};
</script>

<style lang="scss" scoped>
.jumbo {
    background-color: #000;
    background-image: url("../../../../images/jumbo-1.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    color: rgb(226, 226, 226);

    width: 100%;
    height: calc(100vh - 50px);
    backface-visibility: hidden;
    animation-name: slideBg;
    animation-duration: 30s;
    animation-timing-function: step-start;
    animation-iteration-count: infinite;
    position: relative;

    &-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.6);
    }

    &-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        justify-content: space-between;
        align-items: center;

        @media screen and (max-width: 2000px) {
            width: 1140px;
        }

        @media screen and (max-width: 1200px) {
            width: 80%;
        }
    }

    &-text {
        p {
            font-size: 40px;
            font-weight: bold;
            letter-spacing: 1px;

            @media screen and (max-width: 2000px) {
                font-size: 30px;
            }
        }
    }

    &-form {
        display: flex;
        justify-content: center;
        align-items: center;

        input {
            width: 80%;
            padding: 10px 20px;
            border: none;
            outline: none;
            border-radius: 20px 0px 0px 20px;
        }

        button {
            background-color: #537a5a;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 0px 20px 20px 0px;
            transition: all 0.2s linear;

            &:hover {
                background-color: #3d5e43;
            }
        }
    }

    &-social {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 20px;

        img {
            width: 150px;
            cursor: pointer;
            transition: all 0.3s linear;

            &:hover {
                transform: scale(1.05) translateY(-2px);
            }
        }
    }
}

@keyframes slideBg {
    0% {
        background-image: url("../../../../images/jumbo-1.jpg");
    }

    20% {
        background-image: url("../../../../images/jumbo-2.png");
    }
    40% {
        background-image: url("../../../../images/jumbo-6.jpg");
    }
    60% {
        background-image: url("../../../../images/jumbo-4.jpg");
    }
    80% {
        background-image: url("../../../../images/jumbo-5.jpg");
    }

    100% {
        background-image: url("../../../../images/jumbo-1.jpg");
    }
}
</style>
