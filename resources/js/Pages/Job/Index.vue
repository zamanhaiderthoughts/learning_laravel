<script setup>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    jobs: Object,
});
</script>

<template>
    <AppLayout title="Contact">
        <template #header> List of Jobs </template>
        <div class="p-4">
            <ul>
                <li v-for="job in jobs.data" :key="job.id">
                    <h1>{{ job.employer?.name ?? 'No employer' }}</h1>
                    <a class="text-blue-900" :href="`/job/${job.id}/detail`"><strong>{{ job.title }}</strong></a>
                </li>
            </ul>
        </div>

        <div class="mt-4">
            <div v-if="jobs.links" class="flex gap-2 justify-center">
            <Link
                v-for="link in jobs.links"
                :key="link.label"
                :href="link.url"
                :class="{
                'px-3 py-1 border rounded': true,
                'bg-blue-500 text-white': link.active,
                'bg-white text-gray-900': !link.active,
                'opacity-50 cursor-not-allowed': !link.url,
                }"
                v-html="link.label"
            />
            </div>
        </div>
    </AppLayout>
</template>
