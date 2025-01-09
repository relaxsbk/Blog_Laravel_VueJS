<script setup>
import {ref} from "vue";

const model = defineModel({
    type: String,
    required: true
})

const textArea = ref(null)
</script>

<template>
    <textarea
        class="w-full rounded-lg mb-3"
        v-model="model"
        ref="textArea"
    />


</template>

<style scoped>

</style>
