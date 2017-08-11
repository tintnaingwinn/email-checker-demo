<template>
    <section>
        <div class="jumbotron">
            <div class="form-group">
                <alert type="success" :message="message" v-if="success"></alert>
                <alert type="danger" :message="message" v-if="fail"></alert>
            </div>

            <h1 style="color: white;">Looking to verify email?</h1>

            <form action="/check" method="post" @submit.prevent="checkEmail" @keydown="clearError($event.target.name)">

                <div :class="['form-group', errors.email ? 'has-error hasfeedback' : '' ]">
                    <label class="control-label" for="email" v-if="errors.email">{{ errors.email[0] }}</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailStatus" v-model="check.email" required="required" :disabled="disabled">
                    <span class="glyphicon glyphicon-remove form-control-feedback" v-if="errors.email" aria-hidden="true"></span>
                    <span id="emailStatus" class="sr-only">(error)</span>
                </div>

                <button type="submit" class="btn btn-lg btn-success" role="button" :disabled="disabled">Check</button>
            </form>

        </div>

    </section>
</template>

<script>
    export default {
        data:function () {
            return {
                check :{
                    email:''
                },
                errors : [],
                disabled : false,
                success : false,
                fail : false,
                message : '',
            }
        },
        methods: {
            checkEmail:function () {

                this.disabled = true;

                let data = this.check;

                axios.post('/check',data)
                    .then(response => {
                        this.onSuccess(response.data);
                    })
                    .catch(error => {
                        this.onFail(error.response.data);
                    });

            },
            onSuccess:function (data) {
                if(data.success)
                {
                    this.success = true;
                    this.message = data.message;
                    this.fail = false;
                }

                if(data.fail)
                {
                    this.fail = true;
                    this.message = data.message;
                    this.success = false;
                }

                this.disabled = false;
                this.check = { email :''};
            },
            onFail:function (error) {
                this.errors = error;
                this.disabled = false;
            },
            clearError: function (field) {
                delete this.errors[field];
            },
        }
    }
</script>
