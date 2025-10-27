<template>
    <Layout>
        <Head :title="`Edit ${job.title}`" />

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow p-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Job</h1>

                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Title Field -->
                    <div class="flex flex-col">
                        <label for="title" class="text-sm font-medium text-gray-700 mb-2">
                            Job Title <span class="text-red-500">*</span>
                        </label>
                        <InputText
                            id="title"
                            v-model="form.title"
                            :class="{ 'p-invalid': form.errors.title }"
                            placeholder="e.g. Senior Laravel Developer"
                            autofocus
                        />
                        <small v-if="form.errors.title" class="text-red-500 mt-1">
                            {{ form.errors.title }}
                        </small>
                    </div>

                    <!-- Salary Field -->
                    <div class="flex flex-col">
                        <label for="salary" class="text-sm font-medium text-gray-700 mb-2">
                            Salary <span class="text-red-500">*</span>
                        </label>
                        <InputText
                            id="salary"
                            v-model="form.salary"
                            :class="{ 'p-invalid': form.errors.salary }"
                            placeholder="e.g. $90,000 - $120,000"
                        />
                        <small v-if="form.errors.salary" class="text-red-500 mt-1">
                            {{ form.errors.salary }}
                        </small>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-4 pt-4">
                        <Button
                            type="button"
                            label="Cancel"
                            severity="secondary"
                            outlined
                            @click="$inertia.visit(`/jobs/${job.id}`)"
                            :disabled="form.processing"
                        />
                        <Button
                            type="submit"
                            label="Update Job"
                            icon="pi pi-check"
                            :disabled="form.processing"
                            :loading="form.processing"
                        />
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

const props = defineProps({
    job: Object
});

const form = useForm({
    title: props.job.title,
    salary: props.job.salary,
});

function submit() {
    form.patch(`/jobs/${props.job.id}`, {
        preserveScroll: true,
    });
}
</script>
