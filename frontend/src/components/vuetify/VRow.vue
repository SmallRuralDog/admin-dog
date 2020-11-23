<template>
    <v-row v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                :attrs="slot"
                v-bind="$attrs"
            />
        </template>
    </v-row>
</template>

<script>
export default {
    props: ['attrs','fields']
}
</script>

