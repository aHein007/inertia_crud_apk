<template>
  <form @submit.prevent="submit" class="mt-4">
<div class="mb-3 ">
    <label for="exampleInputName" class="form-label ">Name</label>
    <input v-model="userData.name" type="text" class="form-control rounded " :class="{'is-invalid':errors.name}"  id="exampleInputName" aria-describedby="nameHelp">
    <small v-if="errors.name "  class="invalid-feedback">{{ errors.name }}</small>
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input v-model="userData.email" type="email" class="form-control rounded " :class="{'is-invalid':errors.email}"  id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <small v-if="errors.email" class="invalid-feedback">{{ errors.email }}</small>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label ">Password</label>
    <input v-model="userData.password"  type="password" class="form-control rounded" :class="{'is-invalid' : errors.password}"   id="exampleInputPassword1">
    <small v-if="errors.password"  class=" invalid-feedback">{{ errors.password }}</small>
  </div>

  <button type="submit" class="btn btn-outline-success">Save</button>
  <Link type="submit" :href="route('user#index')" class="float-end btn btn-outline-danger">cancel!</Link>
</form>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {

    props:['errors','data_user'],

    data() {
        return {
            userData: {
                name: this.data_user.name,
                email: this.data_user.email,
                password: ''
            }
        };
    },


    components:{
        Link
    },


    methods:{
        submit(){
            this.$emit('clickSubmit',this.userData)
        }
    },

}
</script>

<style>

</style>
