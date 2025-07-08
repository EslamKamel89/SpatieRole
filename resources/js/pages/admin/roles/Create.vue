<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Roles',
        href: '/roles',
    },
    {
        title: 'Create',
        href: '/roles/create',
    },
];
const form = useForm({
    name: '',
});
</script>
<template>
    <Head title="Create User" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <form @submit.prevent="form.post(route('roles.store'))" class="flex w-full flex-col items-start space-y-3">
                <div class="grid w-full items-center gap-1.5">
                    <Label for="name">Name</Label>
                    <Input v-model="form.name" id="name" type="text" placeholder="Name" />
                    <div class="text-xs font-thin text-red-700" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>

                <Button type="submit" class="max-w-sm">Create</Button>
            </form>
        </div>
    </AppLayout>
</template>
