<template>
    <v-breadcrumbs-divider v-if="vif" v-bind="attrs.props">
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
    </v-breadcrumbs-divider>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent]
}
</script>

