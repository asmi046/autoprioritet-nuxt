<template>
  <section class="main-blog">
    <div class="container">
      <h2 class="section-title">
        Полезные материалы
      </h2>
      <div class="main-blog__wrapper">
        <nuxt-link
          v-for="(item, index) in blogElements"
          :key="index"
          :to="'/blog/'+item.slug+'-'+item.ID"
          class="main-blog__item"
        >
          <blog-element :img="item.img" :title="item.title" />
        </nuxt-link>
      </div>
    </div>
  </section>
</template>

<script>
import blogElement from './blog-element.vue'
export default {
  components: { blogElement },
  computed: {
    blogElements () {
      return this.$store.state.blogdata.blog3elem
    }
  }
}
</script>
