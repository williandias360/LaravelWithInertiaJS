<template>
  <div class="lista">
    <div class="cabecalho">
      <table>
        <thead>
          <tr>
            <th
              v-for="(column, index) in options.columns"
              :key="index"
              :title="column.display"
              @click="sortBy(column)"
              :class="{ sortable: column.sortable }"
            >
              <span :style="{ width: (column.width || '80') + 'px' }"
                >{{ column.display
                }}<span
                  :class="[
                    { arrow: column.sortable },
                    sortOrders[column.name] > 0 ? 'asc' : 'desc',
                  ]"
                ></span>
              </span>
            </th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="dados">
      <table>
        <tbody>
          <tr
            v-for="(column, index) in columnsComputed"
            :key="index"
            :class="{ zebra: index % 2 == 0 }"
          >
            <td v-for="key in options.columns" :key="key.name">
              <span
                :style="{ width: (key.width || '80') + 'px' }"
                :class="{ italico: column[key.name] == emptyText }"
                :title="column[key.name]"
              >
                {{ column[key.name] }}
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "DataGridTable",
  props: {
    options: Object,
    data: Array,
    emptyText: {
      type: String,
      default: "Não informado(a)",
    },
  },
  data: function () {
    var sortOrders = {};
    this.options.columns.forEach(function (key) {
      sortOrders[key.name] = 1;
    });

    return {
      sortKey: "",
      sortOrders: sortOrders,
    };
  },
  computed: {
    columnsComputed() {
      let order = this.sortOrders[this.sortKey] || 1;
      let items = [];
      let data = this.data;
      let columns = this.options.columns;

      for (var row = 0; row < data.length; row++) {
        let item = {};
        for (var column = 0; column < columns.length; column++) {
          let name = columns[column].name.split(".");
          let property = name[name.length - 1];
          let value = this.getValueRecursive(data[row][name[0]], property);
          let formatData = columns[column].formatData;
          value = this.getValueOrFunction(value, formatData);
          item[name.join(".")] = value == null ? this.emptyText : value;
        }
        items.push(item);
      }

      if (this.sortKey) {
        items = items.slice().sort((a, b) => {
          a = a[this.sortKey];
          b = b[this.sortKey];

          return (a === b ? 0 : a > b ? 1 : -1) * order;
        });
      }
      return items;
    },
  },
  methods: {
    getValueRecursive(value, property) {
      if (value == null) return null;

      if (typeof value === "string" && value.trim() === "") return null;

      if (typeof value === "object") {
        Object.keys(value).forEach((v) => {
          if (typeof v === "object") {
            return this.getValueRecursive(v, property);
          }
        });

        return value[property];
      }
      return value;
    },
    getValueOrFunction(value, formatData) {
      if (value == null) return null;

      if (typeof formatData === "function") return formatData.call(self, value);

      return value;
    },
    sortBy(key) {
      if (key.sortable) {
        this.sortKey = key.name;
        this.sortOrders[key.name] = this.sortOrders[key.name] * -1;
      }
    },
  },
};
</script>

<style scoped>
.lista {
  margin-top: 10px;
  height: auto;
  border: 1px solid #dbdde0;
  position: relative;
  font-size: 13px;
}
.lista table {
  border-collapse: separate;
  border-spacing: 0;
  border-width: 0;
  width: auto;
  outline: 0;
  display: block;
  font-family: "Roboto", sans-serif;
}

.lista table thead,
.lista table tbody {
  margin: 0;
  padding: 0;
}
.lista div.dados {
  max-height: 200px;
  overflow-y: auto;
}
.lista table th,
.lsta table td {
  margin: 0;
  position: relative;
  border: none;
  vertical-align: middle;
}
.lista table th > span,
.lista table td > span {
  text-align: left;
  white-space: nowrap;
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
  padding: 5px 4px;
  border: 1px solid transparent;
  border-left: none;
  border-top: none;
  height: 100%;
  color: #414244;
  font-weight: 400;
}

.lista table th > span {
  font-weight: 600;
}
.lista table tr td > span {
  border: 1px solid transparent;
  border-left: none;
  border-top: none;
  height: 35px;
  line-height: 36px;
  padding: 0 5px;
  background: #fff;
  width: auto;
}

.lista table tbody tr {
  text-align: left;
  cursor: pointer;
}
.lista table tbody tr.zebra td > span,
.lista table tbody tr:hover td > span {
  background-color: rgba(228, 228, 228, 0.418) !important;
}
.lista table tbody td > span.italico {
  font-style: italic;
  color: rgba(127, 129, 134, 0.897) !important;
}

.sortable {
  cursor: pointer;
}
.arrow {
  display: inline-block;
  vertical-align: middle;
  width: 0;
  height: 0;
  margin-left: 5px;
}

.arrow.asc {
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-bottom: 4px solid var(--dark-accent-color);
}

.arrow.desc {
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-top: 4px solid var(--dark-accent-color);
}
</style>
