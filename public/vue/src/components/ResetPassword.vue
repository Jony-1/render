<template>

  <div id="container_reset">
    <div id="reset">
      
      <div id="resetpassword">
        <form style="text-align: center;">
          <h1 id="title" style="text-align: center;"> Cambiar contraseña </h1>
          <br>
          <label for="">Email: </label><br>
          <input type="text" name="email" v-model="form.email">
          <br>
          <span v-if="errors.email">{{ errors.email[0] }}</span>

          <label for="">New password: </label><br>
          <input type="password" name="password" v-model="form.password">
          <br>
          <label for="">Password confirmation: </label><br>
          <input type="password" name="password_confirmation" v-model="form.password_confirmation">
          <br>
          <span v-if="errors.password">{{ errors.password[0]}}</span>
          <br>
          <p v-if="message"> {{ message }}</p>

          <button type="button" @click="change_password">Cambiar</button>
          <br>
          <br>
        </form>
      </div>
    </div>

  </div>

</template>

<style scoped>
@import url(../assets/Resetpassword.css);
</style>

<script>


export default {
  data() {
    return {
      message: null,
      form: {
        email: "",
        password: "",
        password_confirmation: "",
        token: null,
      },
      errors: {},
    };
  },

  mounted() {
    if (this.$route.query.token)
      this.form.token = this.$route.query.token;
  },
  methods: {
    async change_password() {
      try {
        const rs = await this.axios.post('/api/password-reset', this.form);
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