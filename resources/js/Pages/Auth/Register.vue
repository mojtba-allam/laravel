<template>
    <Layout>
        <Head title="Register" />

        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h1 class="text-2xl font-bold text-center text-gray-900 mb-8">
                    Create an Account
                </h1>

                <form @submit.prevent="submit" class="space-y-6">
                    <!-- First Name Field -->
                    <div class="flex flex-col">
                        <label for="first_name" class="text-sm font-medium text-gray-700 mb-2">
                            First Name <span class="text-red-500">*</span>
                        </label>
                        <InputText
                            id="first_name"
                            v-model="form.first_name"
                            :class="{ 'p-invalid': form.errors.first_name }"
                            placeholder="John"
                            autofocus
                        />
                        <small v-if="form.errors.first_name" class="text-red-500 mt-1">
                            {{ form.errors.first_name }}
                        </small>
                    </div>

                    <!-- Last Name Field -->
                    <div class="flex flex-col">
                        <label for="last_name" class="text-sm font-medium text-gray-700 mb-2">
                            Last Name <span class="text-red-500">*</span>
                        </label>
                        <InputText
                            id="last_name"
                            v-model="form.last_name"
                            :class="{ 'p-invalid': form.errors.last_name }"
                            placeholder="Doe"
                        />
                        <small v-if="form.errors.last_name" class="text-red-500 mt-1">
                            {{ form.errors.last_name }}
                        </small>
                    </div>

                    <!-- Email Field -->
                    <div class="flex flex-col">
                        <label for="email" class="text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <InputText
                            id="email"
                            v-model="form.email"
                            :class="{ 'p-invalid': form.errors.email }"
                            type="email"
                            placeholder="john@example.com"
                        />
                        <small v-if="form.errors.email" class="text-red-500 mt-1">
                            {{ form.errors.email }}
                        </small>
                    </div>

                    <!-- Password Field -->
                    <div class="flex flex-col">
                        <label for="password" class="text-sm font-medium text-gray-700 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <Password
                            id="password"
                            v-model="form.password"
                            :class="{ 'p-invalid': form.errors.password }"
                            toggleMask
                            placeholder="Create a password"
                        />
                        <small v-if="form.errors.password" class="text-red-500 mt-1">
                            {{ form.errors.password }}
                        </small>
                    </div>

                    <!-- Password Confirmation Field -->
                    <div class="flex flex-col">
                        <label for="password_confirmation" class="text-sm font-medium text-gray-700 mb-2">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <Password
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            :class="{ 'p-invalid': form.errors.password_confirmation }"
                            :feedback="false"
                            toggleMask
                            placeholder="Confirm your password"
                        />
                        <small v-if="form.errors.password_confirmation" class="text-red-500 mt-1">
                            {{ form.errors.password_confirmation }}
                        </small>
                    </div>

                    <!-- Submit Button -->
                    <div class="space-y-4">
                        <Button
                            type="submit"
                            label="Register"
                            icon="pi pi-user-plus"
                            class="w-full"
                            :disabled="form.processing"
                            :loading="form.processing"
                        />
                    </div>
                </form>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <Link href="/login" class="text-primary hover:text-blue-700 font-medium">
                            Log in here
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';
import Button from 'primevue/button';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

function submit() {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
}
</script>
