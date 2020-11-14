<template>
    <v-col v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                :attrs="slot"
            />
        </template>
    </v-col>
</template>

<script>
export default {
    props: ['attrs']
}
</script>

