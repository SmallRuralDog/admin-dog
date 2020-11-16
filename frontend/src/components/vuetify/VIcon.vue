<template>
    <v-icon v-bind="attrs.props" v-html="attrs.slots" @click="onClick"
            v-if="attrs.events && attrs.events.click"></v-icon>
    <v-icon v-bind="attrs.props" v-html="attrs.slots" v-else></v-icon>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent]
}
</script>

