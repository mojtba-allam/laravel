<template>
    <Layout>
        <Head :title="job.title" />

        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <Button
                    label="Back to Jobs"
                    icon="pi pi-arrow-left"
                    severity="secondary"
                    text
                    @click="$inertia.visit('/jobs')"
                />
            </div>

            <!-- Job Details Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-primary text-white p-6">
                    <h1 class="text-3xl font-bold mb-2">{{ job.title }}</h1>
                    <div class="flex items-center space-x-4 text-blue-100">
                        <span class="flex items-center">
                            <i class="pi pi-building mr-2"></i>
                            {{ job.employer?.name || 'N/A' }}
                        </span>
                        <span class="flex items-center">
                            <i class="pi pi-calendar mr-2"></i>
                            Posted {{ formatDate(job.created_at) }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-6">
                    <!-- Salary -->
                    <div>
                        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">
                            Salary
                        </h2>
                        <p class="text-2xl font-bold text-gray-900">{{ job.salary }}</p>
                    </div>

                    <Divider />

                    <!-- Job Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">
                                Job ID
                            </h3>
                            <p class="text-gray-900">{{ job.id }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">
                                Employer
                            </h3>
                            <p class="text-gray-900">{{ job.employer?.name || 'N/A' }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div v-if="job.can_edit" class="pt-4">
                        <Divider />
                        <div class="flex justify-end space-x-4">
                            <Button
                                label="Edit Job"
                                icon="pi pi-pencil"
                                severity="secondary"
                                @click="$inertia.visit(`/jobs/${job.id}/edit`)"
                            />
                            <Button
                                label="Delete Job"
                                icon="pi pi-trash"
                                severity="danger"
                                @click="confirmDelete"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Dialog -->
        <Dialog v-model:visible="deleteDialogVisible" modal header="Confirm Delete" :style="{ width: '450px' }">
            <div class="flex items-start gap-4">
                <i class="pi pi-exclamation-triangle text-orange-500 text-3xl"></i>
                <div>
                    <p class="mb-2">Are you sure you want to delete this job?</p>
                    <p class="text-sm text-gray-600">
                        <strong>{{ job.title }}</strong>
                    </p>
                    <p class="text-sm text-gray-500 mt-2">This action cannot be undone.</p>
                </div>
            </div>
            <template #footer>
                <Button label="Cancel" severity="secondary" @click="deleteDialogVisible = false" />
                <Button label="Delete" severity="danger" @click="deleteJob" />
            </template>
        </Dialog>
    </Layout>
</template>

<script setup>
import { ref } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Button from 'primevue/button';
import Divider from 'primevue/divider';
import Dialog from 'primevue/dialog';

const props = defineProps({
    job: Object
});

const deleteDialogVisible = ref(false);

function confirmDelete() {
    deleteDialogVisible.value = true;
}

function deleteJob() {
    router.delete(`/jobs/${props.job.id}`, {
        onSuccess: () => {
            deleteDialogVisible.value = false;
        }
    });
}

function formatDate(dateString) {
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}
</script>
