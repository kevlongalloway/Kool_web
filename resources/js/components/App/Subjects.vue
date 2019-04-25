<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
            	<div class="card">
            		<div class="card-header">Grade {{user.grade}}</div>
            		<div class="card-body">
            			<div class="row">
		                	<div class="col-md-6 dev"><router-link class="" :to="{path: '/grade/'+grade+'/subject/math'}">Math</router-link></div>
		                	<div class="col-md-6 dev"><router-link class="" :to="{path: '/grade/'+user.grade+'/subject/ela'}">ELA</router-link></div>
		                </div>
		                <div class="row">
		                	<div class="col-md-6 dev"><router-link class="" :to="{path: '/grade/'+user.grade+'/subject/social-studies'}">Social Studies</router-link></div>
		                	<div class="col-md-6 dev"><router-link class="" :to="{path: '/grade/'+user.grade+'/subject/science'}">Science</router-link></div>
		                </div>
            		</div>
            	</div>
                
            </div>
        </div>

        <!--MODAL -->
      <div class="modal" id="selectGradeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Select your grade</h5>
            </div>
            
            <div class="modal-body">

              <form @submit="setGrade">
                <div class="form-group">
                        <label for="grade">Example select</label>
					    <select v-model="user.grade" class="form-control" id="grade">
					      <option value="13">K</option>
					      <option value="1">1</option>
					      <option value="2">2</option>
					      <option value="3">3</option>
					      <option value="4">4</option>
					      <option value="5">5</option>
					      <option value="6">6</option>
					      <option value="7">7</option>
					      <option value="8">8</option>
					      <option value="9">9</option>
					      <option value="10">10</option>
					      <option value="11">11</option>
					      <option value="12">12</option>

					    </select>
                        
                      </div>
                      <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <!--MODAL -->
    </div>
</template>

<script>
export default {
  data(){
  	return {
  		subject:'',
  		user:{
  			first_login:'',
  			grade:''
  		},  		
  		url:'users/'
  		
  	}
  },
  props: ['grade'],
  mounted () {
  		this.userData()

   },
   methods:{
   	userData(){
   		axios.get('api/user')
   			.then(response => {
   				console.log(response.data)
   				this.user = response.data
   				this.selectGradeModal()
   				this.initGrade()
   			});
   		},
   		selectGradeModal(){
   			if(this.user.first_login == 0){
   				$('#selectGradeModal').modal({
   					backdrop: 'static',
   					keyboard: false
   				})
   			}
   			
   		},
   		setGrade(e){
   			this.setUrl()

                e.preventDefault();
                let user = this

                axios.put(this.url,{
                    grade:this.user.grade,
                    first_login:1
                })
                .then(function(response){
                    $('#selectGradeModal').modal('hide')
                })
                .catch(errors => {
                  this.errors = errors.response.data.errors
                });
   		},
   		setUrl(){
   			this.url = this.url+this.user.id
   		},
   		initGrade(){
   			if(this.$props.grade != null){
   				this.user.grade = this.$props.user
   			}
   		}

   }
}
</script>
<style>
	.dev{
		background-color:#FEFEFE;
		border:1px solid #000;

	}
</style>