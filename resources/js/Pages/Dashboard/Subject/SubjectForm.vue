<template>
    <form class="w-full grid grid-cols-3 gap-4" @submit.prevent="submit">
        <div class="col-span-3 w-full">
            <button class="w-60 h-72 border border-dashed flex items-center justify-center"
                    type="button" @click="$refs.imageInputRef.click()">
                <div v-if="displaySubjectImage === null">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <img v-if="displaySubjectImage!=null" :src="displaySubjectImage" class="w-full h-72 object-cover">
            </button>
            <input ref="imageInputRef" accept="image/*" class="hidden" type="file" @change="handleSubjectImage">
            <p class="text-red-500 text-sm">{{ $page.props.errors.image }}</p>
        </div>
        <div class="w-full">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">รหัสวิชา</span>
                </div>
                <input v-model="form.code" class="input input-bordered" placeholder="รหัสวิชา" type="text"/>
                <p class="text-red-500 text-sm">{{ $page.props.errors.code }}</p>
            </label>
        </div>
        <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">ชื่อวิชา(ภาษาไทย)</span>
                </div>
                <input v-model="form.name_th" class="input input-bordered w-full" placeholder="ชื่อวิชา(ภาษาไทย)"
                       type="text"/>
                <p class="text-red-500 text-sm">{{ $page.props.errors.name_th }}</p>
            </label>
        </div>
        <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">ชื่อวิชา(ภาษาอังกฤษ)</span>
                </div>
                <input v-model="form.name_en" class="input input-bordered w-full" placeholder="ชื่อวิชา(ภาษาอังกฤษ)"
                       type="text"/>
                <p class="text-red-500 text-sm">{{ $page.props.errors.name_en }}</p>
            </label>
        </div>
        <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">หน่วยกิต</span>
                </div>
                <input v-model="form.unit" class="input input-bordered w-full" placeholder="เช่น 3(3-0-6)"
                       type="text"/>
                <p class="text-red-500 text-sm">{{ $page.props.errors.unit }}</p>
            </label>
        </div>
        <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">วันที่เผยแพร่</span>
                </div>
                <input v-model="form.published_at" class="input input-bordered w-full" placeholder="" type="date"/>
                <p class="text-red-500 text-sm">{{ $page.props.errors.published_at }}</p>
            </label>
        </div>
        <div class="col-span-3 w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">คำอธิบายรายวิชา</span>
                </div>
                <textarea v-model="form.description" class="textarea textarea-bordered textarea-md w-full"
                          placeholder="Bio"
                          rows="5"></textarea>
                <p class="text-red-500 text-sm">{{ $page.props.errors.description }}</p>
            </label>

        </div>
        <div class="col-span-3 w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">เลือกอาจารย์</span>
                </div>
                <select v-model="currentSelectingProfessor" class="select select-bordered"
                        @change="handSelectProfessor">
                    <option value="">เลือกอาจารย์</option>
                    <option v-for="professor in professors" :key="professor.id" :value="professor">
                        {{ professor.prefix }} {{ professor.first_name }} {{ professor.last_name }}
                    </option>
                </select>
            </label>
            <div v-if="form.professors.length > 0" class="w-full flex gap-4 mt-4">
                <div v-for="(professor,professorIndex) in form.professors" :key="professor.id"
                     class="w-40 border flex flex-col pb-2 relative">
                    <img v-if="professor.image" :src="professor.image.data[0].url" class="object-cover w-full h-40">
                    <div class="text-xs text-center leading-4 mt-2">
                        <p>
                            {{ professor.prefix }} {{ professor.first_name }} {{ professor.last_name }}
                        </p>
                        <p>{{ professor.department.name }}</p>
                    </div>
                    <button class="absolute top-1 right-1 text-red-500" type="button"
                            @click="handleRemoveProfessor(professorIndex)">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <p class="text-red-500 text-sm">{{ $page.props.errors.professors }}</p>
        </div>
        <div class="col-span-3 w-full flex gap-2">
            <span class="label-text">เอกสาร</span>
        </div>
        <div class="col-span-3 w-full flex gap-2">
            <div v-if="form.documents.length > 0" class="flex gap-2">
                <div v-for="(doc,index) in form.documents" :key="index"
                     class="w-40 h-40 border flex flex-col pb-2 relative">
                    <div class="h-24 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                stroke-linecap="round"
                                stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="text-xs text-center leading-4 mt-2">
                        <p>{{ doc.name }}</p>
                    </div>
                    <button class="absolute top-1 right-1 text-red-500" type="button"
                            @click="handleRemoveDocument(index)">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <button class="w-40 h-40 border border-dashed flex flex-col pb-2 justify-center items-center"
                    type="button" @click="$refs.documentInputRef.click()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <input ref="documentInputRef" accept=".pdf,.ppt,.pptx,.doc,.docx,.xls,.xlsx"
                   class="hidden" type="file" @change="handleSubjectDocument">
        </div>
        <p class="text-red-500 text-sm">{{ $page.props.errors.documents }}</p>
        <div class="col-span-3 w-full flex justify-end">
            <button class="uppercase btn btn-primary">Submit</button>
        </div>
    </form>
</template>

<script>
import {router} from "@inertiajs/vue3";

export default {
    name: "SubjectForm",
    props: {
        professors: {
            type: Array,
            required: true
        },
        subject: {
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
                code: null,
                name_th: null,
                name_en: null,
                unit: null,
                published_at: null,
                description: null,
                professors: [],
                documents: [],
                to_delete_documents: []
            },
            displaySubjectImage: null,
            currentSelectingProfessor: ""
        }
    },
    mounted() {

        if (this.mode === 'create') {
            return;
        }
        if (this.subject.image.data.length > 0) {
            this.displaySubjectImage = this.subject.image.data[0].url;
        }
        this.form.code = this.subject.code;
        this.form.name_th = this.subject.name_th;
        this.form.name_en = this.subject.name_en;
        this.form.unit = this.subject.unit;
        this.form.published_at = this.subject.published_at;
        this.form.description = this.subject.description;
        this.subject.professors.forEach(professor => {
            this.form.professors.push(professor)
        })
        this.subject.documents.data.forEach(doc => {
            this.form.documents.push(doc)
        })
    },
    methods: {
        handleRemoveDocument(index) {
            if (this.form.documents[index].id !== undefined) {
                this.form.to_delete_documents.push(this.form.documents[index]);
            }
            this.form.documents.splice(index, 1);
        },
        handleSubjectDocument(event) {
            const file = event.target.files[0];
            this.form.documents.push(file);
        },
        handleRemoveProfessor(index) {
            this.form.professors.splice(index, 1);
        },
        handSelectProfessor() {
            this.form.professors.push(this.currentSelectingProfessor);
            this.currentSelectingProfessor = "";
        },
        handleSubjectImage(event) {
            const image = event.target.files[0];
            this.form.image = image;
            const blob = new Blob([image], {type: image.type});
            const blobUrl = URL.createObjectURL(blob);
            this.displaySubjectImage = blobUrl;
        },
        submit() {
            let url = this.route('dashboard.subjects.store');
            if (this.mode === 'edit') {
                url = this.route('dashboard.subjects.update', this.subject.raw_id);
            }
            router.post(url, {
                _method: this.mode === 'create' ? 'POST' : 'PATCH',
                image: this.form.image,
                code: this.form.code,
                name_th: this.form.name_th,
                name_en: this.form.name_en,
                unit: this.form.unit,
                published_at: this.form.published_at,
                description: this.form.description,
                professors: this.form.professors,
                documents: this.form.documents,
                to_delete_documents: this.form.to_delete_documents
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
