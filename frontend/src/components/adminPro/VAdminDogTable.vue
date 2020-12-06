<template>
    <div>
        <v-data-table
            v-bind="attrs.props"
            :loading="requesting"
            :headers="headers"
            :items="items"
            @input="onInput"
            @update:options="OnUpdateOptions">
            <template v-for="(slot,name) in attrs.slots" v-slot:[name]="data">
                <BaseSlot
                    :key="name"
                    :slot-data="slot"
                    :slotValue="data"
                    v-bind="$attrs"
                />
            </template>
            <template v-for="(slot,name) in attrs.children">
                <BaseSlot
                    :key="name"
                    :slot-data="slot"
                    v-bind="$attrs"
                />
            </template>
        </v-data-table>
    </div>


</template>

<script>
import {BaseComponent} from "@/components/mixins";

export default {
    props: ['attrs'],
    mixins: [BaseComponent],
    data() {
        return {
            items: [],
            input: [],
            options: null
        }
    },
    mounted() {

    },
    methods: {
        getItems() {
            if (this.attrs.items) {
                this.items = this.attrs.items;
                return;
            }
            let url = this.$route.fullPath;
            let params = {
                ...this.options
            }
            this.requesting = true;
            this.baseEvent('requesting');

            this.$http.get(url, {
                params: params,
                headers: {
                    items: true,
                }
            }).then(res => {
                if (res.lastPage >= 1) {
                    this.items = res.items;
                    this.attrs.props['server-items-length'] = res.total;
                } else {
                    this.items = res;
                }
                this.baseEvent('then');
            }).catch(err => {
                this.error = err
                this.baseEvent('catch');
            }).finally(() => {
                this.requesting = false;
                this.baseEvent('finally');
            })
        },
        onInput(input) {
            this.input = input;
            this.baseEvent('input', input);
            console.log(input)
        },
        OnUpdateOptions(options) {
            this.options = options;

            this.baseEvent('updateOptions', options);

            this.getItems();
        }
    },
    computed: {
        headers() {
            return this.attrs.headers;
        }
    }
}
</script>

