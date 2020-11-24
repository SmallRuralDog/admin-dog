<template>
    <v-icon v-bind="attrs.props" @click="onClick"
            v-if="attrs.events && attrs.events.click">
        <template v-for="slot in attrs.slots">
            {{ slot }}
        </template>
    </v-icon>
    <v-icon v-bind="attrs.props" v-else>
        <template v-for="slot in attrs.slots">
            {{ slot }}
        </template>
    </v-icon>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent]
}
</script>

