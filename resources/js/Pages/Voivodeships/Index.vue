<template>
  <Head title="Voivodeships Index" />

  <div class="flex w-full mb-5 font-bold">
    <div class="flex-1 flex justify-center w-9/12">Voivodeship Name</div>
    <div class="flex-2 flex justify-center w-3/12">Actions</div>
  </div>
  <div
    class="flex w-full"
    v-for="voivodeship in voivodeships.data"
    :key="voivodeship.id"
  >
    <div class="flex-1 w-9/12 flex justify-center">
      {{ voivodeship.name }}
    </div>
    <div class="flex-2 w-3/12">
      <Actions
        :page="'voivodeships'"
        :id="voivodeship.id"
        :deleted_at="voivodeship.deleted_at"
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
  voivodeships: Object,
});
</script>
