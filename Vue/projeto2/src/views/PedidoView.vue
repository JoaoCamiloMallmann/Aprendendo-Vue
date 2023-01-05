<template>
  <div class="mainContainer">
    <h1> Gerenciador Pedidos:</h1>
    <Dashboard />

  </div>
</template>

<script>
import Dashboard from '@/components/Dashboard.vue';

export default {
  name: "PedidoView",

  components: {
    Dashboard,
  }
}
</script>