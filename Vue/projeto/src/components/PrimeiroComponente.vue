<template>
  <h1>Vue - Framework</h1>
  <p>Esse site foi feito por {{ nome }} para ser aplicado em futuros projetos da  {{ trabalho }}</p>
</template>


<script>
export default {
  name: "PrimeiroComponente",

  data() {
    return {
      nome: "Joao",
      trabalho: "Liquid",
    };
  },
};
</script>
