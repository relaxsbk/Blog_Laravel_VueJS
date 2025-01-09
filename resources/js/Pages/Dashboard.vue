<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    posts: Array
})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Посты
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        Вы вошли !
                    </div>
                </div>
            </div>
            <div v-for="post in posts" class="mt-5 mx-auto max-w-4xl sm:px-6 lg:px-8">


                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between mb-3">
                            <p class="text-gray-400 ">
                                {{$page.props.auth.user.name}}
                            </p>
                            <p class="text-gray-400">
                                {{post.created_at}}
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
    </AuthenticatedLayout>
</template>
