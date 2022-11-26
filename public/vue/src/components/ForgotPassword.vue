<template>
   <div id="container_forgot">
      <div id="forgot-list">
         <br>
         <h1 id="title" style="text-align: center;"> CONFIRMAR CORREO </h1>
         <BR></BR>
         <input type="email" class="from-control" id="floatingInput" placeholder="name@example.com" name="email"
            v-model="email">
         <br>
        
         <button type="button " @click="send_email">Enviar correo</button>
         <span v-if="errors.email">errors.email[0]</span>
         <br>
      </div>
   </div>



</template>
<style>
@import url(../assets/ForgotPassword.css);
</style>
<script>
export default {
   data() {
      return {
         message: null,
         email: "",
         errors: {},

      };
   },

   methods: {
      async send_email() {

         try {
            const rs = await this.axios.post(
               "/api/forgot-password",
               { email: this.email }
            );
            this.$router.push({
               name: "Login",
               params: {
                  message: { message: rs.data.message },
               },

            });

         } catch (e) {
            this.errors = {};
            this.message = null;

            if (e.response.data.errors)
               this.errors = e.response.data.errors;
            else if (e.response.data.message)
               this.message = e.response.data.message;



         }
      },
   },
}
</script>