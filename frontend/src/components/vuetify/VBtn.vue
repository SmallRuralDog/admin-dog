<template>
    <v-btn v-if="vif" v-bind="props" v-on="events">
        <template v-for="(slot,name) in attrs.slots" :slot="name">
            <BaseSlot
                :key="name"
                :slot-data="slot"
                v-bind="$attrs"
            />
        </template>
        <template v-for="(slot,name) in attrs.children">
            <BaseSlot
                :key="name"
                :slot-data="slot"
                v-bind="$attrs"
            />
        </template>
    </v-btn>
</template>

<script>

import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
}
</script>

