<template>
  <div class="counter">
    {{ count }}
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters({ count: 'bascet/BASCET_COUNT' })
  }
}
</script>

<style>
  .counter{
    position: absolute;
    font-size: 9px;
    background-color: red;
    color: white;
    width: 15px;
    height: 15px;
    text-align: center;
    line-height: 15px;
    right: 35%;
    top:-5px;
    border-radius: 10px;
  }
</style>
