<template>
  <PrimeiroComponente />
  <LifeCycle />
</template>


<script>
import PrimeiroComponente from "./components/PrimeiroComponente.vue";
import LifeCycle from "./components/Lifecycle.vue"

export default {
  name: "App",
  components: {
    PrimeiroComponente,
    LifeCycle,
  },
};
</script>