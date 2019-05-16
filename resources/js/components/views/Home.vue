<template>
    <div class="container">
        <grades></grades>
    </div>
</template>

<script>
export default {
  mounted () {
    console.log('page mounted')
    this.user = this.$root.$data.user

  },
  data(){
    return {
      user:{},
      grade:''
    }
  }
  }
</script>
