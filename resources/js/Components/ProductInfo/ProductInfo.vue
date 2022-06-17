<template>
  <div
    class="
      absolute
      top-0
      left-0
      w-full
      h-full
      flex
      justify-center
      align-middle
      p-5
      mt-5
      bg-white
      shadow-md
    "
  >
    <div class="w-11/12">
      <div class="text-2xl">Product Info</div>
      <jet-label for="retailerIndex" value="Retailer Index" />
      <jet-input
        id="retailerIndex"
        type="text"
        class="block w-full"
        :class="{ 'bg-gray-100': readonly }"
        v-model="product.retailer_index"
        readonly
      />
      <jet-label for="price" value="Price" />
      <jet-input
        id="price"
        type="text"
        class="block w-full"
        :class="{ 'bg-gray-100': readonly }"
        v-model="form.price"
        :readonly="readonly"
      />
      <jet-label for="sale" value="Sale" />
      <jet-input
        id="sale"
        type="text"
        class="block w-full"
        :class="{ 'bg-gray-100': readonly }"
        v-model="form.sale"
        :readonly="readonly"
      />
      <jet-label for="bonus" value="Bonus" />
      <jet-input
        id="bonus"
        type="text"
        class="block w-full"
        :class="{ 'bg-gray-100': readonly }"
        v-model="form.bonus"
        :readonly="readonly"
      />
      <jet-label for="bonusValue" value="Bonus Value" />
      <jet-input
        id="bonusValue"
        type="text"
        class="block w-full"
        :class="{ 'bg-gray-100': readonly }"
        v-model="form.bonus_value"
        :readonly="readonly"
      />
      <div class="flex items-center justify-end mt-4">
        <jet-button
          class="ml-4"
          type="button"
          v-if="readonly"
          @click="edit"
          :key="'keyEdit'"
        >
          Edit
        </jet-button>
        <jet-button
          class="ml-4"
          type="button"
          :class="{ 'opacity-25': form.processing }"
          @click="submitUpdate"
          v-else
          :key="'keyUpdate'"
        >
          Update
        </jet-button>
        <jet-button
          class="ml-4"
          type="button"
          @click="addProduct"
          :key="'keyAdd'"
        >
          Add
        </jet-button>
      </div>
    </div>
  </div>
</template>

<script setup>
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetButton from "@/Jetstream/Button.vue";
import FontAwesomeIcon from "@/Helpers/FontAwsome.js";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  product: null,
});

const emits = defineEmits(["product"]);

const productInfo = props.product;

function updateProductInfo() {
  productInfo.price = form.price;
  productInfo.sale = form.sale;
  productInfo.bonus = form.bonus;
  productInfo.bonus_value = form.bonus_value;
}

const form = Inertia.form({
  id: props.product.id,
  retailer_id: props.product.retailer_id,
  price: props.product.price,
  sale: props.product.sale,
  bonus: props.product.bonus,
  bonus_value: props.product.bonus_value,
});

function submitUpdate() {
  swal({
    title: "Do you want to update the retailer pricing?",
    buttons: {
      confirm: true,
      cancel: true,
    },
  }).then((result) => {
    if (result) {
      axios
        .put(route("retailer-pricings.update.without.redirect", form.id), form)
        .then((res) => {
          updateProductInfo();
          swal({
            title: res.data.alert.title,
            text: res.data.alert.msg,
            icon: "success",
          });
        })
        .catch((error) => {
          swal({
            title: "Retailer Index Update",
            text: "Was failed",
            icon: "error",
          });
        });
    } else {
      swal({
        title: "Updating Report",
        text: "Updating report has been deined",
        icon: "warning",
      });
    }
  });
}

const readonly = ref(true);

const edit = () => {
  swal({
    title: "Do you want to edit the retailer pricing?",
    buttons: {
      confirm: true,
      cancel: true,
    },
  }).then((result) => {
    if (result) {
      readonly.value = false;
    }
  });
};

const addProduct = () => {
  emits("product", productInfo);
};
</script>
