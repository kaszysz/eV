<template>
  <Head title="Welcome" />
  <div class="flex flex-col justify-center items-center w-full h-screen">
    <div class="text-5xl lg:text-7xl">Welcome to eV</div>
    <div v-if="canLogin" class="mt-5">
      <div
        v-if="$page.props.user"
        class="text-base lg:text-3xl text-gray-700 text-center"
      >
        <p>You are logged in.</p>
        <p>You will be moved to dashboard.</p>
      </div>

      <template v-else>
        <Link :href="route('login')" class="text-4xl text-gray-700">
          Log in
        </Link>

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 text-4xl text-gray-700"
        >
          Register
        </Link>
      </template>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Head,
    Link,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },

  created() {
    setTimeout(() => this.$inertia.visit(route("dashboard")), 3000);
  },
});
</script>
