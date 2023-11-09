import { createStore } from "vuex";

const store = createStore({
    state() {
      return {
          items: [],
          asset: {
              nasa_id: '',
              title: '',
              description: '',
              media: '',
              media_type: '',
              showModal: false
          }
      }
    },
    mutations: {
        updateItems(state, items) {
            state.items = items;
        },
        updateAsset(state, asset) {
            state.asset = asset;
        }
    }
});

export default store;