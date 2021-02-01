<template>
    <section class = "text_section">
        <div class="container text_container">
            <breadcrumbs :rout-page = "bcPatch"></breadcrumbs>
            <h1>{{postContent.title.rendered}}</h1>
            <div v-html="postContent.content.rendered" class  = "postContentBlk">
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        
        async asyncData ({params, $axios, route}) {
             let mass = params["slug"].split("-");
             let id = mass[mass.length-1];
             const postContent = await $axios.$get("http://mixkur9v.beget.tech/wp-json/wp/v2/posts/"+id);
             
             const bcPatch = [];
             bcPatch.push({title:"Блог", lnk:"/blog"});
             bcPatch.push({title:postContent.title.rendered, lnk:"/blog/"+params["slug"]});
             
    
             return {postContent, bcPatch};
        }

    }
</script>

<style>

</style>