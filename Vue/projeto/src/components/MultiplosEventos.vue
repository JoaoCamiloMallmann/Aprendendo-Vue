<template>
  <div>
    <button @click="Primeiro($event), Segundo($event)">
      Multiplos eventos
    </button>
    <p>{{ multiplos }}</p>
  </div>
</template>

<script>
export default {
  name: "MultiplosEventos",
  data() {
    return {
      multiplos: "Valor 0",
    };
  },
  methods: {
    Primeiro() {
      this.multiplos = "Mudado o valor para 1";
    },
    Segundo() {
      setTimeout(() => {
        this.multiplos = "Mudado o valor para 2";
      }, 2000);
    },
  },
};
</script>

<style>
</style>