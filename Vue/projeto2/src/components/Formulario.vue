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
      //opcionaisdata: "",

      nome: null,
      carne: "",
      pao: "",
      //   opcionais: [],

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
      //this.opcionaisdata = data.opcionais;
    },
    async setHamburguer(e) {
      e.preventDefault();
      let data = {
        nome: this.nome,
        carne: this.carne,
        pao: this.pao,
        status: this.status,
      };
      const dados = JSON.stringify(data);

      const req = await fetch("http://localhost:3000/burgers", {
        method: "POST",
        headers: { "Content-Type": "application JSON" },
        body: dados,
      });
      const res = await req.json();
      console.log(res);
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