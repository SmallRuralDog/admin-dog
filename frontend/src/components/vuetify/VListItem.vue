<template>
    <v-list-item v-if="vif" v-bind="attrs.props">
        <BaseSlots :attrs="attrs"/>
    </v-list-item>
</template>

<script>
import {BaseComponent} from "@/components/mixins";


export default {

    props: ['attrs'],
    mixins: [BaseComponent]
}
</script>

