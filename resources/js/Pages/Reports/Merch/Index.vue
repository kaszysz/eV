<template>
  <Head title="Categories Index" />
  <div class="flex items-center m-5">
    <label class="mx-5" for="dateStart">From</label>
    <input v-model="dates.dateStart" id="dateStart" type="date" />
    <label class="mx-5" for="dateEnd">To</label>
    <input v-model="dates.dateEnd" id="dateEnd" type="date" />
    <jet-button class="ml-5 h-max" type="button" @click="exportReport"
      >export</jet-button
    >
  </div>

  <div class="flex w-full text-xs mb-2 font-bold">
    <div class="flex justify-center w-3/12">Date</div>
    <div class="flex justify-center w-2/12">Retailer</div>
    <div class="flex justify-center w-2/12">City</div>
    <div class="flex justify-center w-3/12">Street</div>
    <div class="flex justify-center w-2/12">Actions</div>
  </div>
  <report-merch-details
    class="flex w-full pt-2 pb-2 focus:bg-gray-100 cursor-pointer"
    v-for="reportMerch in reportMerches"
    :key="reportMerch.id"
    :reportMerch="reportMerch"
  />
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
  layout: AppLayout,
};
</script>

<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";
import Actions from "@/Components/Actions.vue";
import { useAlert } from "@/Helpers/Alerts.js";
import ReportMerchDetails from "@/Components/ReportMerchDetails.vue";
import { reactive } from "@vue/reactivity";

useAlert();

const props = defineProps({
  reportMerches: Object,
});

const dates = reactive({
  dateStart: null,
  dateEnd: null,
});

const exportReport = () => {
  axios
    .post(route("report-merches.export"), dates, { responseType: "blob" })
    .then((response) => {
      const url = window.URL.createObjectURL(new Blob([response.data]));
      const link = document.createElement("a");
      link.href = url;
      link.setAttribute("download", "file.xlsx");
      document.body.appendChild(link);
      link.click();
      link.remove();
    });
};
</script>
