<template>
  <div>
    <font-awesome-icon
      class="cursor-pointer"
      icon="pen-to-square"
      size="lg"
      @click="goTo"
    />
  </div>
</template>
<script setup>
import { Inertia } from "@inertiajs/inertia";
import { computed } from "vue";
import FontAwesomeIcon from "@/Helpers/FontAwsome.js";

const props = defineProps({
  page: null,
  id: null,
});

const url = computed(() => props.page + ".edit");

function goTo() {
  Inertia.get(route(url.value, props.id));
}
</script>
