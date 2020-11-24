<template>
    <v-btn v-if="vif" v-bind="attrs.props" @click="onClick">
        <BaseSlots :attrs="attrs"/>
    </v-btn>
</template>

<script>

import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
    methods: {
        onClick() {
            this.baseClick();
        }
    }
}
</script>

