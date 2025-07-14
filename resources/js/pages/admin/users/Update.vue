<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import Select from '@/components/ui/select/Select.vue';
import SelectContent from '@/components/ui/select/SelectContent.vue';
import SelectGroup from '@/components/ui/select/SelectGroup.vue';
import SelectItem from '@/components/ui/select/SelectItem.vue';
import SelectLabel from '@/components/ui/select/SelectLabel.vue';
import SelectTrigger from '@/components/ui/select/SelectTrigger.vue';
import SelectValue from '@/components/ui/select/SelectValue.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem, User } from '@/types';
import { Role } from '@/types/app';
import { Head, useForm } from '@inertiajs/vue3';
const props = defineProps<{
    user: User;
    roles: Role[];
}>();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Users',
        href: '/users',
    },
    {
        title: 'Update',
        href: `/users/${props.user.id}/edit`,
    },
];
const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: '' as string | null,
    roleId: props.user.roles?.length ? props.user.roles[0].id : null,
});
const submit = async () => {
    form.transform((data) => {
        if (data.password === '') data.password = null;
        return data;
    }).put(route('users.update', { user: props.user.id }), {});
};
</script>
<template>
    <Head title="Create User" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-4">
            <form @submit.prevent="submit" class="flex w-full flex-col items-center space-y-3">
                <div class="grid w-full items-center gap-1.5">
                    <Label for="name">Name</Label>
                    <Input v-model="form.name" id="name" type="text" placeholder="Name" />
                    <div class="text-xs font-thin text-red-700" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div class="grid w-full items-center gap-1.5">
                    <Label for="email">Email</Label>
                    <Input v-model="form.email" id="email" type="email" placeholder="Email" />
                    <div class="text-xs font-thin text-red-700" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
                <div class="grid w-full items-center gap-1.5">
                    <Label for="password">Password</Label>
                    <Input v-model="form.password!" id="password" type="password" placeholder="Password" />
                    <div class="text-xs font-thin text-red-700" v-if="form.errors.password">{{ form.errors.password }}</div>
                </div>
                <div class="grid w-full items-center gap-1.5">
                    <Label>Select Role</Label>
                    <Select v-model="form.roleId">
                        <SelectTrigger class="w-full">
                            <SelectValue placeholder="Select Role" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Roles</SelectLabel>
                                <SelectItem v-for="role in roles" :key="role.id" :value="role.id"> {{ role.name }} </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
                <Button type="submit" class="">Update</Button>
            </form>
        </div>
    </AppLayout>
</template>
