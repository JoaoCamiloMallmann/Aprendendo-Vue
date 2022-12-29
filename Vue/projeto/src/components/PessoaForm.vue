<template>
  <form action="POST" @submit="enviarForm($event)">
    <div>
      <input type="text" v-model="nome" />
      <input type="text" v-model="email" />
      <input type="submit" />
    </div>
  </form>
</template>

<script>
export default {
  name: "PessoaForm",

  data() {
    return {
      nome: "",
      email: "",
    };
  },
  methods: {
    enviarForm(e) {
      e.preventDefault();

      let nome = this.nome;
      let email = this.email;

      console.log(nome);
      console.log(email);
      
    },
  },
};
</script>

<style scoped>
form {
  margin: 1rem;
}
</style>