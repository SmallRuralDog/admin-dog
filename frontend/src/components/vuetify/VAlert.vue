<template>
    <v-alert v-if="vif" v-bind="attrs.props">
        <BaseSlots :attrs="attrs"/>
    </v-alert>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent]
}
</script>

