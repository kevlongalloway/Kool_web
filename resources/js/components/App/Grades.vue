<template>
    <div>
        <div class="row justify-content-center">

            <div class="col-md-8">
            	<div class="card">
            		<div class="card-header">Select A Grade</div>
            		<div class="card-body">
            			<div class="row">

		                	<div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/13'}">K</router-link></div>
		                	<div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/1'}">1</router-link></div>
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/2'}">2</router-link></div>
		                </div>
                    <div class="row">
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/3'}">3</router-link></div>
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/4'}">4</router-link></div>
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/5'}">5</router-link></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/6'}">6</router-link></div>
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/7'}">7</router-link></div>
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/8'}">8</router-link></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/9'}">9</router-link></div>
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/10'}">10</router-link></div>
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/11'}">11</router-link></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 dev"><router-link class="" :to="{path: '/grade/12'}">12</router-link></div>
                    </div>
		                
            		</div>
            	</div>
                
            </div>
        </div>

    </div>
</template>

<style>
	.dev{
		background-color:#FEFEFE;
		border:1px solid #000;

	}
</style>