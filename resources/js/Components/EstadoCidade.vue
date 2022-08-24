<template>
  <aside>
    <div class="input-group">
      <select class="input" @change="listarCidades($event)" v-on:change="onSelectedEstado($event.target.selectedIndex)">
        <option value="0"></option>
        <option
          v-for="estado in listaEstados"
          :key="estado.CoigoEstado"
          :value="estado.CodigoEstado"
        >
          {{ estado.Uf }}
        </option>
      </select>
      <label class="input-label">Estado:</label>
    </div>
    <div class="input-group">
      <select class="input" @change="onSelectedCidade($event.target.selectedIndex)">
        <option value=""></option>
        <option
          v-for="cidade in listaCidades"
          :key="cidade.CodigoCidade"
          :value="cidade.codigoCidade"
        >
          {{ cidade.Nome }}
        </option>
      </select>
      <label class="input-label">Cidade:</label>
    </div>
  </aside>
</template>

<script>
import axios from "axios";
export default {
  name: "EstadoCidade",
  data() {
    return {
      listaEstados: [],
      listaCidades: [],
    };
  },
  methods: {
    listarEstados() {
      axios
        .get(route("estado.listar"))
        .then((res) => (this.listaEstados = res.data));
    },
    listarCidades(event) {
      let codigoCidade = event.target.value;
      this.listaCidades = [];
      if (parseInt(codigoCidade)) {
        axios
          .get(route("cidade.listar", codigoCidade))
          .then((res) => this.listaCidades = res.data);
      }
    },
    onSelectedCidade(index){
        if(index > 0)
            return this.$emit("onSelectedCidade", this.listaCidades[index - 1])
        return null
    },
    onSelectedEstado(index){
        if(index > 0)
            return this.$emit('onSelectedEstado', this.listaEstados[index - 1])
        return null;
    }
  },
  beforeMount() {
    this.listarEstados();
  },
};
</script>

<style scoped>
aside>div:first-of-type{
    width: 120px;
}

</style>
