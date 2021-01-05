<template>
    <section class="main-blog">
        <div class="container">
            <h2 class="section-title">Полезные материалы</h2>
            <div class="main-blog__wrapper">
                <!-- <nuxt-link v-for="(item, index) in blogElements" :key="index" :to = "'/blog/'+item.slug+'/?id='+item.ID" class="main-blog__item"> -->
                <nuxt-link v-for="(item, index) in blogElements" :key="index" 
                :to = "{
                        path: '/blog/'+item.slug,
                        query: { id: item.ID }
                    }" 
                class="main-blog__item">
                    <div class="main-blog__item-photo">
                        <img :src = "item.img">    
                    </div>
                    <h3 class="main-blog__item-title">{{item.title}}</h3>
                </nuxt-link>                
            </div>
        </div>
    </section>
</template>

<script>
export default {
    computed:{ 
        blogElements() {
            return this.$store.state.blogdata.blog3elem;
        }
    } 
}
</script>