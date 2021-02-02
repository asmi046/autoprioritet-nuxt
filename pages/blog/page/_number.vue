<template>
    <section class = "blog_section">
        <div class="container category_container">
            <breadcrumbs :rout-page = "bcPatch"></breadcrumbs>

            <h1>Полезные материалы</h1>
            
            <div class="main-blog__wrapper page-blog__wrapper">
                <nuxt-link v-for="(item, index) in blogData" :key="index" 
                :to = "'/blog/'+item.slug+'-'+item.id" 
                class="main-blog__item">
                    <blog-element :img = "item.featured_image_url" :title="item.title.rendered"></blog-element>
                </nuxt-link>
            </div>
            <pagination :total-count = "totalCount" :inpage = "inPage" :current-page = "currentPage"></pagination>
        </div>
    </section>
</template>

<script>
    export default {
        async asyncData({params, $axios, route}) {
            const currentPage = params["number"];
            const inPage = 9;
            const postContent = await $axios.get("https://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/wp/v2/posts/?categories=16&per_page="+inPage+"&page="+params["number"]);
            
            const bcPatch = [];
            bcPatch.push({title:"Блог", lnk:"/blog"});
            bcPatch.push({title:"Страница # "+currentPage, lnk:"/blog/page/"+currentPage});

            const blogData = postContent.data; 
           
            const totalCount = postContent.headers["x-wp-total"]; 
            return {blogData, totalCount, inPage, currentPage, bcPatch};
        },
    }
</script>

<style>

</style>