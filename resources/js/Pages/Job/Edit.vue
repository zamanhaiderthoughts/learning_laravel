<script setup>
import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid'
import { ChevronDownIcon } from '@heroicons/vue/16/solid'
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    job: Object,
});

const form = useForm({
    title: props.job.title,
    salary: props.job.salary,
    company: props.job.company,
    location: props.job.location,
    description: props.job.description,
});

const submit = () => {
    form.patch(route('job.update', props.job.id));
};
</script>

<template>
    <AppLayout title="Edit Job">
        <template #header> Edit Job </template>
        <div class="bg-white dark:bg-gray-900 dark:scheme-dark">
            <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <form @submit.prevent="submit">
                        <div class="border-b border-gray-900/10 pb-12 dark:border-white/10">
                            <h2 class="text-base/7 font-semibold text-gray-900 dark:text-white">Profile</h2>
                            <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-400">This information will be
                                displayed
                                publicly so be careful what you share.</p>
                        </div>


                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="title"
                                    class="block text-sm/6 font-medium text-gray-900 dark:text-white">Title</label>
                                <div class="mt-2">
                                    <input type="text" name="title" id="title" v-model="form.title"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="salary"
                                    class="block text-sm/6 font-medium text-gray-900 dark:text-white">Salary</label>
                                <div class="mt-2">
                                    <input type="number" name="salary" id="salary" v-model="form.salary"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="company"
                                    class="block text-sm/6 font-medium text-gray-900 dark:text-white">Company</label>
                                <div class="mt-2">
                                    <input type="text" name="company" id="company" v-model="form.company"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="location"
                                    class="block text-sm/6 font-medium text-gray-900 dark:text-white">Location</label>
                                <div class="mt-2">
                                    <input type="text" name="location" id="location" v-model="form.location"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="description" class="block text-sm/6 font-medium text-white">Description</label>
                                <div class="mt-2">
                                    <textarea name="description" id="description" v-model="form.description" rows="3"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
                                </div>
                                <p class="mt-3 text-sm/6 text-gray-400">Write a few sentences about the job.</p>
                            </div>
                        </div>


                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button"
                                class="text-sm/6 font-semibold text-gray-900 dark:text-white">Cancel</button>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:focus-visible:outline-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
