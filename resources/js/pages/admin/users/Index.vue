<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { User } from '@/types';
const props = defineProps<{
    users: User[];
}>();
</script>
<template>
    <AppLayout>
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <pre>{{ users }}</pre>
        </div>
    </AppLayout>
</template>
