<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    job: Object,
});
</script>

<template>
    <AppLayout title="Contact">
        <template #header> Job Detail </template>
        <div class="p-4">
            <h1>Title: {{ job.title }}</h1>
            <p>Description : {{ job.description }}</p>
            <h1>Salary: {{ job?.salary }}</h1>
        </div>
    </AppLayout>
</template>
