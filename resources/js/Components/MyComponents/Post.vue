<script setup>
    import {useForm} from "@inertiajs/vue3";

   const props = defineProps({
        post:Array
    })

    const form = useForm({
        id: ''
    })

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
                    <button  class="bg-yellow-600 px-4 py-2 rounded-lg text-white">Изменить</button>
                    <button @click="deletePost" class="bg-red-700 px-4 py-2 rounded-lg text-white">Удалить</button>

                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>

</style>
