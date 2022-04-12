<template>
    <footer>
        <div class="top">
            <div class="lorem col-4">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi quae quo quis, fugiat earum quasi cumque in delectus, nulla voluptatem, aperiam inventore numquam porro natus dolores? Nostrum quibusdam neque repellat eaque recusandae, odit iste distinctio magni assumenda culpa quos vel natus, numquam laborum. Soluta quo quibusdam quidem, suscipit ea neque!
            </div>
            <div class="link col-6">
                <ul class="col-4">
                    <h2>LINK</h2>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                </ul>
                <ul class="col-4">
                    <h2>LINK</h2>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                </ul>
                <ul class="col-4">
                    <h2>LINK</h2>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                    <li>ciaociaociao</li>
                </ul>
            </div>
        </div>
        
        <div class="bottom">
            Sede a Battipaglia, in Via le mani dal naso 45. Forza Roma sempre.
        </div>
    </footer>
</template>

<script>
export default {
    name:"Footer",
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
        justify-content: space-between;
    }

    .link{
        display: flex;
    }

    ul{
        list-style: none;
    }

    li{
        cursor: pointer;
        color: rgb(81, 81, 81);
    }

    li:hover{
        color: white;
    }

    .bottom{
        margin-top: 50px;
        font-size: 14px;
        text-align: center;
    }
</style>