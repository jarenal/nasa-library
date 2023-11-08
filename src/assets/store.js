import { createStore } from "vuex";

const store = createStore({
    state() {
      return {
          items: []
      }
    },
    mutations: {
        updateItems(state, items) {
            state.items = items;
        }
    }
});

export default store;