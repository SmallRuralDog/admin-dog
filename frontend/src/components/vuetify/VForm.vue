<template>
    <v-form v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                :attrs="slot"
            ></component>
        </template>
    </v-form>
</template>

<script>
export default {
    props: ['attrs']
}
</script>

