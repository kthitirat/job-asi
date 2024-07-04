<template>
    <div class="w-full">
        <div class="w-full bg-blue-600 h-10 flex items-center px-4 lg:px-32">
            <p class="text-white">Phranakhon Si Ayutthaya Rajabhat University</p>
        </div>
        <div class="w-full shadow-md h-20 flex items-center justify-between px-4 lg:px-32">
            <div class="flex items-center">
                <h1 class="text-4xl font-bold uppercase">ARU</h1>
                <h1 class="text-4xl font-bold text-blue-600">Teaching Materials</h1>
            </div>
            <div class="flex gap-2">
                <Link
                    :href="route('index')"
                    class="text-blue-600 px-1 py-0.5 border-blue-600 border-l-0 border-r-0 border-t-0 border-2 font-bold hidden lg:block">
                    Home
                </Link>
                <Link
                    :href="route('login')"
                    class="text-blue-600 px-1 py-0.5 border-blue-600 border-l-0 border-r-0 border-t-0 border-2 font-bold hidden lg:block">
                    Login
                </Link>
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
