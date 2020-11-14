<template>
    <component
        :is="attrs.elementName"
        :class="attrs.class"
        :style="attrs.style"
        v-if="typeof(attrs.slots)=='string'"
        v-bind="attrs.props"
        v-html="attrs.slots"
    >
    </component>
    <component
        v-else
        :is="attrs.elementName"
        :class="attrs.class"
        :style="attrs.style"
        v-bind="attrs.props"
    >
        <template v-for="(slot,name) in attrs.slots">
            <component
                :key="name"
                :class="slot.class"
                :style="slot.style"
                :is="slot.componentName"
                v-bind="slot.props"
                :attrs="slot"
            />
        </template>
    </component>
</template>

<script>
export default {
    props: ['attrs']
}
</script>
