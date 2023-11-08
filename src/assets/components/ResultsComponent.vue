<template>
  <div class="d-flex justify-content-center">
    <template v-for="(item, index) in items" :key="index">
      <div class="card m-3" style="width: 18rem;">
        <img src="https://dummyimage.com/200x150/000/fff.png" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{ item }}</h5>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Open</a>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
import {computed} from 'vue';
import {useStore} from "vuex";

export default {
  setup() {
    const store = useStore();
    const items = computed(() => store.state.items);

    return {
      items,
    }
  }
}
</script>

<style scoped>

</style>