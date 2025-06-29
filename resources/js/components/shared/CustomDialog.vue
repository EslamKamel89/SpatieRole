<script setup lang="ts">
import { Dialog, DialogContent, DialogDescription, DialogFooter, DialogHeader, DialogTitle, DialogTrigger } from '@/components/ui/dialog';
const props = defineProps<{
    title: string;
    description: string;
}>();
</script>

<template>
    <Dialog>
        <DialogTrigger as-child>
            <slot name="trigger"></slot>
        </DialogTrigger>
        <DialogContent class="sm:max-w-[425px]">
            <DialogHeader>
                <DialogTitle>{{ title }}</DialogTitle>
                <DialogDescription> {{ description }} </DialogDescription>
            </DialogHeader>
            <slot name="content"></slot>
            <DialogFooter>
                <slot name="footer"></slot>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>
