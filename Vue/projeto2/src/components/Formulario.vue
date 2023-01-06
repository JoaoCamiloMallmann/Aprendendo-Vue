<template>
  <span></span>
  <form action="POST" id="formulario" @submit="setHamburguer">
    <div class="formularioParte">
      <label for="name"> Nome: </label>
      <input type="text" name="name" v-model="nome" />
    </div>

    <div class="formularioParte">
      <label for="pao"> Pão </label>
      <select name="pai" id="pao" v-model="pao">
        <option value="">Escolha um pão</option>
        <option v-for="pao in paes" :key="pao.id" :value="pao.tipo">
          {{ pao.tipo }}
        </option>
      </select>
    </div>

    <div class="formularioParte">
      <label for="carne"> Carne </label>
      <select name="pai" id="carne" v-model="carne">
        <option value="">Escolha um carne</option>
        <option v-for="carne in carnes" :key="carne.id" :value="carne.tipo">
          {{ carne.tipo }}
        </option>
      </select>
    </div>

    <div class="formularioParte">
      <button type="submit">Enviar</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "Formulario",
  data() {
    return {
      paes: "",
      carnes: "",

      nome: null,
      carne: "",
      pao: "",

      status: "Solicitado",
      msg: "",
    };
  },
  methods: {
    async getIngredientes() {
      const req = await fetch("http://localhost:3000/ingredientes");
      const data = await req.json();

      this.paes = data.paes;
      this.carnes = data.carnes;
    },
    async setHamburguer(e) {
      e.preventDefault();

      let data = {
        nome: this.nome,
        carne: this.carne,
        pao: this.pao,
        status: this.status,
      };

      axios
        .post("http://localhost:3000/burgers", data)
        .then(function (response) {
          console.log(response);
          document.getElementById("formulario").reset();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    
  },
  mounted() {
    this.getIngredientes();
  },
};
</script>

<style scoped>
#formulario {
  display: flex;
  flex-direction: column;
}

.formularioParte {
  display: flex;
  flex-direction: column;
  width: 50%;
  margin: 1rem 0;
}
</style>
