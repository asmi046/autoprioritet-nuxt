<template>
  <div class = "pagination-wrapper">
      <div class = "pagination_elem" v-for="(item, index) in pageCount" :key="index" >
        <nuxt-link v-if = "trueCurrentPage != Number(index+1)"  :to ="'/blog/page/'+Number(index+1)">
            {{index+1}}
        </nuxt-link>
        <span v-else >{{index+1}} </span>
      </div>
  </div>
</template>

<script>
    export default {
        props:["totalCount", "inpage", "currentPage"],
        data () {
            return {
                pageCount1: 2
            }
        },
        computed:{
            trueCurrentPage: function() {
                return this.currentPage;
                
            },
            pageCount: function() {
                 return Math.ceil(this.totalCount / this.inpage);
                
            }
        }
    }
</script>

<style>

</style>