<template>
    <Layout>
        <Head title="Contact Us" />

        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Contact Us</h1>
                <p class="text-gray-600 mb-8">
                    Have a question or need help? Send us a message and we'll get back to you as soon as possible.
                </p>

                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Name Field -->
                    <div class="flex flex-col">
                        <label for="name" class="text-sm font-medium text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <InputText
                            id="name"
                            v-model="form.name"
                            :class="{ 'p-invalid': form.errors.name }"
                            placeholder="Your name"
                        />
                        <small v-if="form.errors.name" class="text-red-500 mt-1">
                            {{ form.errors.name }}
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
                            placeholder="your@email.com"
                        />
                        <small v-if="form.errors.email" class="text-red-500 mt-1">
                            {{ form.errors.email }}
                        </small>
                    </div>

                    <!-- Message Field -->
                    <div class="flex flex-col">
                        <label for="message" class="text-sm font-medium text-gray-700 mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <Textarea
                            id="message"
                            v-model="form.message"
                            :class="{ 'p-invalid': form.errors.message }"
                            rows="6"
                            placeholder="Your message..."
                        />
                        <small v-if="form.errors.message" class="text-red-500 mt-1">
                            {{ form.errors.message }}
                        </small>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-4">
                        <Button
                            type="submit"
                            label="Send Message"
                            icon="pi pi-send"
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
import Layout from './Layout.vue';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import Button from 'primevue/button';

const form = useForm({
    name: '',
    email: '',
    message: '',
});

function submit() {
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
}
</script>
