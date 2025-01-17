<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
        posts: Object
    })
</script>

<template>
    <MainLayout>
        <div class="py-12">

            <div v-for="post in props.posts" class="mt-5 mx-auto max-w-4xl sm:px-6 lg:px-8">


                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between mb-3">
                            <p class="text-gray-400 ">
                                {{post.userName}}
                            </p>
                            <p class="text-gray-400">
                                {{post.createdAt}}
                            </p>
                        </div>
                        <p class="text-black font-bold text-3xl mb-3">
                            {{post.title}}
                        </p>
                        <p>
                            {{post.content}}
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </MainLayout>
</template>

<style scoped>

</style>
