<template>
  <main>
    <span>
      {{ CompEmail }}
    </span>
    <p v-if="esta_trabalhando">Estou trabalhando</p>
    <p v-else>Buscando por oportunidades, listar:</p>

    <ul>
      <li v-for="item in objetos" :key="item.id">
        {{ item.language }}
      </li>
    </ul>

    <hr />
    <p v-show="mostrar_email">EMail aqui</p>

    <div class="organizar">
      <a v-bind:href="meu_link"> <p>Click Aqui</p> </a>
      <PessoaFoto />

      <div>
        <button @click="showEmail">Click aqui</button>
      </div>
    </div>
  </main>
</template>

<script>
import PessoaFoto from "./PessoaFoto.vue";

export default {
  name: "PessoaInfo",

  data() {
    return {
      mostrar_email: false,
      meu_link: "https://runrun.it/pt-BR/boards/",
      lista: ["Python", "java", "HTML", "PHP"],
      objetos: [
        { id: 1, language: "Python" },
        { id: 2, language: "java" },
        { id: 3, language: "HTML" },
        { id: 4, language: "PHP" },
      ],
    };
  },
  props: {
    CompEmail: String,
    esta_trabalhando: Boolean,
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

<style scoped>
.organizar {
  display: flex;
  flex-direction: row;
}
</style>
