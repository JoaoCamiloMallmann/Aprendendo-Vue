<template>
  <PrimeiroComponente />
  <Lifecycle />

  <p>
    {{ dados }}
  </p>

  <PessoaTeste />
</template>


<script>
import PrimeiroComponente from "./components/PrimeiroComponente.vue";
import Lifecycle from "./components/Lifecycle.vue";
import PessoaTeste from "./components/PessoaTeste.vue";

export default {
  name: "App",
  data() {
    return {
      dados: "sim",
    };
  },
  components: {
    PrimeiroComponente,
    Lifecycle,
    PessoaTeste,
  },
};
</script>