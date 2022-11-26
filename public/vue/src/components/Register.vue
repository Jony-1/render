<template>

  <div id="container_register">

    <form id="register">
      <h1 id="title" style="text-align: center;"> REGISTRARSE </h1>

      <label for="">Nombre Completo:</label>
      <input type="text" name="name" v-model="form.name">
      <span v-if="errors.name">{{ errors.name[0] }}</span>
      <label for="">Email:</label>
      <input type="text" name="email" v-model="form.email">
      <span v-if="errors.email">{{ errors.email[0] }}</span>

      <label for="">Password:</label>
      <input type="password" name="password" v-model="form.password">

      <label for="">Confirm password:</label>
      <input type="password" name="password_confirmation" v-model="form.password_confirmation">

     

      <span v-if="errors.password">{{ errors.password[0] }}</span>

      <p v-if="message"> {{ message }}</p>
      <br>
      <button type="button" @click="register">Registrarse</button>
      <br>





    </form>
  </div>

</template>
<style scoped>
@import url(../assets/register.css);
</style>
<script>


export default {
  data() {
    return {
      message: null,
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        token: null,
        // details_id: 1,
        // buyscont_id: 1,
        // roles_id: 1,

      },
      errors: {},
    };
  },

  mounted() {
    if (this.$route.query.token)
      this.form.token = this.$route.query.token;
  },
  methods: {
    async register() {
      try {
        console.log(this.form);
        const rs = await this.axios.post('/api/register/', this.form);
        this.$router.push({
          name: "Login",
          params: {
            message: rs.data.message,
          }

        });
        localStorage.token = rs.data.token
      }
      catch (e) {

        this.errors = {};
        this.message = null;
        console.log(e);
        if (e.response.data.errors)
          this.errors = e.response.data.errors;
        else if (e.response.data.message)
          this.message = e.response.data.message;
      }
    }
  },

};
</script>