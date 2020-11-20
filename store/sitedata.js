import axios from "axios";

export const state = () => ({
    contactsApiUrl: "http://mixkur9v.beget.tech/wp-json/forfrontend/v1/contacts",
    sitedata:[]
});

export const mutations  = {
    getInformationFromAPI(state,siteOptionsData) {
        state.sitedata = siteOptionsData;
    }
}

export const actions =  {
                async getInformation (context) {
                    const siteDat = await axios.get(context.state.contactsApiUrl);
                    context.commit("getInformationFromAPI",siteDat.data);
                }
            } 