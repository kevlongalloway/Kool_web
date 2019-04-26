<template>
    <div class="container">
        <grades></grades>
    </div>
</template>

<script>
export default {
  mounted () {
    console.log('page mounted')
    this.userData()

  },
  data(){
    return {
      user:{},
      grade:''
    }
  },
  methods: {
    userData(){
      axios.get('api/user')
        .then(response => {
          console.log(response.data)
          this.user = response.data
        });
      }
    }


  }
</script>
