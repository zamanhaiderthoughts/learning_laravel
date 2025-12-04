<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    user: Object,
});
</script>

<template>
    <AppLayout title="Contact">
        <template #header> User Info </template>
        <div class="p-4">
            <h1>ID : <strong>{{ user.id }}</strong></h1>
            <h1>Name : <strong>{{ user.name }}</strong></h1>
        </div>
    </AppLayout>
</template>
