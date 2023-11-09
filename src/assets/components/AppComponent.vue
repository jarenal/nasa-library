<template>
  <div class="container text-center">
    <div class="row">
      <div class="offset-3 col-6 align-self-center mb-3 mt-5">
        <h3 class="mb-5">Nasa Library Seeker!</h3>
        <SeekerComponent />
      </div>
    </div>
    <div class="row">
      <div class="col">
        <ResultsComponent />
      </div>
    </div>
  </div>
  <AssetModalComponent />
</template>

<script>
import SeekerComponent from "./SeekerComponent.vue";
import ResultsComponent from "./ResultsComponent.vue";
import AssetModalComponent from "./AssetModalComponent.vue";

export default {
  components: {ResultsComponent, SeekerComponent, AssetModalComponent},
};
</script>

<style></style>