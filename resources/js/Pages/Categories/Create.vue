<template>
  <Head title="Create Categories" />
  <Title>Create Category</Title>
  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <div>
      <jet-label for="parentId" value="Parent Category" />
      <select-list
        id="parentId"
        :list="categoryTree"
        :empty="true"
        v-model="form.parent_id"
      />
    </div>
    <div>
      <jet-label for="name" value="Name" />
      <autocomplete-input :list="categories" v-model="form.name" />
    </div>
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
import AutocompleteInput from "@/Components/AutocompleteInput/AutocompleteInput.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import SelectList from "@/Components/SelectList.vue";
import { Head } from "@inertiajs/inertia-vue3";
import CategoryList from "@/Helpers/CategoryList.js";
import Title from "@/Components/Title.vue";
import { Inertia } from "@inertiajs/inertia";
import { useAlert } from "@/Helpers/Alerts.js";
import { computed } from "vue";

useAlert();

const props = defineProps({
  categories: null,
});

const categoryTree = computed(function () {
  const categoryList = new CategoryList(props.categories);
  return categoryList.Show();
});

const form = Inertia.form({
  parent_id: null,
  name: null,
});

function submit() {
  form.post(route("categories.store"), {
    onFinish: () => form.reset("parent_id", "name"),
    preserveScroll: true,
    resetOnSuccess: true,
  });
}
</script>
