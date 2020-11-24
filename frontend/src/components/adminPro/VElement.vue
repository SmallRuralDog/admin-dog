<template>
    <component
        :is="attrs.elementName"
        :class="attrs.class"
        :style="attrs.style"
        v-bind="attrs.props"
    >
        <template v-for="(slot,name) in attrs.slots">
            <BaseSlot
                :key="name"
                :slot-data="slot"
                v-bind="$attrs"
            />
        </template>
    </component>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent]
}
</script>
