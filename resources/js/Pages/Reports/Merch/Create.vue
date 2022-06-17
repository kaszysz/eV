<template>
  <Head title="Create Report Merch" />
  <Title>Create Report Merch</Title>

  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <closest-shops
      class="mt-2"
      v-model="form.shop_id"
      @retailerId="getRetailerId"
    />
    <div v-if="form.shop_id">
      <index-searcher @selectedItem="getProduct" :retailerId="retailerId" />
      <product-info v-if="product" :product="product" @product="addProduct" />
      <report-retailer-pricings-list
        v-if="products.length > 0"
        v-model="products"
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
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";
import CategoryList from "@/Helpers/CategoryList.js";
import Title from "@/Components/Title.vue";
import { Inertia } from "@inertiajs/inertia";
import { useAlert } from "@/Helpers/Alerts.js";
import { ref } from "vue";
import IndexSearcher from "@/Components/IndexSearcher/IndexSearcher.vue";
import ClosestShops from "@/Components/ClosestShops/ClosestShops.vue";
import ProductInfo from "@/Components/ProductInfo/ProductInfo.vue";
import ReportRetailerPricingsList from "@/components/ReportRetailerPricingsList.vue";
import _ from "lodash";

useAlert();

const props = defineProps({});

const userId = usePage().props.value.user.id;

const form = Inertia.form({
  shop_id: null,
  user_id: userId,
  geo_latitude: null,
  geo_longitude: null,
  retailer_pricings: [],
});

function submit() {
  swal({
    title: "Do you want to save the report?",
    buttons: {
      confirm: true,
      cancel: true,
    },
  }).then((result) => {
    if (result) {
      prepareRetailerPricings();
      form.post(route("report-merches.store"));
    } else {
      swal({
        title: "Create Report",
        text: "Creating report has been deined",
        icon: "warning",
      });
    }
  });
}

const product = ref(null);
function getProduct(newProduct) {
  product.value = newProduct;
}

const products = ref([]);
function addProduct(newProduct) {
  products.value.push(newProduct);
  product.value = null;
}

const retailerId = ref(null);
function getRetailerId(id) {
  retailerId.value = id;
}

const prepareRetailerPricings = () => {
  form.retailer_pricings = products.value.map((x) => {
    return x.id;
  });
};
</script>
