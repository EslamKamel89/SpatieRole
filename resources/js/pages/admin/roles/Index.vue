<script setup lang="ts">
import CustomDialog from '@/components/shared/CustomDialog.vue';
import { Button } from '@/components/ui/button';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import Show from '@/pages/admin/roles/Show.vue';
import { BreadcrumbItem } from '@/types';
import { Role } from '@/types/app';
import { Head, Link } from '@inertiajs/vue3';
import { Eye, Pen, Plus, Trash2 } from 'lucide-vue-next';
const props = defineProps<{
    roles: Role[];
}>();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
const deleteRole = (role: Role) => {};
</script>
<template>
    <Head title="Roles Table" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex w-full justify-end">
                <Link :href="route('roles.create')">
                    <Button type="button">
                        <Plus />
                        <span>Role</span>
                    </Button>
                </Link>
            </div>
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[100px]"> Name </TableHead>
                        <TableHead>Guard Name</TableHead>
                        <TableHead> Created At </TableHead>
                        <TableHead class="text-right"> Actions </TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="role in roles" :key="role.id">
                        <TableCell class="font-medium">
                            {{ role.name }}
                        </TableCell>
                        <TableCell>{{ role.guard_name }}</TableCell>
                        <TableCell> {{ role.created_at }}</TableCell>
                        <TableCell class="">
                            <div class="flex w-full items-center justify-end space-x-2">
                                <Button @click="deleteRole(role)" type="button" variant="destructive" size="sm"><Trash2 /></Button>
                                <CustomDialog title="View User" description="">
                                    <template #trigger>
                                        <Button type="button" variant="default" size="sm"><Eye /></Button>
                                    </template>
                                    <template #content>
                                        <Show :role-id="role.id" />
                                    </template>
                                </CustomDialog>
                                <Link :href="route('users.edit', { role: role.id })">
                                    <Button type="button" variant="secondary" size="sm"><Pen /></Button>
                                </Link>
                            </div>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>
    </AppLayout>
</template>
