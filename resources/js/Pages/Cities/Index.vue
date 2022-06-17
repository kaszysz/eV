<template>
  <Head title="Cities Index" />

  <div class="flex w-full mb-5 font-bold">
    <div class="flex-1 flex justify-center w-9/12">City Name</div>
    <div class="flex-2 flex justify-center w-3/12">Actions</div>
  </div>
  <div
    class="flex w-full"
    v-for="city in cities.data"
    :key="city.id"
  >
    <div class="flex-1 w-9/12 flex justify-center">
      {{ city.name }}
    </div>
    <div class="flex-2 w-3/12">
      <Actions
        :page="'cities'"
        :id="city.id"
        :deleted_at="city.deleted_at"
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
  cities: Object,
});

</script>
