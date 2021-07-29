
export const state = () => ({
  showGuestRR: true,
  consoledate: 1
})

export const mutations = {

  SH_GUEST (state) {
    state.showGuestRR = !state.showGuestRR
  }
}

export const getters = {
  showGuest1 (state) {
    return state.showGuestRR
  },

  ccd (state) {
    return state.consoledate
  }
}

export const actions = {

  // async getInformation (context) {
  //     const siteDat = await axios.get(context.state.contactsApiUrl);
  //     context.commit("getInformationFromAPI",siteDat.data);
  // },

  togglePhone (context) {
    context.commit('SH_GUEST', true)
  }
}
