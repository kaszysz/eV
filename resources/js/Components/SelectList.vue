<template>
  <select
    class="
      border-gray-300
      focus:border-indigo-300
      focus:ring
      focus:ring-indigo-200
      focus:ring-opacity-50
      shadow-sm
      mt-1
      block
      w-full
      appearance-none
    "
    @change="$emit('update:modelValue', $event.target.value)"
  >
    <option v-if="!selected" selected disabled>Please select one</option>
    <option v-if="empty" value="" :selected="!selected">Empty</option>
    <option v-for="item in list" :key="item.id" :value="item.id" :selected="item.id == selected">
      {{ item.name }}
    </option>
  </select>
</template>
<script>
export default {
  props: ["list", "selected", "empty"],
};
</script>
