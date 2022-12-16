<template>
   <div class="container  d-flex justify-content-center mt-5 "  >
<div class="row">
        <div class="col-12 ">
            <h1 class=" text-3xl">Edit User</h1>

            <UserFrom :data_user="data_user" :errors="errors" @clickSubmit="submit"></UserFrom>
        </div>
    </div>

</div>

</template>

<script>

import { Link } from '@inertiajs/inertia-vue3';
import UserFrom from './UserFrom.vue';
export default {


    components:{
        Link,
        UserFrom
    },

    props:[
        'data_user',
        'errors',

    ],

    methods:{
        submit(data){
          this.$inertia.put(`/edit_data/${this.data_user.id}`,data)

        }
    },


}
</script>

<style>

</style>
