<template>
  <div class="d-flex justify-content-center flex-wrap">
    <template v-for="(item, index) in items" :key="index">
      <div class="card m-3" style="width: 18rem;">
        <img :src="item.image" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{ item.title }}</h5>
          <button class="btn btn-primary" @click="openModal(item)">Open</button>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
import {computed} from 'vue';
import {useStore} from "vuex";
import axios from "axios";
import { Modal } from "bootstrap";

export default {
  setup() {
    const store = useStore();
    const items = computed(() => store.state.items);

    store.subscribe((action, state) => {
      if (action.type === 'updateAsset' && state.asset.showModal) {
        const assetModal = new Modal("#assetModal");
        assetModal.show();
      }
    })

    const openModal = (item) => {
      store.commit('updateAsset', {...item, media: 'https://dummyimage.com/600x400/000/fff.png&text=+', showModal: false});

      axios.get('/api/asset/' + item.nasa_id).then(function (response) {
        store.commit('updateAsset', {...item, media: response.data[0], showModal: true});
      }).catch();
    }

    return {
      items,
      openModal,
    }
  }
}
</script>

<style scoped>

</style>