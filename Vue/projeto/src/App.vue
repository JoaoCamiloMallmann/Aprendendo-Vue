<template>
  <div id="fundo">
    <PrimeiroComponente />
    <Lifecycle />

    <p>
      {{ dados }}
    </p>

    <PessoaTeste />
  </div>
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

<style>
body {
  background-color: darkslategray;
  color: white;
  margin: 0;
  padding: 0;
}
a {
  color: white;
}
</style>