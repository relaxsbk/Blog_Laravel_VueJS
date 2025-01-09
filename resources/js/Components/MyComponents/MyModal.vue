<script setup>
    import {ref} from "vue";
    import TextInput from "@/Components/TextInput.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import {useForm} from "@inertiajs/vue3";
    import MyInput from "@/Components/MyComponents/MyInput.vue";
    import MyTextarea from "@/Components/MyComponents/MyTextarea.vue";

    const open = ref(false)

    const form = useForm({
        title: '',
        content: ''
    })

    function addPost() {
        form.post(route('createPost'), {
            onSuccess: () => closeModal(),
            onFinish: () => form.reset(),
        })
    }

    const closeModal = () => {
        open.value = false;

        form.clearErrors();
        form.reset();
    }


</script>

<template>
    <button @click="open = true" class="w-fit mb-3 px-4 py-2 bg-gray-700 text-white rounded-lg">Создать пост</button>

    <Teleport to="body">
        <div v-if="open" class=" flex flex-col justify-center items-center fixed z-10 top-[0.1px] w-screen h-screen bg-gray-700/70 ">

            <button @click="open = false" class="text-white mb-2 ">Закрыть</button>
            <div class="bg-white w-2/6 px-4 py-4 rounded-lg flex flex-col gap-4">
                <h1 class="text-3xl text-center">Форма заполнения</h1>
                <form >
                    <MyInput
                        id="title"
                        type="text"
                        v-model="form.title"
                        required
                        autofocus
                        autocomplite="title"
                    />
                    <MyTextarea
                        id="content"
                        v-model="form.content"

                    />
                    <PrimaryButton @click="addPost" :disabled="form.processing"> Отправить </PrimaryButton>
                </form>

            </div>
        </div>
    </Teleport>

</template>

<style scoped>

</style>
