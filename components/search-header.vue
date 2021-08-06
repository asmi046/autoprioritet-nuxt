<template>
  <div class="header-bottom">
    <div class="container">
      <NuxtLink to="/" class="logo" />
      <div class="header-bottom__center">
        <div class="header-bottom__descr">
          <span class="head_search_title">Запчасти для иномарок в Курске</span>
          <a href="#" class="header-help">Помощь в подборе</a>
        </div>

        <form id="searchform" role="search" method="get" action="">
          <input id="s" v-model="trueSearchStr" type="text" placeholder="Введите артикул для поиска" name="search_code">
          <input id="searchsubmit" type="submit" value="" @click.prevent="searchDo">
        </form>

        <div class="header-user">
          <span>Здраствуйте - </span><span>Гость</span>
        </div>
      </div>

      <div class="header-left__buttons">
        <NuxtLink to="/" class="header-left-btn header-cart">
          <bascet-counter />
          Корзина
        </NuxtLink>
        <NuxtLink to="/" class="header-left-btn header-cabinet">
          Кабинет
        </NuxtLink>
        <span class="header-left-btn header-menu" @click.prevent="showMenu()">Меню</span>
      </div>
    </div>
  </div>
</template>

<style lang="stylus">

</style>

<script>
import bascetCounter from './bascetCounter.vue'
export default {
  components: { bascetCounter },
  data () {
    return {
      trueSearchStr: ''
    }
  },
  mounted () {
    this.trueSearchStr = this.$route.query.qs
  },
  methods: {
    searchDo ({ $router }) {
      this.$router.push({ path: '/search', query: { qs: this.trueSearchStr } })
    },

    async showMenu () {
      await this.$store.dispatch('chengeMenuState')
      console.log(this.$store)
    }
  }

}
</script>
