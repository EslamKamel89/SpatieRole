<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { can } from '@/helpers/can';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { KeyRound, LayoutGrid, Users } from 'lucide-vue-next';
import { onMounted, ref } from 'vue';
import AppLogo from './AppLogo.vue';

const mainNavItems = ref<NavItem[]>([
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
]);
onMounted(() => {
    // console.log({ test: can('users.view') });
    if (can('users.view')) {
        mainNavItems.value.push({
            title: 'Users',
            href: '/users',
            icon: Users,
        });
    }
    if (can('roles.view')) {
        mainNavItems.value.push({
            title: 'Roles',
            href: '/roles',
            icon: KeyRound,
        });
    }
});

const footerNavItems: NavItem[] = [
    // {
    //     title: 'Github Repo',
    //     href: 'https://github.com/laravel/vue-starter-kit',
    //     icon: Folder,
    // },
    // {
    //     title: 'Documentation',
    //     href: 'https://laravel.com/docs/starter-kits#vue',
    //     icon: BookOpen,
    // },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
