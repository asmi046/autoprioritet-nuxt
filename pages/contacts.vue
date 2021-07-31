<template>
  <section class="contact_in_page">
    <div class="container text_container">
      <h1>Контакты</h1>
      <div id="map_in_page" />
    </div>
  </section>
</template>

<script>

export default {

  mounted () {
    this.$showmap('SHOW MAP')
  },
  head: {
    title: 'Контакты - Autoprioritet'

  }
}
</script>

<style>

</style>
