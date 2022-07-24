<template>
  <div>Select task's category</div>
  <category
    v-for="(category, index) in props.categories"
    :key="index"
    :name="category"
    v-model="choosenCategory"
  />
</template>
<script setup>
import Category from "./Category.vue";
import { ref, watch } from "vue";
const props = defineProps({
  categories: Array,
  modelValue: null,
});
const emits = defineEmits(["update:modelValue"]);
const choosenCategory = ref();
watch(choosenCategory, () => {
  emits("update:modelValue", choosenCategory.value);

});
</script>
