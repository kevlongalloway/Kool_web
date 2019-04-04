<template>
   <div class="card-body">
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Have an access code?</label>

            <div class="col-md-6">
                 <input class="form-control" autofocus>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
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
        }
    }
</script>
