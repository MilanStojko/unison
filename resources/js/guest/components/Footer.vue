<template>
    <footer>
        <div class="top">
            <div class="lorem col-lg-4 col-sm-12">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi quae quo quis, fugiat earum quasi cumque in delectus, nulla voluptatem, aperiam inventore numquam porro natus dolores? Nostrum quibusdam neque repellat eaque recusandae, odit iste distinctio magni assumenda culpa quos vel natus, numquam laborum. Soluta quo quibusdam quidem, suscipit ea neque!
            </div>
            <div class="col-lg-2"></div>
            <div class="link col-lg-6 col-sm-12">
                <ul class="col-4">
                    <h2>LINK</h2>
                    <li v-for="(link, index) in linkfooter1" :key="index">
                        <a href="">{{link.name}}</a>
                    </li>
                </ul>
                <ul class="col-4">
                    <h2>LINK</h2>
                    <li v-for="(link, index) in linkfooter2" :key="index">
                        <a href="">{{link.name}}</a>
                    </li>
                </ul>
                <ul class="col-4">
                    <h2>LINK</h2>
                    <li v-for="(link, index) in linkfooter3" :key="index">
                        <a href="">{{link.name}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bottom">
            Sede a Battipaglia, made by Group 6 Boolean.
        </div>
    </footer>
</template>

<script>
export default {
    name:"Footer",

    data() {
        return {
            linkfooter1: [
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
            ],
            linkfooter2: [
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
            ],
            linkfooter3: [
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
                {
                    name: "linklinklink",
                },
            ],
        };
    },
}
</script>

<style scoped>
    footer{
        padding: 60px;
        background: black;
        color: white;
    }

    .top{
        display: flex;
    }

    .link{
        display: flex;
    }

    ul{
        list-style: none;
    }

    a{
        color: rgb(81, 81, 81);
        text-decoration: none;
    }

    a:hover{
        color: white;
    }

    .bottom{
        margin-top: 50px;
        font-size: 14px;
        text-align: center;
    }

    @media only screen and (max-width: 1000px){
        .top{
            display: block;
        }

        .lorem{
            margin-bottom: 40px;
        }
    }
</style>