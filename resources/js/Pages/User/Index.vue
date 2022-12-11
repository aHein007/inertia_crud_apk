<template>
  <div class="container alert alert-danger mt-5" style="max-width:1000px;" v-if="$page.props.flash.message" >
      {{ $page.props.flash.message }}
  </div>

  <div class="container alert alert-success mt-5" style="max-width:1000px;" v-if="$page.props.flash.create" >
      {{ $page.props.flash.create }}
  </div>
<div class="container mt-5 mx-3"  >

  <h1 class=" text-3xl">User List</h1>
<table class="table mt-5">
  <thead >
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Eamil</th>
      <th scope="col">Date</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody v-for="user in users" :key="user.id">
    <tr>
      <th scope="row">{{ user.id }}</th>
      <td>{{ user.name }}</td>
      <td>{{ user.email }}</td>
      <td>{{ user.created_at }}</td>
      <td>

        <Link  class="btn btn-success me-1 btn-sm">Edit</Link>
        <Link @click="destroy(user.id)" class="btn btn-danger btn-sm">Delete</Link>

      </td>
    </tr>








  </tbody>
</table>

<Link class="btn btn-primary btn-sm mt-3" href="/create_user">Create</Link>
</div>

</template>

<script>

import { Link } from '@inertiajs/inertia-vue3';



export default {
    props: {
        users: Array,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(`delete/${id}`);
        },



    },
    components: { Link }
}
</script>

<style>
.danger{
  background-color:crimson ;
}
</style>
