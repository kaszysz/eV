<template>
  <div>
    <font-awesome-icon
      class="cursor-pointer"
      icon="trash-arrow-up"
      size="lg"
      v-if="deleted_at"
      @click="deleteItem"
    />
    <font-awesome-icon
      class="cursor-pointer"
      icon="trash"
      size="lg"
      v-else
      @click="deleteItem"
    />
  </div>
</template>
<script setup>
import { computed, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import FontAwesomeIcon from "@/Helpers/FontAwsome.js";

const props = defineProps({
  page: null,
  id: null,
  deleted_at: null,
});

var text = ref();

const url = computed(() => props.page + ".destroy");

function prepareText() {
  text = props.deleted_at
    ? ref("You want to restore this item")
    : ref("You want to delete this item?");
}

function deleteItem() {
  prepareText();
  swal({
    title: "Are you sure?",
    text: text.value,
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      Inertia.delete(route(url.value, props.id));
    }
  });
}
</script>
