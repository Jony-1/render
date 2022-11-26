<template>
    <div id="all">

        <div id="container_login">
            <form id="login">
                <h1 id="title" style="text-align: center;"> INICIAR SESION </h1>
                <div class="input-field login">
                    <label>
                        Email:
                    </label>
                    <input type="email" name="email" v-model="form.email" />
                    <span v-if="errors.email">{{ errors.email[0] }}</span>


                    <label>Password: </label>
                    <input type="password" name="password" v-model="form.password" />
                    <span v-if="errors.password">{{ errors.password[0] }}</span>


                    <br />
                    <button type="button" @click='login()'>Login</button>
                    <br />
                    <p>{{message}}</p>
                    <br />
                    <router-link class="ForgotPassword" to="/Forgot-Password">
                        ¿Olvidaste tu contraseña?
                    </router-link>

                </div>
            </form>

        </div>
    </div>


</template>
<style scoped>
@import url(../assets/login.css);
</style>
<script>
export default {
    data() {
        return {
            message: null,
            form: {
                email: "",
                password: "",

            },
            errors: {},
            role: null,

        };
    },
    mounted() {
        if (this.$route.params.message)
            this.message = this.$route.params.message;
    },
    methods: {
        async login() {
            try {

                const rs = await this.axios.post('/api/login', this.form);

                localStorage.token = rs.data.token;
                this.role = rs.data.user.roles_id,
                    localStorage.user = JSON.stringify(rs.data.user);
                // console.log("Role: " + this.role);

             
                // if (rs.data.user.email_verified_at == null) {
                //     this.$router.push({ name: "SendEmail" });
                // }
                // else{
                switch (this.role) {
                    case 1:
                        console.log("Case 1: " + this.role);
                        this.$router.push({
                            name: "Client",
                            params: {
                                token: rs.data.token,
                            },
                        });
                        break;
                    case 2:
                        console.log("Case 2: " + this.role);
                        this.$router.push({
                            name: "Employed",
                            params: {
                                token: rs.data.token,
                            },
                        });
                        break;
                    case 3:
                        console.log("Case 3: " + this.role);
                        this.$router.push({
                            name: "Administrator",
                            params: {
                                token: rs.data.token,
                            },
                        });
                        break;
                    default:
                        console.log("Default: " + this.role);
                        alert("Primero inicie sesion mushasho")
                        this.$router.push({
                            name: "login",
                            // params: {
                            //     token: rs.data.token,
                            // },

                        });

                }
                // }



                // this.$router.push({
                //     name: "Account",
                //     params: {
                //         role: rs.data.user.roles_id,
                //         token: rs.data.token,
                //     },

                // });

            } catch (e) {
                this.errors = {};
                this.message = null;

                if (e.response.data.errors)
                    this.errors = e.response.data.errors;
                else if (e.response.data.message)
                    this.message = e.response.data.message;

                console.log(e);
                console.log("errorcito XD");

            }
        },
    },
}
</script>