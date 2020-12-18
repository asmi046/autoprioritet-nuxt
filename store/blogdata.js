import axios from "axios";

export const state = () => ({
     blog3elem:[],
     blog3elemUrl:"http://mixkur9v.beget.tech/wp-json/forfrontend/v1/blogmaterial",
       
});

export const mutations  = {

    SET_3_BLOGELEM(state, apiinfo) {
        state.blog3elem = apiinfo;
        
        console.log(state.blog3elem );
    }
}

export const getters = {
    blogelem3(state) {
        return state.blog3elem;
    }
}

export const actions =  {
    async get3blogelem (context) {
        const siteDatApi = await axios.get(context.state.blog3elemUrl);
        context.commit("SET_3_BLOGELEM",siteDatApi.data.posts);
    
    }
} 