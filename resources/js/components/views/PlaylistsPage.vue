<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
              <div class="card">
                <div class="card-header">Grade </div>
                <div class="card-body">
                  <div class="row">
                      <a class="btn btn-primary">
                        Create New Playlist
                      </a>
                    </div>
                    <div class="row">
                      <ul v-if="playlists.length" class="list-group">
                        <li  v-for="playlist in playlists" :key="playlist.id" class="list-group-item"><router-link :to="{path: '/playlist/' + playlist.id }">{{playlist.name}}</router-link></li>
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
    data(){
      return {
        playlists:{},
        url: '/playlists'
      }
    },
    mounted(){
      this.getPlaylists()
      console.log('mounted')
    },
    methods:{
      getPlaylists(){
        axios.get(this.url)
          .then(response => {
              this.playlists = response.data
          });
      }
    }
  }
</script>
