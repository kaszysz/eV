<template>
  <Head title="Products Index" />

  <div class="flex w-full mb-5 text-sm font-bold">
    <div class="flex-1 flex justify-center w-1/12">Category</div>
    <div class="flex-1 flex justify-center w-1/12">Producer</div>
    <div class="flex-1 flex justify-center w-1/12">Model</div>
    <div class="flex-1 flex justify-center w-1/12">Size</div>
    <div class="flex-1 flex justify-center w-1/12">Matrix</div>
    <div class="flex-1 flex justify-center w-1/12">Resolution</div>
    <div class="flex-1 flex justify-center w-1/12">Refresh Rate</div>
    <div class="flex-1 flex justify-center w-1/12">Processor</div>
    <div class="flex-1 flex justify-center w-1/12">RAM</div>
    <div class="flex-1 flex justify-center w-1/12">Disc</div>
    <div class="flex-1 flex justify-center w-1/12">Graphic Card</div>
    <div class="flex-1 flex justify-center w-1/12">OS</div>
    <div class="flex-2 flex justify-center w-1/12">Actions</div>
  </div>
  <div class="flex w-full" v-for="product in products.data" :key="product.id">
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.category) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.producer) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.size) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.matrix) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.resolution) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.refresh_rate) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.processor) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.ram) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.disc) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.graphic_card) }}
    </div>
    <div class="flex justify-center w-1/12">
      {{ DisplayName.Simple(product.os) }}
    </div>
    <div class="flex w-1/12">
      <Actions :page="'products'" :id="product.id" :deleted_at="product.deleted_at" />
    </div>
  </div>
  <paginator :links="props.products.links" />
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
  layout: AppLayout,
};
</script>

<script setup>
import Paginator from "@/Components/Paginator.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Actions from "@/Components/Actions.vue";
import { useAlert } from "@/Helpers/Alerts.js";
import DisplayName from "@/Helpers/DisplayName.js"

useAlert();

const props = defineProps({
  products: Object,
});

</script>
