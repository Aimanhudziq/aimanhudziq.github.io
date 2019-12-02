import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
import CardApplicationFormStore from '../components/CardApplication/CardApplicationFormStore';
export default new Vuex.Store({
    modules:{
        cardapplication:CardApplicationFormStore
    }
});