<template>
    <div class="bg-red-500 text-white p-3 mt-2" v-if="hasErrors">
        <div class="font-medium">Whoops! Something went wrong.</div>

        <ul class="mt-3 list-disc list-inside text-sm">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    })
</script>
