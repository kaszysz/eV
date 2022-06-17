<template>
  <Head title="Categories Index" />

  <div class="flex w-full mb-5 font-bold">
    <div class="flex-1 flex justify-center w-9/12">Component Name</div>
    <div class="flex-2 flex justify-center w-3/12">Actions</div>
  </div>
  <div
    class="flex w-full"
    v-for="component in components.data"
    :key="component.id"
  >
    <div class="flex-1 w-9/12 flex justify-center">
      {{ component.name }}
    </div>
    <div class="flex-2 w-3/12">
      <Actions
        :page="'components'"
        :id="component.id"
        :deleted_at="component.deleted_at"
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
  components: Object,
});
</script>
