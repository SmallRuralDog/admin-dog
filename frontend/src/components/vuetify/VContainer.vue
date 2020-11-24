<template>
    <v-container v-bind="attrs.props">
        <template v-for="(slot,name) in attrs.slots">
            <BaseSlot
                :key="name"
                :slot-data="slot"
                v-bind="$attrs"
            />
        </template>
    </v-container>
</template>

<script>
export default {
    props: ['attrs'],
}
</script>
