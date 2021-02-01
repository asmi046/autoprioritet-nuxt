<template>
  <div>
        <div class="main-blog__item-photo">
            <img :src = "img">    
        </div>
        
        <h3 class="main-blog__item-title">{{title}}</h3>
  </div>
</template>

<script>
    export default {
        props:["img","title"]
    }
</script>

<style>

</style>