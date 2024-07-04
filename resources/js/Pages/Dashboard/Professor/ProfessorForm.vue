<template>
    <form class="w-full grid grid-cols-3 gap-4" @submit.prevent="submit">
        <div class="col-span-3 w-full">
            <button class="w-60 h-72 border border-dashed flex items-center justify-center"
                    type="button" @click="$refs.imageInputRef.click()">
                <div v-if="displayProfessorImage === null">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <img v-if="displayProfessorImage!=null" :src="displayProfessorImage" class="w-full h-72 object-cover">
            </button>
            <input ref="imageInputRef" accept="image/*" class="hidden" type="file" @change="handleSubjectImage">
            <p class="text-red-500 text-sm">{{ $page.props.errors.image }}</p>
        </div>
        <div class="w-full">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">คำนำหน้า</span>
                </div>
                <input v-model="form.prefix" class="input input-bordered" placeholder="คำนำหน้า" type="text"/>
                <p class="text-red-500 text-sm">{{ $page.props.errors.prefix }}</p>
            </label>
        </div>
        <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">ชื่อ</span>
                </div>
                <input v-model="form.first_name" class="input input-bordered w-full" placeholder="ชื่อ"
                       type="text"/>
                <p class="text-red-500 text-sm">{{ $page.props.errors.first_name }}</p>
            </label>
        </div>
        <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">กสุล</span>
                </div>
                <input v-model="form.last_name" class="input input-bordered w-full" placeholder="สกุล"
                       type="text"/>
                <p class="text-red-500 text-sm">{{ $page.props.errors.last_name }}</p>
            </label>
        </div>
        <div class="col-span-3 w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">เลือกคณะ</span>
                </div>
                <select v-model="form.department_id" class="select select-bordered">
                    <option value="">เลือกคณะ</option>
                    <option v-for="department in departments" :key="department.id" :value="department.id">
                        {{ department.name }}
                    </option>
                </select>
            </label>
            <p class="text-red-500 text-sm">{{ $page.props.errors.department_id }}</p>
        </div>
        <div class="col-span-3 w-full flex justify-end">
            <button class="uppercase btn btn-primary">Submit</button>
        </div>
    </form>
</template>

<script>
import {router} from "@inertiajs/vue3";

export default {
    name: "ProfessorForm",
    props: {
        departments: {
            type: Array,
            required: true
        },
        professor: {
            type: Object,
            default: {}
        },
        mode: {
            type: String,
            default: "create"
        }
    },
    data() {
        return {
            form: {
                image: null,
                prefix: null,
                first_name: null,
                last_name: null,
                department_id: null
            },
            displayProfessorImage: null,
        }
    },
    mounted() {
        if (this.mode === 'create') {
            return;
        }
        if (this.professor.image.data.length > 0) {
            this.displayProfessorImage = this.professor.image.data[0].url;
        }
        this.form.prefix = this.professor.prefix;
        this.form.first_name = this.professor.first_name;
        this.form.last_name = this.professor.last_name;
        this.form.department_id = this.professor.department_id;

    },
    methods: {
        handleSubjectImage(event) {
            const image = event.target.files[0];
            this.form.image = image;
            const blob = new Blob([image], {type: image.type});
            const blobUrl = URL.createObjectURL(blob);
            this.displayProfessorImage = blobUrl;
        },
        submit() {
            let url = this.route('dashboard.professors.store');
            if (this.mode === 'edit') {
                url = this.route('dashboard.professors.update', this.professor.id);
            }
            router.post(url, {
                _method: this.mode === 'create' ? 'POST' : 'PATCH',
                image: this.form.image,
                prefix: this.form.prefix,
                first_name: this.form.first_name,
                last_name: this.form.last_name,
                department_id: this.form.department_id
            })
        }
    },
    watch: {
        form: {
            handler: function () {
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
