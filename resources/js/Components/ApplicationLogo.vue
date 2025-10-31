<template>
    <Link href="/" class="flex items-center space-x-2">
        <svg class="h-8 w-8 text-primary" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 2L2 7v10c0 5.5 3.8 9.7 10 11 6.2-1.3 10-5.5 10-11V7l-10-5zm0 2.2l8 4v8.3c0 4.4-3 7.9-8 9.3-5-1.4-8-4.9-8-9.3V8.2l8-4z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
        <span class="text-xl font-semibold text-white">Job for all</span>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
