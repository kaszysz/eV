<template>
  <Head title="Create Component" />
  <Title>Create Component</Title>

  <jet-validation-errors class="mb-4" />

  <div>
    <categories-table :categories="categories" v-model="choosenRecivers" />
  </div>

  <form @submit.prevent="submit">
    <div v-if="choosenRecivers">
      <select-search-boxes
        :retailers="props.retailers"
        :shops="props.shops"
        :users="props.users"
        :choosenCategory="choosenRecivers"
        v-model="form.reciversArray"
      />
    </div>
    <div>
      <jet-label for="title" value="Title" />
      <jet-input
        id="title"
        type="text"
        class="mt-1 block w-full"
        v-model="form.title"
        required
        autofocus
        autocomplete="title"
        :disabled="choosenRecivers == false"
      />
    </div>
    <div>
      <jet-label for="description" value="Description" />
      <jet-text-area
        id="description"
        type="text"
        class="mt-1 block w-full"
        v-model="form.description"
        required
        autofocus
        autocomplete="description"
        :disabled="choosenRecivers == false"
      />
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
import JetInput from "@/Jetstream/Input.vue";
import JetTextArea from "@/Jetstream/TextArea.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import Title from "@/Components/Title.vue";
import { Inertia } from "@inertiajs/inertia";
import { useAlert } from "@/Helpers/Alerts.js";
import { ref, watch } from "vue";
import CategoriesTable from "@/Components/TaskReport/CategoriesTable.vue";
import SelectSearchBoxes from "@/Components/TaskReport/SelectSearchBoxes.vue";
useAlert();
const props = defineProps({
  voivodeships: Array,
  retailers: Array,
  shops: Array,
  users: Array,
});
const form = Inertia.form({
  title: null,
  description: null,
  recivers: String,
  reciversArray: [],
});
const categories = ["retailers", "shops", "users"];
const choosenRecivers = ref(false);

watch(choosenRecivers, () => {
  form.recivers = choosenRecivers.value;
});

function submit() {
  form.post(route("tasks.store"), {
    onFinish: () => {
      form.title = "";
      form.description = "";
      form.recivers = "";
      form.reciversArray = [];
    },
  });
}
</script>
