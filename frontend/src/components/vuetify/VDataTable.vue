<template>
    <v-data-table v-bind="attrs.props">
        <BaseSlots :attrs="attrs"/>
    </v-data-table>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
}
</script>
