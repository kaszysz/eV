<template>
  <div class="flex justify-center items-end md:m-5 mb-2">
    <div>
      <label class="md:mx-5" for="dateStart">From</label>
      <date-picker v-model="dates.dateStart" id="dateStart" />
    </div>

    <div>
      <label class="md:mx-5" for="dateEnd">To</label>
      <date-picker v-model="dates.dateEnd" id="dateEnd" />
    </div>
  </div>
</template>
<script setup>
import DatePicker from "@/Components/DatePicker/DatePicker.vue";
import { ref, watch } from "vue";

const props = defineProps({
  modelValue: null,
});

const emits = defineEmits(["update:modelValue"]);

const dates = ref({
  dateStart: props.modelValue.dateStart,
  dateEnd: props.modelValue.dateEnd,
});

watch(
  () => _.cloneDeep(dates),
  () => {
    if (Date.parse(dates.value.dateStart) > Date.parse(dates.value.dateEnd)) {
      swal({
        title: "Date Error",
        className: "font-sans",
        text: "Start date is newer than end date. Do you want exchange dates?",
        icon: "warning",
        buttons: {
          confirm: true,
          cancel: true,
        },
      }).then((result) => {
        if (result) {
          switchDates();
        }
      });
    }
    emits("update:modelValue", dates);
  }
);

function switchDates() {
  const tmpDates = {
    dateStart: dates.value.dateStart,
    dateEnd: dates.value.dateEnd,
  };
  dates.value.dateStart = tmpDates.dateEnd;
  dates.value.dateEnd = tmpDates.dateStart;
}
</script>
