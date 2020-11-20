// import Vuex from "vuex";
// import axios from "axios";

//  const createStore = () => {
//     return new Vuex.Store ({
//         state: {
//             contactsApiUrl: "http://mixkur9v.beget.tech/wp-json/forfrontend/v1/contacts",
//             siteOptionsData: []
//         },
//         getters:{
//             siteOptionsData(state) {
//                 return state.siteOptionsData;
//             }
//         },
//         mutations: {
//             getInformationFromAPI(state,siteOptionsData) {
//                 state.siteOptionsData = siteOptionsData;
//            } 
//         },
//         actions: {
//             async getInformation (context) {
//                 const siteDat = await axios.get(context.state.contactsApiUrl);
//                 console.log("11");
//                 context.commit("getInformationFromAPI",siteDat.data);
//             }
//         } 

//     });
// };

// export default createStore;