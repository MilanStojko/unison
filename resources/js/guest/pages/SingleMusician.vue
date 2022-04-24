<template>
    <div class="container-xl">
        <!-- POP UP Message -->
        <div class="popup-message" :class="{ 'display-block': popupMessage }">
            <div class="popup-message_box">
                <div class="message-heading">
                    <h3>Scrivi il tuo messaggio</h3>
                    <div @click="popupMessage = false" class="close-popup">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <div class="message-body">
                    <form @submit.prevent="sendMessage()">
                        <input
                            type="text"
                            placeholder="Nome"
                            v-model="messageData.name"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Cognome"
                            v-model="messageData.surname"
                            required
                        />
                        <input
                            type="email"
                            placeholder="Email"
                            v-model="messageData.email"
                            required
                        />
                        <input
                            type="tel"
                            placeholder="Cellulare"
                            v-model="messageData.cellphone"
                        />
                        <textarea
                            cols="30"
                            rows="10"
                            placeholder="Scrivi il tuo messaggio"
                            v-model="messageData.content"
                            required
                        ></textarea>
                        <div class="cta text-center py-3">
                            <button type="submit" class="px-5">
                                Invia Messagio
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- POP UP Review -->
        <div class="popup-message" :class="{ 'display-block': popupReview }">
            <div class="popup-review_box">
                <div class="message-heading">
                    <h3>Scrivi la tua recensione</h3>
                    <div @click="popupReview = false" class="close-popup">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <div class="message-body">
                    <form @submit.prevent="addReview()">
                        <input
                            id="username"
                            type="text"
                            placeholder="Username"
                            v-model="reviewData.username"
                            required
                        />
                        <textarea
                            id="content"
                            cols="30"
                            rows="10"
                            placeholder="Scrivi la tua recensione"
                            v-model="reviewData.content"
                        ></textarea>
                        <!--Emoji Rating-->
                        <div id="full-stars-example">
                            <p>Valutazione:</p>
                            <div class="rating-group">
                                <label
                                    aria-label="1 star"
                                    class="rating__label"
                                    for="rating-1"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-1"
                                    value="1"
                                    v-model="reviewData.vote"
                                    type="radio"
                                />
                                <label
                                    aria-label="2 stars"
                                    class="rating__label"
                                    for="rating-2"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-2"
                                    value="2"
                                    v-model="reviewData.vote"
                                    type="radio"
                                />
                                <label
                                    aria-label="3 stars"
                                    class="rating__label"
                                    for="rating-3"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-3"
                                    value="3"
                                    v-model="reviewData.vote"
                                    type="radio"
                                />
                                <label
                                    aria-label="4 stars"
                                    class="rating__label"
                                    for="rating-4"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-4"
                                    value="4"
                                    v-model="reviewData.vote"
                                    type="radio"
                                    checked
                                />
                                <label
                                    aria-label="5 stars"
                                    class="rating__label"
                                    for="rating-5"
                                    ><i
                                        class="rating__icon rating__icon--star fa-solid fa-music"
                                    ></i
                                ></label>
                                <input
                                    class="rating__input"
                                    name="rating"
                                    id="rating-5"
                                    value="5"
                                    v-model="reviewData.vote"
                                    type="radio"
                                />
                            </div>
                        </div>
                        <!--Emoji Rating Ends-->
                        <div class="cta text-center py-3">
                            <button type="submit" class="px-5">
                                Invia <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Single Musician -->
        <div class="singleMusician">
            <!-- Single Musician Profile -->
            <div class="singleMusician-profile">
                <div class="singleMusician-profile_left">
                    <h2>{{ user.name }} {{ user.surname }}</h2>
                    <img v-if="user.avatar" :src="`/storage/${user.avatar}`" />
                    <img
                        v-else
                        src="../../../images/image-not-found.png"
                        alt=""
                    />

                    <div class="address">
                        <ul>
                            <li v-if="user.address">
                                <i class="fa-solid fa-location-dot"></i>
                                {{ user.address }}
                            </li>
                            <li v-else>
                                <i class="fa-solid fa-location-dot"></i>
                                -
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <a
                                    v-if="user.cellphone"
                                    href="callto:+39 345678987"
                                    >{{ user.cellphone }}</a
                                >
                                <span v-else> - </span>
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                <a href="mailto:hamza@hamza.com">{{
                                    user.email
                                }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="social">
                        <a href="#"
                            ><i class="fa-brands fa-instagram-square"></i
                        ></a>
                        <a href="#"
                            ><i class="fa-brands fa-facebook-square"></i
                        ></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="singleMusician-profile_right">
                    <div class="cta">
                        <button @click="popupMessage = true">
                            Contattami <i class="fa-solid fa-envelope"></i>
                        </button>
                    </div>
                    <div class="bio">
                        <h2>Bio</h2>
                        <p>
                            {{ user.bio }}
                        </p>
                    </div>
                    <div class="categorie-eventi">
                        <div class="categorie">
                            <h4>Categorie:</h4>
                            <ul>
                                <li
                                    v-for="category in user.categories"
                                    :key="category.slug"
                                >
                                    {{ category.name }}
                                </li>
                            </ul>
                        </div>

                        <div class="eventi">
                            <h4>Disponibilità:</h4>
                            <ul>
                                <li
                                    v-for="availability in user.availabilities"
                                    :key="availability.slug"
                                >
                                    {{ availability.name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="cv">
                        <a v-if="user.cv" :href="`/storage/${user.cv}`" download
                            ><i class="fa-solid fa-file-arrow-down"></i> Scarica
                            CV</a
                        >
                    </div>
                </div>
            </div>
            <!-- Single Musician Reviews -->
            <div class="singleMusician-reviews">
                <div class="singleMusician-reviews_heading">
                    <div class="d-flex align-items-center">
                        <h4 v-if="user.reviews">
                            {{ user.reviews.length }} recensioni
                        </h4>
                        <div class="notes big-notes">
                            <div
                                class="notes_inner"
                                :class="starsWidth(avarageVote)"
                            ></div>
                        </div>
                    </div>

                    <div
                        v-if="auth_id != checkUserIdReview()"
                        class="make-review"
                    >
                        <button @click="popupReview = true">
                            Lascia una recensione
                        </button>
                    </div>
                </div>
                <div v-if="user.reviews">
                    <div
                        v-for="(review, index) in user.reviews
                            .slice()
                            .reverse()"
                        :key="index"
                        class="review"
                    >
                        <div class="review-head">
                            <h5>{{ review.username }}</h5>
                            <div class="notes">
                                <div
                                    class="notes_inner"
                                    :class="starsWidth(review.vote)"
                                ></div>
                            </div>
                        </div>
                        <div class="review-body">
                            <span
                                ><i class="fa-solid fa-calendar-days"></i>
                                {{ getDate(review.created_at) }}</span
                            >
                            <p>
                                {{ review.content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SingleMusician",

    data() {
        return {
            popupMessage: false,
            popupReview: false,
            reviewVotes: [],
            avarageVote: "",
            user: {},
            id_user: null,
            auth_id: document
                .querySelector("meta[name='user-id']")
                .getAttribute("content"),
            reviewData: {
                username: "",
                content: "",
                vote: 3,
                user_id: null,
            },
            messageData: {
                name: "",
                surname: "",
                cellphone: "",
                email: "",
                content: "",
                user_id: null,
            },
        };
    },
    methods: {
        getDate: function (date) {
            return new Date(date).toLocaleDateString("it", {
                year: "numeric",
                month: "long",
                day: "numeric",
            });
        },
        starsWidth: function (numero) {
            return "starFill" + numero;
        },

        addReview: function () {
            this.checkUserIdReview();
            axios
                .post(`/api/review/postReview/`, this.reviewData)
                .then((response) => {
                    this.popupReview = false;
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error.response.data);
                });
        },
        sendMessage: function () {
            this.checkUserIdMessage();
            axios
                .post(`/api/message/postMessage/`, this.messageData)
                .then((response) => {
                    this.popupMessage = false;
                    console.log(response);
                    console.log("messagio Inviato");
                })
                .catch((error) => {
                    console.log(error.response.data);
                });
        },

        GetVote: function () {
            axios
                .get(`/api/review/vote/`, {
                    params: {
                        userid: this.id_user,
                    },
                })
                .then((response) => {
                    this.reviewVotes = response.data;
                    if (this.reviewVotes.length <= 0) {
                        this.avarageVote = 0;
                    } else {
                        const votes = this.reviewVotes.map((vote) => {
                            return vote.vote;
                        });
                        console.log(votes);

                        const average = (arr) =>
                            arr.reduce((a, b) => a + b, 0) / arr.length;

                        this.avarageVote = Math.round(average(votes));
                        console.log("Avarage" + " " + this.avarageVote);
                        console.log("Musicista id" + " " + this.id_user);
                    }
                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
        },

        checkUserIdReview: function () {
            return (this.reviewData.user_id = this.user.id);
        },
        checkUserIdMessage: function () {
            return (this.messageData.user_id = this.user.id);
        },
    },
    created() {
        axios
            .get(`/api/users/show/${this.$route.params.slug}`)
            .then((response) => {
                if (response) {
                    this.user = response.data;
                    this.id_user = response.data.id;
                } else {
                    this.$router.push({ name: "page-404" });
                }
            })
            .catch((error) => {
                this.$router.push({ name: "page-404" });
                console.log(error);
            });

        setTimeout(() => {
            this.GetVote();
        }, 500);
    },
};
</script>

<style lang="scss" scoped>
li {
    list-style: none;
}
.singleMusician {
    -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}

// Personal Info
.singleMusician-profile {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    margin-top: 50px;
    padding-bottom: 50px;

    &_left {
        width: 30%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: #ededed;
        padding: 10px 0px;

        h2 {
            color: #2a2929;
            margin-top: 20px;
            font-weight: bold;
        }

        img {
            margin: 20px 0px;
            width: 80%;
            height: 300px;
            object-fit: cover;
            border-radius: 30px;
        }

        .address {
            li {
                margin: 15px 0px;
            }

            a {
                color: #2a2929;

                &:hover {
                    text-decoration: none;
                }
            }

            i {
                margin-right: 10px;
            }
        }

        .social {
            margin: 20px 0px;
            a {
                color: #2a2929;
                transition: all 0.2s linear;

                &:first-child:hover {
                    color: #bb366c;
                }
                &:nth-child(2):hover {
                    color: #395693;
                }
                &:nth-child(3):hover {
                    color: #0870a2;
                }
            }

            i {
                font-size: 30px;
                margin: 0px 10px;
            }
        }
    }

    &_right {
        width: 70%;
        padding: 10px 20px;

        h2,
        h4 {
            color: #527a5a;
            font-weight: bold;
            font-size: 30px;
        }

        .bio {
            margin-bottom: 50px;
            min-height: 300px;

            p {
                word-break: break-all;
                white-space: pre-wrap;
            }
        }

        .categorie-eventi {
            display: flex;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .categorie {
            margin-right: 100px;
        }

        .cv {
            a {
                font-size: 18px;
                color: #2a2929;

                &:hover {
                    color: #527a5a;
                    text-decoration: none;
                }
            }
        }
    }
}
// Reviews
.singleMusician-reviews {
    padding: 20px;

    &_heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 1px solid #ededed;

        h4 {
            margin-bottom: 0px;
            font-weight: bold;
            color: #5b5b5b;
            margin-right: 10px;
        }
    }

    .review {
        background-color: #ededed;
        padding: 10px;
        width: 80%;
        margin: 30px auto;
        -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);

        &-head {
            display: flex;
            justify-content: space-between;
            align-items: center;

            h5 {
                font-weight: bold;
            }
        }

        &-body {
            span {
                display: block;
                padding: 10px 0px;
                border-bottom: 1px solid #c6c6c6;
            }

            p {
                padding: 10px 0px;
            }
        }

        &-music_notes {
            img {
                width: 20px;
                height: auto;
                color: #527a5a;
            }
        }
    }
}

//POP UP Message
.popup-message,
.popup-review {
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 2000;
    display: none;
}

.popup-message_box,
.popup-review_box {
    width: 600px;
    background-color: #ededed;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    animation: pop-up 0.3s linear;

    .message-heading {
        background-color: #2a2929;
        color: #fff;
        font-size: 20px;
        padding: 15px 0px;
        text-align: center;
        position: relative;

        h3 {
            margin-bottom: 0px;
        }

        .close-popup {
            background-color: rgba(210, 36, 36, 0.438);
            color: #fff;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border-radius: 50%;
            position: absolute;
            top: -10px;
            right: -10px;
            cursor: pointer;

            &:hover {
                background-color: rgb(210, 36, 36);
            }
        }
    }

    .message-body {
        form {
            display: flex;
            flex-direction: column;
            padding: 15px;

            input,
            textarea {
                margin: 10px 0px;
                border: none;
                border-bottom: 1px solid #c6c6c6;
                background-color: #ededed;
                outline: none;
            }
        }
    }
}

// Buttons
.cta,
.make-review {
    text-align: right;
    button {
        background-color: #527a5a;
        color: #fff;
        padding: 10px 20px;
        border: none;
        //border-radius: 20px;

        &:hover {
            text-decoration: none;
            background-color: #6aa275;
            -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
        }
    }
}

.display-block {
    display: block;
}

// Animation
@keyframes pop-up {
    0% {
        transform: translate(-50%, -50%) scale(0);
    }

    100% {
        transform: translate(-50%, -50%) scale(1);
    }
}

// Review Rating
#full-stars-example {
    p {
        margin-bottom: 0px;
        color: #999;
    }
    
    .rating-group {
        display: inline-flex;
    }

    .rating__icon {
        pointer-events: none;
    }

    .rating__input {
        position: absolute !important;
        left: -9999px !important;
    }

    .rating__label {
        cursor: pointer;
        padding: 0 0.1em;
        font-size: 2rem;
    }

    .rating__icon--star {
        color: #527a5a;
    }

    .rating__icon--none {
        color: #eee;
    }

    .rating__input:checked ~ .rating__label .rating__icon--star {
        color: #ccc;
    }

    .rating-group:hover .rating__label .rating__icon--star {
        color: #527a5a;
    }

    .rating__input:hover ~ .rating__label .rating__icon--star {
        color: #ccc;
    }

    .rating-group:hover
        .rating__input--none:not(:hover)
        + .rating__label
        .rating__icon--none {
        color: #ededed;
    }
}

.feedback {
    max-width: 360px;
    background-color: #ededed;
    width: 100%;
    padding: 30px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-items: center;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
}

.make_review-rating {
    display: flex;
    justify-content: center;
    padding: 20px 0px;
}
</style>
