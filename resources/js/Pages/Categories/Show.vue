<template>
  <Head title="Create Categories" />
  <Title>Edit Category</Title>
  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <div>
      <jet-label for="parentId" value="Parent Category" />
      <select-list
        id="parentId"
        :list="categoryTree"
        :selected="form.parent_id"
        v-model="form.parent_id"
      />
    </div>
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
        Edit
      </jet-button>
    </div>
  </form>
</template>


<script>
import FormLayout from "@/Layouts/FormLayout.vue";
export default defineComponent({
  layout: FormLayout,
});
</script>


<script setup>
import { computed, defineComponent, watch } from "vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import SelectList from "@/Components/SelectList.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import CategoryList from "@/Helpers/CategoryList.js";
import { Inertia } from "@inertiajs/inertia";
import Title from "@/Components/Title.vue";

const props = defineProps({
  category: null,
  categories: null,
});

const categoryTree = computed(function () {
  const categoryList = new CategoryList(props.categories);
  return categoryList.Show();
});

const form = Inertia.form({
  parent_id: props.category.parent_id,
  name: props.category.name,
});

function submit() {
  form.put(route("categories.update", props.category.id), {
    preserveScroll: true,
    resetOnSuccess: false,
  });
}

let alert = computed(() => usePage().props.value.flash.alert);
watch(alert, (newValue) => {
    if (newValue === null) return;
  swal({
    title: newValue.title,
    text: newValue.msg,
    icon: "success",
  });
});
</script>
