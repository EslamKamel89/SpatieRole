<script setup lang="ts">
import Skeleton from '@/components/ui/skeleton/Skeleton.vue';
import { Role } from '@/types/app';
import { onMounted, ref } from 'vue';

const props = defineProps<{
    roleId: number;
}>();
const role = ref<Role>();
const isLoading = ref(false);
onMounted(async () => {
    try {
        isLoading.value = true;
        const res = await fetch(route('roles.show', { role: props.roleId }));
        role.value = await res.json();
    } catch (error) {
        console.log(error);
    } finally {
        isLoading.value = false;
    }
});
</script>
<template>
    <div class="space-y-4" v-if="!isLoading">
        <div>
            <div class="text-xs font-thin">Name:</div>
            <div>{{ role?.name }}</div>
        </div>
        <div>
            <div class="text-xs font-thin">Guard Name:</div>
            <div>{{ role?.guard_name }}</div>
        </div>
    </div>
    <div v-else class="space-y-4">
        <div class="space-y-2">
            <Skeleton class="h-4 w-1/3" />
            <Skeleton class="h-8 w-full" />
        </div>
        <div class="space-y-2">
            <Skeleton class="h-4 w-1/3" />
            <Skeleton class="h-8 w-full" />
        </div>
    </div>
</template>
