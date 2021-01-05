<template>
    <section class = "text_section">
        <div class="container">
            <h1>{{postContent.data.title.rendered}}</h1>
            <div v-html="postContent.data.content.rendered" class  = "postContentBlk">
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        async asyncData ({route, $axios}) {
             const postContent = await $axios.get("http://mixkur9v.beget.tech/wp-json/wp/v2/posts/"+route.query["id"]);
           
             return {postContent};
        }

    }
</script>

<style>

</style>