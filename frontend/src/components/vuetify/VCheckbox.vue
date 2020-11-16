<template>
    <v-checkbox v-bind="attrs.props" v-model="value"></v-checkbox>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
    data() {
        return {
            value: true
        }
    }
}
</script>

