<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
        posts: Object,

    })
</script>

<template>
    <MainLayout>


        <div class="py-12">
            <div  v-show="$page.props.flash.success" class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800  mx-auto max-w-4xl" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ $page.props.flash.success}}</span>
                </div>
            </div>
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
