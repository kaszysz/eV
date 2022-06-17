import { computed } from "vue";

export const Autocomplete = (name, list) =>
    computed(() => {
        if (!list) return null
        const names = list.map(item => item.name);
        if (name.value.length > 0) {
            let filteredArray = names.filter(
                (item) =>
                item.toLowerCase().indexOf(name.value.toLowerCase()) > -1
            );
            return filteredArray.slice(0, 1)[0];
        }
    });