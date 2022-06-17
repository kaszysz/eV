<template>
  <Head title="Create Categories" />

  <div class="flex w-full mb-5 font-bold">
    <div class="flex-1 flex w-9/12">Category Name</div>
    <div class="flex-2 flex justify-center w-3/12">Actions</div>
  </div>
  <div
    class="flex w-full"
    v-for="category in categories.data"
    :key="category.id"
  >
    <div class="flex-1 w-9/12">
      {{ DisplayName.WithDash(category.parent) }} {{ category.name }}
    </div>
    <div class="flex-2 w-3/12">
      <Actions :page="'categories'" :id="category.id" :deleted_at="category.deleted_at" />
    </div>
  </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
  layout: AppLayout,
};
</script>

<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import Actions from "@/Components/Actions.vue";
import { useAlert } from "@/Helpers/Alerts.js";
import DisplayName from "@/Helpers/DisplayName.js"

useAlert();

const props = defineProps({
  categories: Object,
});
</script>
