<template>
  <Navbar :logo="logoSite" :alt="altSite" />

  <router-view />

  <Footer />
</template>

<script>
import Footer from "./components/Footer.vue";
import Navbar from "./components/HeaderNavbar.vue";

export default {
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      logoSite: "/img/logo.png",
      altSite: "LogoDoSite",
    };
  },
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.mainContainer {
  margin: 50px;
  min-height: 200px;
}
h1 {
  font-size: 32px;
  text-align: center;
  color: #222;
}
</style>