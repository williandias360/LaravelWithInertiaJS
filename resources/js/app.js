import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress'
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';


createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    const VueApp = createApp({ render: () => h(App, props) })

    VueApp.component("EasyDataTable", Vue3EasyDataTable)
    VueApp.config.globalProperties.$route = route;

    VueApp
      .use(plugin)
      .mixin({methods:route})
      .mount(el)

      return VueApp
  },
});
InertiaProgress.init()
