<template>
    <Layout>
        <Head title="Log In" />

        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h1 class="text-2xl font-bold text-center text-gray-900 mb-8">
                    Log In
                </h1>

                <form @submit.prevent="submit" class="space-y-6">
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
                            placeholder="your@email.com"
                            autofocus
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
                            :feedback="false"
                            toggleMask
                            placeholder="Your password"
                        />
                        <small v-if="form.errors.password" class="text-red-500 mt-1">
                            {{ form.errors.password }}
                        </small>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <Checkbox
                            id="remember"
                            v-model="form.remember"
                            :binary="true"
                        />
                        <label for="remember" class="ml-2 text-sm text-gray-700">
                            Remember me
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="space-y-4">
                        <Button
                            type="submit"
                            label="Log In"
                            icon="pi pi-sign-in"
                            class="w-full"
                            :disabled="form.processing"
                            :loading="form.processing"
                        />
                    </div>
                </form>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <Link href="/register" class="text-primary hover:text-blue-700 font-medium">
                            Register here
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
import Checkbox from 'primevue/checkbox';
import Button from 'primevue/button';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

function submit() {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    });
}
</script>
