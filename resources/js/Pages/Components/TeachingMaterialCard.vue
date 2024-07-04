<template>
    <div
        class="w-full h-[550px] border border-slate-200 p-4 font-bold text-gray-700 hover:text-blue-600 hover:shadow-xl transition-all ease-in-out duration-500 cursor-pointer relative"
        @click="visitSubject">
        <img v-if="subject.image.data.length > 0" :src="subject.image.data[0].url" class="w-full h-80 object-cover">
        <div class="mt-2">
            <p class="text-lg text-center leading-5">
                รายวิชา {{ subject.code }} {{ subject.name_th }}
            </p>
            <div class="text-sm text-center mt-4 text-gray-700 font-normal flex flex-col">
                <div v-for="professor in subject.professors" :key="professor.id">
                    <p>อาจารย์ {{ professor.prefix }} {{ professor.first_name }} {{ professor.last_name }}</p>
                    <p>{{ professor.department.name }}</p>
                </div>
                <p>{{ subject.display_published_at }}</p>
                <div class="mt-2 flex gap-1 items-center justify-end text-blue-600 absolute bottom-4 right-4 text-xs">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                        <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{ subject.view }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {router} from "@inertiajs/vue3";


export default {
    name: "TeachingMaterialCard",
    components: {},
    props: {
        subject: {
            type: Object,
            required: true
        }
    },
    mounted() {

    },
    methods: {
        visitSubject() {
            router.visit(this.route('subjects.show', this.subject.id));
        }
    }
}
</script>

