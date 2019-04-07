<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <router-link to="/admin/users"><i class="fas fa-arrow-left"></i></router-link> {{ user.name }}
      </div>
      <ul v-if="loading" class="list-group list-group-flush"><li class="list-group-item"><strong>Loading...</strong> </li></ul>
      <ul v-else class="list-group list-group-flush">
        <li class="list-group-item"><strong>Email:</strong> {{ user.email }}</li>
        <li class="list-group-item"><strong>Access Code:</strong> {{ user.id }}</li>
        <li class="list-group-item"><strong>Status</strong> {{ user.is_active ? 'Active' : 'Inactive' }}</li>
        <li class="list-group-item"><strong>Subscription Level:</strong> {{ user.subscription_id === 2 ? 'Classroom' : 'Full School Site License'}}</li>
      </ul>
    </div>
    <button type="button" class="btn btn-info" @click="editModal">Edit</button>
    <button type="button" class="btn btn-danger">Delete</button>


  </div>


</template>

<script>
    export default {
        mounted() {
           this.$Progress.start()
            this.getUser()
            this.$Progress.finish()
        },
        data(){
           return {
              url: '/organizations/'+ this.$route.params.id,
              user:[],
              loading:true,
           }
        },
        methods:{
          getUser(){
                let $this = this
                axios.get(this.url)
                .then(response => {  
                    this.user = response.data
                    this.loading = false
                });
            },
            editModal(){

            }
        }
    }
</script>
