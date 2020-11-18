<template>
    <v-checkbox v-bind="attrs.props" v-model="value" @change="onChange"></v-checkbox>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs', 'fields'],
    mixins: [BaseComponent],
    data() {
        return {
            value: true
        }
    },
    mounted() {
        if (this.attrs.vModel) {
            this.value = this._.cloneDeep(this.fields[this.attrs.vModel])
        }
    },
    methods: {
        onChange() {
            this.attrs.vModel && (this.fields[this.attrs.vModel] = this.value);
            this.baseChange()
        }
    }
}
</script>

