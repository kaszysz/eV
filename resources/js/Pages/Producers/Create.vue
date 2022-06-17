<template>
  <Head title="Create Producer" />
  <Title>Create Producer</Title>

  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <select-search-box
      v-model="form.category_ids"
      :label="'Categories'"
      :list="props.categories"
      mode="multiselect"
    />
    <select-search-box
      v-model="form.name"
      :label="'Name'"
      :list="props.producers"
      mode="name"
    />
    <div class="flex items-center justify-end mt-4">
      <jet-button
        class="ml-4"
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
import { Head, usePage } from "@inertiajs/inertia-vue3";
import CategoryList from "@/Helpers/CategoryList.js";
import Title from "@/Components/Title.vue";
import { Inertia } from "@inertiajs/inertia";
import { useAlert } from "@/Helpers/Alerts.js";
import { computed } from "vue";
import SelectSearchBox from "@/Components/SelectSearchBox/SelectSearchBox.vue";

const props = defineProps({
  categories: null,
  producers: null,
});

useAlert();

const form = Inertia.form({
  name: "",
  category_ids: null,
});

function submit() {
  form.post(route("producers.store"), {
    onFinish: () => (form.name = ""),
  });
}
</script>
