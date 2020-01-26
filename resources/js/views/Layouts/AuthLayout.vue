<style>
@import url('https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap');

* {
    box-sizing: border-box;
}


body {
    color: #333;
    font-size: 13px;
    margin: 0;
    width: 100%;
    height: 100vh;
    -webkit-font-smoothing: antialiased;
}

h3 {
    font-family: 'Abril Fatface';
    margin-bottom: 20px;
}

.button {
    border: none;
    width: 100%;
    margin: auto;
    margin-top: 40px;
    cursor: pointer;
    padding: 10px 0;
    background: #1B47DB;
    font-size: 14px;
    color: #fff;
    border-radius: 4px;
    box-shadow: 0 4px 8px 0 #CFDFFF, 0 6px 20px 0 #CFDFFF;
    font-weight: 700;
    transform: perspective(1px) translateZ(0);
}
.button:hover {
    background: #2B57EB;
}

.login-page {
    background: url(../../../assets/login-background.svg) no-repeat center center fixed;
    background-size: cover;
    padding-top: 100px;
    height: 100vh;
}
.login {
    background: #fff;
    margin: auto;
    display: flex;
    max-width: 760px;
    width: calc(100% - 20px);
    height: 440px;
    border-radius: 6px;
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.3);
}

.login-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding: 0 70px;
}

.register-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding: 0 50px;
}

.login-form-column {
    width: 350px;
}

.register-form-column {
    width: 350px;
}

.auth-container form {
    margin-bottom: 20px;
}

.link-reg p {
    cursor: pointer;
}

.link-reg span {
    font-weight: bolder;
    color: #1B47DB;
}

.login .form-wrapper {
    position: relative;
}

label {
    color: #c9d4d8;
    font-weight: bold;
}

.form-wrapper label {
    margin: 0;
    color: #BFCDD8;
}

.form-wrapper #username {
    border-bottom: 2px solid #E6ECEE !important;
    border-radius: 0 !important;
    padding-top: 0.375rem;
    padding-right: 0.75rem;
    padding-bottom: 0.375rem;
    padding-left: 0;
}

.form-wrapper input {
    border-bottom: 2px solid #E6ECEE !important;
    border-radius: 0 !important;
    padding-top: 0.375rem;
    padding-right: 0.75rem;
    padding-bottom: 0.375rem;
    padding-left: 0;
}

@media (max-width: 760px) {
    .login-image-column {
        display: none;
    }
    .login-form-column {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-image-column {
        display: none;
    }
    .register-form-column {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login form {
        width: 100%;
    }
}

.form-wrapper i {
    position: absolute;
    bottom: 9px;
    right: 0;
}

.container {
    margin: auto;
    max-width: 800px;
    width: calc(100% - 20px);
    height: 588px;
    font-family: sans-serif;
    letter-spacing: 0.5px;
    background: #f8f9fb;
    padding: 0 !important;
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
    border-radius: 7px;
    box-sizing: border-box;
    border: 1px solid #BFCDD8;
}

@media (max-width: 450px) {
    .login-container {
        padding: 40px;
    }
    .received-msg-inbox p {
        left: 0;
        width: 100%;
    }
    .received-msg-inbox p:after {
        display: none;
    }
    .received-msg-inbox {
        width: 100%;
    }
    .received-msg {
        width: 100%;
    }
    .welcome-message {
        display: none;
    }
}

</style>
<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <!-- Breadcrumb -->
                    <router-view></router-view>
                </main>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "AuthLayout",
    }
</script>

