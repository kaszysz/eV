import { computed, watch } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

export const useAlert = () => {
    const alert = computed(() => usePage().props.value.flash.alert);

    watch(alert, (newValue) => {
        if (newValue === null) return;
        swal({
            title: newValue.title,
            text: newValue.msg,
            icon: "success",
        });
    });
}