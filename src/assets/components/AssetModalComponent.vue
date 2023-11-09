<template>
  <div id="assetModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ item.title}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div v-if="item.media_type === 'image'">
            <img :src="item.media" class="card-img-top" :alt="item.title">
          </div>
          <div v-if="item.media_type === 'video'">
            <video-player
              ref="myPlayer"
              :src="item.media"
              controls
              :volume="0.6"
              :width="400"
              :autoplay="true"
              @ready="onPlayerReady"
            />
          </div>
          <p class="mt-3">{{ item.description }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {computed,ref} from 'vue';
import {useStore} from "vuex";
import {VideoPlayer} from "@videojs-player/vue";
import videojs from "video.js";
const $ = require('jquery');

export default {
  components: {VideoPlayer},
  setup() {
    const store = useStore();
    const item = computed(() => store.state.asset);
    const playerRef = ref(null);

    const onPlayerReady = (event) => {
      playerRef.value = event.target;
    };

    const closeModal = () => {
      if (item.value.media_type === 'video') {
        const element = playerRef.value;
        const player = videojs(element);
        player.pause();
      }

      $('#assetModal').hide();
      $('.modal-backdrop.show').remove();
      const $body = $('body');
      $body.removeClass();
      $body.removeAttr('style');
    };

    return {
      item,
      closeModal,
      onPlayerReady,
    }
  }
}
</script>

<style scoped>

</style>