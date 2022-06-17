<template>
  <Head title="Create Product" />
  <Title>Create Product</Title>

  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <jet-label for="categoryId" value="Category" />
    <select-list
      id="categoryId"
      :list="categoryTree"
      :empty="true"
      v-model="form.category_id"
      required
    />
    <jet-label for="producerId" value="Producer" />
    <select-list
      id="producerId"
      :list="props.producers"
      :empty="true"
      v-model="form.producer_id"
      required
    />
    <jet-label for="pn" value="Part Number" />
    <autocomplete-input
      id="pn"
      v-model="form.part_number"
      :list="props.part_numbers"
      required
    />
    <jet-label for="name" value="Model" />
    <autocomplete-input
      id="name"
      v-model="form.name"
      :list="props.names"
      required
    />
    <jet-label for="sizeId" value="Size" />
    <select-list
      id="sizeId"
      :list="props.sizes"
      :empty="true"
      v-model="form.size_id"
    />
    <jet-label for="matrixId" value="Matrix" />
    <select-list
      id="matrixId"
      :list="props.matrixes"
      :empty="true"
      v-model="form.matrix_id"
    />
    <jet-label for="resolutionId" value="Resolution" />
    <select-list
      id="resolutionId"
      :list="props.resolutions"
      :empty="true"
      v-model="form.resolution_id"
    />
    <jet-label for="refreshRateId" value="Refresh Rate" />
    <select-list
      id="refreshRateId"
      :list="props.refresh_rates"
      :empty="true"
      v-model="form.refresh_rate_id"
    />
    <jet-label for="processorId" value="Processor" />
    <select-list
      id="processorId"
      :list="props.processors"
      :empty="true"
      v-model="form.processor_id"
    />
    <jet-label for="ramId" value="RAM" />
    <select-list
      id="ramId"
      :list="props.rams"
      :empty="true"
      v-model="form.ram_id"
    />
    <jet-label for="discId" value="Disc" />
    <select-list
      id="discId"
      :list="props.discs"
      :empty="true"
      v-model="form.disc_id"
    />
    <jet-label for="graphicCardId" value="Graphic Card" />
    <select-list
      id="graphicCardId"
      :list="props.graphic_cards"
      :empty="true"
      v-model="form.graphic_card_id"
    />
    <jet-label for="osId" value="OS" />
    <select-list id="osId" :list="props.oses" :empty="true" v-model="form.os" />
    <div class="mt-4 w-full">
      <jet-button
        class="float-right"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Create
      </jet-button>
    </div>
  </form>
</template>

<script>
import FormLayout from "@/Layouts/FormLayout.vue";

export default {
  layout: FormLayout,
};
</script>


<script setup>
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import SelectList from "@/Components/SelectList.vue";
import { Head } from "@inertiajs/inertia-vue3";
import CategoryList from "@/Helpers/CategoryList.js";
import Title from "@/Components/Title.vue";
import { Inertia } from "@inertiajs/inertia";
import { useAlert } from "@/Helpers/Alerts.js";
import { ref } from "@vue/reactivity";
import { computed } from "@vue/runtime-core";
import AutocompleteInput from "@/Components/AutocompleteInput/AutocompleteInput.vue";

useAlert();

const props = defineProps({
  categories: null,
  components: null,
  producers: null,
  part_numbers: null,
  processors: null,
  names: null,
});

const form = Inertia.form({
  part_number: null,
  category_id: null,
  producer_id: null,
  name: "",
  size_id: null,
  matrix_id: null,
  resolution_id: null,
  refresh_rate_id: null,
  processor_id: null,
  ram_id: null,
  disc_id: null,
  graphic_card_id: null,
  os_id: null,
});

function submit() {
  form.post(route("products.store"), {
    onFinish: () => {
      (form.part_number = null),
        (form.category_id = null),
        (form.producer_id = null),
        (form.name = null),
        (form.size_id = null),
        (form.matrix_id = null),
        (form.resolution_id = null),
        (form.refresh_rate_id = null),
        (form.processor_id = null),
        (form.ram_id = null),
        (form.disc_id = null),
        (form.graphic_card_id = null),
        (form.os_id = null);
    },
    preserveScroll: true,
    resetOnSuccess: true,
  });
}

const categoryTree = computed(function () {
  const categoryList = new CategoryList(props.categories);
  return categoryList.Show();
});
</script>
