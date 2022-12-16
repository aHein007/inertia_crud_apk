<template>
  <div class="container alert alert-danger mt-5" style="max-width:1000px;" v-if="$page.props.flash.message" >
      {{ $page.props.flash.message }}
  </div>

  <div class="container alert alert-success mt-5" style="max-width:1000px;" v-if="$page.props.flash.create" >
      {{ $page.props.flash.create }}
  </div>

  <div class="container alert alert-success mt-5" style="max-width:1000px;" v-if="$page.props.flash.update" >
      {{ $page.props.flash.update }}
  </div>
<div class="container-lg mt-5 mx-3"  >

 <div class="row">
    <div class="col-8">
        <h1 class=" text-3xl">User List</h1>
    </div>

    <div class="col-4">
        <form @submit.prevent="search" method="post">
        <div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" v-model="searchName" :placeholder="search_Name ==null ?'':search_Name +'....'" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </div>
    </form>
    </div>
 </div>
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
  <tbody v-for="user in users.data" :key="user.id">
    <tr>
      <th scope="row">{{ user.id }}</th>
      <td>{{ user.name }}</td>
      <td>{{ user.email }}</td>
      <td>{{ user.created_at }}</td>
      <td>

        <Link :href="route('user#edit',user.id)"  class="btn btn-success me-1 btn-sm">Edit</Link>
        <Link @click="destroy(user.id)" class="btn btn-danger btn-sm">Delete</Link>

      </td>
    </tr>
</tbody>
</table>

<Link class="btn btn-primary btn-sm mt-3" href="/create_user">Create</Link>
<nav aria-label="" class="float-end p-4">
  <ul class="pagination">
    <li class="page-item"  v-for="(link,index) in users.links" :key="index">
      <Link :class="[link.url ==null ? 'disable':'',link.active == true ? 'text-white bg-primary':'']" class="page-link text-black" :href="link.url ==null ?'':link.url" v-html="link.label"></Link> <!--this is so important-->
    </li>

  </ul>
</nav>
</div>


</template>

<script>

import { Link } from '@inertiajs/inertia-vue3';



export default {

    data(){
        return {
            allUser:this.$props.users.data,
            searchName:""
        }
    },


    props: {
        users: Object,
        search_Name:String
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(`delete/${id}`);
        },

        search(){
            this.$inertia.get(`/user?searchName=${this.searchName}`);
        }



    },



    components: { Link }
}
</script>

<style>
.danger{
  background-color:crimson ;
}
</style>
