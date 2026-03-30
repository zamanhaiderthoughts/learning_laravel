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
        <template #header> Job Detail
            <Link :href="route('job.edit', props.job.id)"
                class="ml-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 float-right">
                Edit Job
            </Link>
            <Link :href="route('job.destroy', props.job.id)"
                class="ml-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 float-right">
                Delete Job
            </Link>
         </template>
    <div class="p-4 max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ job.title }}</h2>
                <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                    <div class="bg-blue-50 p-4 rounded">
                        <p class="text-gray-600 text-sm font-semibold">Salary</p>
                        <p class="text-lg font-bold text-gray-800">{{ job?.salary }}</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded">
                        <p class="text-gray-600 text-sm font-semibold">Company</p>
                        <p class="text-lg font-bold text-gray-800">{{ job?.company }}</p>
                    </div>
                    <div class="bg-purple-50 p-4 rounded">
                        <p class="text-gray-600 text-sm font-semibold">Location</p>
                        <p class="text-lg font-bold text-gray-800">{{ job?.location }}</p>
                    </div>
                </div>
            </div>
            <div class="border-t pt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Description</h3>
                <p class="text-gray-700 leading-relaxed">{{ job.description }}</p>
            </div>
        </div>
    </div>
    </AppLayout>
</template>
