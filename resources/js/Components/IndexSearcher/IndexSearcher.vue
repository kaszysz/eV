<template>
  <div>
    <jet-label for="name" value="Retailer Index" />
    <div class="relative mt-1">
      <jet-input
        id="name"
        type="text"
        v-model="retailerIndex"
        class="block w-full"
        ref="input"
        @focus="
          isFocused = true;
          isDropdown = true;
        "
        @blur="isFocused = false"
      />
      <div class="absolute top-0 right-0">
        <font-awesome-icon
          v-if="!showList"
          class="cursor-pointer text-gray-500 -translate-x-4 translate-y-1/2"
          icon="chevron-down"
          size="sm"
          @click="isDropdown = true"
        />
        <font-awesome-icon
          v-else
          class="
            cursor-pointer
            text-gray-500
            -translate-x-4
            translate-y-1/2
            rotate-180
          "
          icon="chevron-down"
          size="sm"
          @click="isDropdown = false"
        />
      </div>
    </div>
    <div v-if="showList" class="">
      <div
        class="
          mt-1
          px-3
          py-2
          border border-gray-300
          cursor-pointer
          hover:bg-gray-100
        "
        v-for="item in retailerIndexesFiltered"
        :key="item.id"
        @click="getItemResetRetailerIndex(item)"
      >
        {{ item.retailer_index }}
      </div>
    </div>
  </div>
</template>

<script setup>
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import FontAwesomeIcon from "@/Helpers/FontAwsome.js";
import { computed, ref, watch } from "vue";

const props = defineProps({
  retailerId: null,
});

const emits = defineEmits(["selectedItem"]);

// Select Item

const selectedItem = ref(null);
async function selectItem(item) {
  selectedItem.value = item;
}
watch(selectedItem, () => {
  emits("selectedItem", selectedItem.value);
});

// Reset Index and Indexes Array

function resetRetailerIndex() {
  retailerIndex.value = "";
}
function resetRetailerIndexes() {
  retailerIndexes.value = [];
}

// Select Item and Reset all Variables

async function getItemResetRetailerIndex(item) {
  await selectItem(item);
  resetRetailerIndex();
  resetRetailerIndexes();
}

function alertFindError() {
  swal({
    title: "Retailer Index Error",
    text: "We couldn't find index in database",
    icon: "error",
  });
}

// Retailer Indexes - Array

const retailerIndexes = ref([]);
async function getRetailerIndexes() {
  if (retailerIndex.value.length < 4) {
    return null;
  }
  await axios
    .post(
      route("retailer-pricings.get.indexes.retailer", {
        retailer_index: retailerIndex.value,
        retailer_id: props.retailerId,
      })
    )
    .then((res) => {
      if (res.data.length == 0) {
        alertFindError();
      }
      if (res.data) {
        retailerIndexes.value = res.data;
      }
    })
    .catch((err) => {
      alertFindError();
    });
}

const retailerIndexesFiltered = computed(() => {
  if (retailerIndexes.value.length == 0) {
    return [];
  }
  if (retailerIndex.value.length == 0) {
    return [];
  }
  let filteredArray = retailerIndexes.value.filter(
    (_item) =>
      _item.retailer_index
        .toLowerCase()
        .indexOf(retailerIndex.value.toLowerCase()) > -1
  );
  return filteredArray.slice(0, 5);
});

// Retailer Index

const retailerIndex = ref("");
watch(
  retailerIndex,
  _.debounce(() => {
    if (retailerIndex.value.length < 4 && retailerIndexes.value.length >= 1) {
      resetRetailerIndexes();
      return null;
    } else {
      getRetailerIndexes();
    }
  }, 300)
);

// Show Dropdown List
const isFocused = ref(false);
const isDropdown = ref(false);
const showList = computed(() => {
  return (
    isFocused.value ||
    isDropdown.value ||
    retailerIndexesFiltered.value.length > 0
  );
});
</script>
