<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    time: String,
    users: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(search, (value) => {
    Inertia.get(
        "/contacts",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});
</script>

<template>
    <AppLayout title="Contact">
        <template #header> Contact </template>
        <div class="flex justify-between py-3 px-10">
            <h1>Users</h1>
            <input
                v-model="search"
                type="text"
                placeholder="Search..."
                class="border rounded-lg"
            />
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left rtl:text-right text-black-50"
            >
                <tbody>
                    <tr
                        v-for="user in users.data"
                        :key="user.id"
                        class="bg-white border-b text-black"
                    >
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <span>{{ user.id }}</span>
                            </div>
                        </td>
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ user.name }}
                        </th>
                        <td class="px-6 py-4">
                            <Link
                                :href="`/contact/${user.id}/edit`"
                                class="font-medium text-blue-600 hover:underline"
                                >Edit</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-5 flex justify-center">
            <component
                v-for="(link, index) in users.links"
                :key="index"
                :is="link.url ? Link : 'span'"
                :href="link.url || null"
                v-html="link.label"
                class="px-1"
                :class="{
                    'text-grey-400': !link.url,
                    'font-bold': link.active,
                }"
            />
        </div>
    </AppLayout>
</template>
