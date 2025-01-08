<script setup>
    import {ref} from "vue";
    import TextInput from "@/Components/TextInput.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";

    const open = ref(false)
</script>

<template>
    <button @click="open = true" class="w-fit mb-3 px-4 py-2 bg-gray-700 text-white rounded-lg">Создать пост</button>

    <Teleport to="body">
        <div v-if="open" class=" flex flex-col justify-center items-center fixed z-10 top-[0.1px] w-screen h-screen bg-gray-700/70 ">

            <button @click="open = false" class="text-white mb-2 ">Закрыть</button>
            <div class="bg-white w-2/6 px-4 py-4 rounded-lg flex flex-col gap-4">
                <h1 class="text-3xl text-center">Форма заполнения</h1>
                <TextInput v-model="test" />
                <TextInput v-model="test" />
                <TextInput v-model="test" />
                <PrimaryButton> Отправить </PrimaryButton>
            </div>
        </div>
    </Teleport>

</template>

<style scoped>

</style>
