<template>
    <v-col v-bind="attrs.props">
        <BaseSlots :attrs="attrs"/>
    </v-col>
</template>

<script>
export default {
    props: ['attrs']
}
</script>

