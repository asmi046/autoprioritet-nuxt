<template>
  <div id="bascet">
    <div>
      <table v-if="bascet.length > 0" class="bascet_page_table">
        <thead>
          <tr>
            <th class="name">
              Название
            </th>
            <th class="count">
              Количество
            </th>
            <th class="price">
              Цена
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index, key) in bascet">
            <td class="name">
              <div class="b_tov_name">
                {{ item.name }}
              </div>
              <div class="b_tov_sku">
                {{ item.sku }} {{ item.modtext }}
              </div>
            </td>
            <td class="counttd">
              <input v-model="item.count" type="number" min="0" @change="recalcBascet">
              <a href="#" class="dellproduct" @click.prevent="item.count = 0; recalcBascet()" />
            </td>
            <td class="price">
              <span class="subtotalprice">{{ item.subtotal }}</span>р
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td class="name">
              Итого:
            </td>
            <td>{{ bascetCount }}</td>
            <td class="price">
              <span class="totalprice">{{ bascetSumm }}</span>р
            </td>
          </tr>
        </tfoot>
      </table>
      <strong v-else class="bascet_empty_string">Ваша корзина пуста</strong>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  data () {
    return {
      company: '',
      inn: '',
      email: '',
      showRegPanel: false
    }
  },

  computed: {
    ...mapGetters({
      bascet: 'bascet/BASCET',
      bascetCount: 'bascet/BASCET_COUNT',
      bascetSumm: 'bascet/BASCET_SUMM'
    })
  },

  watch: {
    bascet (val) {
      this.recalcBascet()
    }
  },

  methods: {

    clearBascet () {
      this.bascetSumm = 0
      this.bascetCount = 0
      this.bascet = []

      localStorage.removeItem('cart')
      localStorage.removeItem('cartcount')
      localStorage.removeItem('cartsumm')
    },

    recalcBascet () {
    //   this.bascetSumm = 0
    //   this.bascetCount = 0
    //   for (let i = 0; i < this.bascet.length; i++) {
    //     this.bascet[i].subtotal = parseFloat((Number(this.bascet[i].count) * parseFloat(this.bascet[i].price)).toFixed(2))

    //     this.bascetSumm += parseFloat(this.bascet[i].subtotal)

    //     this.bascetCount += Number(this.bascet[i].count)

    //     if (this.bascet[i].count === 0) { this.bascet.splice(i, 1) }
    //   }

    //   this.bascetSumm = parseFloat(this.bascetSumm.toFixed(2))

    //   localStorage.setItem('cart', JSON.stringify(this.bascet))
    //   localStorage.setItem('cartcount', this.bascetCount)
    //   localStorage.setItem('cartsumm', this.bascetSumm)

      //   cart_recalc()

    //   if (this.bascetCount > 0) {
    //     eventBus.$emit('show-form')
    //   } else {
    //     eventBus.$emit('hide-form')
    //   }
    }
  }
}
</script>

<style>

</style>
