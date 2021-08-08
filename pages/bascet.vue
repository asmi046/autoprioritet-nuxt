<template>
  <section class="contact_in_page">
    <div class="container text_container">
      <h1>Корзина</h1>
      <bascet-in-page />
    </div>
  </section>
</template>

<script>
import bascetInPage from '../components/bascetInPage.vue'

export default {
  components: { bascetInPage },
  head: {
    title: 'Корзина - Autoprioritet'
  }
}
</script>

<style>

</style>
