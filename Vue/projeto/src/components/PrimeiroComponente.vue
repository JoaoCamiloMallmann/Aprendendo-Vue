<template>
  <h1>Olá Vue</h1>
  <p>Meu nome é {{ nome }} e sou {{ trabalho }}</p>
</template>


<script>
export default {
  name: "PrimeiroComponente",

  data() {
    return {
      nome: "joao",
      trabalho: "Programador",
    };
  },
};
</script>
