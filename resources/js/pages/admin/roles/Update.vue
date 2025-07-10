<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem } from '@/types';
import { Permission, Role } from '@/types/app';
import { Head, useForm } from '@inertiajs/vue3';
const props = defineProps<{
    role: Role;
    permissions: Permission[];
}>();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Roles',
        href: '/roles',
    },
    {
        title: 'Update',
        href: `/roles/${props.role.id}/edit`,
    },
];
const form = useForm({
    name: props.role.name,
    permissions: props.role.permissions.map((permission) => permission.id),
});
</script>
<template>
    <Head title="Role User" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <form @submit.prevent="form.put(route('roles.update', { role: role.id }))" class="flex w-full flex-col items-start space-y-3">
                <div class="grid w-full items-center gap-1.5">
                    <Label for="name">Name</Label>
                    <Input v-model="form.name" id="name" type="text" placeholder="Name" />
                    <div class="text-xs font-thin text-red-700" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div class="flex items-center space-x-2" v-for="permission in permissions" :key="permission.id">
                    <input type="checkbox" :id="`permission.${permission.id}`" v-model="form.permissions" :value="permission.id" />
                    <label
                        :for="`permission.${permission.id}`"
                        class="text-sm leading-none font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                    >
                        {{ permission.name }}
                    </label>
                </div>
                <Button type="submit" class="max-w-sm">Save</Button>
            </form>
        </div>
    </AppLayout>
</template>
