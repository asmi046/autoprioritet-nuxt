<template>
    <section class="main-blog">
        <div class="container">
            <h2 class="section-title">Полезные материалы</h2>
            <div class="main-blog__wrapper">
                <nuxt-link v-for="(item, index) in blogelems" :key="item.ID" to = "/" class="main-blog__item">
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
    data() {
          return {
            blogelems:[]
          }
    },

    async fetch() { 
          this.$store.dispatch("blogdata/get3blogelem");
          this.blogelems = await this.$store.state.blogdata.blog3elem;
        console.log("28");
        console.log(this.$store.state.blogdata);
    }, 
}
</script>