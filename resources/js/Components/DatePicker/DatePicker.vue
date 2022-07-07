<template>
  <input
    class="text-sm p-1"
    v-model="date"
    type="date"
    ref="datePicker"
    @change="$emit('update:modelValue', $event.target.value)"
  />
</template>

<script setup>
import {ref, watch } from "vue";

const props = defineProps({
  modelValue: "",
});

const emits = defineEmits(["update:modelValue"]);

const date = ref(props.modelValue);

watch(() => props.modelValue, (newValue) => {
  date.value = newValue
})

</script>
