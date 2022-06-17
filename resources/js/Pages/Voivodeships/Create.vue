<template>
  <Head title="Create Categories" />
  <Title>Create Voivodeship</Title>

  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <div>
      <jet-label for="name" value="Name" />
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
import { Head } from "@inertiajs/inertia-vue3";
import Title from "@/Components/Title.vue";
import { Inertia } from "@inertiajs/inertia";
import { useAlert } from "@/Helpers/Alerts.js";

useAlert();

const form = Inertia.form({
  name: null,
});

function submit() {
  form.post(route("voivodeships.store"), {
    onFinish: () => this.form.reset('name'),
    preserveScroll: true,
    resetOnSuccess: false,
  });
}
</script>
