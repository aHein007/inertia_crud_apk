<template>

  <div class="container  d-flex justify-content-center mt-5 "  >
<div class="row">
        <div class="col-12 ">
            <h1 class=" text-3xl">Create User</h1>

<form @submit.prevent="submit" class="mt-4">
<div class="mb-3 ">
    <label for="exampleInputName" class="form-label">Name</label>
    <input v-model="userData.name" type="text" class="form-control rounded"  id="exampleInputName" aria-describedby="nameHelp">
    <small v-if="errors.name">{{ errors.name }}</small>
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input v-model="userData.email" type="email" class="form-control rounded"  id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <small v-if="errors.name">{{ errors.name }}</small>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input v-model="userData.password" type="password" class="form-control rounded"   id="exampleInputPassword1">
    <small v-if="errors.name">{{ errors.name }}</small>
  </div>

  <button type="submit" class="btn btn-outline-success">Create</button>
  <Link type="submit" :href="route('user#index')" class="float-end btn btn-outline-danger">cancel!</Link>
</form>
        </div>
    </div>

</div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {

    props:{
      errors:Object
    },

    data() {
        return {
            userData: {
                name: "",
                email: "",
                passsword: ""
            }
        };
    },
    methods: {
        submit() {
            this.$inertia.post("/create_userData", this.$data.userData);
        }
    },
    components: { Link }
}
</script>

<style>

</style>
