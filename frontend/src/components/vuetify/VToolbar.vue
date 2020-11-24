<template>
    <v-toolbar-title v-bind="attrs">
        <template v-for="(slot,name) in attrs.slots" :slot="name">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                :attrs="slot"
                v-bind="$attrs"
            />
        </template>
    </v-toolbar-title>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
}
</script>

