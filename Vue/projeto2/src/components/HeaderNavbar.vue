<template>
  <div id="nav">
    <router-link to="/" id="logoImg">
      <img :src="logo" :alt="alt" id="logo" />
    </router-link>

    <router-link to="/">Home</router-link>

    <router-link to="/Pedidos">Pedidos</router-link>
  </div>
</template>

<script>
export default {
  name: "Navbar",

  props: ["logo", "alt"],
};
</script>

<style scoped>
#nav {
  background-color: #222;
  border-bottom: 4px solid #111;
  padding: 15px 50px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}
#nav a {
  color: goldenrod;
  text-decoration: none;
  margin-left: 15px;
}
#nav a:hover {
  color: grey;
}

#nav #logoImg {
  margin: auto;
  margin-left: 0;
}
#logo {
  width: 40px;
  height: 40px;
}
</style>