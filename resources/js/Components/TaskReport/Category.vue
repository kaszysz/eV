<template>
  <div
    class="w-full text-white text-center font-bold p-2 mt-2 cursor-pointer"
    :class="props.modelValue == props.name ? 'bg-gray-500' : 'bg-black'"
    @click="$emit('update:modelValue', props.name)"
  >
    {{ name }}
  </div>
</template>
<script setup>
import { upperCase } from "lodash";
const props = defineProps({
  name: String,
  modelValue: null,
});
const name = upperCase(props.name);
</script>
