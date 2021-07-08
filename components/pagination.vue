<template>
  <div class="pagination-wrapper">
    <div v-for="(item, index) in pageCount" :key="index" class="pagination_elem">
      <nuxt-link v-if="trueCurrentPage != Number(index+1)" :to="'/blog/page/'+Number(index+1)">
        {{ index+1 }}
      </nuxt-link>
      <span v-else>{{ index+1 }} </span>
    </div>
  </div>
</template>

<script>
export default {
  props: ['totalCount', 'inpage', 'currentPage'],
  data () {
    return {
      pageCount1: 2
    }
  },
  computed: {
    trueCurrentPage () {
      return this.currentPage
    },
    pageCount () {
      return Math.ceil(this.totalCount / this.inpage)
    }
  }
}
</script>

<style>

</style>
