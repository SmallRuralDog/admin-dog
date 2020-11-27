<template>
    <v-dialog v-model="value" v-if="vif" v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots" v-slot:[name]="data">
            <BaseSlot
                :key="name"
                :slot-data="slot"
                :slotValue="data"
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
    </v-dialog>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent]
}
</script>

