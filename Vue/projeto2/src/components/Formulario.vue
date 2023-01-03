<template>
  <span></span>
  <form action="POST" id="formulario">
    <div class="formularioParte">
      <label for="name"> Nome: </label>
      <input type="text" name="name" v-model="nome" />
    </div>

    <div class="formularioParte">
      <label for="pao"> Pão </label>
      <select name="pai" id="pao" v-model="pao">
        <option value="">Escolha um pão</option>
        <option value=""></option>
      </select>
    </div>

    <div class="formularioParte">
      <label for="carne"> Carne </label>
      <select name="pai" id="carne" v-model="carne">
        <option value="">Escolha um carne</option>
        <option value=""></option>
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
      nome: "",
      pao: "",
      carne: "",
    };
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