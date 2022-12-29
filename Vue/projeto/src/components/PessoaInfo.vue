<template>
  <div>
    <p v-if="esta_trabalhando">Estou trabalhando</p>
    <p v-else>Buscando por oportunidades</p>
    <ul>
      <li>Python</li>
      <li>Java</li>
      <li>HTML</li>
    </ul>
    <p v-show="mostrar_email">EMail aqui</p>

    <a v-bind:href="meu_link"> <p>Click Aqui</p> </a>

    <PessoaFoto />

    <div>
      <button @click="showEmail">Click aqui</button>
    </div>
  </div>
</template>

<script>
import PessoaFoto from "./PessoaFoto.vue";

export default {
  name: "PessoaInfo",

  data() {
    return {
      esta_trabalhando: true,
      mostrar_email: false,
      meu_link: "https://runrun.it/pt-BR/boards/",
    };
  },
  components: {
    PessoaFoto,
  },
  methods: {
    showEmail() {
      this.mostrar_email = !this.mostrar_email;
    },
  },
};
</script>

<style>
</style>