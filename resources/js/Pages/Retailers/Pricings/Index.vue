<template>
  <Head title="Retailers Pricings Index" />

  <div class="flex w-full mb-5 font-bold">
    <div class="text-center w-2/12">Retailer</div>
    <div class="text-center w-2/12">Index</div>
    <div class="text-center w-2/12">Product</div>
    <div class="text-center w-1/12">Price</div>
    <div class="text-center w-1/12">Sale</div>
    <div class="text-center w-1/12">Bonus</div>
    <div class="text-center w-1/12">Bonus Value</div>
    <div class="text-center w-2/12">Actions</div>
  </div>
  <div
    class="flex w-full my-1 py-1"
    v-for="retailerPricing in props.retailersPricings.data"
    :key="retailerPricing.id"
  >
    <div class="w-2/12 text-center">
      {{ retailerPricing.retailer.name }}
    </div>
    <div class="w-2/12 text-center">
      {{ retailerPricing.retailer_index }}
    </div>
    <div class="w-2/12 text-center">
      {{ retailerPricing.product.name }}
    </div>
    <div class="w-1/12 text-center">
      {{ retailerPricing.price }}
    </div>
    <div class="w-1/12 text-center">
      {{ retailerPricing.sale }}
    </div>
    <div class="w-1/12 text-center">
      {{ retailerPricing.bonus }}
    </div>
    <div class="w-1/12 text-center">
      {{ retailerPricing.bonus_value }}
    </div>
    <div class="w-2/12">
      <Actions :page="'retailer-pricings'" :id="retailerPricing.id" :deleted_at="retailerPricing.deleted_at" />
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
  retailersPricings: Object,
});
</script>
