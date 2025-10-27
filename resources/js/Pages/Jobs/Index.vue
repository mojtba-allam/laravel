<template>
    <Layout>
        <Head title="Jobs" />

        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900">Job Listings</h1>
                <Button
                    v-if="isAuthenticated"
                    label="Create Job"
                    icon="pi pi-plus"
                    @click="$inertia.visit('/jobs/create')"
                />
            </div>

            <div class="bg-white rounded-lg shadow">
                <DataTable
                    :value="jobs"
                    :paginator="true"
                    :rows="10"
                    :rowsPerPageOptions="[10, 25, 50]"
                    v-model:filters="filters"
                    :globalFilterFields="['title', 'salary', 'employer.name']"
                    filterDisplay="row"
                    sortField="created_at"
                    :sortOrder="-1"
                    class="p-datatable-sm"
                >
                    <template #header>
                        <div class="flex justify-between items-center p-4">
                            <span class="text-lg font-semibold text-gray-700">All Jobs</span>
                            <InputText
                                v-model="filters['global'].value"
                                placeholder="Search jobs..."
                                class="w-80"
                            >
                                <template #prefix>
                                    <i class="pi pi-search" />
                                </template>
                            </InputText>
                        </div>
                    </template>

                    <Column field="title" header="Title" sortable style="min-width: 200px">
                        <template #body="slotProps">
                            <span class="font-medium text-gray-900">{{ slotProps.data.title }}</span>
                        </template>
                    </Column>

                    <Column field="salary" header="Salary" sortable style="min-width: 150px">
                        <template #body="slotProps">
                            <span class="text-gray-700">{{ slotProps.data.salary }}</span>
                        </template>
                    </Column>

                    <Column field="employer.name" header="Employer" sortable style="min-width: 180px">
                        <template #body="slotProps">
                            <span class="text-gray-700">{{ slotProps.data.employer?.name || 'N/A' }}</span>
                        </template>
                    </Column>

                    <Column field="created_at" header="Posted" sortable style="min-width: 150px">
                        <template #body="slotProps">
                            <span class="text-gray-500 text-sm">
                                {{ formatDate(slotProps.data.created_at) }}
                            </span>
                        </template>
                    </Column>

                    <Column header="Actions" style="min-width: 220px">
                        <template #body="slotProps">
                            <div class="flex gap-2">
                                <Button
                                    label="View"
                                    icon="pi pi-eye"
                                    size="small"
                                    severity="info"
                                    @click="$inertia.visit(`/jobs/${slotProps.data.id}`)"
                                />
                                <Button
                                    v-if="slotProps.data.can_edit"
                                    label="Edit"
                                    icon="pi pi-pencil"
                                    size="small"
                                    severity="secondary"
                                    @click="$inertia.visit(`/jobs/${slotProps.data.id}/edit`)"
                                />
                                <Button
                                    v-if="slotProps.data.can_edit"
                                    label="Delete"
                                    icon="pi pi-trash"
                                    size="small"
                                    severity="danger"
                                    @click="confirmDelete(slotProps.data)"
                                />
                            </div>
                        </template>
                    </Column>

                    <template #empty>
                        <div class="text-center p-8 text-gray-500">
                            <i class="pi pi-inbox text-4xl mb-4"></i>
                            <p>No jobs found.</p>
                        </div>
                    </template>
                </DataTable>
            </div>
        </div>

        <!-- Delete Confirmation Dialog -->
        <Dialog v-model:visible="deleteDialogVisible" modal header="Confirm Delete" :style="{ width: '450px' }">
            <div class="flex items-start gap-4">
                <i class="pi pi-exclamation-triangle text-orange-500 text-3xl"></i>
                <div>
                    <p class="mb-2">Are you sure you want to delete this job?</p>
                    <p class="text-sm text-gray-600">
                        <strong>{{ jobToDelete?.title }}</strong>
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
import { ref, computed } from 'vue';
import { Head, usePage, router } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';

const props = defineProps({
    jobs: Array
});

const page = usePage();
const isAuthenticated = computed(() => !!page.props.auth?.user);

// DataTable filters
const filters = ref({
    global: { value: null, matchMode: 'contains' }
});

// Delete confirmation
const deleteDialogVisible = ref(false);
const jobToDelete = ref(null);

function confirmDelete(job) {
    jobToDelete.value = job;
    deleteDialogVisible.value = true;
}

function deleteJob() {
    if (jobToDelete.value) {
        router.delete(`/jobs/${jobToDelete.value.id}`, {
            onSuccess: () => {
                deleteDialogVisible.value = false;
                jobToDelete.value = null;
            }
        });
    }
}

function formatDate(dateString) {
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
}
</script>
