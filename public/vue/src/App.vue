<template>
  <div id="container">
    <nav class="navbar navbar-expand-lg  bg-dark">
      <div class="container-fluid">
        <div>
          <h2 class="navbar-brand text-white" ><b>Luxury</b></h2>
        </div>

      
      </div>
    </nav>
    <nav id="sub_nav">
      <div class="subnav">
        <router-link class="nav_item" to="/login"> <b>LOGIN</b> </router-link>
        <router-link class="nav_item" to="/register"><b>REGISTER</b> </router-link>
        <router-link to="/" class="nav_item"><b>HOME</b> </router-link>
        <!-- <router-link to="/Client" class="nav_item">CLIENT</router-link>
        <router-link to="/Administrator" class="nav_item">ADMINISTATOR</router-link> -->
        <!-- <router-link to="/Forgot-Password" class="nav_item">forgotpassword</router-link> -->
        <!-- <router-link to="/Password-Reset" class="nav_item">Reset-password</router-link> -->
        <!-- <select name="" id="" class="nav_item" >
          <option value="" class="nav_item">SOME</option>
          <option value="" class="nav_item" v-on:select="logout()">Logout</option>
          
        </select> -->
        <!-- <router-link to="/Employed" class="nav_item">Employed</router-link> -->
      </div>


    </nav>
    <div id="container_main">





      <router-view>

      </router-view>







    </div>

  </div>




  <!-- <router-link class="ForgotPassword" to="/ForgotPassword">forgotpassword</router-link> -->

</template>
<style scoped>
  #container {
    display: flex;
    flex-direction: column;
    background-image: url('../src/assets/images/luxury.jpg');
    /* background-color: rgb(22, 20, 20); */
    background-position: center;
    background-size: cover;
    width: 100vw;
    height: 100vh;


  }

  .navbar {
    display: flex;
    width: 100%;
    height: 5rem;
    background-color: rgba(19, 2, 31, 0.829) !important;
    color: white;
    font-size: 3rem;
  }

  nav .container-fluid {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
  }

  .d-flex {
    display: flex;
    flex-direction: column;
    justify-content: center;
    /* border: 1px solid white; */

  }

  #d-flex {
    display: flex;
    flex-direction: row;
    /* border: 1px solid white; */
    height: max-content;
  }

  #d-flex button {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: max-content;
    font-size: 1rem;
    background-color: transparent !important;
    border: 1px solid white !important;
    color: white;
  }

  #d-flex button:hover {
    background-color: white !important;
    border: 1px solid white;
    color: rgb(95, 3, 95) !important;
  }
  #d-flex button:active {
    transform: scale(0.95);
  }

  .btn {
    height: 2rem;
    /* border: 1px solid white; */
    margin: 2px;
    border-radius: 5px;
  }

  #container_main {
    display: flex;
    flex-direction: column;

    height: calc(100% - 7.5rem);
    width: 100%;
  }



  #sub_nav {

    display: flex;
    /* overflow-x: scroll; */
    overflow-y: hidden;
    width: 100%;
    height: 2.7rem;
    background-color: rgba(128, 128, 128, 0.575);
  }

  .subnav {
    display: flex;
    flex-direction: row;
    width: 100%;
  }

  .nav_item {
    display: flex;

    justify-content: center;
    font-size: 1.5rem;
    color: rgb(70, 28, 109);
    padding-left: 1rem;
    padding-right: 1rem;
    border: 1px solid rgb(58, 3, 95);
    border-radius: 5px;
    margin: 2px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    background-color: transparent;
    /* height: max-content; */
    transition: cubic-bezier(0.785, 0.135, 0.15, 0.86);

  }

  .nav_item:hover {
    background-color: rgb(58, 3, 95);
    color: white;
  }
  .nav_item:active{
    transform: scale(0.95);
  }
  h2{
    font-size: 3rem;
  }

  @media (max-width: 400px) {
   

   


  }
</style>
<script>

 
</script>