<script setup>

import {ref} from "vue";

const model = defineModel({
    type:String,
    required: true,
})

const input = ref(null)

</script>

<template>
    <input
        class="w-full rounded-lg mb-3 "
        v-model="model"
        ref="input"
    />
</template>

<style scoped>

</style>
