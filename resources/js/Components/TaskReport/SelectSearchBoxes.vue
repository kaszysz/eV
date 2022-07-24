<template>
  <select-search-box
    v-if="choosenCategory == 'retailers'"
    v-model="categoryArray"
    :label="'Retailers'"
    :list="props.retailers"
    returnMode="multiselect"
  />
  <select-search-box
    v-else-if="choosenCategory == 'shops'"
    v-model="categoryArray"
    :label="'Shops'"
    :list="props.shops"
    returnMode="multiselect"
  />
  <select-search-box
    v-else
    v-model="categoryArray"
    :label="'Users'"
    :list="props.users"
    returnMode="multiselect"
  />
</template>
<script setup>
import SelectSearchBox from "@/Components/SelectSearchBox/SelectSearchBox.vue";
import { ref } from "vue";

const props = defineProps({
  choosenCategory: String,
  retailers: Array,
  shops: Array,
  users: Array,
});

const categoryArray = ref([]);
</script>
