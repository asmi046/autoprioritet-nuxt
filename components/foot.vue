<template>
    <footer class="footer">
        <div class="container">
            <div class="footer-block">
                <div class="logo logo_white" ></div>
                <ul class="ul-clean footer-menu">
                    <li><nuxt-link to="/">Подбор запчастей</nuxt-link></li>
                    <li><nuxt-link to="/">Каталог запчастей</nuxt-link></li>
                    <li><nuxt-link to="/">Полезные материалы</nuxt-link></li>
                    <li><nuxt-link no-prefetch :to="{path: '/contacts'}">Контакты</nuxt-link></li>
                    <!-- <li><a href="/contacts">Контакты</a></li> -->
                </ul>
            </div>

            <div class="footer-block footer-contacts">
                <a href="tel:+74712310799" class="footer-phone">+7 (4712) 310-799</a>
                <div class="footer-address">г. Курск ул. Суворовская д. 15, 1 этаж</div>
                    <ul class="ul-clean footer-soc">
                        <li><a href="" class = "soc_info soc_foot_inst"></a></li>
                        <li><a href="" class = "soc_info soc_foot_fb"></a></li>
                        <li><a href="" class = "soc_info soc_foot_vk"></a></li>
                    </ul>
                </div>
            </div>
    </footer>
</template>

<script>
export default {
    
}
</script>