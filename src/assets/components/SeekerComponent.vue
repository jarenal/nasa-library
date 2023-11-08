<template>
  <form @input="handleFormModified" @change="handleFormModified">
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="query" v-model="query">
      <button class="btn btn-secondary" @click="reset" :disabled="isDisabledResetButton">Cancel</button>
      <button class="btn btn-primary" @click="search" :disabled="isDisabledSearchButton">Search</button>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="" id="media-type-images" v-model="isImagesChecked">
      <label class="form-check-label" for="media-type-images">
        Images
      </label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="" id="media-type-audios" v-model="isAudiosChecked">
      <label class="form-check-label" for="media-type-audios">
        Audios
      </label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="" id="media-type-videos" v-model="isVideosChecked">
      <label class="form-check-label" for="media-type-videos">
        Videos
      </label>
    </div>
  </form>
</template>

<script>
import {ref} from "vue";
import {useStore} from "vuex";

export default {
  setup() {
    const store = useStore();
    const query = ref('');
    const isDisabledSearchButton = ref(true);
    const isDisabledResetButton = ref(true);
    const isImagesChecked = ref(false);
    const isAudiosChecked = ref(false);
    const isVideosChecked = ref(false);

    const search = (event) => {
      event.preventDefault();
      store.commit('updateItems', ["Photo 1","Photo 2", "Photo 3"]);
    };

    const handleFormModified = () => {
      if (query.value
          && (isImagesChecked.value
              || isAudiosChecked.value
              || isVideosChecked.value)) {
        isDisabledSearchButton.value = false;
      } else {
        isDisabledSearchButton.value = true;
      }

      isDisabledResetButton.value = false;
    };

    const reset = () => {
      event.preventDefault();
      query.value = '';
      isImagesChecked.value = false;
      isAudiosChecked.value = false;
      isVideosChecked.value = false;
      store.commit('updateItems', []);
    }

    return {
      query,
      search,
      isDisabledSearchButton,
      isDisabledResetButton,
      handleFormModified,
      isImagesChecked,
      isAudiosChecked,
      isVideosChecked,
      reset,
    }
  }
}
</script>

<style scoped>

</style>