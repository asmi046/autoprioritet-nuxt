<template>
  <div class="counter">
    {{ count }}
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters({ count: 'bascet/BASCET_COUNT' })
  }
}
</script>

<style>

</style>
