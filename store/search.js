export const state = () => ({
  searchString: ''

})

export const mutations = {

  SET_SEARCH_STRING (state, sstr) {
    state.searchString = sstr
  }
}

export const getters = {
  searchString: s => s.searchString
}

export const actions = {
  insetSearchStr (context, sstr) {
    context.commit('SET_SEARCH_STRING', sstr)
  }
}
