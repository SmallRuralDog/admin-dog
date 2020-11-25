<template>
    <div v-frag v-if="isString" v-html="slotDataBuild"></div>
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


export default {
    name: 'BaseSlot',
    props: ['slotData'],
    computed: {
        isString() {
            return typeof (this.slotData) === 'string';
        },
        slotDataBuild() {
            if (this.isString && this._.endsWith(this.slotData, "}") && this._.startsWith(this.slotData, "{")) {
                let _this = this;
                let code = _this._.replace(_this.slotData, '{{', '')
                code = _this._.replace(code, '}}', '')
                return eval(code)
            }
            return this.slotData;
        }
    }

}
</script>

