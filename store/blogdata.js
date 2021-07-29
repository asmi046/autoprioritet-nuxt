import axios from 'axios'

export const state = () => ({
  blog3elem: [],
  blog3elemUrl: 'http://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/forfrontend/v2/blogmaterial'

})

export const mutations = {

  SET_3_BLOGELEM (state, apiinfo) {
    state.blog3elem = apiinfo
  }
}

export const getters = {
  blogelem3: s => s.blog3elem
}

export const actions = {
  async get3blogelem (context) {
    const siteDatApi = await axios.get(context.state.blog3elemUrl)
    context.commit('SET_3_BLOGELEM', siteDatApi.data.posts)
  }
}
