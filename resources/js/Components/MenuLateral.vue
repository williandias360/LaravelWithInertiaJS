<template>
  <div class="menu-lateral max-h-full h-screen">
    <ul>
      <li v-for="menu in ListaMenu" :key="menu.CodigoMenu" class="pl-4 pr-4 pb-0 pt-2">
        <div class="flex-col text-white">
          <p class="font-semibold hover:text-gray-300 cursor-pointer text-base">{{ menu.Nome }}</p>
          <ul class="pl-4">
            <li v-for="funcao in menu.Funcoes" :key="funcao.CodigoFuncao">
              <Link hr  ef="" class="text-sm hover:text-gray-300">{{ funcao.Nome }}</Link>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: { Link },
  data() {
    return {
      ListaMenu: [
        {
          CodigoMenu: 1,
          Nome: "Cadastros",
          Funcoes: [
            {
              CodigoFuncao: 1,
              Nome: "Clientes",
            },
            {
                CodigoFuncao:2,
                Nome:"Grupo"
            },
            {
              CodigoFuncao: 3,
              Nome: "Produtos",
            },
          ],
        },
        {
          CodigoMenu: 2,
          Nome: "Movimentação",
          Funcoes:[
            {
                CodigoFuncao:4,
                Nome:"Orçamento"
            },
            {
                CodigoFuncao:5,
                Nome:"Venda"
            },
            {
                CodigoFuncao:6,
                Nome:"Ordem de Serviço"
            }
          ]
        },
        {
          CodigoMenu: 3,
          Nome: "Financeiro",
        },
        {
          CodigoMenu: 4,
          Nome: "Relatórios",
        },
        {
          CodigoMenu: 5,
          Nome: "Configurações",
        },
      ],
    };
  },
};
</script>

<style>
.menu-lateral {
  background-color: #313A46;
  width: 16rem;
  box-shadow: 0px 6px 10px #a09b9b;
  border-radius: 1px;
}
</style>
