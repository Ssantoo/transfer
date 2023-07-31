import axios from 'axios'

export default {
//key-value로 적용 
     namespaced: true,
     state: {
       selectedLanguage: 'ENG',
       translations: {},
       languages: ['KOR', 'ENG', 'CHI'], 

     },
     mutations: {
       SET_LANGUAGE(state, language) {
         state.selectedLanguage = language
       },
       SET_TRANSLATIONS(state, translations) {
         state.translations = translations
       }
     },
     actions: {
         async changeLanguage({ commit, state }, language) {
         try {
             const response = await axios.get(process.env.VUE_APP_API_PRE_URL+ `/api/translations/${language}`)
            
             console.log('response.data!',response.data);

             commit('SET_LANGUAGE', language)
             commit('SET_TRANSLATIONS', response.data)

             console.log('language?',language);
           } catch (error) {
             console.error(error)
           }
         },
     },
     getters: {
         selectedLanguage: state => state.selectedLanguage,
     },
}

