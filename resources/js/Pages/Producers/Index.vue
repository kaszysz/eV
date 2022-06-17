<template>
  <Head title="Producers Index" />

  <div class="flex w-full mb-5 font-bold">
    <div class="flex-1 flex justify-center w-9/12">Producer Name</div>
    <div class="flex-2 flex justify-center w-3/12">Actions</div>
  </div>
  <div
    class="flex w-full"
    v-for="producer in producers.data"
    :key="producer.id"
  >
    <div class="flex-1 w-9/12 flex justify-center">
      {{ producer.name }}
    </div>
    <div class="flex-2 w-3/12">
      <Actions
        :page="'producers'"
        :id="producer.id"
        :deleted_at="producer.deleted_at"
      />
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

useAlert();

const props = defineProps({
  producers: Object,
});
</script>
