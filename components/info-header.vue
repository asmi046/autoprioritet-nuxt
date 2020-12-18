
<template>
    <div class="header-top">
        <div class="container">
          <div class="header-contacts">
            <a href="" target="_blank" class="top-head-icon header-address">{{siteData.address}}</a>
          </div>
          <a :href="siteData.emailto" class="top-head-icon header-email">{{siteData.email}}</a>
          <div class="header-soc">
            <ul class="head_messendger">
              <li><a class="top-head-icon header_whatsapp" :href="siteData.whatsapp" ></a></li>
              <li> <a @click.prevent = "sPh"  class="top-head-icon header_telega" :href="siteData.tele" ></a></li>
            </ul>
          </div>
          <a v-show="gsow" class="top-head-icon header_phone" :href="siteData.phonelnk">{{siteData.phone}}</a>
        </div>
       
    </div>
</template>

<style scoped>

</style>

<script>

export default {
    data () {
    return {
      siteData:[],
    }
  },
  
  computed:{
    adress () {
      return this.$store.state.getAdress;
    },

    gsow() {
      console.log(this.$store.getters);
      return this.$store.getters["sitedata/showGuest1"];
    }
  },

   async fetch() { 
     this.siteData = await this.$store.state.siteCurrentInfo;
     console.log(this.siteData);
   },

  methods:{
   async sPh() {
     console.log(this.$store.getters);
     console.log(this.$store.state);
      this.$store.dispatch("sitedata/togglePhone");
    }
  }
}

</script>
