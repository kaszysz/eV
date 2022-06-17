<template>
  <div class="flex justify-center space-x-2">
    <Edit :page="page" :id="props.id" />
    <Delete :page="page" :id="props.id" :deleted_at="props.deleted_at" />
  </div>
</template>
<script setup>
import Delete from "@/Components/Actions/Delete.vue";
import Edit from "@/Components/Actions/Edit.vue";

const props = defineProps({
  page: null,
  id: null,
  deleted_at: null,
});
</script>
