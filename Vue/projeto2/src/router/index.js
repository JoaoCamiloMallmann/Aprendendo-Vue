import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import Pedidos from "../views/PedidoView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/Pedidos",
    name: "Pedidos",
    component: Pedidos
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
