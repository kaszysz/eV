<template>
  <Head title="Create Component" />
  <Title>Create Component</Title>

  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <div>
      <jet-label for="categoryId" value="Category" />
      <select-list
        id="categoryId"
        :list="categories"
        :empty="false"
        v-model="form.category_id"
      />
    </div>
    <select-search-box v-model="form.producer_id" :label="'Producer'" :list="props.producers" mode="id" />
    <select-search-box v-model="form.name" :label="'Name'" :list="props.components" mode="name" />
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
import { computed, ref, watch } from "vue";
import SelectSearchBox from "@/Components/SelectSearchBox/SelectSearchBox.vue";
import _ from "lodash";

useAlert();

const props = defineProps({
  categories: null,
  components: null,
  producers: null
});


const form = Inertia.form({
  category_id: null,
  producer_id: null,
  name: null
});


function submit() {
  form.post(route("components.store"), {
    onFinish: () => {
        form.name = ""
    }
  });
}
</script>
