<template>
    <v-form ref="form" v-bind="attrs.props" @submit="submit">
        <template v-for="(slot,name) in attrs.slots" :slot="name">
            <BaseSlot
                :key="name"
                :slot-data="slot"
                v-bind="$attrs"
                :fields="fields"
            />
        </template>
        <template v-for="(slot,name) in attrs.children">
            <BaseSlot
                :key="name"
                :slot-data="slot"
                v-bind="$attrs"
                :fields="fields"
            />
        </template>
    </v-form>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
    data() {
        return {
            fields: {}
        }
    },
    created() {
        this.fields = this.attrs.fields
    },
    methods: {
        submit() {
            this.$refs.form.validate();
            if (this.$refs.form.validate(true)) {
                //if set action
                if (this.attrs.action) {
                    this.requesting = true;
                    this.baseEvent('requesting');
                    this.$http.post(this.attrs.action, this.fields).then((res) => {
                        this.response = res
                        this.baseEvent('then');
                    }).catch(err => {
                        this.error = err
                        this.baseEvent('catch');
                    }).finally(() => {
                        this.requesting = false;
                        this.baseEvent('finally');
                    })
                }
            }
        },
        //Resets the state of all registered inputs (inside the form) to {} for arrays and null for all other values. Resets errors bag when using the lazy-validation prop.
        reset() {
            this.$refs.form.reset();
        },
        //Resets validation of all registered inputs without modifying their state
        resetValidation() {
            this.$refs.form.resetValidation();
        }
    }
}
</script>

