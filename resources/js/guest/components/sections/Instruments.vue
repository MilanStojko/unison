<template>
    <section class="instruments">
        <div class="instruments-heading">
            <h2>Strumenti</h2>
        </div>
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-6 col-md-12 instruments-list">
                    <ul>
                        <li
                            v-for="(instrument, index) in instruments"
                            :key="index"
                        >
                            <a href="#">{{ instrument.name }}</a>
                        </li>
                    </ul>
                </div>
                <div
                    class="col-lg-6 col-md-12 instruments-image d-flex justify-content-center align-items-center"
                >
                    <img
                        src="../../../../images/Composer-rafiki.svg"
                        alt="Strumento"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Categories",

    data() {
        return {
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
        };
    },
};
</script>

<style lang="scss" scoped>
.instruments {
    padding: 100px 0px;
    position: relative;
    background-color: #f9e1f6;

    @media screen and(min-width: 2000px) {
        margin-top: 80px;
    }

    &-heading {
        margin-bottom: 50px;
        h2 {
            font-size: 50px;
            text-align: center;
            font-weight: bold;
            letter-spacing: 3px;
        }
    }

    &-image {
        z-index: 100;
        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }

    &-list {
        background: rgba(255, 255, 255, 0.27);
        // background: white;
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(6.2px);
        -webkit-backdrop-filter: blur(6.2px);
        border: 1px solid rgba(255, 255, 255, 0.26);
        z-index: 100;
        ul {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        li {
            list-style: none;
            margin: 20px 10px;
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;

            @media screen and (max-width: 1200px) {
                margin: 20px 5px;
            }

            @media screen and (max-width: 600px) {
                width: 80%;
                margin: 20px auto;
            }
        }

        a {
            color: #000;
            width: 100%;
            padding: 10px 20px;
            border: 2px solid #527a5a;
            border-radius: 20px;

            &:hover {
                text-decoration: none;
                color: #fff;
                background-color: #527a5a;
            }
        }
    }
}

.wave {
    width: 100%;
    position: absolute;
    top: 50%;
    left: 0;
    overflow: hidden;

    @media screen and (max-width: 991px) {
        top: 80%;
    }

    img {
        width: 100%;
        height: 100%;

        @media screen and (max-width: 2000px) {
            width: 2000px;
        }
    }
}
</style>
