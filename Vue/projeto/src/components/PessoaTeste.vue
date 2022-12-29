<template>
  <div>
    <h2>Esta é a descrição da pessoa {{ nome }}</h2>
    <PessoaInfo />

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
    };
  },
};
</script>
