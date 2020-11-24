<template>
    <v-text-field v-bind="attrs.props" :value="value" @change="onChange">
        <BaseSlots :attrs="attrs"/>
    </v-text-field>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs', 'fields'],
    mixins: [BaseComponent],
    data() {
        return {
            value: null
        }
    },
    mounted() {
        this.value = this._.cloneDeep(this.fields[this.attrs.vModel])
    },
    methods: {
        onChange(e) {
            this.value = e;
            this.attrs.vModel && (this.fields[this.attrs.vModel] = e);
            this.baseChange()
        }
    }
}
</script>

