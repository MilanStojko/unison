<template>
    <div class="container-xl">
        <!-- POP UP Message -->
        <div class="popup-message">
            <div class="popup-message_box">
                <div class="message-heading">Scrivi il tuo messaggio</div>
                <div class="message-body">
                    <form>
                        <input type="text" placeholder="Nome" />
                        <textarea
                            cols="30"
                            rows="10"
                            placeholder="Scrivi il tuo messaggio"
                        ></textarea>
                        <div class="cta text-center py-3">
                            <a href="#"
                                >Invia <i class="fa-solid fa-paper-plane"></i
                            ></a>
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
                    <h2>Hamza Bouzid</h2>
                    <img src="../../../images/jumbo-2.png" />

                    <div class="address">
                        <ul>
                            <li>
                                <i class="fa-solid fa-location-dot"></i> 123
                                Somewhere St. City, State
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <a href="callto:+39 345678987">+39 345678987</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                <a href="mailto:hamza@hamza.com"
                                    >hamza@hamza.com</a
                                >
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
                        <a @click="popup-message" href="#"
                            >Contattami <i class="fa-solid fa-envelope"></i
                        ></a>
                    </div>
                    <div class="bio">
                        <h2>Bio</h2>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the
                            release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing
                            software like Aldus PageMaker including versions of
                            Lorem Ipsum.
                        </p>
                    </div>
                    <div class="categorie-eventi">
                        <div class="categorie">
                            <h4>Categorie:</h4>
                            <ul>
                                <li>Cantante</li>
                                <li>Chitarrista</li>
                                <li>Pianista</li>
                                <li>Violinista</li>
                            </ul>
                        </div>

                        <div class="eventi">
                            <h4>Disponibilità:</h4>
                            <ul>
                                <li>Matrimoni</li>
                                <li>Natale</li>
                                <li>Compleanni</li>
                                <li>Locali</li>
                                <li>Pranzi</li>
                                <li>Festa Aziendale</li>
                                <li>Capodanno</li>
                                <li>Anniversario</li>
                                <li>Festa Privata</li>
                            </ul>
                        </div>
                    </div>
                    <div class="cv">
                        <a href="#" download
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
                        <h4>15 recensioni</h4>
                        <div class="music-notes">
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                        </div>
                    </div>

                    <div class="make-review">
                        <a href="">Lascia una recensione</a>
                    </div>
                </div>
                <div class="review">
                    <div class="review-head">
                        <h5>Marco</h5>
                        <div class="review-music_notes">
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                        </div>
                    </div>
                    <div class="review-body">
                        <span
                            ><i class="fa-solid fa-calendar-days"></i> 30 Marzo
                            2022</span
                        >
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                        </p>
                    </div>
                </div>
                <div class="review">
                    <div class="review-head">
                        <h5>Marco</h5>
                        <div class="review-music_notes">
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                            <img src="../../../images/music.svg" />
                        </div>
                    </div>
                    <div class="review-body">
                        <span
                            ><i class="fa-solid fa-calendar-days"></i> 30 Marzo
                            2022</span
                        >
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SingleMusician",
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
    align-items: center;
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

    .music-notes {
        img {
            width: 25px;
            height: auto;
            color: #527a5a;
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

.popup-message_box {
    width: 600px;
    background-color: #ededed;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;

    .message-heading {
        background-color: #2a2929;
        color: #fff;
        font-size: 20px;
        padding: 15px 0px;
        text-align: center;
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
    a {
        background-color: #527a5a;
        color: #fff;
        padding: 10px 20px;
        //border-radius: 20px;

        &:hover {
            text-decoration: none;
            background-color: #6aa275;
            -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
        }
    }
}
</style>
