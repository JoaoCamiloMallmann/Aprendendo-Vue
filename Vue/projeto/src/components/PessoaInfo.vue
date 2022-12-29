<template>
  <div>
    <p v-if="esta_trabalhando">Estou trabalhando</p>
    <p v-else> Buscando por oportunidades</p>
    <ul>
      <li>Python</li>
      <li>Java</li>
      <li>HTML</li>
    </ul>
    <p v-show="mostrar_email"> EMail aqui </p>
  </div>
</template>

<script>
export default {
  name: "PessoaInfo",

  data() {
    return {
      esta_trabalhando: true,
      mostrar_email: false,
    };
  },
};
</script>

<style>
</style>