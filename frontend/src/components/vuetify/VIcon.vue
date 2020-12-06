<template>
    <v-icon v-bind="attrs.props"
            v-if="attrs.events && attrs.events.click" v-on="events">
        <template v-for="slot in attrs.children">
            {{ slot }}
        </template>
    </v-icon>
    <v-icon v-bind="attrs.props" v-else>
        <template v-for="slot in attrs.children">
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

