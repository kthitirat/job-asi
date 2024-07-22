<template>
    <div class="w-full">
        <div class="w-full bg-blue-600 h-10 flex items-center px-4 lg:px-32">
            <p class="text-white">Phranakhon Si Ayutthaya Rajabhat University</p>
        </div>
        <div class="w-full shadow-md h-20 flex items-center justify-between px-4 lg:px-32">
            <div class="flex items-center">
                <h1 class="text-4xl font-bold uppercase">ASI-  </h1>
                <h1 class="text-4xl font-bold text-blue-600">  REGISTER</h1>
            </div>
            <div class="flex gap-2">
                <!-- <Link
                    :href="route('index')"
                    class="text-blue-600 px-1 py-0.5 border-blue-600 border-l-0 border-r-0 border-t-0 border-2 font-bold hidden lg:block">
                    Home
                </Link> -->
                <Link
                    v-if="!this.$page.props.user"
                    :href="route('login')"
                    class="text-blue-600 px-1 py-0.5 border-blue-600 border-l-0 border-r-0 border-t-0 border-2 font-bold hidden lg:block">
                    Login
                </Link>
                <div v-if="this.$page.props.user">
                    <div class="flex gap-2 items-center">
                        <div class="flex-none gap-2">
                            <div class="dropdown dropdown-end">
                                <div class="btn btn-ghost btn-circle avatar" role="button" tabindex="0">
                                    <div class="w-10 rounded-full">
                                        <img :src="this.$page.props.user.profile_photo_url"/>
                                    </div>
                                </div>
                                <ul class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52"
                                    tabindex="0">
                                    <li>                                       
                                        <Link :href="route('institution_profile')">Profile</Link>
                                        <button @click.prevent="logout">Logout</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>สวัสดีคุณ {{ this.$page.props.user.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "Nav",
    components: {Link},
    data() {
        return {};
    },
    methods: {
        logout() {
            Inertia.post(this.route('logout'));
        }
    }
};
</script>
