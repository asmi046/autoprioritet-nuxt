import axios from 'axios'

export const state = () => ({
  siteCurrentInfo: [],
  showMenu: false,
  api_prefix: 'http://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/forfrontend/v2/'

})

export const actions = {
  async nuxtServerInit (context) {
    const siteDatApi = await axios.get(context.state.api_prefix + 'contacts')
    context.commit('getInformationFromAPI', siteDatApi.data)
  },

  chengeMenuState (context) {
    context.commit('menuState', true)
  }

}

export const mutations = {
  getInformationFromAPI (state, siteOptionsData) {
    state.siteCurrentInfo = siteOptionsData
  },

  menuState (state, siteOptionsData) {
    state.showMenu = !state.showMenu
  }
}

export const getters = {

  getAdress (state) {
    return state.siteCurrentInfo.address
  },

  getMenuState (state) {
    return state.showMenu
  },

  API_PREFIX (state) {
    return state.api_prefix
  }
}
