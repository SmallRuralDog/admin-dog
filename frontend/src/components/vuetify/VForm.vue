<template>
    <v-form ref="form" v-bind="attrs.props" @submit="submit">
        <BaseSlots :attrs="attrs"/>
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
                    this.baseRequesting();
                    this.$http.post(this.attrs.action, this.fields).then((res) => {
                        this.response = res
                        this.baseThen();
                    }).catch(err => {
                        this.error = err
                        this.baseCatch();
                    }).finally(() => {
                        this.requesting = true;
                        this.baseFinally();
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

