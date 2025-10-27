<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Toast Container -->
        <Toast />

        <!-- Desktop Navigation -->
        <nav class="bg-gray-800 shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo and Desktop Links -->
                    <div class="flex items-center">
                        <ApplicationLogo />
                        <div class="hidden md:ml-10 md:flex md:space-x-8">
                            <Link
                                href="/"
                                :class="[
                                    'inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2',
                                    currentRoute === 'home'
                                        ? 'border-primary text-white'
                                        : 'border-transparent text-gray-300 hover:border-gray-400 hover:text-white'
                                ]"
                            >
                                Home
                            </Link>
                            <Link
                                href="/jobs"
                                :class="[
                                    'inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2',
                                    currentRoute?.startsWith('jobs.')
                                        ? 'border-primary text-white'
                                        : 'border-transparent text-gray-300 hover:border-gray-400 hover:text-white'
                                ]"
                            >
                                Jobs
                            </Link>
                            <Link
                                href="/contact"
                                :class="[
                                    'inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2',
                                    currentRoute === 'contact'
                                        ? 'border-primary text-white'
                                        : 'border-transparent text-gray-300 hover:border-gray-400 hover:text-white'
                                ]"
                            >
                                Contact
                            </Link>
                        </div>
                    </div>

                    <!-- Right Side (Auth) -->
                    <div class="hidden md:flex md:items-center md:space-x-4">
                        <template v-if="!isAuthenticated">
                            <Link
                                href="/login"
                                class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            >
                                Login
                            </Link>
                            <Link
                                href="/register"
                                class="bg-primary text-white hover:bg-blue-700 px-4 py-2 rounded-md text-sm font-medium"
                            >
                                Register
                            </Link>
                        </template>
                        <template v-else>
                            <span class="text-gray-300 text-sm">{{ user.name }}</span>
                            <Button
                                label="Logout"
                                size="small"
                                severity="secondary"
                                @click="logout"
                            />
                        </template>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center md:hidden">
                        <Button
                            icon="pi pi-bars"
                            @click="mobileMenuOpen = true"
                            severity="secondary"
                            text
                            class="text-white"
                        />
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mobile Sidebar -->
        <Sidebar v-model:visible="mobileMenuOpen" position="right" class="w-80">
            <template #header>
                <div class="flex items-center">
                    <ApplicationLogo />
                </div>
            </template>

            <div class="flex flex-col space-y-2">
                <Link
                    href="/"
                    class="px-4 py-3 text-gray-700 hover:bg-gray-100 rounded"
                    @click="mobileMenuOpen = false"
                >
                    Home
                </Link>
                <Link
                    href="/jobs"
                    class="px-4 py-3 text-gray-700 hover:bg-gray-100 rounded"
                    @click="mobileMenuOpen = false"
                >
                    Jobs
                </Link>
                <Link
                    href="/contact"
                    class="px-4 py-3 text-gray-700 hover:bg-gray-100 rounded"
                    @click="mobileMenuOpen = false"
                >
                    Contact
                </Link>
                <Divider />
                <template v-if="!isAuthenticated">
                    <Link
                        href="/login"
                        class="px-4 py-3 text-gray-700 hover:bg-gray-100 rounded"
                        @click="mobileMenuOpen = false"
                    >
                        Login
                    </Link>
                    <Link
                        href="/register"
                        class="px-4 py-3 text-primary font-medium hover:bg-gray-100 rounded"
                        @click="mobileMenuOpen = false"
                    >
                        Register
                    </Link>
                </template>
                <template v-else>
                    <div class="px-4 py-2 text-sm text-gray-500">
                        Signed in as {{ user.name }}
                    </div>
                    <button
                        @click="logout"
                        class="px-4 py-3 text-left text-gray-700 hover:bg-gray-100 rounded"
                    >
                        Logout
                    </button>
                </template>
            </div>
        </Sidebar>

        <!-- Main Content -->
        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <slot />
            </div>
        </main>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { Link, usePage, router } from '@inertiajs/vue3';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';
import Button from 'primevue/button';
import Sidebar from 'primevue/sidebar';
import Divider from 'primevue/divider';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const page = usePage();
const toast = useToast();
const mobileMenuOpen = ref(false);

// Auth state
const auth = computed(() => page.props.auth);
const user = computed(() => auth.value?.user);
const isAuthenticated = computed(() => !!user.value);

// Current route for navigation highlighting
const currentRoute = computed(() => page.props.currentRoute);

// Flash messages
const flash = computed(() => page.props.flash);

watch(() => flash.value, (newFlash) => {
    if (newFlash.success) {
        toast.add({
            severity: 'success',
            summary: 'Success',
            detail: newFlash.success,
            life: 3000
        });
    }
    if (newFlash.error) {
        toast.add({
            severity: 'error',
            summary: 'Error',
            detail: newFlash.error,
            life: 5000
        });
    }
}, { deep: true });

// Logout function
function logout() {
    router.post('/logout');
    mobileMenuOpen.value = false;
}
</script>
