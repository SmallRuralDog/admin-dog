<template>
    <div v-frag v-if="typeof(slotData)==='string'" v-html="slotData"></div>
    <component
        v-else
        :class="slotData.class"
        :style="slotData.style"
        :is="slotData.componentName"
        :attrs="slotData"
        v-bind="$attrs"
    />

</template>

<script>
import {Fragment} from 'vue-fragment'

export default {
    name: 'BaseSlot',
    props: ['slotData'],
    components: {
        Fragment
    }
}
</script>

