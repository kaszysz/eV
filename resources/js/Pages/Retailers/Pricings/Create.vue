<template>
  <Head title="Create Retailer Pricing" />
  <Title>Create Retailer Pricing</Title>
  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <div>
      <jet-label for="retailerId" value="Retailer" />
      <select-list
        id="retailerId"
        :list="props.retailers"
        :empty="false"
        v-model="form.retailer_id"
      />
    </div>
    <div>
      <jet-label for="categoryId" value="Category" />
      <select-list
        id="categoryId"
        :list="categoryTree"
        :empty="true"
        v-model="categoryId"
        @change="getProducts"
      />
    </div>

    <div>
      <jet-label for="productId" value="Product" />
      <select-list
        id="productId"
        :list="products"
        :empty="false"
        v-model="form.product_id"
      />
    </div>
    <div>
      <jet-label for="index" value="Index" />
      <jet-input
        id="index"
        type="text"
        class="mt-1 block w-full"
        v-model="form.retailer_index"
        required
        autocomplete="index"
      />
    </div>
    <div>
      <jet-label for="price" value="Price" />
      <jet-input
        id="price"
        type="text"
        class="mt-1 block w-full"
        v-model="form.price"
        required
        autocomplete="price"
      />
    </div>
    <div>
      <jet-label for="sale" value="Sale" />
      <jet-input
        id="sale"
        type="text"
        class="mt-1 block w-full"
        v-model="form.sale"
        autocomplete="sale"
      />
    </div>
    <div>
      <jet-label for="bonus" value="Bonus" />
      <jet-input
        id="bonus"
        type="text"
        class="mt-1 block w-full"
        v-model="form.bonus"
        autocomplete="bonus"
      />
    </div>
    <div>
      <jet-label for="bonusValue" value="Bonus Value" />
      <jet-input
        id="bonusValue"
        type="text"
        class="mt-1 block w-full"
        v-model="form.bonus_value"
        autocomplete="bonusValue"
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
import SelectList from "@/Components/SelectList.vue";
import { Head } from "@inertiajs/inertia-vue3";
import CategoryList from "@/Helpers/CategoryList.js";
import Title from "@/Components/Title.vue";
import { Inertia } from "@inertiajs/inertia";
import { useAlert } from "@/Helpers/Alerts.js";
import { computed, ref } from "vue";

useAlert();

const props = defineProps({
  categories: null,
  retailers: null,
});

const form = Inertia.form({
  retailer_id: null,
  product_id: null,
  retailer_index: null,
  price: null,
  sale: null,
  bonus: null,
  bonus_value: null,
});

function submit() {
  form.post(route("retailer-pricings.store"), {
    preserveScroll: true,
    resetOnSuccess: true,
  });
}

const categoryTree = computed(function () {
  const categoryList = new CategoryList(props.categories);
  return categoryList.Show();
});

const categoryId = ref(null);

const products = ref({});

async function getProducts() {
  if (!categoryId.value) {
    products.value = null;
    return null;
  }
  await axios.post(route("products.category", categoryId.value)).then((res) => {
    products.value = res.data;
  });
}
</script>
