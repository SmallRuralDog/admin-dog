<template>
    <v-text-field v-bind="attrs.props" :value="value" @change="onChange">
        <template v-for="(slot,name) in attrs.slots" v-slot:[name]>
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

        //如果是表单传值进来的
        if (this.fields && this.attrs.vModel) {
            this.value = this._.cloneDeep(this.fields[this.attrs.vModel])
        }
        //如果是插槽
        if (this.$attrs.slotValue && this.attrs.vModel) {
            this.value = this._.cloneDeep(this._.get(this.$attrs.slotValue, this.attrs.vModel))
        }
    },
    methods: {
        onChange(e) {
            this.value = e;
            //如果是表单传值进来的
            if (this.fields) {
                this.attrs.vModel && (this.fields[this.attrs.vModel] = e);
            }
            //如果是插槽
            if (this.$attrs.slotValue) {
                this.attrs.vModel && this._.set(this.$attrs.slotValue, this.attrs.vModel, e);
            }
            this.baseChange()
        }
    }
}
</script>

