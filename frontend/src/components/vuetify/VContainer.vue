<template>
    <v-container v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                :attrs="slot"
            />
        </template>
    </v-container>
</template>

<script>
export default {
    props: ['attrs'],
}
</script>
