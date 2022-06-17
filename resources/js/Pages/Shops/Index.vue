<template>
  <Head title="Shops Index" />

  <div class="flex w-full mb-5 font-bold">
    <div class="flex-1 flex justify-center w-2/12">Retailer</div>
    <div class="flex-1 flex justify-center w-2/12">Voivodeship</div>
    <div class="flex-1 flex justify-center w-2/12">City</div>
    <div class="flex-1 flex justify-center w-2/12">Street</div>
    <div class="flex-1 flex justify-center w-2/12">FSR</div>
    <div class="flex-1 flex justify-center w-2/12">Promoter</div>
    <div class="flex-2 flex justify-center w-2/12">Actions</div>
  </div>
  <div class="flex w-full" v-for="shop in shops.data" :key="shop.id">
    <div class="flex justify-center w-2/12">
      {{ shop.retailer.name }}
    </div>
    <div class="flex justify-center w-2/12">
      {{ shop.city.voivodeship.name }}
    </div>
    <div class="flex justify-center w-2/12">
      {{ shop.city.name }}
    </div>
    <div class="flex justify-center w-2/12">
      {{ shop.street }}
    </div>
    <div class="flex justify-center w-2/12">
      {{ shop.fsr.name }}
    </div>
    <div class="flex justify-center w-2/12">
      {{ shop.promoter }}
    </div>
    <div class="flex w-2/12">
      <Actions :page="'cities'" :id="shop.id" :deleted_at="shop.deleted_at" />
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
  shops: Object,
});

</script>
