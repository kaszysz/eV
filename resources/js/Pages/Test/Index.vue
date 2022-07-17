<template>
  <button type="button" @click="test">Test</button>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref } from "vue";
export default {
  layout: AppLayout,
};
</script>

<script setup>

const counter = ref(0)

function test() {
  counter.value++
  console.log("test | " + counter.value)
}
</script>
