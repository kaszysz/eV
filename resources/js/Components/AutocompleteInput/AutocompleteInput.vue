<template>
  <div class="relative">
    <div class="absolute right-0 top-0 w-50 h-full py-2 pr-4 text-gray-400">
      {{ autocomplete }}
    </div>
    <Input
      id="name"
      type="text"
      class="block w-full"
      v-model="toEmit"
      ref="input"
    />
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
import Input from "@/Jetstream/Input.vue";
import { Autocomplete } from "./Scripts/Autocomplete.js";

const props = defineProps({
  modelValue: null,
  list: null,
});

const toEmit = ref("");
const emits = defineEmits(["update:modelValue"]);

watch(toEmit, () => {
    emits("update:modelValue", toEmit);
})

const autocomplete = Autocomplete(toEmit, props.list);
</script>
