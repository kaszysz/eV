<template>
  <div>
    <div v-if="showFindButton" class="flex justify-end">
      <jet-button type="button" @click="displayClosestShopsList">
        Find Shops
      </jet-button>
    </div>
    <div v-if="showShopsList">
      <div class="bg-black text-center text-white p-2 uppercase">
        Choose shop
      </div>
      <ClosestShopList :shops="shops" @getShop="getShop" />
    </div>
    <div v-if="shopInfo">
      <ShopInformations :shopInfo="shopInfo" />
    </div>
  </div>
</template>

<script setup>
import Location from "@/Helpers/Location.js";
import JetButton from "@/Jetstream/Button.vue";
import ClosestShopList from "./ClosestShopsList.vue";
import ShopInformations from "./ShopInformations.vue";
import { ref } from "vue";

const emits = defineEmits(['update:modelValue', 'retailerId', 'geolocation']);

const showFindButton = ref(true)
const showShopsList = ref(false)

const shops = ref([]);
const getShopsList = async (latitude, longitude) => {
  axios
    .post(route("shops.get.closest"), {
      latitude,
      longitude,
    })
    .then((res) => {
      shops.value = res.data;
    })
    .catch((err) => {
      swal({
        title: "Location Error",
        text: "We coudln't get your geolocation, please try again",
        icon: "error"
      });
    });
};

const displayClosestShopsList = async () => {
  const { latitude, longitude } = await Location.getCoords();
  getShopsList(latitude, longitude);
  showFindButton.value = false
  showShopsList.value = true
};

const shopInfo = ref(null);
function getShop(shop){
    shopInfo.value = shop
    emits('update:modelValue', shop.id)
    emits('retailerId', shop.retailer_id)
    showShopsList.value = false
}


</script>
