import axios from "axios";

export const state = () => ({
    contactsApiUrl: "http://mixkur9v.beget.tech/wp-json/forfrontend/v1/contacts",
    siteCurrentInfo:[]
});

export const mutations  = {
    getInformationFromAPI(state,siteOptionsData) {
        state.siteCurrentInfo = siteOptionsData;
    }
}

export const getters = {

    getAdress(state) {
        return state.siteCurrentInfo.address;
    }
}

export const actions =  {
    async nuxtServerInit(context) {
        const siteDatApi = await axios.get(context.state.contactsApiUrl);
        context.commit("getInformationFromAPI",siteDatApi.data);
    }

} 