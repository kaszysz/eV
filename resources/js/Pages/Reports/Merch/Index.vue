<template>
  <Head title="Categories Index" />
  <date-picker-bar v-model="dates" />
  <jet-button class="ml-1" type="button" @click="exportReport"
    >export</jet-button
  >
  <div class="flex w-full text-xs mb-2 font-bold">
    <div class="flex justify-center w-3/12">Date</div>
    <div class="flex justify-center w-2/12">Retailer</div>
    <div class="flex justify-center w-2/12">City</div>
    <div class="flex justify-center w-3/12">Street</div>
    <div class="flex justify-center w-2/12">Actions</div>
  </div>
  <report-merch-details
    v-for="(reportMerch, index) in reportMerches.data"
    :key="index"
    :reportMerch="reportMerch"
  />
  <div class="flex justify-center mt-5">
    <pagination :links="reportMerches.links" />
  </div>
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
import { useAlert } from "@/Helpers/Alerts.js";
import ReportMerchDetails from "@/Components/ReportMerchDetails.vue";
import { reactive, ref } from "@vue/reactivity";
import Pagination from "@/Jetstream/Pagination.vue";
import DatePickerBar from "@/Components/DatePicker/DatePickerBar.vue";

useAlert();

const props = defineProps({
  reportMerches: Object,
});

const dates = ref({
  dateStart: "2022-06-19",
  dateEnd: "2022-06-19",
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
