<template>

  <div class="container  d-flex justify-content-center mt-5 "  >
<div class="row">
        <div class="col-12 ">
            <h1 class=" text-3xl">Create User</h1>

            <UserFrom :data_user="data_user" :errors="errors" @clickSubmit="submit"></UserFrom>
        </div>
    </div>

</div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import UserFrom from './UserFrom.vue';
export default {

    props:['errors','data_user'],


    methods: {
        submit(data) {
            this.$inertia.post("/create_userData",data);
        }
    },
    components: { Link ,UserFrom}
}
</script>

<style>

</style>
