<template>
    <v-col v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots">
            <BaseSlot
                :key="name"
                :slot-data="slot"
                v-bind="$attrs"
            />
        </template>
    </v-col>
</template>

<script>
export default {
    props: ['attrs']
}
</script>

