<template>
  <div class="overflow-hidden">
    <div>
      <div class="bg-black py-2 px-4 text-white uppercase">
        <span class="ml-2">Wybrany sklep</span
        ><span class="float-right" v-if="moreShopInformations">
            <font-awesome-icon
            @click="showMoreShopInformations"
            icon="times-circle"
        /></span>
        <span class="float-right" v-else>
          <font-awesome-icon
            @click="showMoreShopInformations"
            icon="chevron-circle-down"
        /></span>
      </div>
      <div v-show="moreShopInformations">
        <div class="bg-gray-100 px-4 py-2">
          <font-awesome-icon icon="store" /><span class="ml-2">{{
            shopInfo.retailer.name
          }}</span>
        </div>
        <div class="bg-white px-4 py-2">
          <font-awesome-icon icon="city" /><span class="ml-2">{{
            shopInfo.city.name
          }}</span>
        </div>
        <div class="bg-gray-100 px-4 py-2">
          <font-awesome-icon icon="road" /><span class="ml-2">{{
            shopInfo.street
          }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import FontAwesomeIcon from "@/Helpers/FontAwsome.js";
import { ref } from "vue";

const props = defineProps({
  shopInfo: null,
});

const moreShopInformations = ref(true);

function showMoreShopInformations() {
  moreShopInformations.value = !moreShopInformations.value;
}
</script>
