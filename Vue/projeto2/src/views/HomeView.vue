<template>
  <Banner />
  <div class="mainContainer">
    <h1>Home</h1>

    <Formulario />
  </div>
</template>

<script>
import Banner from "../components/Banner.vue";
import Formulario from "../components/Formulario.vue";

export default {
  name: "HomeView",
  components: {
    Banner,
    Formulario,
  },
};
</script>
