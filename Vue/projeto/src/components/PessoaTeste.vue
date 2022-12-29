<template>
  <div>
    <h2>Esta é a descrição da pessoa {{ nome }}</h2>
    <PessoaInfo :CompEmail="email" :esta_trabalhando="true" />

    <PessoaForm />
  </div>
</template>

<script>
import PessoaInfo from "./PessoaInfo.vue";
import PessoaForm from "./PessoaForm.vue";

export default {
  name: "PessoaTeste",
  components: {
    PessoaInfo,
    PessoaForm,
  },
  data() {
    return {
      nome: "João",
      email: "Joaozinho2@hotmail.com",
    };
  },
};
</script>
