<template>
  <div>
    <ul class="tabs">
      <li
        v-for="(item, index) in items"
        :key="index"
        @click="ativarTab(index)"
        :class="{ ativo: itemAtivo == index }"
      >
        <b>{{ item }}</b>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      itemAtivo: 0,
    };
  },
  methods: {
    ativarTab(index) {
      this.itemAtivo = index;
      this.$emit("tabAtivo", index);
    },
  },
  props: {
    items: Array,
  },
};
</script>

<style>
.tabs {
  display: flex;
  border-bottom: 1px solid var(--divider-color);
  margin-bottom: 10px;
}
.tabs > li {
  padding: 5px 10px;
}
.tabs > li > b {
  color: var(--accent-color);
  font-weight: 500;
  cursor: pointer;
  margin: 0 20px;
}
.tabs > li:hover,
.tabs > li.ativo {
  border-bottom: 3px solid var(--accent-color);
  background-color: transparent;
  color: var(--dark-accent-color);
}

.tabs>li.ativo>b {
    font-weight: 700;
}
</style>
