<template>
  <Head title="Create Component" />
  <Title>Create Component</Title>

  <jet-validation-errors class="mb-4" />

  <div>
  <div>Select task's category</div>
    <div class="w-full bg-black text-white text-center font-bold p-2 mt-2 cursor-pointer">Retailer</div>
    <div class="w-full bg-black text-white text-center font-bold p-2 mt-2 cursor-pointer">Shops</div>
    <div class="w-full bg-black text-white text-center font-bold p-2 mt-2 cursor-pointer">Users</div>
  </div>

  <form @submit.prevent="submit">
    <div>
      <jet-label for="categoryId" value="Category" />
      <jet-input v-model=/>
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

const form = Inertia.form({
  title: null,
  description: null,
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
