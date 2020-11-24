<template>
    <v-container v-bind="attrs.props">
        <BaseSlots :attrs="attrs"/>
    </v-container>
</template>

<script>
export default {
    props: ['attrs'],
}
</script>
