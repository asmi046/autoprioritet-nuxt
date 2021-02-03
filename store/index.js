import axios from "axios";

export const state = () => ({
    contactsApiUrl: "https://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/forfrontend/v1/contacts",
    siteCurrentInfo:[],
    showMenu:false
});

export const mutations  = {
    getInformationFromAPI(state,siteOptionsData) {
        state.siteCurrentInfo = siteOptionsData;
    },

    menuState(state,siteOptionsData) {
        state.showMenu = !state.showMenu;
    }
}

export const getters = {

    getAdress(state) {
        return state.siteCurrentInfo.address;
    },

    getMenuState(state) {
        return state.showMenu;
    }
}

export const actions =  {
    async nuxtServerInit(context) {
        const siteDatApi = await axios.get(context.state.contactsApiUrl);
        context.commit("getInformationFromAPI",siteDatApi.data);
    },

    async chengeMenuState(context) {
        context.commit("menuState", true);
    }

} 