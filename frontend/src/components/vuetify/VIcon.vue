<template>
    <v-icon v-bind="attrs.props" v-html="attrs.slots"></v-icon>
</template>

<script>
export default {
    props: ['attrs']
}
</script>

