<template>
    <v-form ref="form" v-bind="attrs.props" @submit="submit">
        <template v-for="(slot,name) in attrs.slots">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                :attrs="slot"
            />
        </template>
    </v-form>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
    methods: {
        submit() {
            this.$refs.form.validate();
            if (this.$refs.form.validate(true)) {
                this.$refs.form.inputs.map(input => {
                    console.log(input.lazyValue)
                    console.log(input)
                })
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

