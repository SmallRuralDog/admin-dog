<template>
    <v-checkbox v-bind="attrs.props" v-model="value" @change="onChange">
        <template v-for="(slot,name) in attrs.slots" :slot="name">
            <BaseSlot
                :key="name"
                :slot-data="slot"
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
    </v-checkbox>
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

