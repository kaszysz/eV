<template>
  <div v-if="shops" class="mt-2">
    <div
      class="
        cursor-pointer
        bg-gray-100
        hover:bg-gray-200
        py-2
        px-4
        my-1
        flex
      "
      v-for="shop in shops"
      :key="shop.id"
      @click="$emit('getShop', shop)"
    >
      <span class="break-words uppercase w-1/3 text-center mx-2">
        {{ shop.retailer.name }}
      </span>
      <span class="break-words uppercase w-2/3 mx-2">
        {{ shop.street }}
      </span>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  shops: null,
});
const emits = defineEmits(["getShop"]);
</script>
