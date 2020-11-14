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
            let viewUrl = window.AdminProConfig.apiRoot + this.$route.fullPath;
            console.log(viewUrl)
            this.$http.get(viewUrl, {
                params: this.params
            }).then(data => {
                this.componentData = data;
            }).catch(() => {

            });
        }
    }
}
</script>
