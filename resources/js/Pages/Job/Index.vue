<script setup>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    jobs: Object,
});
</script>

<template>
    <AppLayout title="Contact">
        <template #header> List of Jobs
            <Link :href="route('job.create')"
                class="ml-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 float-right">
                Create Job
            </Link>
        </template>

        <div class="p-4">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Employer</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="job in jobs.data" :key="job.id" class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ job.employer?.name ?? 'No employer' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ job.title }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <Link :href="`/job/${job.id}/detail`" class="text-blue-600 hover:underline">View</Link>
                            <Link :href="`/job/${job.id}/edit`" class="text-blue-600 hover:underline ml-2">Edit</Link>
                            <Link :href="route('job.destroy', job.id)" method="delete" class="text-red-600 hover:underline ml-2">Delete</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <div v-if="jobs.links" class="flex gap-2 justify-center">
                <Link v-for="link in jobs.links" :key="link.label" :href="link.url" :class="{
                    'px-3 py-1 border rounded': true,
                    'bg-blue-500 text-white': link.active,
                    'bg-white text-gray-900': !link.active,
                    'opacity-50 cursor-not-allowed': !link.url,
                }" v-html="link.label" />
            </div>
        </div>
    </AppLayout>
</template>
