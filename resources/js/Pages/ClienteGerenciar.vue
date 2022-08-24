<template>
  <Layout>
    <div class="mb-4">
      <h4 class="text-xl text-slate-600 font-medium">Cadastro de clientes</h4>
    </div>
    <form class="border p-2" @submit.prevent="submit">
      <aside>
        <div class="input-group">
          <input
            type="text"
            class="input"
            v-model="form.nome"
            required
            placeholder=" "
          />
          <label for="name" class="input-label">Nome</label>
        </div>
        <div class="input-group">
          <input
            type="text"
            class="input"
            v-model="form.cpfCnpj"
            required
            placeholder=" "
          />
          <label class="input-label">Cpf/Cnpj:</label>
        </div>
        <div class="input-group">
          <input
            type="text"
            name="endereco"
            class="input"
            required
            placeholder=" "
          />
          <label for="endereco" class="input-label">Endereço</label>
        </div>
      </aside>
      <Tabs :items="tabs" @tabAtivo="tabAtivo" />
      <div class="endereco" v-show="tabIndex == 0">
        <aside>
          <div class="input-group">
            <input
              type="text"
              name="Cep"
              class="input"
              placeholder=" "
              v-model="endereco.cep"
            />
            <label for="Cep" class="input-label">Cep:</label>
          </div>
          <EstadoCidade
            @onSelectedEstado="estadoSelecionado"
            @onSelectedCidade="cidadeSelecionado"
          />
        </aside>
        <aside>
          <div class="input-group">
            <input
              type="text"
              class="input"
              placeholder=" "
              v-model="endereco.logradouro"
            />
            <label class="input-label">Logradouro:</label>
          </div>
          <div class="input-group">
            <input
              type="text"
              class="input"
              placeholder=" "
              v-model="endereco.bairro"
            />
            <label class="input-label">Bairro:</label>
          </div>
          <div class="input-group">
            <input
              type="text"
              class="input"
              placeholder=" "
              v-model="endereco.complemento"
            />
            <label class="input-label">Complemento:</label>
          </div>
          <div class="input-group">
            <input
              type="text"
              class="input"
              placeholder=" "
              v-model="endereco.numero"
            />
            <label class="input-label">Número:</label>
          </div>
          <p>
            <button @click.prevent="adicionarEndereco">+</button>
          </p>
        </aside>
        <DataGridTable :options="optionsDataGrid" :data="form.listaEndereco" />
      </div>
      <div v-show="tabIndex == 1">Telefone</div>
      <div v-show="tabIndex == 2">Email</div>
      <div class="rodape">
        <button type="submit">Enviar</button>
      </div>
    </form>
  </Layout>
</template>

<script>
import Layout from "../Layout.vue";
import Tabs from "../Components/Tabs.vue";
import EstadoCidade from "../Components/EstadoCidade.vue";
import DataGridTable from "../Components/DataGridTable/DataGridTable.vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import { defineComponent, ref } from "@vue/runtime-core";

export default defineComponent({
  setup() {
    const form = useForm({
      nome: null,
      cpfCnpj: null,
      arquivo: null,
      listaEndereco: [
        {
          sequencia: 1,
          logradouro: "R. Prestes Maia",
          bairro: "Ernani Murad",
          numero: 334,
          complemento: "TEste de complemento",
          cidade: { Nome: "Presidente Venceslau" },
          estado: { Uf: "SP" },
          cep: "19405068",
        },
        {
          sequencia: 2,
          logradouro: "R. Prestes Maia",
          bairro: "Ernani Murad",
          numero: 334,
          complemento: "TEste de complemento",
          cidade: { Nome: "Presidente Venceslau" },
          estado: { Uf: "SP" },
          cep: "19405068",
        },
        {
          sequencia: 3,
          logradouro: "R. Prestes Maia",
          bairro: "Ernani Murad",
          numero: 334,
          complemento: "TEste de complemento",
          cidade: { Nome: "Presidente Venceslau" },
          estado: { Uf: "SP" },
          cep: "",
        },
        {
          sequencia: 4,
          logradouro: "R. Prestes Maia",
          bairro: "Ernani Murad",
          numero: 334,
          complemento: "TEste de complemento",
          cidade: { Nome: "Presidente Venceslau" },
          estado: { Uf: "SP" },
          cep: null,
        },
      ],
    });
    const endereco = {
      sequencia: null,
      cep: null,
      estado: {},
      cidade: {},
      logradouro: null,
      bairro: null,
      complemento: null,
      numero: null,
    };
    //https://br.vuejs.org/v2/examples/grid-component.html
    const tabs = ["Endereço", "Telefone", "E-mail"];
    const tabIndex = ref(0);

    const optionsDataGrid = ref({
        columns:[
      { display: "#", name: "sequencia", width: 30, sortable:true },
      { display: "Logradouro", name: "logradouro", width: 430, sortable:true },
      { display: "Bairro", name: "bairro", width: 190 },
      { display: "Número", name: "numero", width: 80 },
      { display: "Complemento", name: "complemento", width: 390 },
      { display: "Cep", name: "cep", width: 90, formatData:function(value){
            return `${value.substring(0,5)}-${value.substring(6,3)}`;
      }  },
      { display: "Cidade", name: "cidade.Nome", width: 280 },
      { display: "Uf", name: "estado.Uf", width: 50, },
    ]
    })

    function submit() {
      Inertia.post("/cliente", form);
    }

    return {
      form,
      submit,
      tabs,
      optionsDataGrid,
      tabIndex,
      endereco,
    };
  },
  methods: {
    tabAtivo(index) {
      this.tabIndex = index;
    },
    adicionarEndereco() {
      let sequencia = this.form.listaEndereco.length + 1;
      this.endereco.sequencia = sequencia;
      this.form.listaEndereco.push({ ...this.endereco });
    },
    estadoSelecionado(value) {
      this.endereco.estado = value;
    },
    cidadeSelecionado(value) {
      this.endereco.cidade = value;
    },
  },
  name: "ClienteGerenciar",
  components: {
    Layout,
    Tabs,
    EstadoCidade,
    DataGridTable,
  },
});
</script>

<style scoped>
.endereco > aside:first-child > div:first-of-type {
  width: 160px;
}
.endereco > aside:nth-child(2) > div:nth-child(4) {
  width: 540px;
}
</style>
