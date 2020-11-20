
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
              <li><a class="top-head-icon header_telega" :href="siteData.tele" ></a></li>
            </ul>
          </div>
          <a class="top-head-icon header_phone" :href="siteData.phonelnk">{{siteData.phone}}</a>
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
  async fetch() { 
    await this.$store.dispatch("sitedata/getInformation");
    this.siteData = this.$store.state.sitedata.sitedata;
    console.log(this.siteData);
  }
}

</script>
