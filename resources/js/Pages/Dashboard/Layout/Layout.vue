<template>
    <div>
        <nav class="bg-blue-300 fixed top-0 z-30 w-full">
            <div class="navbar relative">
                <div class="flex-1">
                    <div class="flex items-center gap-2">
                        <a class="btn btn-ghost text-xl">Logo</a>
                        <div class="block lg:hidden mt-2">
                            <button class="cursor-pointer" @click="toggleSmallMenu">
                                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex-none gap-2">
                    <div class="dropdown dropdown-end">
                        <div class="btn btn-ghost btn-circle avatar" role="button" tabindex="0">
                            <div class="w-10 rounded-full">
                                <img :src="this.$page.props.user.profile_photo_url" alt="Admin Logo"/>
                            </div>
                        </div>
                        <ul class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52"
                            tabindex="0">
                            <li>
                                <Link :href="route('profile.show')" class="justify-between">
                                    Profile
                                </Link>
                            </li>
                            <!-- <li><a>Settings</a></li> -->
                            <li>
                                <button @click.prevent="logout">Logout</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div v-if="showSmallMenu"
                     class="absolute bg-white w-60 left-24 top-14 shadow-lg rounded-md overflow-hidden">
                    <div class="flex flex-col justify-start items-start w-full">
                        <button
                            class="text-start w-full py-2 hover:bg-gray-500 hover:text-white transition-all ease-in-out duration-300 px-2"
                            type="button"
                            @click="visit('dashboard.index')">
                            Dashboard
                        </button>
                        <button
                            class="text-start w-full py-2 hover:bg-gray-500 hover:text-white transition-all ease-in-out duration-300 px-2"
                            type="button"
                            @click="visit('dashboard.users.index')">
                            User
                        </button>
                        <button
                            class="text-start w-full py-2 hover:bg-gray-500 hover:text-white transition-all ease-in-out duration-300 px-2"
                            type="button"
                            @click="visit('dashboard.performances.index')">
                            Performance
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <div class="fixed left-0 pt-16">
            <div class="drawer lg:drawer-open">
                <input id="my-drawer-2" class="drawer-toggle" type="checkbox"/>
                <div class="drawer-content flex flex-col items-center justify-center">

                </div>
                <div class="drawer-side">
                    <label aria-label="close sidebar" class="drawer-overlay" for="my-drawer-2"></label>
                    <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
                        <side-bar/>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pl-0 lg:pl-80 pt-16">
            <div class="px-8 py-8 overscroll-y-auto">
                <FlashMessage/>
                <slot></slot>
            </div>
        </div>
    </div>

</template>
<script>
import SideBar from "@/Pages/Dashboard/Layout/SideBar.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link} from '@inertiajs/inertia-vue3';
import FlashMessage from "@/Components/FlashMessage.vue";
import {router} from '@inertiajs/vue3'

export default {
    name: "DashboardLayout",
    methods: {
        visit(route) {
            router.visit(this.route(route))
        },
        toggleSmallMenu() {
            this.showSmallMenu = !this.showSmallMenu;
        },
        logout() {
            Inertia.post(this.route('logout'));
        }
    },
    components: {SideBar, Link, FlashMessage},
    data() {
        return {
            showSmallMenu: false
        };
    },

};
</script>

