<template>
  <div>
  	{{grade}},{{subject}}
  </div>
</template>

<script>
export default {
	data(){
		return {
			grade:this.$route.params.grade,
			subject:this.$route.params.subject
		}
	},
 	mounted () {
 		console.log('mounted')
  }

}
</script>
