<template>
  <div>
    <button @click="$emit('TrocarImg')">Trocar a imagem</button>
  </div>
</template>

<script>
export default {
  name: "MudarImg",

  emits: ["TrocarImg"],
};
</script>

<style>
</style>