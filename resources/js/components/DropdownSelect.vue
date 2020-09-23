<template>
  <select @change="fn">
    <option value>Seleccione un vendedor</option>
    <option v-for="option in options" :key="option.id" :value="option.id">{{ option.name }}</option>
  </select>
</template>

<script>
export default {
  name: "dropdown-component",
  props: ["options", "fn"],
};
</script>
