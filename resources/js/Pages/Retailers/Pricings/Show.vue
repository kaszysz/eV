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
        :selected="form.retailer_id"
        v-model="form.retailer_id"
      />
    </div>
    <div>
      <jet-label for="categoryId" value="Category" />
      <select-list
        id="categoryId"
        :list="categoryTree"
        :empty="true"
        :selected="categoryId"
        v-model="categoryId"
        @change="getProducts"
      />
    </div>

    <div>
      <jet-label for="productId" value="Product" />
      <select-list
        id="productId"
        :list="products"
        :selected="form.product_id"
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
        Update
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
  retailerPricing: null,
  categories: null,
  products: null,
  retailers: null,
});

const form = Inertia.form({
  retailer_id: props.retailerPricing.retailer_id,
  product_id: props.retailerPricing.product_id,
  retailer_index: props.retailerPricing.retailer_index,
  price: props.retailerPricing.price,
  sale: props.retailerPricing.sale,
  bonus: props.retailerPricing.bonus,
  bonus_value: props.retailerPricing.bonus_value,
});

function submit() {
  form.put(route("retailer-pricings.update", props.retailerPricing.id), {
    preserveScroll: true
  });
}

const categoryTree = computed(function () {
  const categoryList = new CategoryList(props.categories);
  return categoryList.Show();
});

const categoryId = ref(props.retailerPricing.product.category_id);

const products = ref(props.products);

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
