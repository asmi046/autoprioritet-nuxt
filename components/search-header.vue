<template>
    <div class="header-bottom">
        <div class="container">
            <NuxtLink to = "/" class = "logo"></NuxtLink>
            <div class="header-bottom__center">
            
                <div class="header-bottom__descr">
                    <span class = "head_search_title">Запчасти для иномарок в Курске</span>              
                    <a href="#" class="header-help">Помощь в подборе</a>
                </div>
            
                <form role="search" method="get" id="searchform" action="http://mixkur9v.beget.tech/podbor-zapchastej/">
                    <input type="text" value="" placeholder="Введите артикул для поиска" name="search_code" id="s">
                    <input type="submit" id="searchsubmit" value="">
                </form>
            
                <div class="header-user">
                    <span>Здраствуйте - </span><span>Гость</span>
                </div>
            </div>
          
            <div class = "header-left__buttons" >
                <NuxtLink to="/" class="header-left-btn header-cart">Корзина</NuxtLink>
                <NuxtLink to="/" class="header-left-btn header-cabinet">Кабинет</NuxtLink>
            </div>
        </div>
      </div>
</template>

<style lang="stylus">

</style>

<script>
export default {
    
}
</script>