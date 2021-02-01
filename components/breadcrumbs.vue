<template>
    <section>
        <div class="container brodContainer">
            <span>
                <nuxt-link to="/" class="mainpage">Главная</nuxt-link>
            </span>
            <span v-for="(item, index) in routPage" :key = "item.title">
                <nuxt-link v-if = "index < routPage.length-1"  :to="item.lnk" class="mainpage">{{item.title}}</nuxt-link>
                <span v-else>{{item.title}}</span>
            </span>
        </div>
    </section>
</template>

<script>
    export default {
        props: ["routPage"]
       
    }
</script>

<style>

</style>