export const state = () => ({
  bascet: [],
  bascetCount: 0,
  bascetSumm: 0
})

export const actions = {
  addTobascet (ctx, value) {
    ctx.commit('addTobascet', value)
  }
}

export const mutations = {
  addTobascet (state, value) {
    for (let i = 0; i < state.bascet.length; i++) {
      if (state.bascet[i].sku === value.sku) {
        state.bascet[i].count += value.count
        state.bascetCount += value.count
        return
      }
    }

    state.bascet.push(value)
  }

}

export const getters = {
  BASCET (state) {
    return state.bascet
  }
}
