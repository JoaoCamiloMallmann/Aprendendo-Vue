<template>
  <div id="banner">Make your burger</div>
</template>

<script>
export default {
  name: "Banner",
};
</script>

<style scoped>
#banner {
  background-image: url("../../public/img/burger.jpg");
  height: 500px;
  background-position: 0 -250px;
  background-repeat: no-repeat;
  background-size: cover;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  color: white;
  font-size: 30px;
  text-transform: uppercase;
}
</style>