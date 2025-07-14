import { AppPageProps } from '@/types';
import { usePage } from '@inertiajs/vue3';

export function can(permission: string): boolean {
    const page = usePage<AppPageProps>();
    const permissions = page.props.auth.permissions.map((p) => p.name);
    // console.info({ permission, permissions, result: permissions.includes(permission) });
    return permissions.includes(permission);
}
