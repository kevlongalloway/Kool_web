<template>
   <div class="card-body">
        <div class="form-group row">
            <label for="access_code" class="col-md-4 col-form-label text-md-right">Have an access code?</label>

            <div class="col-md-6">
                 <input class="form-control" v-model="access_code" autofocus>
            </div>
        </div>

        <div class="form-group row mb-0">
            <small v-if="errors" class="text-danger">The given data was invalid</small>
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary" @click="formSubmit">
                    Next
                </button>
            </div>
            
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Mounted')
        },
        data(){
            return {
                access_code:'',
                errors:false
            };
        },
        props:['guard'],
        methods: {
            formSubmit() {
                const router = this.$router;
                axios.post('/access-code',{
                    access_code: this.access_code,
                    guard:this.$props.guard
                }).then(
                    
                )
                .catch(errors => this.errors = true);
            }
        }


    }
</script>
