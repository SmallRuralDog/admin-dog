<template>
    <component
        :is="componentData.componentName"
        v-if="componentData"
        :class="componentData.class"
        :style="componentData.style"
        :attrs="componentData"
    />
</template>

<script>
import NProgress from "nprogress";
export default {
    name: "Base",
    data() {
        return {
            path: "/",
            query: {},
            params: {},
            componentData: null
        }
    },
    mounted() {
        this.getView();
    },
    methods: {
        getView() {

            NProgress.start(800);
            this.$http.get(this.$route.fullPath, {
                params: this.params
            }).then(data => {
                this.componentData = data;
                NProgress.done();
            }).catch(() => {
                NProgress.done();
            });
        }
    }
}
</script>
