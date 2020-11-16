<template>
    <v-btn v-if="typeof(attrs.slots)=='string'" v-bind="attrs.props" v-html="attrs.slots" @click="onClick">
    </v-btn>
    <v-btn v-else v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                :attrs="slot"
            />
        </template>
    </v-btn>
</template>

<script>

import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
    methods: {}
}
</script>

