export const state = () => ({
  bascet: [],
  bascetCount: 0,
  bascetSumm: 0
})

export const actions = {
  addAllBascetInStore (ctx) {
    ctx.commit('addAllBascetInStore')
  },

  addTobascet (ctx, value) {
    ctx.commit('addTobascet', value)
  }
}

export const mutations = {
  addAllBascetInStore (state) {
    state.bascet = JSON.parse(localStorage.getItem('apBascet'))
    state.bascetCount = Number(localStorage.getItem('apBascetCount'))
    state.bascetSumm = localStorage.getItem('apBascetSumm')
  },

  addTobascet (state, value) {
    const sevedBascet = JSON.parse(localStorage.getItem('apBascet'))
    const sevedCount = Number(localStorage.getItem('apBascetCount'))
    const sevedSumm = localStorage.getItem('apBascetSumm')

    state.bascet = (sevedBascet !== null) ? sevedBascet : []
    if (sevedCount !== null) { state.bascetCount = sevedCount }
    if (sevedSumm !== null) { state.bascetSumm = parseFloat(sevedSumm) }

    let addet = false
    for (let i = 0; i < state.bascet.length; i++) {
      if (state.bascet[i].sku === value.sku) {
        state.bascet[i].count += Number(value.count)
        state.bascet[i].subtotal = parseFloat(value.price) * Number(value.count)
        addet = true
        break
      }
    }

    console.log(state.bascet)
    if (!addet) {
      value.subtotal = parseFloat(value.price) * Number(value.count)
      state.bascet.push(value)
    }

    state.bascetCount += Number(value.count)
    state.bascetSumm += parseFloat(value.price) * Number(value.count)

    localStorage.setItem('apBascet', JSON.stringify(state.bascet))
    localStorage.setItem('apBascetCount', state.bascetCount)
    localStorage.setItem('apBascetSumm', state.bascetSumm)
  }

}

export const getters = {
  BASCET (state) {
    return state.bascet
  },

  BASCET_COUNT (state) {
    return state.bascetCount
  },

  BASCET_SUMM (state) {
    return state.bascetSumm
  }

}
