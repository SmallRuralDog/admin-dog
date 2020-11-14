<template>
    <v-btn v-if="typeof(attrs.slots)=='string'" v-bind="attrs.props" v-html="attrs.slots" @click="onClick">
    </v-btn>
    <v-btn v-else v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                :attrs="slot"
            />
        </template>
    </v-btn>
</template>

<script>
export default {
    props: ['attrs'],
    methods: {
        onClick() {
            let _this = this;
            this.attrs.events && this.attrs.events.click && new Function('_this',this.attrs.events.click)(_this)
        }
    }
}
</script>

