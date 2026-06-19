<template>
	<div v-if="Object.keys(errors).length" class="rounded-md bg-red-50 dark:bg-red-900/30 p-4 border border-red-200 dark:border-red-400/20">
		<ul class="text-sm text-red-700 dark:text-red-200 space-y-1">
			<li v-for="(error, key) in errors" :key="key">{{ error }}</li>
		</ul>
	</div>
</template>

<script setup>
// ErrorAlert.vue
// Props: errors (object)
defineProps({
	errors: {
		type: Object,
		required: true
	}
});
</script>
