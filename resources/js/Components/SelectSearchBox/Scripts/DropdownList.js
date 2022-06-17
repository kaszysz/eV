import { computed } from "vue";

export const DropdownList = (item, list) =>
    computed(() => {
        if (item.name.length > 0) {
            let filteredArray = list.filter(
                (_item) =>
                _item.name.toLowerCase().indexOf(item.name.toLowerCase()) > -1
            );
            return filteredArray.slice(0, 5);
        } else {
            return list.slice(0, 5);
        }
    });