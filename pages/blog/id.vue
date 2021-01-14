<template>
    <section class = "text_section">
        <div class="container">
              <h1>           
              1111111
              </h1>           
            <!-- <h1>{{postContent.title.rendered}} 1111</h1>
            <div v-html="postContent.content.rendered" class  = "postContentBlk"></div>  -->

        </div>
    </section>
</template>

<script>
    export default {
        async asyncData (ctx) {
            
            const postContent = ";";
            return {postContent};
        },


    }
</script>

<style>

</style>