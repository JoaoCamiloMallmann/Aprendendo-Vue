<template>
  <div>
    <img :src="avatar" :alt="descricao" />
    <MudarImg @TrocarImg="TrocarLogo" />
  </div>
</template>

<script>
import MudarImg from "./MudarImg.vue";

export default {
  name: "PessoaFoto",
  data() {
    return {
      avatar: "/img/download.png",
      descricao: "iconeAvatar",
    };
  },
  components: {
    MudarImg,
  },
  methods: {
    TrocarLogo() {
      this.avatar = "/img/logo1.png";
    },
  },
};
</script>

<style>
img {
  border-radius: 8rem;
}
</style>