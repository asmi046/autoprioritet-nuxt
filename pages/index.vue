<template>
  <div>
    <banner-main></banner-main>

    <section class="main-category">
      <div class="container">
        <h1>Запчасти для иномарок в наличии и под заказ1111</h1>
        <div class="text_blk">
          Мы рады Вас приветствовать в интернет магазине для автомобилистов «Автоприоритет»! Нашим основным направлением является розничная реализация запчастей,зимних и летних шин, колесных дисков и аксессуаров для автомобилей иностранного производства.
        </div>

        <main-tov-group></main-tov-group>

      </div>
    </section>

    <section class="marki_vendori">
      <div class="container">
        <vendors></vendors>
         <car-vendor></car-vendor>
      </div>
    </section>

    <blog-main/> 

  
  </div>
</template>

<script>
  export default {

    async fetch({store}) { 
       if (store.getters["blogdata/blogelem3"].length === 0)
        await store.dispatch("blogdata/get3blogelem");
    }
  }
</script>

<style>

</style>
