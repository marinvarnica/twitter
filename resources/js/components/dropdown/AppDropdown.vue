<template>
    <div>
        <div @click.prevent="opened = !opened ">
            <slot name="trigger"/>
        </div>
        <div v-show="opened" class ="absolute bg-gray-900 z-50 rounded-lg w-56 overflow-hidden">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                opened:false
            }
        }
    }

</script>
