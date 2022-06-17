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
        @focus="displayList"
        @blur="hideList"
      />
      <div class="absolute top-0 right-0">
        <font-awesome-icon
          v-if="!showList"
          class="cursor-pointer text-gray-500 -translate-x-4 translate-y-1/2"
          icon="chevron-down"
          size="sm"
          @click="displayList"
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
          @click="hideList"
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

const selectedItem = ref(null);

async function getItemResetRetailerIndex(item) {
  await selectItem(item)
  resetRetailerIndex()
  console.log("zaznaczone")
}
async function selectItem(item) {
  selectedItem.value = item;
}
function resetRetailerIndex() {
  retailerIndex.value = "";
}
function resetRetailerIndexes() {
  retailerIndexes.value = [];
}

watch(selectedItem, () => {
  emits("selectedItem", selectedItem.value);
});

function alertFindError() {
  swal({
    title: "Retailer Index Error",
    text: "We couldn't find index in database",
    icon: "error",
  });
}

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
        showList.value = true;
      }
    })
    .catch((err) => {
      alertFindError();
    });
}

const retailerIndex = ref("");
watch(retailerIndex, () => {
  if (retailerIndex.value.length < 4 && retailerIndexes.value.length >= 1) {
    resetRetailerIndexes();
    return null;
  } else {
    getRetailerIndexes();
  }
});

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

const showList = ref(false);
const displayList = _.debounce(() => {
  if (retailerIndexesFiltered.value.length > 0) {
    showList.value = true;
  }
}, 100);

const hideList = _.debounce(() => {
  showList.value = false;
}, 300);
</script>
