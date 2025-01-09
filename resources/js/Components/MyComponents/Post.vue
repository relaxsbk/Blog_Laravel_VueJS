<script setup>
    import {useForm} from "@inertiajs/vue3";
    import MyTextarea from "@/Components/MyComponents/MyTextarea.vue";
    import MyInput from "@/Components/MyComponents/MyInput.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import {ref, watch} from "vue";

   const props = defineProps({
        post: Object
    })


    const open = ref(false)

    const form = useForm({
        title: '',
        content: ''
    })

  const updatePost = () => {
      form.patch(route('updatePost', props.post.id), {
          onSuccess: () => closeModal()
      })
  }
    watch(open, (isOpen) => {
        if (isOpen) {
            form.title = props.post.title || '';
            form.content = props.post.content || '';
        }
    });
    const closeModal = () => {
        open.value = false;

        form.clearErrors();
        form.reset();
    }


    const deletePost = () => {
        form.delete(route('deletePost', props.post.id))
    }
</script>

<template>
    <div  class="mt-5 mx-auto max-w-4xl sm:px-6 lg:px-8">

        <div
            class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
        >
            <div class="p-6 text-gray-900">
                <div class="flex justify-between mb-3">
                    <p class="text-gray-400 ">
                        {{$page.props.auth.user.name}}
                    </p>
                    <p class="text-gray-400">
                        {{props.post.created_at}}
                    </p>
                </div>
                <p class="text-black font-bold text-3xl mb-3">
                    {{props.post.title}}
                </p>
                <p>
                    {{props.post.content}}
                </p>
                <div class="mt-3 flex justify-end  gap-4">
                    <button @click="open = true"  class="bg-yellow-600 px-4 py-2 rounded-lg text-white">Изменить</button>
                    <button @click="deletePost" :class="{'opacity-25': form.processing}" :disabled="form.processing" class="bg-red-700 px-4 py-2 rounded-lg text-white">Удалить</button>


                    <Teleport to="body">
                        <div v-if="open" class=" flex flex-col justify-center items-center fixed z-10 top-[0.1px] w-screen h-screen bg-gray-700/70 ">

                            <button @click="open = false" class="text-white mb-2 ">Закрыть</button>
                            <div class="bg-white w-2/6 px-4 py-4 rounded-lg flex flex-col gap-4">
                                <h1 class="text-3xl text-center">Форма редактирования поста</h1>
                                <form >
                                    <MyInput
                                        id="title"
                                        type="text"
                                        v-model="form.title"
                                        required
                                        autofocus
                                        autocomplete="title"
                                    />
                                    <MyTextarea
                                        id="content"
                                        v-model="form.content"

                                    />
                                    <PrimaryButton @click.prevent="updatePost" :class="{'opacity-25': form.processing}" :disabled="form.processing"> Отправить </PrimaryButton>
                                </form>

                            </div>
                        </div>
                    </Teleport>

                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>

</style>
