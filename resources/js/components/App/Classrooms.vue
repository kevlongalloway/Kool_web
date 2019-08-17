<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Classrooms</div>
          <div class="card-body">
            <div class="card" style="width: 18rem;">
              <div class="card-header">
                Featured
              </div>
              <ul class="list-group">
                <li v-if="loading" class="list-group-item"><strong>Loading...</strong></li>
                <li v-else v-for="classroom in classrooms" :key="classroom.id" class="list-group-item">
                  <router-link :to="{path: '/video/' + song.id }">{{classroom.name}}</router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true
      classrooms: {}
    }
  },
  mounted() {
    this.getClassrooms()
  },
  methods: {
    getClassrooms() {
      axios.get('/api/classrooms')
        .then(response => {
          this.classrooms = response.data
        });
      this.loading = false
    }
  }
}
</script>
