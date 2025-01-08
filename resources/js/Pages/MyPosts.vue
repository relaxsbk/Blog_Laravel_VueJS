<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MyModal from "@/Components/MyComponents/MyModal.vue";
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
            <div class="flex flex-col items-end mt-5 mx-auto max-w-4xl sm:px-6 lg:px-8">
                <MyModal />

                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                       <div class="flex justify-between mb-3">
                           <p class="text-gray-400 ">
                               Pashok
                           </p>
                           <p class="text-gray-400">
                               12.12.2024
                           </p>
                       </div>
                        <p class="text-black font-bold text-3xl mb-3">
                            Название
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem, cumque dolorum eum explicabo facere ipsam laboriosam natus neque, non obcaecati pariatur, placeat quibusdam quidem recusandae rem saepe unde vel.
                        </p>

                    </div>
                </div>
            </div>
            <div class="mt-5 mx-auto max-w-4xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                       <div class="flex justify-between mb-3">
                           <p class="text-gray-400 ">
                               автор
                           </p>
                           <p class="text-gray-400">
                               дата
                           </p>
                       </div>
                        <p class="text-black font-bold text-3xl mb-3">
                            Название
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem, cumque dolorum eum explicabo facere ipsam laboriosam natus neque, non obcaecati pariatur, placeat quibusdam quidem recusandae rem saepe unde vel.
                        </p>

                    </div>
                </div>
            </div>
            <div class="mt-5 mx-auto max-w-4xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                       <div class="flex justify-between mb-3">
                           <p class="text-gray-400 ">
                               автор
                           </p>
                           <p class="text-gray-400">
                               дата
                           </p>
                       </div>
                        <p class="text-black font-bold text-3xl mb-3">
                            Название
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem, cumque dolorum eum explicabo facere ipsam laboriosam natus neque, non obcaecati pariatur, placeat quibusdam quidem recusandae rem saepe unde vel.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
