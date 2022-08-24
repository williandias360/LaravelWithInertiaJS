<template>
  <div class="flex">
      <MenuLateral/>
      <div class="flex-col flex-auto">
          <Toolbar/>
          <div class="pl-6 pt-4 pr-6 flex-auto"><slot/></div>
      </div>
  </div>

</template>

<script>
import Toolbar from './Components/Toolbar.vue'
import MenuLateral from './Components/MenuLateral.vue'
export default {
    components: { Toolbar, MenuLateral }
}
</script>

<style>

</style>
