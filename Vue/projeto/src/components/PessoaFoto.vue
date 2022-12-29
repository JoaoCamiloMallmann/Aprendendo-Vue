<template>
  <div>
    <img :src="avatar" :alt="descricao" />
  </div>
</template>

<script>
export default {
  name: "PessoaFoto",
  data() {
    return {
      avatar: "/img/download.png",
      descricao: "iconeAvatar",
    };
  },
};
</script>

<style>

img{
    border-radius: 8rem;
}
</style>