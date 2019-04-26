<template>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <ul class="list-group">
                        <li v-if="loading" class="list-group-item"><strong>Loading...</strong></li>
                        <li v-else v-for="song in songs" :key="song.id" class="list-group-item"><router-link :to="{path: '/admin/user/' + song.id }">{{song.title}}</router-link></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
	data(){
		return {
			songs:{},
			grade:this.$route.params.grade,
			subject:this.$route.params.subject,
			url: '',
			loading:true
		}
	},
 	mounted () {
 		console.log('mounted')
 		this.url = '/api/grade/'+this.grade+'/subject/'+this.subject
 		this.getSongs()
  },
  methods:{
  	getSongs(){
  		axios.get(this.url)
	        .then(response => {
	            this.songs = response.data
	        this.loading = false
	    });
  	}
  }

}
</script>
