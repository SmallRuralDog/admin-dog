<template>
    <v-text-field v-bind="attrs.props"></v-text-field>
</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
    data(){
        return{
            nnnn:'123456'
        }
    }
}
</script>

