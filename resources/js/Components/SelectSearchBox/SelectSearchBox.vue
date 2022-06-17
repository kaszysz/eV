<template>
  <div>
    <jet-label for="name" :value="props.label" />
    <div class="relative mt-1">
      <jet-input
        id="name"
        type="text"
        v-model="mainItem.name"
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
          class="cursor-pointer text-gray-500 -translate-x-4 translate-y-1/2 rotate-180"
          icon="chevron-down"
          size="sm"
          @click="hideList"
        />
      </div>
    </div>

    <div v-if="itemsArray.length > 0" id="selected" class="py-2">
      <div
        class="inline-block mt-1 mx-1 p-1 text-sm bg-gray-200"
        v-for="item in itemsArray"
        :key="item.id"
      >
        {{ item.name }}

        <div class="inline-block px-1 cursor-pointer" @click="removeItem(item)">
          x
        </div>
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
        v-for="item in dropdownList"
        :key="item.id"
        @click="getItem(item)"
      >
        {{ item.name }}
      </div>
    </div>
  </div>
</template>

<script setup>
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import FontAwesomeIcon from "@/Helpers/FontAwsome.js";
import { ref, watch, reactive, computed, toRef } from "vue";
import { DropdownList } from ".//Scripts/DropdownList.js";

const props = defineProps({
  modelValue: null,
  mode: null,
  label: "",
  list: null,
});

const emits = defineEmits(["update:modelValue"]);

const returnMode = props.mode;

const operations = ref(0);

const mainItem = reactive({
  id: null,
  name: "",
});

const itemsArray = reactive([]);

const dropdownList = DropdownList(mainItem, props.list);

watch(mainItem, () => {
  if (returnMode == "id") {
    emits("update:modelValue", mainItem.id);
  }
  if (returnMode == "name") {
    emits("update:modelValue", mainItem.name);
  }
});

watch(itemsArray, () => {
  const itemsIdArray = itemsArray.map((item) => item.id);
  emits("update:modelValue", itemsIdArray);
});

const showList = ref(false);

const displayList = _.debounce(() => {
  if (dropdownList.value.length > 0) {
    showList.value = true;
  }
}, 100);

const hideList = _.debounce(() => {
  if (dropdownList.value.length > 0) {
    showList.value = false;
  }
}, 100);

const input = ref(null);
function FocusInput() {
  if (showList.value === true) {
    closeList();
  } else {
    input.value.focus();
  }
}

const getItem = _.debounce((item) => {
  if (returnMode == "multiselect") {
    addItem(item);
  } else {
    item = item;
  }
}, 100);

const addItem = (item) => {
  if (itemsArray.includes(item)) {
    return null;
  }
  itemsArray.push(item);
};

const removeItem = (item) => {
  itemsArray.splice(itemsArray.indexOf(item), 1);
};
</script>
