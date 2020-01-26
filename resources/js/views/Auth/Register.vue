<template>
    <div class="login-page">
        <div class="login">
            <div class="register-container auth-container">
                <div class="register-image-column">
                    <div class="image-holder">
                        <img src="../../../assets/login-illustration.svg" alt="">
                    </div>
                </div>

                <div class="register-form-column">
                    <form v-on:submit.prevent="registerAppUser">
                        <h3>Create an Account</h3>
                        <div class="form-wrapper">
                            <label for="email">User Email</label>
                            <input type="email" name="email" id="email" v-model="email" placeholder="Enter your email" class="form-control" required>
                        </div>

                        <div class="form-wrapper">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" v-model="password" placeholder="Enter your password" class="form-control" required>
                        </div>

                        <div class="form-wrapper">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" v-model="password_confirmation" placeholder="Re-enter password" class="form-control" required>
                        </div>
                        <button type="submit" class="button">SIGN UP &nbsp;&nbsp;<span v-if="showSpinner" class="fa fa-spin fa-spinner"></span> </button>
                    </form>

                    <div class="text-center m-t-50 link-reg">
                        <p v-on:click="redirectToLogin">Do you have an account?  <span>Log in</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: "",
                password: '',
                password_confirmation: '',
                showSpinner: false,
            };
        },
        methods: {
            registerAppUser() {
                if (this.email && this.password && this.password_confirmation) {
                    if (this.password && this.password_confirmation) {
                        let userData = {
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation
                        };
                        axios.post(`/api/register`, userData)
                            .then(response => {
                                if (response.data) {
                                    console.log(response.data);
                                    this.$router.push({name: 'login'});
                                }
                            }).catch(error => {
                                alert(error.response.data.message);
                        })
                    }
                }
            },
            sendTokenToServer(token, uid) {
                axios.post(`/api/update/token`, {token, uid})
                    .then(response => {
                        console.log("Token updated successfully", response);
                    }).catch(error => {
                    alert(error.response.data.message);
                })
            },
            redirectToLogin() {
                this.$router.push({name: 'login'})
            }
        }
    };
</script>
