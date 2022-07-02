<template>
  <div class="text-xs mt-5">
    <div class="flex flex-row space-x-1 w-full">
      <div class="w-3/12 text-center">Index</div>
      <div class="w-2/12 text-center">Producer</div>
      <div class="w-3/12 text-center">Model</div>
      <div class="w-2/12 text-center">Price</div>
      <div class="w-2/12 text-center">Sale</div>
      <div class="w-1/12 text-center"></div>
    </div>
    <div
      v-for="(retailerPricing, index) in retailerPricings"
      :key="index"
      class="flex flex-row space-x-1 w-full border-b-2 border-indigo-500 mt-2"
    >
      <div class="w-3/12 text-center">{{ retailerPricing.retailer_index }}</div>
      <div class="w-2/12 text-center">
        {{ retailerPricing.product.producer.name }}
      </div>
      <div class="w-3/12 text-center">{{ retailerPricing.product.name }}</div>
      <div class="w-2/12 text-center">{{ retailerPricing.price }}</div>
      <div class="w-2/12 text-center">{{ retailerPricing.sale }}</div>
      <div class="w-1/12 flex justify-center">
        <font-awesome-icon
          class="cursor-pointer"
          icon="trash"
          size="lg"
          @click="deleteRetailerPricing(index)"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetButton from "@/Jetstream/Button.vue";
import FontAwesomeIcon from "@/Helpers/FontAwsome.js";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import _ from "lodash"

const props = defineProps({
  modelValue: Array
});

const emits = defineEmits(['update:modelValue'])

const retailerPricings = props.modelValue;

watch(retailerPricings, () => {
    emits("update:modelValue", retailerPricings);
})

const deleteRetailerPricing = _.debounce(function(index){
    retailerPricings.splice(index, 1)
}, 100)

</script>
