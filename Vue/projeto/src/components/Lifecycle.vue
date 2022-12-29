<template>
  <h1>Esse é seu numero da sorte :{{ numero }}</h1>
</template>

<script>
export default {
  name: "LifeCycle",

  methods: {
    setaNumero() {
      this.numero = Math.ceil(Math.random() * 10);
    },
  },

  data() {
    return {
      numero: "",
    };
  },

  created() {
    this.numero = Math.ceil(Math.random() * 10);
  },

  mounted() {
    setTimeout(() => {
      this.numero = Math.ceil(Math.random() * 10);
    }, 3000);
  },
};
</script>
