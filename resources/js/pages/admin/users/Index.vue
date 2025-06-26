<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem, User } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Pen, Plus, Trash2 } from 'lucide-vue-next';
const props = defineProps<{
    users: User[];
}>();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>
<template>
    <Head title="Users Table" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex w-full justify-end">
                <Link :href="route('users.create')">
                    <Button type="button">
                        <Plus />
                        <span>User</span>
                    </Button>
                </Link>
            </div>
            <Table>
                <!--
                    <TableCaption>A list of your recent invoices.</TableCaption>
                -->
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[100px]"> Name </TableHead>
                        <TableHead>Email</TableHead>
                        <TableHead> Created At </TableHead>
                        <TableHead class="text-right"> Actions </TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="user in users" :key="user.id">
                        <TableCell class="font-medium">
                            {{ user.name }}
                        </TableCell>
                        <TableCell>{{ user.email }}</TableCell>
                        <TableCell> {{ user.created_at }}</TableCell>
                        <TableCell class="">
                            <div class="flex w-full items-center justify-end space-x-2">
                                <Button type="button" variant="destructive" size="sm"><Trash2 /></Button>
                                <Button type="button" variant="secondary" size="sm"><Pen /></Button>
                            </div>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>
    </AppLayout>
</template>
