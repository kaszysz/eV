<template>
  <div class="flex flex-col w-full pt-2 pb-2 focus:bg-gray-100 cursor-pointer">
    <div
      class="flex w-full text-xs pt-2 pb-2 cursor-pointer"
      @click="switchShow"
    >
      <div class="w-3/12 flex justify-center text-center">
        {{ reportMerch.created_at }}
      </div>
      <div class="w-2/12 flex justify-center">
        {{ reportMerch.shop.retailer.name }}
      </div>
      <div class="w-2/12 flex justify-center">
        {{ reportMerch.shop.city.name }}
      </div>
      <div class="w-3/12 flex justify-center">
        {{ reportMerch.shop.street }}
      </div>
      <div class="w-2/12">
        <Actions
          :page="'report-merches'"
          :id="reportMerch.id"
          :deleted_at="reportMerch.deleted_at"
        />
      </div>
    </div>
    <div v-show="isShow" class="text-xs">
      <div class="flex w-full mb-2">
        <div class="flex justify-center w-3/12">Index</div>
        <div class="flex justify-center w-2/12">Producer</div>
        <div class="flex justify-center w-3/12">Model</div>
        <div class="flex justify-center w-2/12">Price</div>
        <div class="flex justify-center w-2/12">Sale</div>
      </div>
      <div
        class="flex w-full pt-2 pb-2 cursor-pointer"
        v-for="retailer_pricing in reportMerch.retailer_pricings"
        :key="retailer_pricing.id"
      >
        <div class="w-3/12 flex justify-center">
          {{ retailer_pricing.index }}
        </div>
        <div class="w-2/12 flex justify-center">
          {{ retailer_pricing.product.producer.name }}
        </div>
        <div class="w-3/12 flex justify-center">
          {{ retailer_pricing.product.model }}
        </div>
        <div class="w-2/12 flex justify-center">
          {{ retailer_pricing.price }}
        </div>
        <div class="w-2/12 flex justify-center">
          {{ retailer_pricing.sale }}
        </div>
      </div>
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
import { ref } from "vue";

useAlert();

const props = defineProps({
  reportMerch: Object,
});

const isShow = ref(false);

function switchShow() {
  isShow.value = !isShow.value;
}
</script>
