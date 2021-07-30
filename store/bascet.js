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
    const sevedBascet = localStorage.getItem('apBascet')
    const sevedCount = localStorage.getItem('apBascetCount')
    const sevedSumm = localStorage.getItem('apBascetSumm')

    if (sevedBascet !== null) { state.bascet = sevedBascet }
    if (sevedCount !== null) { state.bascetCount = sevedCount }
    if (sevedSumm !== null) { state.bascetSumm = sevedSumm }


    let addet = false
    for (let i = 0; i < state.bascet.length; i++) {
      if (state.bascet[i].sku === value.sku) {
        state.bascet[i].count += value.count
        state.bascetCount += value.count
        state.sevedSumm += parseFloat(value.price) * parseFloat(value.count) 
        addet = true
        break
      }
    }

    console.log(state.bascet)
    if (!addet) { state.bascet.push(value) }

    localStorage.setItem('apBascet', state.bascet)
  }

}

export const getters = {
  BASCET (state) {
    return state.bascet
  }
}
