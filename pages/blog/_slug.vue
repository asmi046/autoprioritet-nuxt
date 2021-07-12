<template>
  <section class="text_section">
    <div class="container text_container">
      <breadcrumbs :rout-page="bcPatch" />
      <h1>{{ postContent.title.rendered }} 111</h1>
      <div class="postContentBlk" v-html="postContent.content.rendered" />
    </div>
  </section>
</template>

<script>
export default {

  async asyncData ({ params, $axios, route }) {
    const mass = params.slug.split('-')
    const id = mass[mass.length - 1]
    const postContent = await $axios.$get('https://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/wp/v2/posts/' + id)

    const bcPatch = []
    bcPatch.push({ title: 'Блог', lnk: '/blog' })
    bcPatch.push({ title: postContent.title.rendered, lnk: '/blog/' + params.slug })

    return { postContent, bcPatch }
  }

}
</script>

<style>

</style>
