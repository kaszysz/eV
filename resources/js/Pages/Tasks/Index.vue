<template>
  <Head title="Categories Index" />
<div class="flex w-full">
    <div class="w-3/12">Title</div>
    <div class="w-8/12">Description</div>
    <div class="w-1/12">Actions</div>
</div>
  <div class="flex border-b-2 border-gray-100 mt-5 pb-2" v-for="(task,key) in props.tasks.data" :key="key">
    <div class="w-3/12">{{ task.title }}</div>
    <div class="w-8/12">{{ task.description }}</div>
    <actions :page="'tasks'" :id="task.id" :deleted_at="task.deleted_at" />
  </div>
  <Pagination :links="$props.tasks.links" />
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
import Pagination from "@/Jetstream/Pagination.vue"

useAlert();

const props = defineProps({
  tasks: Object,
});
</script>
