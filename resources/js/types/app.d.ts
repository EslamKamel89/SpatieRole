export interface Role {
    id: number;
    name: string;
    guard_name: string;
    created_at: string;
    permissions: Permission[];
}
export interface Permission {
    id: number;
    name: string;
    guard_name: string;
    created_at: string;
    updated_at: string;
}
