export default {
  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: 'Автомобильные запчасти в Курске - Autoprioritet',
    script: [
      {
        src: '//api-maps.yandex.ru/2.1/?lang=ru_RU'
      }
    ],
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Запчасти для иномарок, шины, диски, аккумуляторные батареии и автомобильные аксессуары в Курске. У нас выгодные цены и бонусы для постоянных клиентов.' }
    ],
    link: [
      { rel: 'icon', type: 'image/png', sizes: '256x256', href: '/fav/icon256.png' },
      { rel: 'icon', type: 'image/png', sizes: '128x128', href: '/fav/icon128.png' },
      { rel: 'icon', type: 'image/png', sizes: '64x64', href: '/fav/icon64.png' },
      { rel: 'icon', type: 'image/png', sizes: '32x32', href: '/fav/icon32.png' },
      { rel: 'icon', type: 'image/png', sizes: '16x16', href: '/fav/icon16.png' },
      { rel: 'icon', type: 'image/svg+xml', sizes: 'any', href: '/fav/iconSVG.svg' },
      { rel: 'preconnect', href: 'https://fonts.gstatic.com' },
      { rel: 'stylesheet', type: 'text/css', href: 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=PT+Sans:wght@400;700&display=swap' }
    ]
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [
    '~/assets/style.css'
  ],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
    '~/plugins/map.client.js'
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    // '@nuxtjs/eslint-module'
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',

    '@nuxtjs/sitemap'
  ],

  sitemap: {
    gzip: true,
    routes: async () => {
      const axios = require('axios')
      const mapBlog = await axios.get('http://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/forfrontend/v2/sitemap')
      return mapBlog.data
    }

    // routes: [
    //   {
    //       url: "blog/samye-populyarnye-brendy-proizvodyashhie-zapchasti-v-raznyh-gruppah-7",
    //       changefreq: "daily",
    //       priority: 1,
    //       lastmod: "Fri, 22 Jan 21 06:20:01 +0000"
    //   },
    //   {
    //       url: "blog/kak-opredelit-poddelku-tormoznyh-kolodok-ate-7",
    //       changefreq: "daily",
    //       priority: 1,
    //       lastmod: "Fri, 22 Jan 21 06:20:01 +0000"
    //   }
    // ]
  },

  // Axios module configuration (https://go.nuxtjs.dev/config-axios)
  axios: {},

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
  }
}
