<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MyModal from "@/Components/MyComponents/MyModal.vue";
import Post from "@/Components/MyComponents/Post.vue";

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
                Мои посты
            </h2>
        </template>

        <div class="py-12 ">
            <div class="container mx-auto max-w-4xl px-8 flex flex-col items-end">
                <MyModal />
            </div>
            <Post v-for="post in posts" :post="post" />

        </div>
    </AuthenticatedLayout>
</template>
