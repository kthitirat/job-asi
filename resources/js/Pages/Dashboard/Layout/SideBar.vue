<template>
    <div>
        <div
            v-for="nav in availableNavs"
            :key="nav.name"
        >
            <div
                v-if="nav.type === 'group'"
                class="block p-2 text-white mt-2"
            >
                <h3>{{ nav.name }}</h3>
            </div>
            <a
                v-else
                :class="[
                      isUrl(nav.routeGroup)
                        ? 'bg-gray-500 text-white'
                        : 'text-gray-500 hover:bg-gray-500 hover:text-white',
                      'group flex navs-center px-2 py-2 text-base font-medium rounded-md',
                    ]"
                :href="nav.href"
            >
                <component
                    :is="nav.icon"
                    :class="[
                        isUrl(nav.routeGroup)
                          ? 'text-gray-300'
                          : 'text-gray-400 group-hover:text-gray-300',
                        'mr-4 h-6 w-6',
                      ]"
                    aria-hidden="true"
                />
                {{ nav.name }}
            </a>
        </div>
    </div>
</template>
<script>
import {HomeIcon, UserIcon, BookOpenIcon} from "@heroicons/vue/16/solid/index.js";

export default {
    name: "SideBar",
    components: {HomeIcon, UserIcon, BookOpenIcon},
    data() {
        return {
            navs: {
                dashboard: {
                    name: 'Dashboard',
                    href: this.route('dashboard.index'),
                    icon: HomeIcon,
                    routeGroup: 'dashboard.index',
                },
                professors: {
                    name: 'Professor',
                    href: this.route('dashboard.professors.index'),
                    icon: UserIcon,
                    routeGroup: 'dashboard.professors.*',
                },
                subjects: {
                    name: 'Subject',
                    href: this.route('dashboard.subjects.index'),
                    icon: BookOpenIcon,
                    routeGroup: 'dashboard.subjects.*',
                }
            }

        }
    },
    computed: {
        availableNavs() {
            const navs = [];
            navs.push(this.navs.dashboard);
            navs.push(this.navs.professors);
            navs.push(this.navs.subjects);
            return navs;
        }
    },
    methods: {
        isUrl(...urls) {
            return urls.some((url) => route().current(url));
        }
    }
}
</script>
