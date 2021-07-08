
<template>
  <div class="header-top">
    <div class="container">
      <div class="header-contacts">
        <a href="" target="_blank" class="top-head-icon header-address">{{ siteData.address }}</a>
      </div>
      <a :href="siteData.emailto" class="top-head-icon header-email">{{ siteData.email }}</a>
      <div class="header-soc">
        <ul class="head_messendger">
          <li><a class="top-head-icon header_whatsapp" :href="siteData.whatsapp" /></li>
          <li> <a class="top-head-icon header_telega" :href="siteData.tele" @click.prevent="sPh" /></li>
        </ul>
      </div>
      <a v-show="gsow" class="top-head-icon header_phone" :href="siteData.phonelnk">{{ siteData.phone }}</a>
    </div>
  </div>
</template>

<style scoped>

</style>

<script>

export default {

  async fetch () {
    this.siteData = await this.$store.state.siteCurrentInfo
  },
  data () {
    return {
      siteData: []
    }
  },

  computed: {
    adress () {
      return this.$store.state.getAdress
    },

    gsow () {
      return this.$store.getters['sitedata/showGuest1']
    }
  },

  methods: {
    async sPh () {
      await this.$store.dispatch('sitedata/togglePhone')
    }
  }
}

</script>
