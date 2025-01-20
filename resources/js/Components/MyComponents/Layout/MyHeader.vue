<script setup>

import ButtonDrawer from "@/Components/MyComponents/drawer/ButtonDrawer.vue";
import Drawer from "@/Components/MyComponents/drawer/Drawer.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto py-4">
            <a :href="route('home')" class="flex items-center space-x-3 rtl:space-x-reverse">
<!--                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />-->
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Home</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul  v-if="$page.props.auth.user" class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Мои посты</a>
                    </li>
                    <li>
                        <Link :href="route('dashboard')" class="block py-2 px-3 text-black rounded md:bg-transparent  md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Dashboard</Link>
                    </li>
                    <li>
                        <Link
                            :href="route('Logout.User')"
                            method="post"
                            class="block py-2 px-3 text-red-700 rounded md:bg-transparent  md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">
                            Выход
                        </Link>
                    </li>

                    <li>
                        <!-- drawer init and toggle -->

                    </li>

                </ul>
                <div  v-else >
                    <ButtonDrawer/>
                    <Drawer/>
                </div>

            </div>
        </div>
    </nav>

    <!-- drawer component -->


</template>

<style scoped>

</style>
