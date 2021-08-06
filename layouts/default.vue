<template>
  <div>
    <header class="header">
      <info-header />
      <search-header />
      <menu-main />
    </header>

    <Nuxt />
    <foot />
  </div>
</template>

<style>

</style>

<script>
export default {
  mounted () {
    this.$store.dispatch('bascet/addAllBascetInStore')
  }
}
</script>
