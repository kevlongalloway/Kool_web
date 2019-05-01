<template>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                          <video class="embed-responsive-item" autoplay="false" src="http://dgeyz4d8h92s2.cloudfront.net/VOWELS.mp4?ss=S2hhb0tldmxvbkpyVENLb29scmljdWx1bUFwcDIwMTk=" controls allowfullscreen></video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
  mounted(){
    console.log('compoonemt')
  },
  props:['song']
}
</script>
