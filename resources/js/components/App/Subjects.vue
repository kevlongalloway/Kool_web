<template>
    <div>
        <div class="row justify-content-center">

            <div class="col-md-8">
            	<div class="card">
            		<div class="card-header">Grade {{grade}}</div>
            		<div class="card-body">
            			<div class="row">
		                	<div class="col-md-6 dev"><router-link class="" :to="{path: '/grade/'+grade+'/subject/math'}">Math</router-link></div>
		                	<div class="col-md-6 dev"><router-link class="" :to="{path: '/grade/'+grade+'/subject/ela'}">ELA</router-link></div>
		                </div>
		                <div class="row">
		                	<div class="col-md-6 dev"><router-link class="" :to="{path: '/grade/'+grade+'/subject/social-studies'}">Social Studies</router-link></div>
		                	<div class="col-md-6 dev"><router-link class="" :to="{path: '/grade/'+grade+'/subject/science'}">Science</router-link></div>
		                </div>
            		</div>
            	</div>
                
            </div>
        </div>

    </div>
</template>

<script>
export default {
  props: ['grade'],
}
</script>
<style>
	.dev{
		background-color:#FEFEFE;
		border:1px solid #000;

	}
</style>