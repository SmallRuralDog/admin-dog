<template>
    <v-toolbar v-bind="attrs">
        <BaseSlots :attrs="attrs"/>
    </v-toolbar>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
}
</script>

