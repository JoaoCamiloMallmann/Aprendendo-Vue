<template>
  <h1>Vue - Framework</h1>
  <p>
    Esse site foi feito por {{ nome }} para ser aplicado em futuros projetos da
    {{ trabalho }}
  </p>
  <MultiplosEventos />
</template>


<script>
import MultiplosEventos from "./MultiplosEventos.vue";

export default {
  name: "PrimeiroComponente",

  components: {
    MultiplosEventos,
  },
  data() {
    return {
      nome: "Joao",
      trabalho: "Liquid",
    };
  },
};
</script>
