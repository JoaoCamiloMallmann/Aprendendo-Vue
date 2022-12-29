<template>
  <h1>meu nome é :{{ nome }}</h1>
</template>

<script>
export default {
  name: "LifeCycle",

  data() {
    return {
      nome: "ainda nao sei",
    };
  },
  created() {
    this.nome = "mario";
    this.olamundo();
  },
  mounted() {
    this.olamundo();
    setTimeout(() => {
      this.nome = "jose";
    }, 5000);
  },
  methods: {
    olamundo() {
      console.log("oi");
    },
  },
};
</script>
