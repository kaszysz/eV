<template>
  <Head title="Create Categories" />
  <Title>Edit Voivodeship</Title>
  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <div>
      <jet-label for="name" value="Voivodeship Name" />
      <jet-input
        id="name"
        type="text"
        class="mt-1 block w-full"
        v-model="form.name"
        required
        autofocus
        autocomplete="name"
      />
    </div>
    <div class="flex items-center justify-end mt-4">
      <jet-button
        class="ml-4"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Edit
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
import { Inertia } from "@inertiajs/inertia";
import Title from "@/Components/Title.vue";
import { useAlert } from "@/Helpers/Alerts.js";

useAlert();

const props = defineProps({
  voivodeship: null,
});

const form = Inertia.form({
  name: props.voivodeship.name,
});

function submit() {
  form.put(route("categories.update", props.component.id), {
    preserveScroll: true,
    resetOnSuccess: false,
  });
}
</script>
