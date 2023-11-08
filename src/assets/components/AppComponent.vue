<template>
  <div class="row">
    <div class="offset-3 col-6 align-self-center mb-3">
      <h3>Nasa Library!</h3>
      <SeekerComponent />
    </div>
  </div>
  <div class="row">
    <div class="col">
      <ResultsComponent />
    </div>
  </div>
</template>

<script>
import SeekerComponent from "./SeekerComponent.vue";
import ResultsComponent from "./ResultsComponent.vue";

export default {
  components: {ResultsComponent, SeekerComponent},
  setup() {
    let message = "Mundo!!";
    return {
      message,
    }
  }
};
</script>

<style></style>