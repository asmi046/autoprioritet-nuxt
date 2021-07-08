<template>
  <div v-show="showMenu" class="main-menu" />
</template>

<script>
export default {
  computed: {
    showMenu () {
      console.log(this.$store.getters.getMenuState)
      return this.$store.getters.getMenuState
    }
  }
}
</script>

<style>

</style>
