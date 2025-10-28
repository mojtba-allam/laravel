<template>
    <Layout>
        <Head title="Home" />

        <!-- Hero Section -->
        <div class="bg-white">
            <div class="max-w-4xl mx-auto py-16 px-4 text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-6">
                    Welcome to Jobs
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Find your next opportunity or post job openings to connect with talented professionals.
                </p>
                <div class="space-x-4">
                    <Button
                        label="Browse Jobs"
                        icon="pi pi-search"
                        @click="$inertia.visit('/jobs')"
                        size="large"
                        class="px-8 py-3"
                    />
                    <Button
                        label="Post a Job"
                        icon="pi pi-plus"
                        @click="$inertia.visit('/jobs/create')"
                        severity="secondary"
                        outlined
                        size="large"
                        class="px-8 py-3"
                        v-if="isAuthenticated"
                    />
                    <Button
                        label="Get Started"
                        icon="pi pi-user-plus"
                        @click="$inertia.visit('/register')"
                        severity="secondary"
                        outlined
                        size="large"
                        class="px-8 py-3"
                        v-else
                    />
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">
                    Why Choose Jobs?
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-primary rounded-full flex items-center justify-center">
                            <i class="pi pi-search text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Easy Job Search</h3>
                        <p class="text-gray-600">
                            Search and filter jobs with our powerful search functionality.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-primary rounded-full flex items-center justify-center">
                            <i class="pi pi-users text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Connect Employers</h3>
                        <p class="text-gray-600">
                            Direct connection between job seekers and employers.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-primary rounded-full flex items-center justify-center">
                            <i class="pi pi-shield text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Trusted Platform</h3>
                        <p class="text-gray-600">
                            Secure and reliable job posting and application process.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { computed } from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import Layout from './Layout.vue';
import Button from 'primevue/button';

const page = usePage();
const isAuthenticated = computed(() => !!page.props.auth?.user);
</script>
