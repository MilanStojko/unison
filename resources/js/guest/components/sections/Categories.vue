<template>
    <section class="events">
        <div class="events-heading">
            <h2>Eventi</h2>
        </div>
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-6 col-md-12 events-image d-flex justify-content-center align-items-center"
                >
                    <img src="../../../../images/band.jpg" alt="Evento" />
                </div>
                <div class="col-lg-6 col-md-12 events-list">
                    <ul>
                        <li v-for="(event, index) in events" :key="index">
                            <a href="#">{{ event.name }}</a>
                        </li>
                    </ul>
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
        };
    },
};
</script>

<style lang="scss" scoped>
.container {
    max-width: 1200px;
    margin: 0 auto;
}
.events {
    padding: 100px 0px;
    &-heading {
        margin-bottom: 50px;
        h2 {
            font-size: 50px;
            text-align: center;
        }
    }

    .events-image {
        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }

    .events-list {
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
        }

        a {
            color: #000;
            width: 100%;
            padding: 10px 20px;
            border: 2px solid #bd5db7;

            &:hover {
                text-decoration: none;
                color: #fff;
                background-color: #bd5db7;
            }
        }
    }
}
</style>
