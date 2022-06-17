<template>
  <Head title="Create Shop" />
  <Title>Create Shop</Title>

  <jet-validation-errors class="mb-4" />

  <form @submit.prevent="submit">
    <div>
      <jet-label for="retailerId" value="Retailer" />
      <select-list
        id="retailerId"
        :list="props.retailers"
        :empty="true"
        v-model="form.retailer_id"
        required
      />
    </div>
    <div>
      <jet-label for="voivodeshipId" value="Voivodeship" />
      <select-list
        id="voivodeshipId"
        :list="props.voivodeships"
        :empty="true"
        v-model="form.voivodeship_id"
        @change="getCities"
        required
      />
    </div>
    <div>
      <jet-label for="cityId" value="City" />
      <select-list
        id="cityId"
        :list="cities"
        :empty="true"
        v-model="form.city_id"
        required
      />
    </div>
    <div>
      <jet-label for="name" value="Street" />
      <jet-input
        id="name"
        type="text"
        class="mt-1 block w-full"
        v-model="form.street"
        required
        autocomplete="name"
      />
    </div>
    <div>
      <jet-label for="fsrId" value="FSR" />
      <select-list
        id="fsrId"
        :list="props.fsrs"
        :empty="true"
        v-model="form.fsr_id"
        required
      />
    </div>
    <div>
      <jet-label for="promoterId" value="Promoter" />
      <select-list
        id="promoterId"
        :list="props.promoters"
        :empty="true"
        v-model="form.promoter_id"
        required
      />
    </div>
    <div>
      <jet-label for="geoLatitude" value="Geo Latitude" />
      <jet-input
        id="geoLatitude"
        type="text"
        class="mt-1 block w-full"
        v-model="form.geo_latitude"
        required
      />
    </div>
    <div>
      <jet-label for="geoLongitude" value="Geo Longitude" />
      <jet-input
        id="geoLongitude"
        type="text"
        class="mt-1 block w-full"
        v-model="form.geo_longitude"
        required
      />
    </div>
    <div class="mt-4 w-full">
      <jet-button
        class=""
        type="button"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        @click="getCoords"
      >
        Get Coords
      </jet-button>
      <jet-button
        class="float-right"
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
import { ref } from "@vue/reactivity";
import Location from "@/Helpers/Location.js";

useAlert();

const props = defineProps({
  retailers: null,
  voivodeships: null,
  fsrs: null,
  promoters: null,
});

const cities = ref({});

function getCities() {
  axios
    .post(route("cities.voivodeship", form.voivodeship_id))
    .then((res) => {
      cities.value = res.data;
    })
    .catch((err) => {
      console.log("Something went wrong");
      return null;
    });
}

const latitude = ref(null);
const longitude = ref(null);

async function getCoords() {
  const position = await Location.getCoords();
  latitude.value = position.latitude;
  longitude.value = position.longitude;
}

const form = Inertia.form({
  retailer_id: null,
  voivodeship_id: null,
  city_id: null,
  street: "",
  fsr_id: null,
  promoter_id: null,
  geo_latitude: latitude,
  geo_longitude: longitude
});

function submit() {
  form.post(route("shops.store"), {
    onFinish: () => this.form.reset(
        "retailer_id",
        "voivodeship_id",
        "city_id",
        "street",
        "fsr_id",
        "promoter_id",
        "geo_latitude",
        "geo_longitude"
        ),
    preserveScroll: true,
    resetOnSuccess: false,
  });
}
</script>
